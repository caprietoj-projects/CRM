@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.candidato.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.candidatos.update", [$candidato->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="primer_apellido">{{ trans('cruds.candidato.fields.primer_apellido') }}</label>
                <input class="form-control {{ $errors->has('primer_apellido') ? 'is-invalid' : '' }}" type="text" name="primer_apellido" id="primer_apellido" value="{{ old('primer_apellido', $candidato->primer_apellido) }}" required>
                @if($errors->has('primer_apellido'))
                    <span class="text-danger">{{ $errors->first('primer_apellido') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.candidato.fields.primer_apellido_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="segundo_apellido">{{ trans('cruds.candidato.fields.segundo_apellido') }}</label>
                <input class="form-control {{ $errors->has('segundo_apellido') ? 'is-invalid' : '' }}" type="text" name="segundo_apellido" id="segundo_apellido" value="{{ old('segundo_apellido', $candidato->segundo_apellido) }}" required>
                @if($errors->has('segundo_apellido'))
                    <span class="text-danger">{{ $errors->first('segundo_apellido') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.candidato.fields.segundo_apellido_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="nombres">{{ trans('cruds.candidato.fields.nombres') }}</label>
                <input class="form-control {{ $errors->has('nombres') ? 'is-invalid' : '' }}" type="text" name="nombres" id="nombres" value="{{ old('nombres', $candidato->nombres) }}" required>
                @if($errors->has('nombres'))
                    <span class="text-danger">{{ $errors->first('nombres') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.candidato.fields.nombres_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.candidato.fields.documento_de_identidad') }}</label>
                @foreach(App\Models\Candidato::DOCUMENTO_DE_IDENTIDAD_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('documento_de_identidad') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="documento_de_identidad_{{ $key }}" name="documento_de_identidad" value="{{ $key }}" {{ old('documento_de_identidad', $candidato->documento_de_identidad) === (string) $key ? 'checked' : '' }} required>
                        <label class="form-check-label" for="documento_de_identidad_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('documento_de_identidad'))
                    <span class="text-danger">{{ $errors->first('documento_de_identidad') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.candidato.fields.documento_de_identidad_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="no_de_identificacion">{{ trans('cruds.candidato.fields.no_de_identificacion') }}</label>
                <input class="form-control {{ $errors->has('no_de_identificacion') ? 'is-invalid' : '' }}" type="number" name="no_de_identificacion" id="no_de_identificacion" value="{{ old('no_de_identificacion', $candidato->no_de_identificacion) }}" step="0.1" required>
                @if($errors->has('no_de_identificacion'))
                    <span class="text-danger">{{ $errors->first('no_de_identificacion') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.candidato.fields.no_de_identificacion_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="fecha_de_expedicion_del_documento">{{ trans('cruds.candidato.fields.fecha_de_expedicion_del_documento') }}</label>
                <input class="form-control date {{ $errors->has('fecha_de_expedicion_del_documento') ? 'is-invalid' : '' }}" type="text" name="fecha_de_expedicion_del_documento" id="fecha_de_expedicion_del_documento" value="{{ old('fecha_de_expedicion_del_documento', $candidato->fecha_de_expedicion_del_documento) }}" required>
                @if($errors->has('fecha_de_expedicion_del_documento'))
                    <span class="text-danger">{{ $errors->first('fecha_de_expedicion_del_documento') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.candidato.fields.fecha_de_expedicion_del_documento_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="fecha_de_nacimiento">{{ trans('cruds.candidato.fields.fecha_de_nacimiento') }}</label>
                <input class="form-control date {{ $errors->has('fecha_de_nacimiento') ? 'is-invalid' : '' }}" type="text" name="fecha_de_nacimiento" id="fecha_de_nacimiento" value="{{ old('fecha_de_nacimiento', $candidato->fecha_de_nacimiento) }}" required>
                @if($errors->has('fecha_de_nacimiento'))
                    <span class="text-danger">{{ $errors->first('fecha_de_nacimiento') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.candidato.fields.fecha_de_nacimiento_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="departamento">{{ trans('cruds.candidato.fields.departamento') }}</label>
                <input class="form-control {{ $errors->has('departamento') ? 'is-invalid' : '' }}" type="text" name="departamento" id="departamento" value="{{ old('departamento', $candidato->departamento) }}" required>
                @if($errors->has('departamento'))
                    <span class="text-danger">{{ $errors->first('departamento') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.candidato.fields.departamento_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="ciudad">{{ trans('cruds.candidato.fields.ciudad') }}</label>
                <input class="form-control {{ $errors->has('ciudad') ? 'is-invalid' : '' }}" type="text" name="ciudad" id="ciudad" value="{{ old('ciudad', $candidato->ciudad) }}" required>
                @if($errors->has('ciudad'))
                    <span class="text-danger">{{ $errors->first('ciudad') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.candidato.fields.ciudad_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="direccion">{{ trans('cruds.candidato.fields.direccion') }}</label>
                <input class="form-control {{ $errors->has('direccion') ? 'is-invalid' : '' }}" type="text" name="direccion" id="direccion" value="{{ old('direccion', $candidato->direccion) }}" required>
                @if($errors->has('direccion'))
                    <span class="text-danger">{{ $errors->first('direccion') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.candidato.fields.direccion_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="departamento_de_nacimiento">{{ trans('cruds.candidato.fields.departamento_de_nacimiento') }}</label>
                <input class="form-control {{ $errors->has('departamento_de_nacimiento') ? 'is-invalid' : '' }}" type="text" name="departamento_de_nacimiento" id="departamento_de_nacimiento" value="{{ old('departamento_de_nacimiento', $candidato->departamento_de_nacimiento) }}" required>
                @if($errors->has('departamento_de_nacimiento'))
                    <span class="text-danger">{{ $errors->first('departamento_de_nacimiento') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.candidato.fields.departamento_de_nacimiento_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="ciudad_de_nacimiento">{{ trans('cruds.candidato.fields.ciudad_de_nacimiento') }}</label>
                <input class="form-control {{ $errors->has('ciudad_de_nacimiento') ? 'is-invalid' : '' }}" type="text" name="ciudad_de_nacimiento" id="ciudad_de_nacimiento" value="{{ old('ciudad_de_nacimiento', $candidato->ciudad_de_nacimiento) }}" required>
                @if($errors->has('ciudad_de_nacimiento'))
                    <span class="text-danger">{{ $errors->first('ciudad_de_nacimiento') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.candidato.fields.ciudad_de_nacimiento_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="telefono_personal">{{ trans('cruds.candidato.fields.telefono_personal') }}</label>
                <input class="form-control {{ $errors->has('telefono_personal') ? 'is-invalid' : '' }}" type="text" name="telefono_personal" id="telefono_personal" value="{{ old('telefono_personal', $candidato->telefono_personal) }}" required>
                @if($errors->has('telefono_personal'))
                    <span class="text-danger">{{ $errors->first('telefono_personal') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.candidato.fields.telefono_personal_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="celular_personal">{{ trans('cruds.candidato.fields.celular_personal') }}</label>
                <input class="form-control {{ $errors->has('celular_personal') ? 'is-invalid' : '' }}" type="text" name="celular_personal" id="celular_personal" value="{{ old('celular_personal', $candidato->celular_personal) }}" required>
                @if($errors->has('celular_personal'))
                    <span class="text-danger">{{ $errors->first('celular_personal') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.candidato.fields.celular_personal_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="email_personal">{{ trans('cruds.candidato.fields.email_personal') }}</label>
                <input class="form-control {{ $errors->has('email_personal') ? 'is-invalid' : '' }}" type="email" name="email_personal" id="email_personal" value="{{ old('email_personal', $candidato->email_personal) }}" required>
                @if($errors->has('email_personal'))
                    <span class="text-danger">{{ $errors->first('email_personal') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.candidato.fields.email_personal_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="email_familiar">{{ trans('cruds.candidato.fields.email_familiar') }}</label>
                <input class="form-control {{ $errors->has('email_familiar') ? 'is-invalid' : '' }}" type="email" name="email_familiar" id="email_familiar" value="{{ old('email_familiar', $candidato->email_familiar) }}" required>
                @if($errors->has('email_familiar'))
                    <span class="text-danger">{{ $errors->first('email_familiar') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.candidato.fields.email_familiar_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="telefono_familiar">{{ trans('cruds.candidato.fields.telefono_familiar') }}</label>
                <input class="form-control {{ $errors->has('telefono_familiar') ? 'is-invalid' : '' }}" type="text" name="telefono_familiar" id="telefono_familiar" value="{{ old('telefono_familiar', $candidato->telefono_familiar) }}" required>
                @if($errors->has('telefono_familiar'))
                    <span class="text-danger">{{ $errors->first('telefono_familiar') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.candidato.fields.telefono_familiar_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="celular_familiar">{{ trans('cruds.candidato.fields.celular_familiar') }}</label>
                <input class="form-control {{ $errors->has('celular_familiar') ? 'is-invalid' : '' }}" type="text" name="celular_familiar" id="celular_familiar" value="{{ old('celular_familiar', $candidato->celular_familiar) }}" required>
                @if($errors->has('celular_familiar'))
                    <span class="text-danger">{{ $errors->first('celular_familiar') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.candidato.fields.celular_familiar_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="secundaria">{{ trans('cruds.candidato.fields.secundaria') }}</label>
                <input class="form-control {{ $errors->has('secundaria') ? 'is-invalid' : '' }}" type="text" name="secundaria" id="secundaria" value="{{ old('secundaria', $candidato->secundaria) }}">
                @if($errors->has('secundaria'))
                    <span class="text-danger">{{ $errors->first('secundaria') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.candidato.fields.secundaria_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="media">{{ trans('cruds.candidato.fields.media') }}</label>
                <input class="form-control {{ $errors->has('media') ? 'is-invalid' : '' }}" type="text" name="media" id="media" value="{{ old('media', $candidato->media) }}">
                @if($errors->has('media'))
                    <span class="text-danger">{{ $errors->first('media') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.candidato.fields.media_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="titulo_obtenido">{{ trans('cruds.candidato.fields.titulo_obtenido') }}</label>
                <input class="form-control {{ $errors->has('titulo_obtenido') ? 'is-invalid' : '' }}" type="text" name="titulo_obtenido" id="titulo_obtenido" value="{{ old('titulo_obtenido', $candidato->titulo_obtenido) }}">
                @if($errors->has('titulo_obtenido'))
                    <span class="text-danger">{{ $errors->first('titulo_obtenido') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.candidato.fields.titulo_obtenido_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="fecha_de_graduacion">{{ trans('cruds.candidato.fields.fecha_de_graduacion') }}</label>
                <input class="form-control date {{ $errors->has('fecha_de_graduacion') ? 'is-invalid' : '' }}" type="text" name="fecha_de_graduacion" id="fecha_de_graduacion" value="{{ old('fecha_de_graduacion', $candidato->fecha_de_graduacion) }}">
                @if($errors->has('fecha_de_graduacion'))
                    <span class="text-danger">{{ $errors->first('fecha_de_graduacion') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.candidato.fields.fecha_de_graduacion_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.candidato.fields.nivel_academico') }}</label>
                <select class="form-control {{ $errors->has('nivel_academico') ? 'is-invalid' : '' }}" name="nivel_academico" id="nivel_academico">
                    <option value disabled {{ old('nivel_academico', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Candidato::NIVEL_ACADEMICO_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('nivel_academico', $candidato->nivel_academico) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('nivel_academico'))
                    <span class="text-danger">{{ $errors->first('nivel_academico') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.candidato.fields.nivel_academico_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="no_de_semestres">{{ trans('cruds.candidato.fields.no_de_semestres') }}</label>
                <input class="form-control {{ $errors->has('no_de_semestres') ? 'is-invalid' : '' }}" type="number" name="no_de_semestres" id="no_de_semestres" value="{{ old('no_de_semestres', $candidato->no_de_semestres) }}" step="1">
                @if($errors->has('no_de_semestres'))
                    <span class="text-danger">{{ $errors->first('no_de_semestres') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.candidato.fields.no_de_semestres_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.candidato.fields.graduado') }}</label>
                <select class="form-control {{ $errors->has('graduado') ? 'is-invalid' : '' }}" name="graduado" id="graduado">
                    <option value disabled {{ old('graduado', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Candidato::GRADUADO_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('graduado', $candidato->graduado) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('graduado'))
                    <span class="text-danger">{{ $errors->first('graduado') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.candidato.fields.graduado_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="titulo_obtenido_superior">{{ trans('cruds.candidato.fields.titulo_obtenido_superior') }}</label>
                <input class="form-control {{ $errors->has('titulo_obtenido_superior') ? 'is-invalid' : '' }}" type="text" name="titulo_obtenido_superior" id="titulo_obtenido_superior" value="{{ old('titulo_obtenido_superior', $candidato->titulo_obtenido_superior) }}">
                @if($errors->has('titulo_obtenido_superior'))
                    <span class="text-danger">{{ $errors->first('titulo_obtenido_superior') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.candidato.fields.titulo_obtenido_superior_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="fecha_de_grado_superior">{{ trans('cruds.candidato.fields.fecha_de_grado_superior') }}</label>
                <input class="form-control date {{ $errors->has('fecha_de_grado_superior') ? 'is-invalid' : '' }}" type="text" name="fecha_de_grado_superior" id="fecha_de_grado_superior" value="{{ old('fecha_de_grado_superior', $candidato->fecha_de_grado_superior) }}">
                @if($errors->has('fecha_de_grado_superior'))
                    <span class="text-danger">{{ $errors->first('fecha_de_grado_superior') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.candidato.fields.fecha_de_grado_superior_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.candidato.fields.idioma') }}</label>
                <select class="form-control {{ $errors->has('idioma') ? 'is-invalid' : '' }}" name="idioma" id="idioma">
                    <option value disabled {{ old('idioma', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Candidato::IDIOMA_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('idioma', $candidato->idioma) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('idioma'))
                    <span class="text-danger">{{ $errors->first('idioma') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.candidato.fields.idioma_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="otro_idioma">{{ trans('cruds.candidato.fields.otro_idioma') }}</label>
                <input class="form-control {{ $errors->has('otro_idioma') ? 'is-invalid' : '' }}" type="text" name="otro_idioma" id="otro_idioma" value="{{ old('otro_idioma', $candidato->otro_idioma) }}">
                @if($errors->has('otro_idioma'))
                    <span class="text-danger">{{ $errors->first('otro_idioma') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.candidato.fields.otro_idioma_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.candidato.fields.habla') }}</label>
                <select class="form-control {{ $errors->has('habla') ? 'is-invalid' : '' }}" name="habla" id="habla">
                    <option value disabled {{ old('habla', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Candidato::HABLA_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('habla', $candidato->habla) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('habla'))
                    <span class="text-danger">{{ $errors->first('habla') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.candidato.fields.habla_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.candidato.fields.lectura') }}</label>
                <select class="form-control {{ $errors->has('lectura') ? 'is-invalid' : '' }}" name="lectura" id="lectura">
                    <option value disabled {{ old('lectura', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Candidato::LECTURA_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('lectura', $candidato->lectura) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('lectura'))
                    <span class="text-danger">{{ $errors->first('lectura') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.candidato.fields.lectura_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.candidato.fields.escritura') }}</label>
                <select class="form-control {{ $errors->has('escritura') ? 'is-invalid' : '' }}" name="escritura" id="escritura">
                    <option value disabled {{ old('escritura', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Candidato::ESCRITURA_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('escritura', $candidato->escritura) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('escritura'))
                    <span class="text-danger">{{ $errors->first('escritura') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.candidato.fields.escritura_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.candidato.fields.ofimatica') }}</label>
                <select class="form-control {{ $errors->has('ofimatica') ? 'is-invalid' : '' }}" name="ofimatica" id="ofimatica">
                    <option value disabled {{ old('ofimatica', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Candidato::OFIMATICA_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('ofimatica', $candidato->ofimatica) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('ofimatica'))
                    <span class="text-danger">{{ $errors->first('ofimatica') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.candidato.fields.ofimatica_helper') }}</span>
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