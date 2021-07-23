<?php

namespace App\Http\Requests;

use App\Models\IndexAbout;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateIndexAboutRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('index_about_edit');
    }

    public function rules()
    {
        return [
            'title' => [
                'string',
                'required',
            ],
            'video_url' => [
                'string',
                'nullable',
            ],
        ];
    }
}
