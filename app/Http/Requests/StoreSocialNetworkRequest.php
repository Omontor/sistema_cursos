<?php

namespace App\Http\Requests;

use App\Models\SocialNetwork;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreSocialNetworkRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('social_network_create');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'nullable',
            ],
            'url' => [
                'string',
                'nullable',
            ],
            'icon' => [
                'string',
                'nullable',
            ],
        ];
    }
}
