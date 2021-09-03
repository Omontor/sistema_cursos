<?php

namespace App\Http\Requests;

use App\Models\ReferralSource;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreReferralSourceRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('referral_source_create');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
                'unique:referral_sources',
            ],
        ];
    }
}
