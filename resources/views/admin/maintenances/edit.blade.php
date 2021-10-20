@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.maintenance.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.maintenances.update", [$maintenance->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="area_id">{{ trans('cruds.maintenance.fields.area') }}</label>
                <select class="form-control select2 {{ $errors->has('area') ? 'is-invalid' : '' }}" name="area_id" id="area_id" required>
                    @foreach($areas as $id => $entry)
                        <option value="{{ $id }}" {{ (old('area_id') ? old('area_id') : $maintenance->area->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('area'))
                    <span class="text-danger">{{ $errors->first('area') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.maintenance.fields.area_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.maintenance.fields.tipo') }}</label>
                <select class="form-control {{ $errors->has('tipo') ? 'is-invalid' : '' }}" name="tipo" id="tipo" required>
                    <option value disabled {{ old('tipo', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Maintenance::TIPO_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('tipo', $maintenance->tipo) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('tipo'))
                    <span class="text-danger">{{ $errors->first('tipo') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.maintenance.fields.tipo_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="quien_lo_realiza_id">{{ trans('cruds.maintenance.fields.quien_lo_realiza') }}</label>
                <select class="form-control select2 {{ $errors->has('quien_lo_realiza') ? 'is-invalid' : '' }}" name="quien_lo_realiza_id" id="quien_lo_realiza_id" required>
                    @foreach($quien_lo_realizas as $id => $entry)
                        <option value="{{ $id }}" {{ (old('quien_lo_realiza_id') ? old('quien_lo_realiza_id') : $maintenance->quien_lo_realiza->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('quien_lo_realiza'))
                    <span class="text-danger">{{ $errors->first('quien_lo_realiza') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.maintenance.fields.quien_lo_realiza_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="fecha">{{ trans('cruds.maintenance.fields.fecha') }}</label>
                <input class="form-control date {{ $errors->has('fecha') ? 'is-invalid' : '' }}" type="text" name="fecha" id="fecha" value="{{ old('fecha', $maintenance->fecha) }}" required>
                @if($errors->has('fecha'))
                    <span class="text-danger">{{ $errors->first('fecha') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.maintenance.fields.fecha_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="descripcion">{{ trans('cruds.maintenance.fields.descripcion') }}</label>
                <input class="form-control {{ $errors->has('descripcion') ? 'is-invalid' : '' }}" type="text" name="descripcion" id="descripcion" value="{{ old('descripcion', $maintenance->descripcion) }}">
                @if($errors->has('descripcion'))
                    <span class="text-danger">{{ $errors->first('descripcion') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.maintenance.fields.descripcion_helper') }}</span>
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