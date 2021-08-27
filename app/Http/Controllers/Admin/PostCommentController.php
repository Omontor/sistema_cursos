<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyPostCommentRequest;
use App\Http\Requests\StorePostCommentRequest;
use App\Http\Requests\UpdatePostCommentRequest;
use App\Models\PostComment;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PostCommentController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('post_comment_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $postComments = PostComment::with(['user'])->get();

        $users = User::get();

        return view('admin.postComments.index', compact('postComments', 'users'));
    }

    public function create()
    {
        abort_if(Gate::denies('post_comment_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.postComments.create', compact('users'));
    }

    public function store(StorePostCommentRequest $request)
    {
        $postComment = PostComment::create($request->all());

        return redirect()->route('admin.post-comments.index');
    }

    public function edit(PostComment $postComment)
    {
        abort_if(Gate::denies('post_comment_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $postComment->load('user');

        return view('admin.postComments.edit', compact('users', 'postComment'));
    }

    public function update(UpdatePostCommentRequest $request, PostComment $postComment)
    {
        $postComment->update($request->all());

        return redirect()->route('admin.post-comments.index');
    }

    public function show(PostComment $postComment)
    {
        abort_if(Gate::denies('post_comment_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $postComment->load('user');

        return view('admin.postComments.show', compact('postComment'));
    }

    public function destroy(PostComment $postComment)
    {
        abort_if(Gate::denies('post_comment_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $postComment->delete();

        return back();
    }

    public function massDestroy(MassDestroyPostCommentRequest $request)
    {
        PostComment::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
