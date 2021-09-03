@extends('partials.template2')
@section ('header2')
  <title>{{$thread->title}}</title>

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

<div class="blog-single content-blog">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="site-content clearfix">
                        <article class="post post-blog-single">
                            <div class="content-blog-single">
                                <div class="content-blog-single-inner">
                                    <div class="content-blog-single-wrap">
                                        <h1 class="title pd-title-single">
                                            <a href="#">{{$thread->title}}</a>  
                                        </h1>
                             
                                      {!!$thread->content!!}
                                      <br>
<a href="{{route('frontend.foro.contestar', $thread->id)}}" class="btn btn-primary pull-right">Contestar</a>
<br>
<br>
                                      <hr>  

@forelse($comments as $comment)


    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <div class="card-header">
                    <div class="media flex-wrap w-100 align-items-center"> <img src="https://i.imgur.com/iNmBizf.jpg" class="d-block ui-w-40 rounded-circle" alt="">
                        <div class="media-body ml-3"> <a href="javascript:void(0)" data-abc="true">{{$comment->user->name}} </a>

                            <div class="text-muted small" style="margin-bottom:10px; margin-top: -10px;">{{$comment->user->userForumComments->count()}} Respuestas  <small class="pull-right"> Este usuario ha creado {{$comment->user->userForumThreads->count()}} posts</small></div>

                        </div>
                        <div class="text-muted small ml-3">
                           
                        </div>
                    </div>
                </div>
                <div class="card-body">
                        {!!$comment->content!!}

                    @if($comment->updated_at != $comment->created_at)
                    <br>
                    <hr>

                    <h6 style="pull-right">Post editado el: {{$comment->updated_at->format('l d m Y')}}</h6>
                    @endif    
                    
                </div>
                <div class="card-footer d-flex flex-wrap justify-content-between align-items-center px-0 pt-0 pb-3">
                    <div class="px-4 pt-3"> <div>Miembro desde: <strong>{{$comment->user->created_at->diffForHumans()}}</strong></div>  </div>
                    <div class="px-4 pt-3">

                        @if($comment->user->id != Auth::user()->id)
                        Posteado: {{$comment->created_at->diffForHumans()}}  
                        @else
                        <a href="{{route('frontend.foro.comment.editar', $comment->id)}}" class="btn btn-secondary">Editar</a>  
                        <a href="{{route('frontend.foro.comment.eliminar', $comment->id)}}" class="btn btn-danger" onclick="return confirm('Por favor confirma que deseas eliminar tu comentario, esta acción no se puede deshacer.')">Eliminar</a>  
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@empty
@endforelse
                                        <a href="{{route('frontend.foro.contestar', $thread->id)}}" class="btn btn-primary pull-right">Contestar</a>
                                    </div>
                                </div>
                            </div>
                        </article>

                    </div>
<center>

{{$comments->links()}}
</center>
                </div>
            </div>
        </div>
    </div><!-- blog-single -->

@endsection




@section('scripts')
@endsection

