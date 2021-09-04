<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyForumLikeRequest;
use App\Http\Requests\StoreForumLikeRequest;
use App\Http\Requests\UpdateForumLikeRequest;
use App\Models\ForumLike;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ForumLikeController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('forum_like_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $forumLikes = ForumLike::with(['user'])->get();

        return view('admin.forumLikes.index', compact('forumLikes'));
    }

    public function create()
    {
        abort_if(Gate::denies('forum_like_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.forumLikes.create', compact('users'));
    }

    public function store(StoreForumLikeRequest $request)
    {
        $forumLike = ForumLike::create($request->all());

        return redirect()->route('admin.forum-likes.index');
    }

    public function edit(ForumLike $forumLike)
    {
        abort_if(Gate::denies('forum_like_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $forumLike->load('user');

        return view('admin.forumLikes.edit', compact('users', 'forumLike'));
    }

    public function update(UpdateForumLikeRequest $request, ForumLike $forumLike)
    {
        $forumLike->update($request->all());

        return redirect()->route('admin.forum-likes.index');
    }

    public function show(ForumLike $forumLike)
    {
        abort_if(Gate::denies('forum_like_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $forumLike->load('user');

        return view('admin.forumLikes.show', compact('forumLike'));
    }

    public function destroy(ForumLike $forumLike)
    {
        abort_if(Gate::denies('forum_like_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $forumLike->delete();

        return back();
    }

    public function massDestroy(MassDestroyForumLikeRequest $request)
    {
        ForumLike::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
