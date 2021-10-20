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
                'required',
            ],
            'descripcion' => [
                'required',
            ],
            'requisitos' => [
                'required',
            ],
            'tiempo' => [
                'string',
                'required',
            ],
            'salario' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'empresa' => [
                'string',
                'required',
            ],
        ];
    }
}
