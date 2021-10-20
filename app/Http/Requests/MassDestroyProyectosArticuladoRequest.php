<?php

namespace App\Http\Requests;

use App\Models\ProyectosArticulado;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyProyectosArticuladoRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('proyectos_articulado_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:proyectos_articulados,id',
        ];
    }
}
