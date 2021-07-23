@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.edit') }} {{ trans('cruds.indexReason.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.index-reasons.update", [$indexReason->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label class="required" for="title">{{ trans('cruds.indexReason.fields.title') }}</label>
                            <input class="form-control" type="text" name="title" id="title" value="{{ old('title', $indexReason->title) }}" required>
                            @if($errors->has('title'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('title') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.indexReason.fields.title_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="content">{{ trans('cruds.indexReason.fields.content') }}</label>
                            <input class="form-control" type="text" name="content" id="content" value="{{ old('content', $indexReason->content) }}" required>
                            @if($errors->has('content'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('content') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.indexReason.fields.content_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="icon">{{ trans('cruds.indexReason.fields.icon') }}</label>
                            <input class="form-control" type="text" name="icon" id="icon" value="{{ old('icon', $indexReason->icon) }}" required>
                            @if($errors->has('icon'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('icon') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.indexReason.fields.icon_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="link">{{ trans('cruds.indexReason.fields.link') }}</label>
                            <input class="form-control" type="text" name="link" id="link" value="{{ old('link', $indexReason->link) }}">
                            @if($errors->has('link'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('link') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.indexReason.fields.link_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-danger" type="submit">
                                {{ trans('global.save') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection