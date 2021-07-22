<?php

namespace App\Http\Requests;

use App\Models\Sendinblue;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateSendinblueRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('sendinblue_edit');
    }

    public function rules()
    {
        return [
            'host' => [
                'string',
                'required',
            ],
            'user' => [
                'string',
                'required',
            ],
            'api' => [
                'string',
                'nullable',
            ],
            'password' => [
                'string',
                'required',
            ],
            'security' => [
                'string',
                'required',
            ],
        ];
    }
}
