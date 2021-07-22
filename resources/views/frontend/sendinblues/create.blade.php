@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.create') }} {{ trans('cruds.sendinblue.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.sendinblues.store") }}" enctype="multipart/form-data">
                        @method('POST')
                        @csrf
                        <div class="form-group">
                            <label class="required" for="host">{{ trans('cruds.sendinblue.fields.host') }}</label>
                            <input class="form-control" type="text" name="host" id="host" value="{{ old('host', '') }}" required>
                            @if($errors->has('host'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('host') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.sendinblue.fields.host_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="user">{{ trans('cruds.sendinblue.fields.user') }}</label>
                            <input class="form-control" type="text" name="user" id="user" value="{{ old('user', '') }}" required>
                            @if($errors->has('user'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('user') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.sendinblue.fields.user_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="api">{{ trans('cruds.sendinblue.fields.api') }}</label>
                            <input class="form-control" type="text" name="api" id="api" value="{{ old('api', '') }}">
                            @if($errors->has('api'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('api') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.sendinblue.fields.api_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="password">{{ trans('cruds.sendinblue.fields.password') }}</label>
                            <input class="form-control" type="text" name="password" id="password" value="{{ old('password', '') }}" required>
                            @if($errors->has('password'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('password') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.sendinblue.fields.password_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="security">{{ trans('cruds.sendinblue.fields.security') }}</label>
                            <input class="form-control" type="text" name="security" id="security" value="{{ old('security', '') }}" required>
                            @if($errors->has('security'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('security') }}
                                </div>
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

        </div>
    </div>
</div>
@endsection