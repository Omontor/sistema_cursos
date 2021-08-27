@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.forumThread.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.forum-threads.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.forumThread.fields.id') }}
                        </th>
                        <td>
                            {{ $forumThread->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.forumThread.fields.user') }}
                        </th>
                        <td>
                            {{ $forumThread->user->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.forumThread.fields.title') }}
                        </th>
                        <td>
                            {{ $forumThread->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.forumThread.fields.content') }}
                        </th>
                        <td>
                            {!! $forumThread->content !!}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.forum-threads.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        {{ trans('global.relatedData') }}
    </div>
    <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
        <li class="nav-item">
            <a class="nav-link" href="#thread_forum_comments" role="tab" data-toggle="tab">
                {{ trans('cruds.forumComment.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="thread_forum_comments">
            @includeIf('admin.forumThreads.relationships.threadForumComments', ['forumComments' => $forumThread->threadForumComments])
        </div>
    </div>
</div>

@endsection