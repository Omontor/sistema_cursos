@extends('partials.template2')
@section ('header2')
  <title>Instructores</title>

  <style type="text/css">
    body {
    margin: 0;
    font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
    font-size: .88rem;
    font-weight: 400;
    line-height: 1.5;
    color: #495057;
    text-align: left;
    background-color: #eef1f3
}

.mt-100 {
    margin-top: 100px
}

.card {
    box-shadow: 0 0.46875rem 2.1875rem rgba(4, 9, 20, 0.03), 0 0.9375rem 1.40625rem rgba(4, 9, 20, 0.03), 0 0.25rem 0.53125rem rgba(4, 9, 20, 0.05), 0 0.125rem 0.1875rem rgba(4, 9, 20, 0.03);
    border-width: 0;
    transition: all .2s
}

.card-header:first-child {
    border-radius: calc(.25rem - 1px) calc(.25rem - 1px) 0 0
}

.card-header {
    display: flex;
    align-items: center;
    border-bottom-width: 1px;
    padding-top: 0;
    padding-bottom: 0;
    padding-right: .625rem;
    height: 3.5rem;
    background-color: #fff;
    border-bottom: 1px solid rgba(26, 54, 126, 0.125)
}

.card-body {
    flex: 1 1 auto;
    padding: 1.25rem
}

.flex-truncate {
    min-width: 0 !important
}

.d-block {
    display: block !important
}

a {
    color: #E91E63;
    text-decoration: none !important;
    background-color: transparent
}

.media img {
    width: 40px;
    height: auto
}

  </style>

@endsection  
@section('name')
Foro
@endsection
@section('content')
<!--Así es como se agrega la imagen de fondo en cada página -->
@section('background')
style="background-image: url(/images/blog.png);"
@endsection


<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-3">
                <div class="card-header pr-0 pl-0">
                    <div class="row no-gutters align-items-center w-100">
                        <div class="col font-weight-bold pl-3">Título</div>
                        <div class="d-none d-md-block col-6 text-muted">
                            <div class="row no-gutters align-items-center">
                                <div class="col-3">Respuestas</div>
                                <div class="col-3">Fecha</div>
                                <div class="col-6">Creado por:</div>
                            </div>
                        </div>
                    </div>
                </div>

                @forelse($threads as $thread)

                <div class="card-body py-3">
                    <div class="row no-gutters align-items-center">
                        <div class="col"><a href="javascript:void(0)" class="text-big font-weight-semibold" data-abc="true">{{$thread->title}}</a></div>
                        <div class="d-none d-md-block col-6">
                            <div class="row no-gutters align-items-center">
                                <div class="col-3">{{$thread->threadForumComments->count()}}</div>
                                <div class="col-3">{{$thread->created_at->diffForHumans()}}</div>
                                <div class="media col-6 align-items-center"> <img src="https://i.imgur.com/Ur43esv.jpg" alt="" class="d-block ui-w-30 rounded-circle">
                                    <div class="media-body flex-truncate ml-2"> <a href="javascript:void(0)" class="d-block text-truncate" data-abc="true">{{$thread->user->name}}</a>
                                        <div class="text-muted small text-truncate">{{$thread->user->userForumThreads->count()}} &nbsp;·&nbsp; <a href="javascript:void(0)" class="text-muted" data-abc="true">Posts</a></div>
                                    </div>
                                    <a href="#" class="btn btn-primary">Ver Post</a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                @if(!$loop->last)
                <hr class="m-0">
                @endif
                @empty
                @endforelse
          
            </div>
        </div>
    </div>
</div>

<br>
<br>
<br>
@endsection




@section('scripts')
@endsection

