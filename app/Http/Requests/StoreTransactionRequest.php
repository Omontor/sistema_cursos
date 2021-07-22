<?php

namespace App\Http\Requests;

use App\Models\Transaction;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreTransactionRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('transaction_create');
    }

    public function rules()
    {
        return [
            'value' => [
                'string',
                'required',
            ],
            'course_purchaseds.*' => [
                'integer',
            ],
            'course_purchaseds' => [
                'required',
                'array',
            ],
            'user_id' => [
                'required',
                'integer',
            ],
            'payment_type_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
