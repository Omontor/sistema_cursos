<?php

namespace App\Http\Requests;

use App\Models\ForumLike;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyForumLikeRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('forum_like_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:forum_likes,id',
        ];
    }
}
