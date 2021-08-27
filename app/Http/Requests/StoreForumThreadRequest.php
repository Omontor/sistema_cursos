<?php

namespace App\Http\Requests;

use App\Models\ForumThread;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreForumThreadRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('forum_thread_create');
    }

    public function rules()
    {
        return [
            'user_id' => [
                'required',
                'integer',
            ],
            'title' => [
                'string',
                'required',
            ],
            'content' => [
                'required',
            ],
        ];
    }
}
