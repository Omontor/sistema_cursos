<?php

namespace App\Http\Requests;

use App\Models\Requirment;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyRequirmentRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('requirment_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:requirments,id',
        ];
    }
}
