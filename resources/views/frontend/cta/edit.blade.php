@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.edit') }} {{ trans('cruds.ctum.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.cta.update", [$ctum->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label for="tagline">{{ trans('cruds.ctum.fields.tagline') }}</label>
                            <input class="form-control" type="text" name="tagline" id="tagline" value="{{ old('tagline', $ctum->tagline) }}">
                            @if($errors->has('tagline'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('tagline') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.ctum.fields.tagline_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="title">{{ trans('cruds.ctum.fields.title') }}</label>
                            <input class="form-control" type="text" name="title" id="title" value="{{ old('title', $ctum->title) }}">
                            @if($errors->has('title'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('title') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.ctum.fields.title_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="content">{{ trans('cruds.ctum.fields.content') }}</label>
                            <textarea class="form-control" name="content" id="content">{{ old('content', $ctum->content) }}</textarea>
                            @if($errors->has('content'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('content') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.ctum.fields.content_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="btn_text">{{ trans('cruds.ctum.fields.btn_text') }}</label>
                            <input class="form-control" type="text" name="btn_text" id="btn_text" value="{{ old('btn_text', $ctum->btn_text) }}">
                            @if($errors->has('btn_text'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('btn_text') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.ctum.fields.btn_text_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="btn_link">{{ trans('cruds.ctum.fields.btn_link') }}</label>
                            <input class="form-control" type="text" name="btn_link" id="btn_link" value="{{ old('btn_link', $ctum->btn_link) }}">
                            @if($errors->has('btn_link'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('btn_link') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.ctum.fields.btn_link_helper') }}</span>
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