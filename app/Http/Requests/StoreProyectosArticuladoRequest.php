<?php

namespace App\Http\Requests;

use App\Models\ProyectosArticulado;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreProyectosArticuladoRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('proyectos_articulado_create');
    }

    public function rules()
    {
        return [
            'nombre_del_estudiante' => [
                'string',
                'required',
            ],
            'curso' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'tema_del_proyecto' => [
                'string',
                'required',
            ],
        ];
    }
}
