@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.fichaTecnica.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.ficha-tecnicas.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="descripcion">{{ trans('cruds.fichaTecnica.fields.descripcion') }}</label>
                <textarea class="form-control {{ $errors->has('descripcion') ? 'is-invalid' : '' }}" name="descripcion" id="descripcion" required>{{ old('descripcion') }}</textarea>
                @if($errors->has('descripcion'))
                    <span class="text-danger">{{ $errors->first('descripcion') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.fichaTecnica.fields.descripcion_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="grupo_id">{{ trans('cruds.fichaTecnica.fields.grupo') }}</label>
                <select class="form-control select2 {{ $errors->has('grupo') ? 'is-invalid' : '' }}" name="grupo_id" id="grupo_id" required>
                    @foreach($grupos as $id => $entry)
                        <option value="{{ $id }}" {{ old('grupo_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('grupo'))
                    <span class="text-danger">{{ $errors->first('grupo') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.fichaTecnica.fields.grupo_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="modelo">{{ trans('cruds.fichaTecnica.fields.modelo') }}</label>
                <input class="form-control {{ $errors->has('modelo') ? 'is-invalid' : '' }}" type="text" name="modelo" id="modelo" value="{{ old('modelo', '') }}">
                @if($errors->has('modelo'))
                    <span class="text-danger">{{ $errors->first('modelo') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.fichaTecnica.fields.modelo_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="serial">{{ trans('cruds.fichaTecnica.fields.serial') }}</label>
                <input class="form-control {{ $errors->has('serial') ? 'is-invalid' : '' }}" type="text" name="serial" id="serial" value="{{ old('serial', '') }}" required>
                @if($errors->has('serial'))
                    <span class="text-danger">{{ $errors->first('serial') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.fichaTecnica.fields.serial_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="color">{{ trans('cruds.fichaTecnica.fields.color') }}</label>
                <input class="form-control {{ $errors->has('color') ? 'is-invalid' : '' }}" type="text" name="color" id="color" value="{{ old('color', '') }}" required>
                @if($errors->has('color'))
                    <span class="text-danger">{{ $errors->first('color') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.fichaTecnica.fields.color_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="tipo">{{ trans('cruds.fichaTecnica.fields.tipo') }}</label>
                <input class="form-control {{ $errors->has('tipo') ? 'is-invalid' : '' }}" type="text" name="tipo" id="tipo" value="{{ old('tipo', '') }}" required>
                @if($errors->has('tipo'))
                    <span class="text-danger">{{ $errors->first('tipo') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.fichaTecnica.fields.tipo_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="ubicacion_id">{{ trans('cruds.fichaTecnica.fields.ubicacion') }}</label>
                <select class="form-control select2 {{ $errors->has('ubicacion') ? 'is-invalid' : '' }}" name="ubicacion_id" id="ubicacion_id" required>
                    @foreach($ubicacions as $id => $entry)
                        <option value="{{ $id }}" {{ old('ubicacion_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('ubicacion'))
                    <span class="text-danger">{{ $errors->first('ubicacion') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.fichaTecnica.fields.ubicacion_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="encargado_id">{{ trans('cruds.fichaTecnica.fields.encargado') }}</label>
                <select class="form-control select2 {{ $errors->has('encargado') ? 'is-invalid' : '' }}" name="encargado_id" id="encargado_id" required>
                    @foreach($encargados as $id => $entry)
                        <option value="{{ $id }}" {{ old('encargado_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('encargado'))
                    <span class="text-danger">{{ $errors->first('encargado') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.fichaTecnica.fields.encargado_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="foto">{{ trans('cruds.fichaTecnica.fields.foto') }}</label>
                <div class="needsclick dropzone {{ $errors->has('foto') ? 'is-invalid' : '' }}" id="foto-dropzone">
                </div>
                @if($errors->has('foto'))
                    <span class="text-danger">{{ $errors->first('foto') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.fichaTecnica.fields.foto_helper') }}</span>
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

@section('scripts')
<script>
    Dropzone.options.fotoDropzone = {
    url: '{{ route('admin.ficha-tecnicas.storeMedia') }}',
    maxFilesize: 20, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 20,
      width: 4096,
      height: 4096
    },
    success: function (file, response) {
      $('form').find('input[name="foto"]').remove()
      $('form').append('<input type="hidden" name="foto" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="foto"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($fichaTecnica) && $fichaTecnica->foto)
      var file = {!! json_encode($fichaTecnica->foto) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="foto" value="' + file.file_name + '">')
      this.options.maxFiles = this.options.maxFiles - 1
@endif
    },
    error: function (file, response) {
        if ($.type(response) === 'string') {
            var message = response //dropzone sends it's own error messages in string
        } else {
            var message = response.errors.file
        }
        file.previewElement.classList.add('dz-error')
        _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
        _results = []
        for (_i = 0, _len = _ref.length; _i < _len; _i++) {
            node = _ref[_i]
            _results.push(node.textContent = message)
        }

        return _results
    }
}
</script>
@endsection