<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyForumThreadRequest;
use App\Http\Requests\StoreForumThreadRequest;
use App\Http\Requests\UpdateForumThreadRequest;
use App\Models\ForumThread;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class ForumThreadController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('forum_thread_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $forumThreads = ForumThread::with(['user'])->get();

        $users = User::get();

        return view('admin.forumThreads.index', compact('forumThreads', 'users'));
    }

    public function create()
    {
        abort_if(Gate::denies('forum_thread_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.forumThreads.create', compact('users'));
    }

    public function store(StoreForumThreadRequest $request)
    {
        $forumThread = ForumThread::create($request->all());

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $forumThread->id]);
        }

        return redirect()->route('admin.forum-threads.index');
    }

    public function edit(ForumThread $forumThread)
    {
        abort_if(Gate::denies('forum_thread_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $forumThread->load('user');

        return view('admin.forumThreads.edit', compact('users', 'forumThread'));
    }

    public function update(UpdateForumThreadRequest $request, ForumThread $forumThread)
    {
        $forumThread->update($request->all());

        return redirect()->route('admin.forum-threads.index');
    }

    public function show(ForumThread $forumThread)
    {
        abort_if(Gate::denies('forum_thread_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $forumThread->load('user', 'threadForumComments');

        return view('admin.forumThreads.show', compact('forumThread'));
    }

    public function destroy(ForumThread $forumThread)
    {
        abort_if(Gate::denies('forum_thread_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $forumThread->delete();

        return back();
    }

    public function massDestroy(MassDestroyForumThreadRequest $request)
    {
        ForumThread::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('forum_thread_create') && Gate::denies('forum_thread_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new ForumThread();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
