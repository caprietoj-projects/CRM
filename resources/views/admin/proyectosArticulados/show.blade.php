@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.proyectosArticulado.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.proyectos-articulados.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.proyectosArticulado.fields.nombre_del_estudiante') }}
                        </th>
                        <td>
                            {{ $proyectosArticulado->nombre_del_estudiante }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.proyectosArticulado.fields.curso') }}
                        </th>
                        <td>
                            {{ $proyectosArticulado->curso }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.proyectosArticulado.fields.tema_del_proyecto') }}
                        </th>
                        <td>
                            {{ $proyectosArticulado->tema_del_proyecto }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.proyectosArticulado.fields.proyecto') }}
                        </th>
                        <td>
                            @if($proyectosArticulado->proyecto)
                                <a href="{{ $proyectosArticulado->proyecto->getUrl() }}" target="_blank">
                                    {{ trans('global.view_file') }}
                                </a>
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.proyectos-articulados.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection