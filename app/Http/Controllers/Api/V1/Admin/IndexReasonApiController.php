<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreIndexReasonRequest;
use App\Http\Requests\UpdateIndexReasonRequest;
use App\Http\Resources\Admin\IndexReasonResource;
use App\Models\IndexReason;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IndexReasonApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('index_reason_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new IndexReasonResource(IndexReason::all());
    }

    public function store(StoreIndexReasonRequest $request)
    {
        $indexReason = IndexReason::create($request->all());

        return (new IndexReasonResource($indexReason))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(IndexReason $indexReason)
    {
        abort_if(Gate::denies('index_reason_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new IndexReasonResource($indexReason);
    }

    public function update(UpdateIndexReasonRequest $request, IndexReason $indexReason)
    {
        $indexReason->update($request->all());

        return (new IndexReasonResource($indexReason))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(IndexReason $indexReason)
    {
        abort_if(Gate::denies('index_reason_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $indexReason->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
