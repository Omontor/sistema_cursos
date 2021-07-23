<?php

namespace App\Http\Requests;

use App\Models\IndexTestimonial;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateIndexTestimonialRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('index_testimonial_edit');
    }

    public function rules()
    {
        return [
            'user_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
