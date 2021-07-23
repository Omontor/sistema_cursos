<?php

namespace App\Http\Requests;

use App\Models\Ctum;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateCtumRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('ctum_edit');
    }

    public function rules()
    {
        return [
            'tagline' => [
                'string',
                'nullable',
            ],
            'title' => [
                'string',
                'nullable',
            ],
            'btn_text' => [
                'string',
                'nullable',
            ],
            'btn_link' => [
                'string',
                'nullable',
            ],
        ];
    }
}
