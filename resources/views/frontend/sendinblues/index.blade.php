@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @can('sendinblue_create')
                <div style="margin-bottom: 10px;" class="row">
                    <div class="col-lg-12">
                        <a class="btn btn-success" href="{{ route('frontend.sendinblues.create') }}">
                            {{ trans('global.add') }} {{ trans('cruds.sendinblue.title_singular') }}
                        </a>
                    </div>
                </div>
            @endcan
            <div class="card">
                <div class="card-header">
                    {{ trans('cruds.sendinblue.title_singular') }} {{ trans('global.list') }}
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-Sendinblue">
                            <thead>
                                <tr>
                                    <th>
                                        {{ trans('cruds.sendinblue.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.sendinblue.fields.host') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.sendinblue.fields.user') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.sendinblue.fields.api') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.sendinblue.fields.password') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.sendinblue.fields.security') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($sendinblues as $key => $sendinblue)
                                    <tr data-entry-id="{{ $sendinblue->id }}">
                                        <td>
                                            {{ $sendinblue->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $sendinblue->host ?? '' }}
                                        </td>
                                        <td>
                                            {{ $sendinblue->user ?? '' }}
                                        </td>
                                        <td>
                                            {{ $sendinblue->api ?? '' }}
                                        </td>
                                        <td>
                                            {{ $sendinblue->password ?? '' }}
                                        </td>
                                        <td>
                                            {{ $sendinblue->security ?? '' }}
                                        </td>
                                        <td>
                                            @can('sendinblue_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('frontend.sendinblues.show', $sendinblue->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('sendinblue_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('frontend.sendinblues.edit', $sendinblue->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('sendinblue_delete')
                                                <form action="{{ route('frontend.sendinblues.destroy', $sendinblue->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
    </div>
</div>
@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('sendinblue_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('frontend.sendinblues.massDestroy') }}",
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
  let table = $('.datatable-Sendinblue:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection