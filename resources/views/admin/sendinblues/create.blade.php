@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.sendinblue.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.sendinblues.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="host">{{ trans('cruds.sendinblue.fields.host') }}</label>
                <input class="form-control {{ $errors->has('host') ? 'is-invalid' : '' }}" type="text" name="host" id="host" value="{{ old('host', '') }}" required>
                @if($errors->has('host'))
                    <span class="text-danger">{{ $errors->first('host') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.sendinblue.fields.host_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="user">{{ trans('cruds.sendinblue.fields.user') }}</label>
                <input class="form-control {{ $errors->has('user') ? 'is-invalid' : '' }}" type="text" name="user" id="user" value="{{ old('user', '') }}" required>
                @if($errors->has('user'))
                    <span class="text-danger">{{ $errors->first('user') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.sendinblue.fields.user_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="api">{{ trans('cruds.sendinblue.fields.api') }}</label>
                <input class="form-control {{ $errors->has('api') ? 'is-invalid' : '' }}" type="text" name="api" id="api" value="{{ old('api', '') }}">
                @if($errors->has('api'))
                    <span class="text-danger">{{ $errors->first('api') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.sendinblue.fields.api_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="password">{{ trans('cruds.sendinblue.fields.password') }}</label>
                <input class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" type="text" name="password" id="password" value="{{ old('password', '') }}" required>
                @if($errors->has('password'))
                    <span class="text-danger">{{ $errors->first('password') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.sendinblue.fields.password_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="security">{{ trans('cruds.sendinblue.fields.security') }}</label>
                <input class="form-control {{ $errors->has('security') ? 'is-invalid' : '' }}" type="text" name="security" id="security" value="{{ old('security', '') }}" required>
                @if($errors->has('security'))
                    <span class="text-danger">{{ $errors->first('security') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.sendinblue.fields.security_helper') }}</span>
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