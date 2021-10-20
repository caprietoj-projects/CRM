@extends('layouts.admin')
@section('content')
@can('ficha_tecnica_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.ficha-tecnicas.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.fichaTecnica.title_singular') }}
            </a>
            <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                {{ trans('global.app_csvImport') }}
            </button>
            @include('csvImport.modal', ['model' => 'FichaTecnica', 'route' => 'admin.ficha-tecnicas.parseCsvImport'])
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.fichaTecnica.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-FichaTecnica">
            <thead>
                <tr>
                    <th width="10">

                    </th>
                    <th>
                        {{ trans('cruds.fichaTecnica.fields.descripcion') }}
                    </th>
                    <th>
                        {{ trans('cruds.fichaTecnica.fields.grupo') }}
                    </th>
                    <th>
                        {{ trans('cruds.fichaTecnica.fields.modelo') }}
                    </th>
                    <th>
                        {{ trans('cruds.fichaTecnica.fields.serial') }}
                    </th>
                    <th>
                        {{ trans('cruds.fichaTecnica.fields.color') }}
                    </th>
                    <th>
                        {{ trans('cruds.fichaTecnica.fields.tipo') }}
                    </th>
                    <th>
                        {{ trans('cruds.fichaTecnica.fields.ubicacion') }}
                    </th>
                    <th>
                        {{ trans('cruds.fichaTecnica.fields.encargado') }}
                    </th>
                    <th>
                        {{ trans('cruds.agente.fields.cargo') }}
                    </th>
                    <th>
                        {{ trans('cruds.agente.fields.correo') }}
                    </th>
                    <th>
                        {{ trans('cruds.fichaTecnica.fields.foto') }}
                    </th>
                    <th>
                        &nbsp;
                    </th>
                </tr>
            </thead>
        </table>
    </div>
</div>



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('ficha_tecnica_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.ficha-tecnicas.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).data(), function (entry) {
          return entry.id
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  let dtOverrideGlobals = {
    buttons: dtButtons,
    processing: true,
    serverSide: true,
    retrieve: true,
    aaSorting: [],
    ajax: "{{ route('admin.ficha-tecnicas.index') }}",
    columns: [
      { data: 'placeholder', name: 'placeholder' },
{ data: 'descripcion', name: 'descripcion' },
{ data: 'grupo_nombre', name: 'grupo.nombre' },
{ data: 'modelo', name: 'modelo' },
{ data: 'serial', name: 'serial' },
{ data: 'color', name: 'color' },
{ data: 'tipo', name: 'tipo' },
{ data: 'ubicacion_sede', name: 'ubicacion.sede' },
{ data: 'encargado_nombre', name: 'encargado.nombre' },
{ data: 'encargado.cargo', name: 'encargado.cargo' },
{ data: 'encargado.correo', name: 'encargado.correo' },
{ data: 'foto', name: 'foto', sortable: false, searchable: false },
{ data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
    orderCellsTop: true,
    order: [[ 1, 'asc' ]],
    pageLength: 100,
  };
  let table = $('.datatable-FichaTecnica').DataTable(dtOverrideGlobals);
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
});

</script>
@endsection