<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCtumRequest;
use App\Http\Requests\UpdateCtumRequest;
use App\Http\Resources\Admin\CtumResource;
use App\Models\Ctum;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CtaApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('ctum_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CtumResource(Ctum::all());
    }

    public function store(StoreCtumRequest $request)
    {
        $ctum = Ctum::create($request->all());

        return (new CtumResource($ctum))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Ctum $ctum)
    {
        abort_if(Gate::denies('ctum_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CtumResource($ctum);
    }

    public function update(UpdateCtumRequest $request, Ctum $ctum)
    {
        $ctum->update($request->all());

        return (new CtumResource($ctum))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Ctum $ctum)
    {
        abort_if(Gate::denies('ctum_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $ctum->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
