<?php

namespace App\Http\Requests;

use App\Models\ComplaintType;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateComplaintTypeRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('complaint_type_edit');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
                'unique:complaint_types,name,' . request()->route('complaint_type')->id,
            ],
        ];
    }
}
