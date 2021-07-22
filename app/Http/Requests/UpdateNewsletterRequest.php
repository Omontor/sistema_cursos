<?php

namespace App\Http\Requests;

use App\Models\Newsletter;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateNewsletterRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('newsletter_edit');
    }

    public function rules()
    {
        return [
            'api' => [
                'string',
                'required',
                'unique:newsletters,api,' . request()->route('newsletter')->id,
            ],
        ];
    }
}
