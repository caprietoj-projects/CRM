@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.empleo.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.empleos.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.empleo.fields.vacante') }}
                        </th>
                        <td>
                            {{ $empleo->vacante }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.empleo.fields.descripcion') }}
                        </th>
                        <td>
                            {{ $empleo->descripcion }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.empleo.fields.requisitos') }}
                        </th>
                        <td>
                            {!! $empleo->requisitos !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.empleo.fields.tiempo') }}
                        </th>
                        <td>
                            {{ $empleo->tiempo }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.empleo.fields.salario') }}
                        </th>
                        <td>
                            {{ $empleo->salario }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.empleo.fields.empresa') }}
                        </th>
                        <td>
                            {{ $empleo->empresa }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.empleos.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection