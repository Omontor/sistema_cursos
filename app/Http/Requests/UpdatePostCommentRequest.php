<?php

namespace App\Http\Requests;

use App\Models\PostComment;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdatePostCommentRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('post_comment_edit');
    }

    public function rules()
    {
        return [
            'user_id' => [
                'required',
                'integer',
            ],
            'comment' => [
                'required',
            ],
            'status' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
        ];
    }
}
