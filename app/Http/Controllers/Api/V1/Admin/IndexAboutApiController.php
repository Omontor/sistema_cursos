<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreIndexAboutRequest;
use App\Http\Requests\UpdateIndexAboutRequest;
use App\Http\Resources\Admin\IndexAboutResource;
use App\Models\IndexAbout;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IndexAboutApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('index_about_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new IndexAboutResource(IndexAbout::all());
    }

    public function store(StoreIndexAboutRequest $request)
    {
        $indexAbout = IndexAbout::create($request->all());

        return (new IndexAboutResource($indexAbout))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(IndexAbout $indexAbout)
    {
        abort_if(Gate::denies('index_about_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new IndexAboutResource($indexAbout);
    }

    public function update(UpdateIndexAboutRequest $request, IndexAbout $indexAbout)
    {
        $indexAbout->update($request->all());

        return (new IndexAboutResource($indexAbout))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(IndexAbout $indexAbout)
    {
        abort_if(Gate::denies('index_about_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $indexAbout->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
