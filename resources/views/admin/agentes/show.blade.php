@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.agente.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.agentes.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.agente.fields.nombre') }}
                        </th>
                        <td>
                            {{ $agente->nombre }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.agente.fields.cargo') }}
                        </th>
                        <td>
                            {{ $agente->cargo }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.agente.fields.correo') }}
                        </th>
                        <td>
                            {{ $agente->correo }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.agentes.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        {{ trans('global.relatedData') }}
    </div>
    <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
        <li class="nav-item">
            <a class="nav-link" href="#quien_lo_realiza_maintenances" role="tab" data-toggle="tab">
                {{ trans('cruds.maintenance.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="quien_lo_realiza_maintenances">
            @includeIf('admin.agentes.relationships.quienLoRealizaMaintenances', ['maintenances' => $agente->quienLoRealizaMaintenances])
        </div>
    </div>
</div>

@endsection