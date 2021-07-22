<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRequirmentRequest;
use App\Http\Requests\UpdateRequirmentRequest;
use App\Http\Resources\Admin\RequirmentResource;
use App\Models\Requirment;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RequirmentApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('requirment_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new RequirmentResource(Requirment::all());
    }

    public function store(StoreRequirmentRequest $request)
    {
        $requirment = Requirment::create($request->all());

        return (new RequirmentResource($requirment))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Requirment $requirment)
    {
        abort_if(Gate::denies('requirment_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new RequirmentResource($requirment);
    }

    public function update(UpdateRequirmentRequest $request, Requirment $requirment)
    {
        $requirment->update($request->all());

        return (new RequirmentResource($requirment))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Requirment $requirment)
    {
        abort_if(Gate::denies('requirment_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $requirment->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
