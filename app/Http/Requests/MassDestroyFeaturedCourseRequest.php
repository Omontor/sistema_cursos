<?php

namespace App\Http\Requests;

use App\Models\FeaturedCourse;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyFeaturedCourseRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('featured_course_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:featured_courses,id',
        ];
    }
}
