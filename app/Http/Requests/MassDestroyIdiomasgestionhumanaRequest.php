<?php

namespace App\Http\Requests;

use App\Models\Idiomasgestionhumana;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyIdiomasgestionhumanaRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('idiomasgestionhumana_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:idiomasgestionhumanas,id',
        ];
    }
}
