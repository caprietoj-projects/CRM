<?php

namespace App\Http\Requests;

use App\Models\DocumentosCandidato;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyDocumentosCandidatoRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('documentos_candidato_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:documentos_candidatos,id',
        ];
    }
}
