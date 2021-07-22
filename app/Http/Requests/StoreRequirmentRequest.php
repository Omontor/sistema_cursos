<?php

namespace App\Http\Requests;

use App\Models\Requirment;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreRequirmentRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('requirment_create');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
                'unique:requirments',
            ],
        ];
    }
}
