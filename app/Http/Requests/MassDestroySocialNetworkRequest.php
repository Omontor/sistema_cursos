<?php

namespace App\Http\Requests;

use App\Models\SocialNetwork;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroySocialNetworkRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('social_network_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:social_networks,id',
        ];
    }
}
