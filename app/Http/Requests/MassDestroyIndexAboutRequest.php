<?php

namespace App\Http\Requests;

use App\Models\IndexAbout;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyIndexAboutRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('index_about_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:index_abouts,id',
        ];
    }
}
