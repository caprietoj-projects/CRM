@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.documentosCandidato.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.documentos-candidatos.update", [$documentosCandidato->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="no_de_cedula">{{ trans('cruds.documentosCandidato.fields.no_de_cedula') }}</label>
                <input class="form-control {{ $errors->has('no_de_cedula') ? 'is-invalid' : '' }}" type="text" name="no_de_cedula" id="no_de_cedula" value="{{ old('no_de_cedula', $documentosCandidato->no_de_cedula) }}" required>
                @if($errors->has('no_de_cedula'))
                    <span class="text-danger">{{ $errors->first('no_de_cedula') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.documentosCandidato.fields.no_de_cedula_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="fotocopia_de_la_cedula">{{ trans('cruds.documentosCandidato.fields.fotocopia_de_la_cedula') }}</label>
                <div class="needsclick dropzone {{ $errors->has('fotocopia_de_la_cedula') ? 'is-invalid' : '' }}" id="fotocopia_de_la_cedula-dropzone">
                </div>
                @if($errors->has('fotocopia_de_la_cedula'))
                    <span class="text-danger">{{ $errors->first('fotocopia_de_la_cedula') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.documentosCandidato.fields.fotocopia_de_la_cedula_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="acta_de_grado">{{ trans('cruds.documentosCandidato.fields.acta_de_grado') }}</label>
                <div class="needsclick dropzone {{ $errors->has('acta_de_grado') ? 'is-invalid' : '' }}" id="acta_de_grado-dropzone">
                </div>
                @if($errors->has('acta_de_grado'))
                    <span class="text-danger">{{ $errors->first('acta_de_grado') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.documentosCandidato.fields.acta_de_grado_helper') }}</span>
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
    var uploadedFotocopiaDeLaCedulaMap = {}
Dropzone.options.fotocopiaDeLaCedulaDropzone = {
    url: '{{ route('admin.documentos-candidatos.storeMedia') }}',
    maxFilesize: 15, // MB
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 15
    },
    success: function (file, response) {
      $('form').append('<input type="hidden" name="fotocopia_de_la_cedula[]" value="' + response.name + '">')
      uploadedFotocopiaDeLaCedulaMap[file.name] = response.name
    },
    removedfile: function (file) {
      file.previewElement.remove()
      var name = ''
      if (typeof file.file_name !== 'undefined') {
        name = file.file_name
      } else {
        name = uploadedFotocopiaDeLaCedulaMap[file.name]
      }
      $('form').find('input[name="fotocopia_de_la_cedula[]"][value="' + name + '"]').remove()
    },
    init: function () {
@if(isset($documentosCandidato) && $documentosCandidato->fotocopia_de_la_cedula)
          var files =
            {!! json_encode($documentosCandidato->fotocopia_de_la_cedula) !!}
              for (var i in files) {
              var file = files[i]
              this.options.addedfile.call(this, file)
              file.previewElement.classList.add('dz-complete')
              $('form').append('<input type="hidden" name="fotocopia_de_la_cedula[]" value="' + file.file_name + '">')
            }
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
<script>
    var uploadedActaDeGradoMap = {}
Dropzone.options.actaDeGradoDropzone = {
    url: '{{ route('admin.documentos-candidatos.storeMedia') }}',
    maxFilesize: 15, // MB
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 15
    },
    success: function (file, response) {
      $('form').append('<input type="hidden" name="acta_de_grado[]" value="' + response.name + '">')
      uploadedActaDeGradoMap[file.name] = response.name
    },
    removedfile: function (file) {
      file.previewElement.remove()
      var name = ''
      if (typeof file.file_name !== 'undefined') {
        name = file.file_name
      } else {
        name = uploadedActaDeGradoMap[file.name]
      }
      $('form').find('input[name="acta_de_grado[]"][value="' + name + '"]').remove()
    },
    init: function () {
@if(isset($documentosCandidato) && $documentosCandidato->acta_de_grado)
          var files =
            {!! json_encode($documentosCandidato->acta_de_grado) !!}
              for (var i in files) {
              var file = files[i]
              this.options.addedfile.call(this, file)
              file.previewElement.classList.add('dz-complete')
              $('form').append('<input type="hidden" name="acta_de_grado[]" value="' + file.file_name + '">')
            }
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