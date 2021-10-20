<?php

namespace App\Http\Requests;

use App\Models\FichasTecnica;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreFichasTecnicaRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('fichas_tecnica_create');
    }

    public function rules()
    {
        return [
            'encargado' => [
                'string',
                'required',
            ],
            'nombre_del_equipo' => [
                'string',
                'required',
            ],
            'modelo' => [
                'string',
                'nullable',
            ],
            'serial' => [
                'string',
                'nullable',
            ],
            'sede_id' => [
                'required',
                'integer',
            ],
            'estado_del_activo' => [
                'required',
            ],
        ];
    }
}
