<div class="m-3">
    @can('progress_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.progress.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.progress.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="card">
        <div class="card-header">
            {{ trans('cruds.progress.title_singular') }} {{ trans('global.list') }}
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable datatable-lessonProgress">
                    <thead>
                        <tr>
                            <th width="10">

                            </th>
                            <th>
                                {{ trans('cruds.progress.fields.id') }}
                            </th>
                            <th>
                                {{ trans('cruds.progress.fields.user') }}
                            </th>
                            <th>
                                {{ trans('cruds.progress.fields.lesson') }}
                            </th>
                            <th>
                                {{ trans('cruds.progress.fields.date') }}
                            </th>
                            <th>
                                {{ trans('cruds.progress.fields.is_finished') }}
                            </th>
                            <th>
                                &nbsp;
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($progress as $key => $progress)
                            <tr data-entry-id="{{ $progress->id }}">
                                <td>

                                </td>
                                <td>
                                    {{ $progress->id ?? '' }}
                                </td>
                                <td>
                                    {{ $progress->user->name ?? '' }}
                                </td>
                                <td>
                                    {{ $progress->lesson->title ?? '' }}
                                </td>
                                <td>
                                    {{ $progress->date ?? '' }}
                                </td>
                                <td>
                                    <span style="display:none">{{ $progress->is_finished ?? '' }}</span>
                                    <input type="checkbox" disabled="disabled" {{ $progress->is_finished ? 'checked' : '' }}>
                                </td>
                                <td>
                                    @can('progress_show')
                                        <a class="btn btn-xs btn-primary" href="{{ route('admin.progress.show', $progress->id) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan

                                    @can('progress_edit')
                                        <a class="btn btn-xs btn-info" href="{{ route('admin.progress.edit', $progress->id) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan

                                    @can('progress_delete')
                                        <form action="{{ route('admin.progress.destroy', $progress->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('progress_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.progress.massDestroy') }}",
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
  let table = $('.datatable-lessonProgress:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection