<?php

namespace App\Http\Requests;

use App\Models\Bullet;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateBulletRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('bullet_edit');
    }

    public function rules()
    {
        return [
            'title' => [
                'string',
                'required',
            ],
            'content' => [
                'string',
                'required',
            ],
            'icon' => [
                'string',
                'required',
            ],
            'link' => [
                'string',
                'nullable',
            ],
        ];
    }
}
