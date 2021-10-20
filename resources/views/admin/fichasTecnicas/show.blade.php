@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.fichasTecnica.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.fichas-tecnicas.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.fichasTecnica.fields.encargado') }}
                        </th>
                        <td>
                            {{ $fichasTecnica->encargado }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.fichasTecnica.fields.nombre_del_equipo') }}
                        </th>
                        <td>
                            {{ $fichasTecnica->nombre_del_equipo }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.fichasTecnica.fields.modelo') }}
                        </th>
                        <td>
                            {{ $fichasTecnica->modelo }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.fichasTecnica.fields.serial') }}
                        </th>
                        <td>
                            {{ $fichasTecnica->serial }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.fichasTecnica.fields.sede') }}
                        </th>
                        <td>
                            {{ $fichasTecnica->sede->sede ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.fichasTecnica.fields.teclado') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $fichasTecnica->teclado ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.fichasTecnica.fields.mouse') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $fichasTecnica->mouse ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.fichasTecnica.fields.parlantes') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $fichasTecnica->parlantes ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.fichasTecnica.fields.camara') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $fichasTecnica->camara ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.fichasTecnica.fields.telefono_ip') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $fichasTecnica->telefono_ip ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.fichasTecnica.fields.observaciones') }}
                        </th>
                        <td>
                            {{ $fichasTecnica->observaciones }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.fichasTecnica.fields.estado_del_activo') }}
                        </th>
                        <td>
                            {{ App\Models\FichasTecnica::ESTADO_DEL_ACTIVO_RADIO[$fichasTecnica->estado_del_activo] ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.fichas-tecnicas.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection