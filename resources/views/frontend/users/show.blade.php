@extends('partials.template2')
@section ('header2')
  <title>   {{$user->name}}</title>
@endsection  
@section('name')
  {{$user->name}}
@endsection
@section('content')
<!--Así es como se agrega la imagen de fondo en cada página -->
@section('background')
style="background-image: url(/images/instructors.png);"
@endsection
<section class="testimonial testimonial-style5 clearfix">
        <div class="container">
            <div class="col-left">
                <div class="featured-post">
                    <img src="{{isset($user->avatar) ?$user->avatar->getUrl() : "/images/cohete.png"}}" alt="images">
                    <div class="stand-behind">

                    </div>
                </div>
            </div>
            <div class="col-right">
                <div class="title-section">
                    <div class="flat-title medium heading-type15"> 
   {{$user->name}} </div>
   <h3>{{$user->career}}</h3>
   <br>
        <div>
            {!!$user->bio!!}
                     </div>

                     <hr>
                
                </div>

                           <div class="row">

                                    @if($user->facebook)
                                 
                                      <div class="col">  <a href="{{$user->facebook}}" target="_blank"><i style="color:darkblue;" class="fa fa-facebook-f fa-3x" aria-hidden="true"></i> </a>
                                   </div>
                                    @endif
                                     @if($user->twitter)
                                 
                                      <div class="col">  <a href="{{$user->twitter}}" target="_blank"><i style="color:darkblue;" class="fa fa-twitter fa-3x" aria-hidden="true"></i> </a>
                                   </div>
                                     @endif
                                     @if($user->instagram)
                                 
                                      <div class="col">  <a href="{{$user->instagram}}" target="_blank"><i style="color:darkblue;" class="fa fa-instagram fa-3x" aria-hidden="true"></i></a>
                                   </div>
                                    @endif 

                                    @if($user->linkedin)
                                 
                                      <div class="col">  <a href="{{$user->linkedin}}" target="_blank"><i style="color:darkblue;" class="fa fa-linkedin fa-3x" aria-hidden="true"></i></a>
                                   </div>
                                   @endif                            
                                   @if($user->website)
                                 
                                      <div class="col">  <a href="{{$user->website}}" target="_blank"><i style="color:darkblue;" class="fa fa-globe fa-3x" aria-hidden="true"></i></a>
                                   </div>
                                   @endif
  
                                    
                                    </div>


       
            </div>

        </div>

    </section><!-- testimonial -->
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Temas creados en el foro
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-ForumThread">
                           
                            <tbody>
                                @foreach($user->userForumThreads as $key => $forumThread)
                                    <tr data-entry-id="{{ $forumThread->id }}">

                                        <td>
                                            {{ $forumThread->title ?? '' }}
                                        </td>
                                        <td>
                                          
                                                <a class="btn btn-xs btn-primary" href="{{ route('foro.show', $forumThread->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                       

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
<br>
<br>
<br>
@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('forum_thread_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('frontend.forum-threads.massDestroy') }}",
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
  let table = $('.datatable-ForumThread:not(.ajaxTable)').DataTable({ buttons: dtButtons })
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

<br>


@endsection
