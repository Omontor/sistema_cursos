<?php

namespace App\Http\Requests;

use App\Models\LessonAnswer;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateLessonAnswerRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('lesson_answer_edit');
    }

    public function rules()
    {
        return [
            'question_id' => [
                'required',
                'integer',
            ],
            'user_id' => [
                'required',
                'integer',
            ],
            'content' => [
                'required',
            ],
        ];
    }
}
