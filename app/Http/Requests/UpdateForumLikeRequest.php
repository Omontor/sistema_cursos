<?php

namespace App\Http\Requests;

use App\Models\ForumLike;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateForumLikeRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('forum_like_edit');
    }

    public function rules()
    {
        return [
            'user_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
