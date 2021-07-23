@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.edit') }} {{ trans('cruds.company.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.companies.update", [$company->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label class="required" for="name">{{ trans('cruds.company.fields.name') }}</label>
                            <input class="form-control" type="text" name="name" id="name" value="{{ old('name', $company->name) }}" required>
                            @if($errors->has('name'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('name') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.company.fields.name_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="email">{{ trans('cruds.company.fields.email') }}</label>
                            <input class="form-control" type="email" name="email" id="email" value="{{ old('email', $company->email) }}" required>
                            @if($errors->has('email'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('email') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.company.fields.email_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="phone">{{ trans('cruds.company.fields.phone') }}</label>
                            <input class="form-control" type="text" name="phone" id="phone" value="{{ old('phone', $company->phone) }}">
                            @if($errors->has('phone'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('phone') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.company.fields.phone_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="address">{{ trans('cruds.company.fields.address') }}</label>
                            <input class="form-control" type="text" name="address" id="address" value="{{ old('address', $company->address) }}">
                            @if($errors->has('address'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('address') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.company.fields.address_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="lat">{{ trans('cruds.company.fields.lat') }}</label>
                            <input class="form-control" type="text" name="lat" id="lat" value="{{ old('lat', $company->lat) }}">
                            @if($errors->has('lat'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('lat') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.company.fields.lat_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="lng">{{ trans('cruds.company.fields.lng') }}</label>
                            <input class="form-control" type="text" name="lng" id="lng" value="{{ old('lng', $company->lng) }}">
                            @if($errors->has('lng'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('lng') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.company.fields.lng_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="clabe">{{ trans('cruds.company.fields.clabe') }}</label>
                            <input class="form-control" type="text" name="clabe" id="clabe" value="{{ old('clabe', $company->clabe) }}">
                            @if($errors->has('clabe'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('clabe') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.company.fields.clabe_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="account_name">{{ trans('cruds.company.fields.account_name') }}</label>
                            <input class="form-control" type="text" name="account_name" id="account_name" value="{{ old('account_name', $company->account_name) }}">
                            @if($errors->has('account_name'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('account_name') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.company.fields.account_name_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="bank">{{ trans('cruds.company.fields.bank') }}</label>
                            <input class="form-control" type="text" name="bank" id="bank" value="{{ old('bank', $company->bank) }}">
                            @if($errors->has('bank'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('bank') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.company.fields.bank_helper') }}</span>
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