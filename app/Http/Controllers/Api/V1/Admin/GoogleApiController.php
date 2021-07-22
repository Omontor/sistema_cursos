<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreGoogleRequest;
use App\Http\Requests\UpdateGoogleRequest;
use App\Http\Resources\Admin\GoogleResource;
use App\Models\Google;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class GoogleApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('google_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new GoogleResource(Google::all());
    }

    public function store(StoreGoogleRequest $request)
    {
        $google = Google::create($request->all());

        return (new GoogleResource($google))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Google $google)
    {
        abort_if(Gate::denies('google_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new GoogleResource($google);
    }

    public function update(UpdateGoogleRequest $request, Google $google)
    {
        $google->update($request->all());

        return (new GoogleResource($google))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Google $google)
    {
        abort_if(Gate::denies('google_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $google->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
