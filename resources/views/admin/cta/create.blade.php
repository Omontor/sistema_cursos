@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.ctum.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.cta.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="tagline">{{ trans('cruds.ctum.fields.tagline') }}</label>
                <input class="form-control {{ $errors->has('tagline') ? 'is-invalid' : '' }}" type="text" name="tagline" id="tagline" value="{{ old('tagline', '') }}">
                @if($errors->has('tagline'))
                    <span class="text-danger">{{ $errors->first('tagline') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.ctum.fields.tagline_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="title">{{ trans('cruds.ctum.fields.title') }}</label>
                <input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" type="text" name="title" id="title" value="{{ old('title', '') }}">
                @if($errors->has('title'))
                    <span class="text-danger">{{ $errors->first('title') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.ctum.fields.title_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="content">{{ trans('cruds.ctum.fields.content') }}</label>
                <textarea class="form-control {{ $errors->has('content') ? 'is-invalid' : '' }}" name="content" id="content">{{ old('content') }}</textarea>
                @if($errors->has('content'))
                    <span class="text-danger">{{ $errors->first('content') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.ctum.fields.content_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="btn_text">{{ trans('cruds.ctum.fields.btn_text') }}</label>
                <input class="form-control {{ $errors->has('btn_text') ? 'is-invalid' : '' }}" type="text" name="btn_text" id="btn_text" value="{{ old('btn_text', '') }}">
                @if($errors->has('btn_text'))
                    <span class="text-danger">{{ $errors->first('btn_text') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.ctum.fields.btn_text_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="btn_link">{{ trans('cruds.ctum.fields.btn_link') }}</label>
                <input class="form-control {{ $errors->has('btn_link') ? 'is-invalid' : '' }}" type="text" name="btn_link" id="btn_link" value="{{ old('btn_link', '') }}">
                @if($errors->has('btn_link'))
                    <span class="text-danger">{{ $errors->first('btn_link') }}</span>
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



@endsection