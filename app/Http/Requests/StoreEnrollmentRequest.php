<?php

namespace App\Http\Requests;

use App\Models\Enrollment;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreEnrollmentRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('enrollment_create');
    }

    public function rules()
    {
        return [
            'user_id' => [
                'required',
                'integer',
            ],
            'enrollment_date' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'course_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
