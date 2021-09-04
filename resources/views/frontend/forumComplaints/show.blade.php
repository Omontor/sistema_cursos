@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.show') }} {{ trans('cruds.forumComplaint.title') }}
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.forum-complaints.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.forumComplaint.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $forumComplaint->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.forumComplaint.fields.user') }}
                                    </th>
                                    <td>
                                        {{ $forumComplaint->user->name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.forumComplaint.fields.content') }}
                                    </th>
                                    <td>
                                        {{ $forumComplaint->content }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.forumComplaint.fields.type') }}
                                    </th>
                                    <td>
                                        {{ $forumComplaint->type->name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.forumComplaint.fields.images') }}
                                    </th>
                                    <td>
                                        @foreach($forumComplaint->images as $key => $media)
                                            <a href="{{ $media->getUrl() }}" target="_blank" style="display: inline-block">
                                                <img src="{{ $media->getUrl('thumb') }}">
                                            </a>
                                        @endforeach
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.forum-complaints.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection