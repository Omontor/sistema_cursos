<?php

namespace App\Http\Requests;

use App\Models\LessonQuestion;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateLessonQuestionRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('lesson_question_edit');
    }

    public function rules()
    {
        return [
            'user_id' => [
                'required',
                'integer',
            ],
            'lesson_id' => [
                'required',
                'integer',
            ],
            'content' => [
                'required',
            ],
        ];
    }
}
