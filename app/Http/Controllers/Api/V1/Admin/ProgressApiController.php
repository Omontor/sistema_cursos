<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProgressRequest;
use App\Http\Requests\UpdateProgressRequest;
use App\Http\Resources\Admin\ProgressResource;
use App\Models\Progress;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ProgressApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('progress_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ProgressResource(Progress::with(['user', 'lesson'])->get());
    }

    public function store(StoreProgressRequest $request)
    {
        $progress = Progress::create($request->all());

        return (new ProgressResource($progress))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Progress $progress)
    {
        abort_if(Gate::denies('progress_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ProgressResource($progress->load(['user', 'lesson']));
    }

    public function update(UpdateProgressRequest $request, Progress $progress)
    {
        $progress->update($request->all());

        return (new ProgressResource($progress))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Progress $progress)
    {
        abort_if(Gate::denies('progress_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $progress->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
