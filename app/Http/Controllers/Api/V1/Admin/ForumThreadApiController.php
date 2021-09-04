<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreForumThreadRequest;
use App\Http\Requests\UpdateForumThreadRequest;
use App\Http\Resources\Admin\ForumThreadResource;
use App\Models\ForumThread;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ForumThreadApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('forum_thread_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ForumThreadResource(ForumThread::with(['user', 'category'])->get());
    }

    public function store(StoreForumThreadRequest $request)
    {
        $forumThread = ForumThread::create($request->all());

        return (new ForumThreadResource($forumThread))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(ForumThread $forumThread)
    {
        abort_if(Gate::denies('forum_thread_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ForumThreadResource($forumThread->load(['user', 'category']));
    }

    public function update(UpdateForumThreadRequest $request, ForumThread $forumThread)
    {
        $forumThread->update($request->all());

        return (new ForumThreadResource($forumThread))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(ForumThread $forumThread)
    {
        abort_if(Gate::denies('forum_thread_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $forumThread->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
