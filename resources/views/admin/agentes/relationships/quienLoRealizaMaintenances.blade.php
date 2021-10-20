<div class="m-3">
    @can('maintenance_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.maintenances.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.maintenance.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="card">
        <div class="card-header">
            {{ trans('cruds.maintenance.title_singular') }} {{ trans('global.list') }}
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable datatable-quienLoRealizaMaintenances">
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
                    <tbody>
                        @foreach($maintenances as $key => $maintenance)
                            <tr data-entry-id="{{ $maintenance->id }}">
                                <td>

                                </td>
                                <td>
                                    {{ $maintenance->area->encargado ?? '' }}
                                </td>
                                <td>
                                    {{ $maintenance->area->modelo ?? '' }}
                                </td>
                                <td>
                                    {{ $maintenance->area->serial ?? '' }}
                                </td>
                                <td>
                                    {{ App\Models\Maintenance::TIPO_SELECT[$maintenance->tipo] ?? '' }}
                                </td>
                                <td>
                                    {{ $maintenance->quien_lo_realiza->nombre ?? '' }}
                                </td>
                                <td>
                                    {{ $maintenance->quien_lo_realiza->cargo ?? '' }}
                                </td>
                                <td>
                                    {{ $maintenance->quien_lo_realiza->correo ?? '' }}
                                </td>
                                <td>
                                    {{ $maintenance->fecha ?? '' }}
                                </td>
                                <td>
                                    {{ $maintenance->descripcion ?? '' }}
                                </td>
                                <td>
                                    @can('maintenance_show')
                                        <a class="btn btn-xs btn-primary" href="{{ route('admin.maintenances.show', $maintenance->id) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan

                                    @can('maintenance_edit')
                                        <a class="btn btn-xs btn-info" href="{{ route('admin.maintenances.edit', $maintenance->id) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan

                                    @can('maintenance_delete')
                                        <form action="{{ route('admin.maintenances.destroy', $maintenance->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                            <input type="hidden" name="_method" value="DELETE">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                        </form>
                                    @endcan

                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('maintenance_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.maintenances.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
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

  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'asc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-quienLoRealizaMaintenances:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection