<?php

namespace App\Http\Requests;

use App\Models\Maintenance;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreMaintenanceRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('maintenance_create');
    }

    public function rules()
    {
        return [
            'area_id' => [
                'required',
                'integer',
            ],
            'tipo' => [
                'required',
            ],
            'quien_lo_realiza_id' => [
                'required',
                'integer',
            ],
            'fecha' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'descripcion' => [
                'string',
                'nullable',
            ],
        ];
    }
}
