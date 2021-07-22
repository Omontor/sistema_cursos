<?php

namespace App\Http\Requests;

use App\Models\LessonAnswer;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyLessonAnswerRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('lesson_answer_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:lesson_answers,id',
        ];
    }
}
