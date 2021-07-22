@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.transaction.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.transactions.update", [$transaction->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="value">{{ trans('cruds.transaction.fields.value') }}</label>
                <input class="form-control {{ $errors->has('value') ? 'is-invalid' : '' }}" type="text" name="value" id="value" value="{{ old('value', $transaction->value) }}" required>
                @if($errors->has('value'))
                    <span class="text-danger">{{ $errors->first('value') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.transaction.fields.value_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="course_purchaseds">{{ trans('cruds.transaction.fields.course_purchased') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('course_purchaseds') ? 'is-invalid' : '' }}" name="course_purchaseds[]" id="course_purchaseds" multiple required>
                    @foreach($course_purchaseds as $id => $course_purchased)
                        <option value="{{ $id }}" {{ (in_array($id, old('course_purchaseds', [])) || $transaction->course_purchaseds->contains($id)) ? 'selected' : '' }}>{{ $course_purchased }}</option>
                    @endforeach
                </select>
                @if($errors->has('course_purchaseds'))
                    <span class="text-danger">{{ $errors->first('course_purchaseds') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.transaction.fields.course_purchased_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="user_id">{{ trans('cruds.transaction.fields.user') }}</label>
                <select class="form-control select2 {{ $errors->has('user') ? 'is-invalid' : '' }}" name="user_id" id="user_id" required>
                    @foreach($users as $id => $entry)
                        <option value="{{ $id }}" {{ (old('user_id') ? old('user_id') : $transaction->user->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('user'))
                    <span class="text-danger">{{ $errors->first('user') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.transaction.fields.user_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('coupon_use') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="coupon_use" value="0">
                    <input class="form-check-input" type="checkbox" name="coupon_use" id="coupon_use" value="1" {{ $transaction->coupon_use || old('coupon_use', 0) === 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="coupon_use">{{ trans('cruds.transaction.fields.coupon_use') }}</label>
                </div>
                @if($errors->has('coupon_use'))
                    <span class="text-danger">{{ $errors->first('coupon_use') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.transaction.fields.coupon_use_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="payment_type_id">{{ trans('cruds.transaction.fields.payment_type') }}</label>
                <select class="form-control select2 {{ $errors->has('payment_type') ? 'is-invalid' : '' }}" name="payment_type_id" id="payment_type_id" required>
                    @foreach($payment_types as $id => $entry)
                        <option value="{{ $id }}" {{ (old('payment_type_id') ? old('payment_type_id') : $transaction->payment_type->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('payment_type'))
                    <span class="text-danger">{{ $errors->first('payment_type') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.transaction.fields.payment_type_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.transaction.fields.transaction_type') }}</label>
                <select class="form-control {{ $errors->has('transaction_type') ? 'is-invalid' : '' }}" name="transaction_type" id="transaction_type">
                    <option value disabled {{ old('transaction_type', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Transaction::TRANSACTION_TYPE_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('transaction_type', $transaction->transaction_type) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('transaction_type'))
                    <span class="text-danger">{{ $errors->first('transaction_type') }}</span>
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



@endsection