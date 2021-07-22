<?php

namespace App\Http\Requests;

use App\Models\OnlineClass;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreOnlineClassRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('online_class_create');
    }

    public function rules()
    {
        return [
            'course_id' => [
                'required',
                'integer',
            ],
            'id_reunion' => [
                'string',
                'nullable',
            ],
            'title' => [
                'string',
                'required',
            ],
            'excerpt' => [
                'required',
            ],
            'content' => [
                'required',
            ],
            'duration' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'password' => [
                'string',
                'required',
            ],
            'max_student' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'start' => [
                'required',
                'date_format:' . config('panel.date_format') . ' ' . config('panel.time_format'),
            ],
        ];
    }
}
