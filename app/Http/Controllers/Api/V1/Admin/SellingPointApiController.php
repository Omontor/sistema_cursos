<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreSellingPointRequest;
use App\Http\Requests\UpdateSellingPointRequest;
use App\Http\Resources\Admin\SellingPointResource;
use App\Models\SellingPoint;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SellingPointApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('selling_point_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new SellingPointResource(SellingPoint::all());
    }

    public function store(StoreSellingPointRequest $request)
    {
        $sellingPoint = SellingPoint::create($request->all());

        if ($request->input('image', false)) {
            $sellingPoint->addMedia(storage_path('tmp/uploads/' . basename($request->input('image'))))->toMediaCollection('image');
        }

        return (new SellingPointResource($sellingPoint))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(SellingPoint $sellingPoint)
    {
        abort_if(Gate::denies('selling_point_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new SellingPointResource($sellingPoint);
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

        return (new SellingPointResource($sellingPoint))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(SellingPoint $sellingPoint)
    {
        abort_if(Gate::denies('selling_point_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $sellingPoint->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
