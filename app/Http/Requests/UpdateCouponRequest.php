<?php

namespace App\Http\Requests;

use App\Models\Coupon;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateCouponRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('coupon_edit');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
            ],
            'amount' => [
                'string',
                'required',
            ],
            'description' => [
                'string',
                'required',
            ],
            'code' => [
                'string',
                'required',
            ],
            'type' => [
                'required',
            ],
        ];
    }
}
