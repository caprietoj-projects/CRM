@extends('layouts.admin')
@section('content')
@can('maintenance_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.maintenances.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.maintenance.title_singular') }}
            </a>
            <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                {{ trans('global.app_csvImport') }}
            </button>
            @include('csvImport.modal', ['model' => 'Maintenance', 'route' => 'admin.maintenances.parseCsvImport'])
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.maintenance.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-Maintenance">
            <thead>
                <tr>
                    <th width="10">

                    </th>
                    <th>
                        {{ trans('cruds.maintenance.fields.area') }}
                    </th>
                    <th>
                        {{ trans('cruds.fichasTecnica.fields.modelo') }}
                    </th>
                    <th>
                        {{ trans('cruds.fichasTecnica.fields.serial') }}
                    </th>
                    <th>
                        {{ trans('cruds.maintenance.fields.tipo') }}
                    </th>
                    <th>
                        {{ trans('cruds.maintenance.fields.quien_lo_realiza') }}
                    </th>
                    <th>
                        {{ trans('cruds.agente.fields.cargo') }}
                    </th>
                    <th>
                        {{ trans('cruds.agente.fields.correo') }}
                    </th>
                    <th>
                        {{ trans('cruds.maintenance.fields.fecha') }}
                    </th>
                    <th>
                        {{ trans('cruds.maintenance.fields.descripcion') }}
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
@can('maintenance_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.maintenances.massDestroy') }}",
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
    ajax: "{{ route('admin.maintenances.index') }}",
    columns: [
      { data: 'placeholder', name: 'placeholder' },
{ data: 'area_encargado', name: 'area.encargado' },
{ data: 'area.modelo', name: 'area.modelo' },
{ data: 'area.serial', name: 'area.serial' },
{ data: 'tipo', name: 'tipo' },
{ data: 'quien_lo_realiza_nombre', name: 'quien_lo_realiza.nombre' },
{ data: 'quien_lo_realiza.cargo', name: 'quien_lo_realiza.cargo' },
{ data: 'quien_lo_realiza.correo', name: 'quien_lo_realiza.correo' },
{ data: 'fecha', name: 'fecha' },
{ data: 'descripcion', name: 'descripcion' },
{ data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
    orderCellsTop: true,
    order: [[ 1, 'asc' ]],
    pageLength: 100,
  };
  let table = $('.datatable-Maintenance').DataTable(dtOverrideGlobals);
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
});

</script>
@endsection