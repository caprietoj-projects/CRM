@extends('layouts.admin')
@section('content')
@can('reparacion_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.reparacions.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.reparacion.title_singular') }}
            </a>
            <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                {{ trans('global.app_csvImport') }}
            </button>
            @include('csvImport.modal', ['model' => 'Reparacion', 'route' => 'admin.reparacions.parseCsvImport'])
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.reparacion.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-Reparacion">
            <thead>
                <tr>
                    <th width="10">

                    </th>
                    <th>
                        {{ trans('cruds.reparacion.fields.activo') }}
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
                        {{ trans('cruds.reparacion.fields.tipo') }}
                    </th>
                    <th>
                        {{ trans('cruds.reparacion.fields.fecha') }}
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
@can('reparacion_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.reparacions.massDestroy') }}",
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
    ajax: "{{ route('admin.reparacions.index') }}",
    columns: [
      { data: 'placeholder', name: 'placeholder' },
{ data: 'activo_descripcion', name: 'activo.descripcion' },
{ data: 'activo.modelo', name: 'activo.modelo' },
{ data: 'activo.serial', name: 'activo.serial' },
{ data: 'activo.color', name: 'activo.color' },
{ data: 'activo.tipo', name: 'activo.tipo' },
{ data: 'tipo', name: 'tipo' },
{ data: 'fecha', name: 'fecha' },
{ data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
    orderCellsTop: true,
    order: [[ 1, 'asc' ]],
    pageLength: 100,
  };
  let table = $('.datatable-Reparacion').DataTable(dtOverrideGlobals);
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
});

</script>
@endsection