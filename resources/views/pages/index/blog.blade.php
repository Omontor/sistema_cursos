<section class="latest-blog cl-dots1 latest-blog-type1 latest-blog-style1">
        <div class="container">
            <div class="title-section">
                <div class="flat-title small heading-type4">
                    Noticias Recientes
                          <div class=" small float-right">
                  <a href="{{route('blog')}}" class="btn btn-dark btn-sm">Todas las Noticias</a> 
                </div>
                </div>                

          
            </div>
            <div class="flat-carousel-box data-effect clearfix" data-gap="30" data-column="2" data-column2="2" data-column3="1" data-column4="1" data-dots="true" data-auto="false" data-nav="false">
                <div class="owl-carousel">
                	@forelse($posts as $post)

                    <article class="post post-style1 post-bg">
                        <div class="bg clearfix">
         
                            <div class="featured-post">
                                <img src="{{$post->thumb_image->getUrl()}}" alt="images">
                            </div>
                        </div>
                        <div class="post-content clearfix">
                            <div class="entry-info cleafix">
                                <div class="avatar">
                                    <img src="/images/cohete.png" alt="images" style="object-fit: cover; max-width: 50px;">
                                </div>
                                <div class="post-title">
                                    <h5>
                                        <a href="{{route('blog.show', $post->slug)}}" class="lt-sp04">{{$post->title}}</a>
                                    </h5>
                                </div>
                            </div>
                            	<br>
                            <div class="avatar">
                                <a href="{{route('blog.show', $post->slug)}}" class="btn btn-dark btn-block">Ver más</a>
                            </div>
                            <br>
                            <div class="float-left">
                               Categoría:
                            </div>
                             <div class=" cl-fe5e5f float-right">
                                {{$post->category->title}}
                            </div>
                        </div>
                    </article>
       				@empty
       				@endforelse
                </div>
            </div>
        </div>
    </section><!-- latest-blog -->