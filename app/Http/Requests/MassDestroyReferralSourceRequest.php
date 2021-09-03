<?php

namespace App\Http\Requests;

use App\Models\ReferralSource;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyReferralSourceRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('referral_source_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:referral_sources,id',
        ];
    }
}
