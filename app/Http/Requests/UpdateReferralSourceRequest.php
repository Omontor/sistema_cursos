<?php

namespace App\Http\Requests;

use App\Models\ReferralSource;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateReferralSourceRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('referral_source_edit');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
                'unique:referral_sources,name,' . request()->route('referral_source')->id,
            ],
        ];
    }
}
