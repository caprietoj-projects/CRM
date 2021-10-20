<?php

namespace App\Http\Requests;

use App\Models\DocumentosCandidato;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreDocumentosCandidatoRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('documentos_candidato_create');
    }

    public function rules()
    {
        return [
            'no_de_cedula' => [
                'string',
                'required',
            ],
            'fotocopia_de_la_cedula' => [
                'array',
            ],
            'acta_de_grado' => [
                'array',
            ],
        ];
    }
}
