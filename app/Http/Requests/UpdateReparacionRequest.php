<?php

namespace App\Http\Requests;

use App\Models\Reparacion;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateReparacionRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('reparacion_edit');
    }

    public function rules()
    {
        return [
            'activo_id' => [
                'required',
                'integer',
            ],
            'fecha' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
        ];
    }
}
