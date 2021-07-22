<?php

namespace App\Http\Requests;

use App\Models\Reservation;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreReservationRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('reservation_create');
    }

    public function rules()
    {
        return [
            'user_id' => [
                'required',
                'integer',
            ],
            'course_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
