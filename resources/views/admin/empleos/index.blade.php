@extends('layouts.admin')
@section('content')
@can('empleo_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.empleos.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.empleo.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.empleo.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Empleo">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.empleo.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.empleo.fields.vacante') }}
                        </th>
                        <th>
                            {{ trans('cruds.empleo.fields.icono') }}
                        </th>
                        <th>
                            {{ trans('cruds.empleo.fields.descripcion') }}
                        </th>
                        <th>
                            {{ trans('cruds.empleo.fields.tiempo') }}
                        </th>
                        <th>
                            {{ trans('cruds.empleo.fields.empresa') }}
                        </th>
                        <th>
                            {{ trans('cruds.empleo.fields.salario') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($empleos as $key => $empleo)
                        <tr data-entry-id="{{ $empleo->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $empleo->id ?? '' }}
                            </td>
                            <td>
                                {{ $empleo->vacante ?? '' }}
                            </td>
                            <td>
                                {{ $empleo->icono ?? '' }}
                            </td>
                            <td>
                                {{ $empleo->descripcion ?? '' }}
                            </td>
                            <td>
                                {{ $empleo->tiempo ?? '' }}
                            </td>
                            <td>
                                {{ $empleo->empresa ?? '' }}
                            </td>
                            <td>
                                {{ $empleo->salario ?? '' }}
                            </td>
                            <td>
                                @can('empleo_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.empleos.show', $empleo->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('empleo_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.empleos.edit', $empleo->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('empleo_delete')
                                    <form action="{{ route('admin.empleos.destroy', $empleo->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('empleo_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.empleos.massDestroy') }}",
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
  let table = $('.datatable-Empleo:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection