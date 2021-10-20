<div class="m-3">
    @can('reparacion_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.reparacions.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.reparacion.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="card">
        <div class="card-header">
            {{ trans('cruds.reparacion.title_singular') }} {{ trans('global.list') }}
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable datatable-activoReparacions">
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
                    <tbody>
                        @foreach($reparacions as $key => $reparacion)
                            <tr data-entry-id="{{ $reparacion->id }}">
                                <td>

                                </td>
                                <td>
                                    {{ $reparacion->activo->descripcion ?? '' }}
                                </td>
                                <td>
                                    {{ $reparacion->activo->modelo ?? '' }}
                                </td>
                                <td>
                                    {{ $reparacion->activo->serial ?? '' }}
                                </td>
                                <td>
                                    {{ $reparacion->activo->color ?? '' }}
                                </td>
                                <td>
                                    {{ $reparacion->activo->tipo ?? '' }}
                                </td>
                                <td>
                                    {{ App\Models\Reparacion::TIPO_SELECT[$reparacion->tipo] ?? '' }}
                                </td>
                                <td>
                                    {{ $reparacion->fecha ?? '' }}
                                </td>
                                <td>
                                    @can('reparacion_show')
                                        <a class="btn btn-xs btn-primary" href="{{ route('admin.reparacions.show', $reparacion->id) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan

                                    @can('reparacion_edit')
                                        <a class="btn btn-xs btn-info" href="{{ route('admin.reparacions.edit', $reparacion->id) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan

                                    @can('reparacion_delete')
                                        <form action="{{ route('admin.reparacions.destroy', $reparacion->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('reparacion_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.reparacions.massDestroy') }}",
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
  let table = $('.datatable-activoReparacions:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection