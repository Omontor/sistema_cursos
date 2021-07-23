<?php

namespace App\Http\Requests;

use App\Models\FeaturedCourse;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreFeaturedCourseRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('featured_course_create');
    }

    public function rules()
    {
        return [
            'courses.*' => [
                'integer',
            ],
            'courses' => [
                'array',
            ],
        ];
    }
}
