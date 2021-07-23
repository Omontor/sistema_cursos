<?php

namespace App\Http\Requests;

use App\Models\IndexAbout;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreIndexAboutRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('index_about_create');
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
