@extends('layouts.admin')
@section('content')
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
            <table class=" table table-bordered table-striped table-hover datatable datatable-OnlineClass">
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
                    <tr>
                        <td>
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                            <select class="search">
                                <option value>{{ trans('global.all') }}</option>
                                @foreach($courses as $key => $item)
                                    <option value="{{ $item->title }}">{{ $item->title }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                            <select class="search" strict="true">
                                <option value>{{ trans('global.all') }}</option>
                                @foreach(App\Models\OnlineClass::CLASSROOM_SELECT as $key => $item)
                                    <option value="{{ $item }}">{{ $item }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                        </td>
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



@endsection
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
  let table = $('.datatable-OnlineClass:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
let visibleColumnsIndexes = null;
$('.datatable thead').on('input', '.search', function () {
      let strict = $(this).attr('strict') || false
      let value = strict && this.value ? "^" + this.value + "$" : this.value

      let index = $(this).parent().index()
      if (visibleColumnsIndexes !== null) {
        index = visibleColumnsIndexes[index]
      }

      table
        .column(index)
        .search(value, strict)
        .draw()
  });
table.on('column-visibility.dt', function(e, settings, column, state) {
      visibleColumnsIndexes = []
      table.columns(":visible").every(function(colIdx) {
          visibleColumnsIndexes.push(colIdx);
      });
  })
})

</script>
@endsection