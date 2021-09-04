<?php

namespace App\Http\Requests;

use App\Models\ComplaintType;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyComplaintTypeRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('complaint_type_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:complaint_types,id',
        ];
    }
}
