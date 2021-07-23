<?php

namespace App\Http\Requests;

use App\Models\IndexReason;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateIndexReasonRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('index_reason_edit');
    }

    public function rules()
    {
        return [
            'title' => [
                'string',
                'required',
            ],
            'content' => [
                'string',
                'required',
            ],
            'icon' => [
                'string',
                'required',
            ],
            'link' => [
                'string',
                'nullable',
            ],
        ];
    }
}
