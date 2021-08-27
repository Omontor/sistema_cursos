<?php

namespace App\Http\Requests;

use App\Models\ForumComment;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreForumCommentRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('forum_comment_create');
    }

    public function rules()
    {
        return [
            'thread_id' => [
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
