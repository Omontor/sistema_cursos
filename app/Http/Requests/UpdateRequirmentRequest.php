<?php

namespace App\Http\Requests;

use App\Models\Requirment;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateRequirmentRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('requirment_edit');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
                'unique:requirments,name,' . request()->route('requirment')->id,
            ],
        ];
    }
}
