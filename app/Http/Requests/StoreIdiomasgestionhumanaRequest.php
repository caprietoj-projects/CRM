<?php

namespace App\Http\Requests;

use App\Models\Idiomasgestionhumana;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreIdiomasgestionhumanaRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('idiomasgestionhumana_create');
    }

    public function rules()
    {
        return [
            'nuevo' => [
                'string',
                'required',
            ],
        ];
    }
}
