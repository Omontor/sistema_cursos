<?php

namespace App\Http\Requests;

use App\Models\Zoom;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateZoomRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('zoom_edit');
    }

    public function rules()
    {
        return [
            'api' => [
                'string',
                'required',
                'unique:zooms,api,' . request()->route('zoom')->id,
            ],
        ];
    }
}
