<?php

namespace App\Http\Requests;

use App\Models\ForumComplaint;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreForumComplaintRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('forum_complaint_create');
    }

    public function rules()
    {
        return [
            'user_id' => [
                'required',
                'integer',
            ],
            'type_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
