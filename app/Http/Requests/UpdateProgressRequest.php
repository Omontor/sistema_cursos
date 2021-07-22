<?php

namespace App\Http\Requests;

use App\Models\Progress;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateProgressRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('progress_edit');
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
            'date' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'is_finished' => [
                'required',
            ],
        ];
    }
}
