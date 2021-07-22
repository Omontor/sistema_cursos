@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.edit') }} {{ trans('cruds.transaction.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.transactions.update", [$transaction->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label class="required" for="value">{{ trans('cruds.transaction.fields.value') }}</label>
                            <input class="form-control" type="text" name="value" id="value" value="{{ old('value', $transaction->value) }}" required>
                            @if($errors->has('value'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('value') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.transaction.fields.value_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="course_purchaseds">{{ trans('cruds.transaction.fields.course_purchased') }}</label>
                            <div style="padding-bottom: 4px">
                                <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                                <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                            </div>
                            <select class="form-control select2" name="course_purchaseds[]" id="course_purchaseds" multiple required>
                                @foreach($course_purchaseds as $id => $course_purchased)
                                    <option value="{{ $id }}" {{ (in_array($id, old('course_purchaseds', [])) || $transaction->course_purchaseds->contains($id)) ? 'selected' : '' }}>{{ $course_purchased }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('course_purchaseds'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('course_purchaseds') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.transaction.fields.course_purchased_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="user_id">{{ trans('cruds.transaction.fields.user') }}</label>
                            <select class="form-control select2" name="user_id" id="user_id" required>
                                @foreach($users as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('user_id') ? old('user_id') : $transaction->user->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('user'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('user') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.transaction.fields.user_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <div>
                                <input type="hidden" name="coupon_use" value="0">
                                <input type="checkbox" name="coupon_use" id="coupon_use" value="1" {{ $transaction->coupon_use || old('coupon_use', 0) === 1 ? 'checked' : '' }}>
                                <label for="coupon_use">{{ trans('cruds.transaction.fields.coupon_use') }}</label>
                            </div>
                            @if($errors->has('coupon_use'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('coupon_use') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.transaction.fields.coupon_use_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="payment_type_id">{{ trans('cruds.transaction.fields.payment_type') }}</label>
                            <select class="form-control select2" name="payment_type_id" id="payment_type_id" required>
                                @foreach($payment_types as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('payment_type_id') ? old('payment_type_id') : $transaction->payment_type->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('payment_type'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('payment_type') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.transaction.fields.payment_type_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label>{{ trans('cruds.transaction.fields.transaction_type') }}</label>
                            <select class="form-control" name="transaction_type" id="transaction_type">
                                <option value disabled {{ old('transaction_type', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                @foreach(App\Models\Transaction::TRANSACTION_TYPE_SELECT as $key => $label)
                                    <option value="{{ $key }}" {{ old('transaction_type', $transaction->transaction_type) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('transaction_type'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('transaction_type') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.transaction.fields.transaction_type_helper') }}</span>
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