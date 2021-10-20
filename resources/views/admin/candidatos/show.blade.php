@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.candidato.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.candidatos.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.candidato.fields.primer_apellido') }}
                        </th>
                        <td>
                            {{ $candidato->primer_apellido }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.candidato.fields.segundo_apellido') }}
                        </th>
                        <td>
                            {{ $candidato->segundo_apellido }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.candidato.fields.nombres') }}
                        </th>
                        <td>
                            {{ $candidato->nombres }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.candidato.fields.documento_de_identidad') }}
                        </th>
                        <td>
                            {{ App\Models\Candidato::DOCUMENTO_DE_IDENTIDAD_RADIO[$candidato->documento_de_identidad] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.candidato.fields.no_de_identificacion') }}
                        </th>
                        <td>
                            {{ $candidato->no_de_identificacion }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.candidato.fields.fecha_de_expedicion_del_documento') }}
                        </th>
                        <td>
                            {{ $candidato->fecha_de_expedicion_del_documento }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.candidato.fields.fecha_de_nacimiento') }}
                        </th>
                        <td>
                            {{ $candidato->fecha_de_nacimiento }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.candidato.fields.departamento') }}
                        </th>
                        <td>
                            {{ $candidato->departamento }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.candidato.fields.ciudad') }}
                        </th>
                        <td>
                            {{ $candidato->ciudad }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.candidato.fields.direccion') }}
                        </th>
                        <td>
                            {{ $candidato->direccion }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.candidato.fields.departamento_de_nacimiento') }}
                        </th>
                        <td>
                            {{ $candidato->departamento_de_nacimiento }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.candidato.fields.ciudad_de_nacimiento') }}
                        </th>
                        <td>
                            {{ $candidato->ciudad_de_nacimiento }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.candidato.fields.telefono_personal') }}
                        </th>
                        <td>
                            {{ $candidato->telefono_personal }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.candidato.fields.celular_personal') }}
                        </th>
                        <td>
                            {{ $candidato->celular_personal }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.candidato.fields.email_personal') }}
                        </th>
                        <td>
                            {{ $candidato->email_personal }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.candidato.fields.email_familiar') }}
                        </th>
                        <td>
                            {{ $candidato->email_familiar }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.candidato.fields.telefono_familiar') }}
                        </th>
                        <td>
                            {{ $candidato->telefono_familiar }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.candidato.fields.celular_familiar') }}
                        </th>
                        <td>
                            {{ $candidato->celular_familiar }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.candidato.fields.secundaria') }}
                        </th>
                        <td>
                            {{ $candidato->secundaria }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.candidato.fields.media') }}
                        </th>
                        <td>
                            {{ $candidato->media }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.candidato.fields.titulo_obtenido') }}
                        </th>
                        <td>
                            {{ $candidato->titulo_obtenido }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.candidato.fields.fecha_de_graduacion') }}
                        </th>
                        <td>
                            {{ $candidato->fecha_de_graduacion }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.candidato.fields.nivel_academico') }}
                        </th>
                        <td>
                            {{ App\Models\Candidato::NIVEL_ACADEMICO_SELECT[$candidato->nivel_academico] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.candidato.fields.no_de_semestres') }}
                        </th>
                        <td>
                            {{ $candidato->no_de_semestres }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.candidato.fields.graduado') }}
                        </th>
                        <td>
                            {{ App\Models\Candidato::GRADUADO_SELECT[$candidato->graduado] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.candidato.fields.titulo_obtenido_superior') }}
                        </th>
                        <td>
                            {{ $candidato->titulo_obtenido_superior }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.candidato.fields.fecha_de_grado_superior') }}
                        </th>
                        <td>
                            {{ $candidato->fecha_de_grado_superior }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.candidato.fields.idioma') }}
                        </th>
                        <td>
                            {{ App\Models\Candidato::IDIOMA_SELECT[$candidato->idioma] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.candidato.fields.otro_idioma') }}
                        </th>
                        <td>
                            {{ $candidato->otro_idioma }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.candidato.fields.habla') }}
                        </th>
                        <td>
                            {{ App\Models\Candidato::HABLA_SELECT[$candidato->habla] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.candidato.fields.lectura') }}
                        </th>
                        <td>
                            {{ App\Models\Candidato::LECTURA_SELECT[$candidato->lectura] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.candidato.fields.escritura') }}
                        </th>
                        <td>
                            {{ App\Models\Candidato::ESCRITURA_SELECT[$candidato->escritura] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.candidato.fields.ofimatica') }}
                        </th>
                        <td>
                            {{ App\Models\Candidato::OFIMATICA_SELECT[$candidato->ofimatica] ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.candidatos.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection