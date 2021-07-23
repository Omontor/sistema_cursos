<?php

namespace App\Http\Requests;

use App\Models\IndexReason;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreIndexReasonRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('index_reason_create');
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
