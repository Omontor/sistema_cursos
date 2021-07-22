<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreOnlineClassRequest;
use App\Http\Requests\UpdateOnlineClassRequest;
use App\Http\Resources\Admin\OnlineClassResource;
use App\Models\OnlineClass;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class OnlineClassApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('online_class_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new OnlineClassResource(OnlineClass::with(['course', 'created_by'])->get());
    }

    public function store(StoreOnlineClassRequest $request)
    {
        $onlineClass = OnlineClass::create($request->all());

        return (new OnlineClassResource($onlineClass))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(OnlineClass $onlineClass)
    {
        abort_if(Gate::denies('online_class_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new OnlineClassResource($onlineClass->load(['course', 'created_by']));
    }

    public function update(UpdateOnlineClassRequest $request, OnlineClass $onlineClass)
    {
        $onlineClass->update($request->all());

        return (new OnlineClassResource($onlineClass))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(OnlineClass $onlineClass)
    {
        abort_if(Gate::denies('online_class_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $onlineClass->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
