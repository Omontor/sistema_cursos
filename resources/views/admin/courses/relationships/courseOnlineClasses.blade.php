<div class="m-3">
    @can('online_class_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.online-classes.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.onlineClass.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="card">
        <div class="card-header">
            {{ trans('cruds.onlineClass.title_singular') }} {{ trans('global.list') }}
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable datatable-courseOnlineClasses">
                    <thead>
                        <tr>
                            <th width="10">

                            </th>
                            <th>
                                {{ trans('cruds.onlineClass.fields.id') }}
                            </th>
                            <th>
                                {{ trans('cruds.onlineClass.fields.course') }}
                            </th>
                            <th>
                                {{ trans('cruds.onlineClass.fields.id_reunion') }}
                            </th>
                            <th>
                                {{ trans('cruds.onlineClass.fields.title') }}
                            </th>
                            <th>
                                {{ trans('cruds.onlineClass.fields.excerpt') }}
                            </th>
                            <th>
                                {{ trans('cruds.onlineClass.fields.duration') }}
                            </th>
                            <th>
                                {{ trans('cruds.onlineClass.fields.classroom') }}
                            </th>
                            <th>
                                {{ trans('cruds.onlineClass.fields.password') }}
                            </th>
                            <th>
                                {{ trans('cruds.onlineClass.fields.max_student') }}
                            </th>
                            <th>
                                {{ trans('cruds.onlineClass.fields.start') }}
                            </th>
                            <th>
                                &nbsp;
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($onlineClasses as $key => $onlineClass)
                            <tr data-entry-id="{{ $onlineClass->id }}">
                                <td>

                                </td>
                                <td>
                                    {{ $onlineClass->id ?? '' }}
                                </td>
                                <td>
                                    {{ $onlineClass->course->title ?? '' }}
                                </td>
                                <td>
                                    {{ $onlineClass->id_reunion ?? '' }}
                                </td>
                                <td>
                                    {{ $onlineClass->title ?? '' }}
                                </td>
                                <td>
                                    {{ $onlineClass->excerpt ?? '' }}
                                </td>
                                <td>
                                    {{ $onlineClass->duration ?? '' }}
                                </td>
                                <td>
                                    {{ App\Models\OnlineClass::CLASSROOM_SELECT[$onlineClass->classroom] ?? '' }}
                                </td>
                                <td>
                                    {{ $onlineClass->password ?? '' }}
                                </td>
                                <td>
                                    {{ $onlineClass->max_student ?? '' }}
                                </td>
                                <td>
                                    {{ $onlineClass->start ?? '' }}
                                </td>
                                <td>
                                    @can('online_class_show')
                                        <a class="btn btn-xs btn-primary" href="{{ route('admin.online-classes.show', $onlineClass->id) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan

                                    @can('online_class_edit')
                                        <a class="btn btn-xs btn-info" href="{{ route('admin.online-classes.edit', $onlineClass->id) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan

                                    @can('online_class_delete')
                                        <form action="{{ route('admin.online-classes.destroy', $onlineClass->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('online_class_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.online-classes.massDestroy') }}",
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
  let table = $('.datatable-courseOnlineClasses:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection