<div class="m-3">
    @can('fichas_tecnica_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.fichas-tecnicas.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.fichasTecnica.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="card">
        <div class="card-header">
            {{ trans('cruds.fichasTecnica.title_singular') }} {{ trans('global.list') }}
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable datatable-mantenimientoPreventivosFichasTecnicas">
                    <thead>
                        <tr>
                            <th width="10">

                            </th>
                            <th>
                                {{ trans('cruds.fichasTecnica.fields.encargado') }}
                            </th>
                            <th>
                                {{ trans('cruds.fichasTecnica.fields.nombre_del_equipo') }}
                            </th>
                            <th>
                                {{ trans('cruds.fichasTecnica.fields.modelo') }}
                            </th>
                            <th>
                                {{ trans('cruds.fichasTecnica.fields.serial') }}
                            </th>
                            <th>
                                {{ trans('cruds.fichasTecnica.fields.sede') }}
                            </th>
                            <th>
                                {{ trans('cruds.fichasTecnica.fields.componentes') }}
                            </th>
                            <th>
                                {{ trans('cruds.fichasTecnica.fields.observaciones') }}
                            </th>
                            <th>
                                {{ trans('cruds.fichasTecnica.fields.mantenimiento_preventivo') }}
                            </th>
                            <th>
                                {{ trans('cruds.fichasTecnica.fields.mantenimiento_correctivo') }}
                            </th>
                            <th>
                                {{ trans('cruds.fichasTecnica.fields.descripcion_del_mantenimiento') }}
                            </th>
                            <th>
                                {{ trans('cruds.fichasTecnica.fields.quien_lo_realiza') }}
                            </th>
                            <th>
                                {{ trans('cruds.fichasTecnica.fields.estado_del_activo') }}
                            </th>
                            <th>
                                {{ trans('cruds.fichasTecnica.fields.mantenimiento_preventivos') }}
                            </th>
                            <th>
                                &nbsp;
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($fichasTecnicas as $key => $fichasTecnica)
                            <tr data-entry-id="{{ $fichasTecnica->id }}">
                                <td>

                                </td>
                                <td>
                                    {{ $fichasTecnica->encargado ?? '' }}
                                </td>
                                <td>
                                    {{ $fichasTecnica->nombre_del_equipo ?? '' }}
                                </td>
                                <td>
                                    {{ $fichasTecnica->modelo ?? '' }}
                                </td>
                                <td>
                                    {{ $fichasTecnica->serial ?? '' }}
                                </td>
                                <td>
                                    {{ $fichasTecnica->sede->sede ?? '' }}
                                </td>
                                <td>
                                    @foreach($fichasTecnica->componentes as $key => $item)
                                        <span class="badge badge-info">{{ $item->nombre_del_activo }}</span>
                                    @endforeach
                                </td>
                                <td>
                                    {{ $fichasTecnica->observaciones ?? '' }}
                                </td>
                                <td>
                                    {{ $fichasTecnica->mantenimiento_preventivo ?? '' }}
                                </td>
                                <td>
                                    {{ $fichasTecnica->mantenimiento_correctivo ?? '' }}
                                </td>
                                <td>
                                    {{ $fichasTecnica->descripcion_del_mantenimiento ?? '' }}
                                </td>
                                <td>
                                    {{ $fichasTecnica->quien_lo_realiza->nombre ?? '' }}
                                </td>
                                <td>
                                    {{ App\Models\FichasTecnica::ESTADO_DEL_ACTIVO_RADIO[$fichasTecnica->estado_del_activo] ?? '' }}
                                </td>
                                <td>
                                    @foreach($fichasTecnica->mantenimiento_preventivos as $key => $item)
                                        <span class="badge badge-info">{{ $item->due_date }}</span>
                                    @endforeach
                                </td>
                                <td>
                                    @can('fichas_tecnica_show')
                                        <a class="btn btn-xs btn-primary" href="{{ route('admin.fichas-tecnicas.show', $fichasTecnica->id) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan

                                    @can('fichas_tecnica_edit')
                                        <a class="btn btn-xs btn-info" href="{{ route('admin.fichas-tecnicas.edit', $fichasTecnica->id) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan

                                    @can('fichas_tecnica_delete')
                                        <form action="{{ route('admin.fichas-tecnicas.destroy', $fichasTecnica->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('fichas_tecnica_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.fichas-tecnicas.massDestroy') }}",
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
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-mantenimientoPreventivosFichasTecnicas:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection