@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.transaction.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.transactions.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.transaction.fields.id') }}
                        </th>
                        <td>
                            {{ $transaction->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.transaction.fields.value') }}
                        </th>
                        <td>
                            {{ $transaction->value }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.transaction.fields.course_purchased') }}
                        </th>
                        <td>
                            @foreach($transaction->course_purchaseds as $key => $course_purchased)
                                <span class="label label-info">{{ $course_purchased->title }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.transaction.fields.user') }}
                        </th>
                        <td>
                            {{ $transaction->user->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.transaction.fields.coupon_use') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $transaction->coupon_use ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.transaction.fields.payment_type') }}
                        </th>
                        <td>
                            {{ $transaction->payment_type->title ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.transaction.fields.transaction_type') }}
                        </th>
                        <td>
                            {{ App\Models\Transaction::TRANSACTION_TYPE_SELECT[$transaction->transaction_type] ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.transactions.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection