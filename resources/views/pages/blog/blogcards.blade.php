<div class="blog-bl content-blog">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="site-content">
                        <!--  Noticia -->
                        @forelse($posts as $post)
                        <article class="post-blog box-shadow-type2">
                            <div class="featured-post">
                                <img src="{{$post->thumb_image->getUrl()}}" alt="images">
                            </div>
                            <div class="content-post content-post-blog">
                                <div class="post-meta">
                                    <div class="clendar-wrap">
                                        <div class="day">
                                            {{$post->created_at->format('d')}}
                                        </div>
                                        <div class="month">
                                          {{$post->created_at->format('F')}}
                                        </div>
                                    </div>
                                    <ul class="social">
                                        <center>
                                        <li><i class="fa fa-1" aria-hidden="true"></i></li>
                                        </center>
                                    </ul>
                                </div>
                                <div class="content-post-inner">
                                    <div class="poster lt-sp0029">
                                       Categoría: <span><a href="/">{{$post->category->title}}</a></span>
                                    </div>
                                    <h3 class="entry-title">
                                        <a href="{{route('blog.show', $post->slug)}}" class="lt-sp0023">{{$post->title}}</a>
                                    </h3>
                                    <p>
                                       {{$post->excerpt}}
                                    </p>
                                    <div class="flat-button">
                                        <a href="{{route('blog.show', $post->slug)}}">Leer</a>
                                    </div>
                                </div>
                            </div>
                        </article>
                        @empty
                        No hay registros para mostrar
                        @endforelse
                        <!--  End Noticia -->
                    
                    
                    </div>
                    <!--Paginación-->
                    <div class="pd-pagination-blog pagination">
      {{$posts->links()}}
 
                    </div>
                </div>
                @include('pages.blog.sidebar')
            </div>
        </div>
    </div><!-- content-blog -->
   