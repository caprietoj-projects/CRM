@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.empleo.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.empleos.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="vacante">{{ trans('cruds.empleo.fields.vacante') }}</label>
                <input class="form-control {{ $errors->has('vacante') ? 'is-invalid' : '' }}" type="text" name="vacante" id="vacante" value="{{ old('vacante', '') }}">
                @if($errors->has('vacante'))
                    <span class="text-danger">{{ $errors->first('vacante') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.empleo.fields.vacante_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="icono">{{ trans('cruds.empleo.fields.icono') }}</label>
                <input class="form-control {{ $errors->has('icono') ? 'is-invalid' : '' }}" type="text" name="icono" id="icono" value="{{ old('icono', '') }}">
                @if($errors->has('icono'))
                    <span class="text-danger">{{ $errors->first('icono') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.empleo.fields.icono_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="descripcion">{{ trans('cruds.empleo.fields.descripcion') }}</label>
                <textarea class="form-control {{ $errors->has('descripcion') ? 'is-invalid' : '' }}" name="descripcion" id="descripcion">{{ old('descripcion') }}</textarea>
                @if($errors->has('descripcion'))
                    <span class="text-danger">{{ $errors->first('descripcion') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.empleo.fields.descripcion_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="requisitos">{{ trans('cruds.empleo.fields.requisitos') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('requisitos') ? 'is-invalid' : '' }}" name="requisitos" id="requisitos">{!! old('requisitos') !!}</textarea>
                @if($errors->has('requisitos'))
                    <span class="text-danger">{{ $errors->first('requisitos') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.empleo.fields.requisitos_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="tiempo">{{ trans('cruds.empleo.fields.tiempo') }}</label>
                <input class="form-control {{ $errors->has('tiempo') ? 'is-invalid' : '' }}" type="text" name="tiempo" id="tiempo" value="{{ old('tiempo', '') }}">
                @if($errors->has('tiempo'))
                    <span class="text-danger">{{ $errors->first('tiempo') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.empleo.fields.tiempo_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="empresa">{{ trans('cruds.empleo.fields.empresa') }}</label>
                <input class="form-control {{ $errors->has('empresa') ? 'is-invalid' : '' }}" type="text" name="empresa" id="empresa" value="{{ old('empresa', '') }}">
                @if($errors->has('empresa'))
                    <span class="text-danger">{{ $errors->first('empresa') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.empleo.fields.empresa_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="salario">{{ trans('cruds.empleo.fields.salario') }}</label>
                <input class="form-control {{ $errors->has('salario') ? 'is-invalid' : '' }}" type="number" name="salario" id="salario" value="{{ old('salario', '') }}" step="0.01">
                @if($errors->has('salario'))
                    <span class="text-danger">{{ $errors->first('salario') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.empleo.fields.salario_helper') }}</span>
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
    $(document).ready(function () {
  function SimpleUploadAdapter(editor) {
    editor.plugins.get('FileRepository').createUploadAdapter = function(loader) {
      return {
        upload: function() {
          return loader.file
            .then(function (file) {
              return new Promise(function(resolve, reject) {
                // Init request
                var xhr = new XMLHttpRequest();
                xhr.open('POST', '{{ route('admin.empleos.storeCKEditorImages') }}', true);
                xhr.setRequestHeader('x-csrf-token', window._token);
                xhr.setRequestHeader('Accept', 'application/json');
                xhr.responseType = 'json';

                // Init listeners
                var genericErrorText = `Couldn't upload file: ${ file.name }.`;
                xhr.addEventListener('error', function() { reject(genericErrorText) });
                xhr.addEventListener('abort', function() { reject() });
                xhr.addEventListener('load', function() {
                  var response = xhr.response;

                  if (!response || xhr.status !== 201) {
                    return reject(response && response.message ? `${genericErrorText}\n${xhr.status} ${response.message}` : `${genericErrorText}\n ${xhr.status} ${xhr.statusText}`);
                  }

                  $('form').append('<input type="hidden" name="ck-media[]" value="' + response.id + '">');

                  resolve({ default: response.url });
                });

                if (xhr.upload) {
                  xhr.upload.addEventListener('progress', function(e) {
                    if (e.lengthComputable) {
                      loader.uploadTotal = e.total;
                      loader.uploaded = e.loaded;
                    }
                  });
                }

                // Send request
                var data = new FormData();
                data.append('upload', file);
                data.append('crud_id', '{{ $empleo->id ?? 0 }}');
                xhr.send(data);
              });
            })
        }
      };
    }
  }

  var allEditors = document.querySelectorAll('.ckeditor');
  for (var i = 0; i < allEditors.length; ++i) {
    ClassicEditor.create(
      allEditors[i], {
        extraPlugins: [SimpleUploadAdapter]
      }
    );
  }
});
</script>

@endsection