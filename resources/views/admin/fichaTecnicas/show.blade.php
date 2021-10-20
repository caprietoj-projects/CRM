@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.fichaTecnica.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.ficha-tecnicas.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.fichaTecnica.fields.descripcion') }}
                        </th>
                        <td>
                            {{ $fichaTecnica->descripcion }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.fichaTecnica.fields.grupo') }}
                        </th>
                        <td>
                            {{ $fichaTecnica->grupo->nombre ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.fichaTecnica.fields.modelo') }}
                        </th>
                        <td>
                            {{ $fichaTecnica->modelo }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.fichaTecnica.fields.serial') }}
                        </th>
                        <td>
                            {{ $fichaTecnica->serial }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.fichaTecnica.fields.color') }}
                        </th>
                        <td>
                            {{ $fichaTecnica->color }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.fichaTecnica.fields.tipo') }}
                        </th>
                        <td>
                            {{ $fichaTecnica->tipo }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.fichaTecnica.fields.ubicacion') }}
                        </th>
                        <td>
                            {{ $fichaTecnica->ubicacion->sede ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.fichaTecnica.fields.encargado') }}
                        </th>
                        <td>
                            {{ $fichaTecnica->encargado->nombre ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.fichaTecnica.fields.foto') }}
                        </th>
                        <td>
                            @if($fichaTecnica->foto)
                                <a href="{{ $fichaTecnica->foto->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $fichaTecnica->foto->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.ficha-tecnicas.index') }}">
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
            <a class="nav-link" href="#activo_reparacions" role="tab" data-toggle="tab">
                {{ trans('cruds.reparacion.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="activo_reparacions">
            @includeIf('admin.fichaTecnicas.relationships.activoReparacions', ['reparacions' => $fichaTecnica->activoReparacions])
        </div>
    </div>
</div>

@endsection