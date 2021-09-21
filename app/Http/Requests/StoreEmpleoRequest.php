<?php

namespace App\Http\Requests;

use App\Models\Empleo;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreEmpleoRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('empleo_create');
    }

    public function rules()
    {
        return [
            'vacante' => [
                'string',
                'nullable',
            ],
            'icono' => [
                'string',
                'nullable',
            ],
            'tiempo' => [
                'string',
                'nullable',
            ],
            'empresa' => [
                'string',
                'nullable',
            ],
        ];
    }
}
