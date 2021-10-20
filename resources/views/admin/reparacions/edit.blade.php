@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.reparacion.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.reparacions.update", [$reparacion->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="activo_id">{{ trans('cruds.reparacion.fields.activo') }}</label>
                <select class="form-control select2 {{ $errors->has('activo') ? 'is-invalid' : '' }}" name="activo_id" id="activo_id" required>
                    @foreach($activos as $id => $entry)
                        <option value="{{ $id }}" {{ (old('activo_id') ? old('activo_id') : $reparacion->activo->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('activo'))
                    <span class="text-danger">{{ $errors->first('activo') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.reparacion.fields.activo_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.reparacion.fields.tipo') }}</label>
                <select class="form-control {{ $errors->has('tipo') ? 'is-invalid' : '' }}" name="tipo" id="tipo">
                    <option value disabled {{ old('tipo', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Reparacion::TIPO_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('tipo', $reparacion->tipo) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('tipo'))
                    <span class="text-danger">{{ $errors->first('tipo') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.reparacion.fields.tipo_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="fecha">{{ trans('cruds.reparacion.fields.fecha') }}</label>
                <input class="form-control date {{ $errors->has('fecha') ? 'is-invalid' : '' }}" type="text" name="fecha" id="fecha" value="{{ old('fecha', $reparacion->fecha) }}" required>
                @if($errors->has('fecha'))
                    <span class="text-danger">{{ $errors->first('fecha') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.reparacion.fields.fecha_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection