<div class="m-3">
    @can('forum_thread_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.forum-threads.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.forumThread.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="card">
        <div class="card-header">
            {{ trans('cruds.forumThread.title_singular') }} {{ trans('global.list') }}
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable datatable-userForumThreads">
                    <thead>
                        <tr>
                            <th width="10">

                            </th>
                            <th>
                                {{ trans('cruds.forumThread.fields.id') }}
                            </th>
                            <th>
                                {{ trans('cruds.forumThread.fields.user') }}
                            </th>
                            <th>
                                {{ trans('cruds.forumThread.fields.title') }}
                            </th>
                            <th>
                                {{ trans('cruds.forumThread.fields.category') }}
                            </th>
                            <th>
                                &nbsp;
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($forumThreads as $key => $forumThread)
                            <tr data-entry-id="{{ $forumThread->id }}">
                                <td>

                                </td>
                                <td>
                                    {{ $forumThread->id ?? '' }}
                                </td>
                                <td>
                                    {{ $forumThread->user->name ?? '' }}
                                </td>
                                <td>
                                    {{ $forumThread->title ?? '' }}
                                </td>
                                <td>
                                    {{ $forumThread->category->name ?? '' }}
                                </td>
                                <td>
                                    @can('forum_thread_show')
                                        <a class="btn btn-xs btn-primary" href="{{ route('admin.forum-threads.show', $forumThread->id) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan

                                    @can('forum_thread_edit')
                                        <a class="btn btn-xs btn-info" href="{{ route('admin.forum-threads.edit', $forumThread->id) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan

                                    @can('forum_thread_delete')
                                        <form action="{{ route('admin.forum-threads.destroy', $forumThread->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('forum_thread_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.forum-threads.massDestroy') }}",
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
  let table = $('.datatable-userForumThreads:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection