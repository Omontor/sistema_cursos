@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.edit') }} {{ trans('cruds.socialNetwork.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.social-networks.update", [$socialNetwork->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label for="name">{{ trans('cruds.socialNetwork.fields.name') }}</label>
                            <input class="form-control" type="text" name="name" id="name" value="{{ old('name', $socialNetwork->name) }}">
                            @if($errors->has('name'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('name') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.socialNetwork.fields.name_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="url">{{ trans('cruds.socialNetwork.fields.url') }}</label>
                            <input class="form-control" type="text" name="url" id="url" value="{{ old('url', $socialNetwork->url) }}">
                            @if($errors->has('url'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('url') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.socialNetwork.fields.url_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="icon">{{ trans('cruds.socialNetwork.fields.icon') }}</label>
                            <input class="form-control" type="text" name="icon" id="icon" value="{{ old('icon', $socialNetwork->icon) }}">
                            @if($errors->has('icon'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('icon') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.socialNetwork.fields.icon_helper') }}</span>
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