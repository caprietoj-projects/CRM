@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.fichasTecnica.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.fichas-tecnicas.update", [$fichasTecnica->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="encargado">{{ trans('cruds.fichasTecnica.fields.encargado') }}</label>
                <input class="form-control {{ $errors->has('encargado') ? 'is-invalid' : '' }}" type="text" name="encargado" id="encargado" value="{{ old('encargado', $fichasTecnica->encargado) }}" required>
                @if($errors->has('encargado'))
                    <span class="text-danger">{{ $errors->first('encargado') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.fichasTecnica.fields.encargado_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="nombre_del_equipo">{{ trans('cruds.fichasTecnica.fields.nombre_del_equipo') }}</label>
                <input class="form-control {{ $errors->has('nombre_del_equipo') ? 'is-invalid' : '' }}" type="text" name="nombre_del_equipo" id="nombre_del_equipo" value="{{ old('nombre_del_equipo', $fichasTecnica->nombre_del_equipo) }}" required>
                @if($errors->has('nombre_del_equipo'))
                    <span class="text-danger">{{ $errors->first('nombre_del_equipo') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.fichasTecnica.fields.nombre_del_equipo_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="modelo">{{ trans('cruds.fichasTecnica.fields.modelo') }}</label>
                <input class="form-control {{ $errors->has('modelo') ? 'is-invalid' : '' }}" type="text" name="modelo" id="modelo" value="{{ old('modelo', $fichasTecnica->modelo) }}">
                @if($errors->has('modelo'))
                    <span class="text-danger">{{ $errors->first('modelo') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.fichasTecnica.fields.modelo_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="serial">{{ trans('cruds.fichasTecnica.fields.serial') }}</label>
                <input class="form-control {{ $errors->has('serial') ? 'is-invalid' : '' }}" type="text" name="serial" id="serial" value="{{ old('serial', $fichasTecnica->serial) }}">
                @if($errors->has('serial'))
                    <span class="text-danger">{{ $errors->first('serial') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.fichasTecnica.fields.serial_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="sede_id">{{ trans('cruds.fichasTecnica.fields.sede') }}</label>
                <select class="form-control select2 {{ $errors->has('sede') ? 'is-invalid' : '' }}" name="sede_id" id="sede_id" required>
                    @foreach($sedes as $id => $entry)
                        <option value="{{ $id }}" {{ (old('sede_id') ? old('sede_id') : $fichasTecnica->sede->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('sede'))
                    <span class="text-danger">{{ $errors->first('sede') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.fichasTecnica.fields.sede_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('teclado') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="teclado" value="0">
                    <input class="form-check-input" type="checkbox" name="teclado" id="teclado" value="1" {{ $fichasTecnica->teclado || old('teclado', 0) === 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="teclado">{{ trans('cruds.fichasTecnica.fields.teclado') }}</label>
                </div>
                @if($errors->has('teclado'))
                    <span class="text-danger">{{ $errors->first('teclado') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.fichasTecnica.fields.teclado_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('mouse') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="mouse" value="0">
                    <input class="form-check-input" type="checkbox" name="mouse" id="mouse" value="1" {{ $fichasTecnica->mouse || old('mouse', 0) === 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="mouse">{{ trans('cruds.fichasTecnica.fields.mouse') }}</label>
                </div>
                @if($errors->has('mouse'))
                    <span class="text-danger">{{ $errors->first('mouse') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.fichasTecnica.fields.mouse_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('parlantes') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="parlantes" value="0">
                    <input class="form-check-input" type="checkbox" name="parlantes" id="parlantes" value="1" {{ $fichasTecnica->parlantes || old('parlantes', 0) === 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="parlantes">{{ trans('cruds.fichasTecnica.fields.parlantes') }}</label>
                </div>
                @if($errors->has('parlantes'))
                    <span class="text-danger">{{ $errors->first('parlantes') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.fichasTecnica.fields.parlantes_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('camara') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="camara" value="0">
                    <input class="form-check-input" type="checkbox" name="camara" id="camara" value="1" {{ $fichasTecnica->camara || old('camara', 0) === 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="camara">{{ trans('cruds.fichasTecnica.fields.camara') }}</label>
                </div>
                @if($errors->has('camara'))
                    <span class="text-danger">{{ $errors->first('camara') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.fichasTecnica.fields.camara_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('telefono_ip') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="telefono_ip" value="0">
                    <input class="form-check-input" type="checkbox" name="telefono_ip" id="telefono_ip" value="1" {{ $fichasTecnica->telefono_ip || old('telefono_ip', 0) === 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="telefono_ip">{{ trans('cruds.fichasTecnica.fields.telefono_ip') }}</label>
                </div>
                @if($errors->has('telefono_ip'))
                    <span class="text-danger">{{ $errors->first('telefono_ip') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.fichasTecnica.fields.telefono_ip_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="observaciones">{{ trans('cruds.fichasTecnica.fields.observaciones') }}</label>
                <textarea class="form-control {{ $errors->has('observaciones') ? 'is-invalid' : '' }}" name="observaciones" id="observaciones">{{ old('observaciones', $fichasTecnica->observaciones) }}</textarea>
                @if($errors->has('observaciones'))
                    <span class="text-danger">{{ $errors->first('observaciones') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.fichasTecnica.fields.observaciones_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.fichasTecnica.fields.estado_del_activo') }}</label>
                @foreach(App\Models\FichasTecnica::ESTADO_DEL_ACTIVO_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('estado_del_activo') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="estado_del_activo_{{ $key }}" name="estado_del_activo" value="{{ $key }}" {{ old('estado_del_activo', $fichasTecnica->estado_del_activo) === (string) $key ? 'checked' : '' }} required>
                        <label class="form-check-label" for="estado_del_activo_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('estado_del_activo'))
                    <span class="text-danger">{{ $errors->first('estado_del_activo') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.fichasTecnica.fields.estado_del_activo_helper') }}</span>
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