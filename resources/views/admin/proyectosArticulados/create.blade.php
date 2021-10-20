@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.proyectosArticulado.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.proyectos-articulados.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="nombre_del_estudiante">{{ trans('cruds.proyectosArticulado.fields.nombre_del_estudiante') }}</label>
                <input class="form-control {{ $errors->has('nombre_del_estudiante') ? 'is-invalid' : '' }}" type="text" name="nombre_del_estudiante" id="nombre_del_estudiante" value="{{ old('nombre_del_estudiante', '') }}" required>
                @if($errors->has('nombre_del_estudiante'))
                    <span class="text-danger">{{ $errors->first('nombre_del_estudiante') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.proyectosArticulado.fields.nombre_del_estudiante_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="curso">{{ trans('cruds.proyectosArticulado.fields.curso') }}</label>
                <input class="form-control {{ $errors->has('curso') ? 'is-invalid' : '' }}" type="number" name="curso" id="curso" value="{{ old('curso', '') }}" step="1" required>
                @if($errors->has('curso'))
                    <span class="text-danger">{{ $errors->first('curso') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.proyectosArticulado.fields.curso_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="tema_del_proyecto">{{ trans('cruds.proyectosArticulado.fields.tema_del_proyecto') }}</label>
                <input class="form-control {{ $errors->has('tema_del_proyecto') ? 'is-invalid' : '' }}" type="text" name="tema_del_proyecto" id="tema_del_proyecto" value="{{ old('tema_del_proyecto', '') }}" required>
                @if($errors->has('tema_del_proyecto'))
                    <span class="text-danger">{{ $errors->first('tema_del_proyecto') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.proyectosArticulado.fields.tema_del_proyecto_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="proyecto">{{ trans('cruds.proyectosArticulado.fields.proyecto') }}</label>
                <div class="needsclick dropzone {{ $errors->has('proyecto') ? 'is-invalid' : '' }}" id="proyecto-dropzone">
                </div>
                @if($errors->has('proyecto'))
                    <span class="text-danger">{{ $errors->first('proyecto') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.proyectosArticulado.fields.proyecto_helper') }}</span>
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
    Dropzone.options.proyectoDropzone = {
    url: '{{ route('admin.proyectos-articulados.storeMedia') }}',
    maxFilesize: 20, // MB
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 20
    },
    success: function (file, response) {
      $('form').find('input[name="proyecto"]').remove()
      $('form').append('<input type="hidden" name="proyecto" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="proyecto"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($proyectosArticulado) && $proyectosArticulado->proyecto)
      var file = {!! json_encode($proyectosArticulado->proyecto) !!}
          this.options.addedfile.call(this, file)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="proyecto" value="' + file.file_name + '">')
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