@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.edit') }} {{ trans('cruds.coupon.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.coupons.update", [$coupon->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label class="required" for="name">{{ trans('cruds.coupon.fields.name') }}</label>
                            <input class="form-control" type="text" name="name" id="name" value="{{ old('name', $coupon->name) }}" required>
                            @if($errors->has('name'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('name') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.coupon.fields.name_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="amount">{{ trans('cruds.coupon.fields.amount') }}</label>
                            <input class="form-control" type="text" name="amount" id="amount" value="{{ old('amount', $coupon->amount) }}" required>
                            @if($errors->has('amount'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('amount') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.coupon.fields.amount_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="description">{{ trans('cruds.coupon.fields.description') }}</label>
                            <input class="form-control" type="text" name="description" id="description" value="{{ old('description', $coupon->description) }}" required>
                            @if($errors->has('description'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('description') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.coupon.fields.description_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="code">{{ trans('cruds.coupon.fields.code') }}</label>
                            <input class="form-control" type="text" name="code" id="code" value="{{ old('code', $coupon->code) }}" required>
                            @if($errors->has('code'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('code') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.coupon.fields.code_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required">{{ trans('cruds.coupon.fields.type') }}</label>
                            <select class="form-control" name="type" id="type" required>
                                <option value disabled {{ old('type', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                @foreach(App\Models\Coupon::TYPE_SELECT as $key => $label)
                                    <option value="{{ $key }}" {{ old('type', $coupon->type) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('type'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('type') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.coupon.fields.type_helper') }}</span>
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