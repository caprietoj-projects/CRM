<?php

namespace App\Http\Requests;

use App\Models\FichaTecnica;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateFichaTecnicaRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('ficha_tecnica_edit');
    }

    public function rules()
    {
        return [
            'descripcion' => [
                'required',
            ],
            'grupo_id' => [
                'required',
                'integer',
            ],
            'modelo' => [
                'string',
                'nullable',
            ],
            'serial' => [
                'string',
                'required',
            ],
            'color' => [
                'string',
                'required',
            ],
            'tipo' => [
                'string',
                'required',
            ],
            'ubicacion_id' => [
                'required',
                'integer',
            ],
            'encargado_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
