<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyForumThreadRequest;
use App\Http\Requests\StoreForumThreadRequest;
use App\Http\Requests\UpdateForumThreadRequest;
use App\Models\ForumCategory;
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

        $forumThreads = ForumThread::with(['user', 'category'])->get();

        $users = User::get();

        $forum_categories = ForumCategory::get();

        return view('frontend.forumThreads.index', compact('forumThreads', 'users', 'forum_categories'));
    }

    public function create()
    {
        abort_if(Gate::denies('forum_thread_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $categories = ForumCategory::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('frontend.forumThreads.create', compact('users', 'categories'));
    }

    public function store(StoreForumThreadRequest $request)


    {

        $forumThread = ForumThread::create($request->all());

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $forumThread->id]);
        }

        return redirect()->route('foro.show', $forumThread->id);
    }

    public function edit(ForumThread $forumThread)
    {
        abort_if(Gate::denies('forum_thread_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $categories = ForumCategory::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $forumThread->load('user', 'category');

        return view('frontend.forumThreads.edit', compact('users', 'categories', 'forumThread'));
    }

    public function update(UpdateForumThreadRequest $request, ForumThread $forumThread)
    {
        $forumThread->update($request->all());

        return redirect()->route('frontend.forum-threads.index');
    }

    public function show(ForumThread $forumThread)
    {
        abort_if(Gate::denies('forum_thread_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $forumThread->load('user', 'category', 'threadForumComments');

        return view('frontend.forumThreads.show', compact('forumThread'));
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
