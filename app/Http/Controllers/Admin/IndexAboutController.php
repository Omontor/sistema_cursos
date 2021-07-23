<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyIndexAboutRequest;
use App\Http\Requests\StoreIndexAboutRequest;
use App\Http\Requests\UpdateIndexAboutRequest;
use App\Models\IndexAbout;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class IndexAboutController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('index_about_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $indexAbouts = IndexAbout::all();

        return view('admin.indexAbouts.index', compact('indexAbouts'));
    }

    public function create()
    {
        abort_if(Gate::denies('index_about_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.indexAbouts.create');
    }

    public function store(StoreIndexAboutRequest $request)
    {
        $indexAbout = IndexAbout::create($request->all());

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $indexAbout->id]);
        }

        return redirect()->route('admin.index-abouts.index');
    }

    public function edit(IndexAbout $indexAbout)
    {
        abort_if(Gate::denies('index_about_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.indexAbouts.edit', compact('indexAbout'));
    }

    public function update(UpdateIndexAboutRequest $request, IndexAbout $indexAbout)
    {
        $indexAbout->update($request->all());

        return redirect()->route('admin.index-abouts.index');
    }

    public function show(IndexAbout $indexAbout)
    {
        abort_if(Gate::denies('index_about_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.indexAbouts.show', compact('indexAbout'));
    }

    public function destroy(IndexAbout $indexAbout)
    {
        abort_if(Gate::denies('index_about_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $indexAbout->delete();

        return back();
    }

    public function massDestroy(MassDestroyIndexAboutRequest $request)
    {
        IndexAbout::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('index_about_create') && Gate::denies('index_about_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new IndexAbout();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
