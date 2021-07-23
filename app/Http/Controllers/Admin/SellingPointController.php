<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroySellingPointRequest;
use App\Http\Requests\StoreSellingPointRequest;
use App\Http\Requests\UpdateSellingPointRequest;
use App\Models\SellingPoint;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class SellingPointController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('selling_point_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $sellingPoints = SellingPoint::with(['media'])->get();

        return view('admin.sellingPoints.index', compact('sellingPoints'));
    }

    public function create()
    {
        abort_if(Gate::denies('selling_point_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.sellingPoints.create');
    }

    public function store(StoreSellingPointRequest $request)
    {
        $sellingPoint = SellingPoint::create($request->all());

        if ($request->input('image', false)) {
            $sellingPoint->addMedia(storage_path('tmp/uploads/' . basename($request->input('image'))))->toMediaCollection('image');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $sellingPoint->id]);
        }

        return redirect()->route('admin.selling-points.index');
    }

    public function edit(SellingPoint $sellingPoint)
    {
        abort_if(Gate::denies('selling_point_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.sellingPoints.edit', compact('sellingPoint'));
    }

    public function update(UpdateSellingPointRequest $request, SellingPoint $sellingPoint)
    {
        $sellingPoint->update($request->all());

        if ($request->input('image', false)) {
            if (!$sellingPoint->image || $request->input('image') !== $sellingPoint->image->file_name) {
                if ($sellingPoint->image) {
                    $sellingPoint->image->delete();
                }
                $sellingPoint->addMedia(storage_path('tmp/uploads/' . basename($request->input('image'))))->toMediaCollection('image');
            }
        } elseif ($sellingPoint->image) {
            $sellingPoint->image->delete();
        }

        return redirect()->route('admin.selling-points.index');
    }

    public function show(SellingPoint $sellingPoint)
    {
        abort_if(Gate::denies('selling_point_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.sellingPoints.show', compact('sellingPoint'));
    }

    public function destroy(SellingPoint $sellingPoint)
    {
        abort_if(Gate::denies('selling_point_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $sellingPoint->delete();

        return back();
    }

    public function massDestroy(MassDestroySellingPointRequest $request)
    {
        SellingPoint::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('selling_point_create') && Gate::denies('selling_point_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new SellingPoint();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
