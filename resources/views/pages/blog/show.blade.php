@extends('partials.template2')
@section ('header2')
  <title>Instructores</title>
@endsection  
@section('name')
{{$post->tilte}}
@endsection
@section('content')
<!--Así es como se agrega la imagen de fondo en cada página -->
@section('background')
style="background-image: url({{$post->banner_image->getUrl()}});"
@endsection
    
<div style="padding-top:30px;">
  
</div>

<div class="blog-single content-blog">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="site-content clearfix">
                        <article class="post post-blog-single">
                            <div class="featured-post post-img">
                                <img src="{{$post->thumb_image->getUrl()}}" alt="images">
                            </div>
                            <div class="content-blog-single">
                                <ul class="social social-blog-single pd-top8">
                                    <li><i class="fa fa-facebook" aria-hidden="true"></i></li>
                                    <li><i class="fa fa-twitter" aria-hidden="true"></i></li>
                                    <li><i class="fa fa-instagram" aria-hidden="true"></i></li>
                                    <li><i class="fa fa-google-plus" aria-hidden="true"></i></li>
                                </ul>
                                <div class="content-blog-single-inner">
                                    <div class="content-blog-single-wrap">
                                        <h1 class="title pd-title-single">
                                            <a href="#">{{$post->title}}</a>
                                        </h1>
                             
                                      {!!$post->description!!}
                                        <div class="blog-single-poster">
                                            <div class="blog-single-poster-wrap">
                                                <div class="avtar-poster">
                                                    <img src="images/blog-single/01.png" alt="images">
                                                </div>
                                                <div class="info-poster">
                                                    <div class="name">
                                                        Basil Thump
                                                    </div>
                                                    <div class="position">
                                                        Web engineer. June 6, 2018
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="respond" class="comment-respond">
                                        <h3 id="reply-title" class="comment-reply-title mg-bottom24">
                                            Post A Comment
                                        </h3>
                                        <form action="#" method="post" class="comments">
                                            <div class="text-wrap clearfix">
                                                <div class="full-name-wrap">
                                                    <input type="text" class="full-name" placeholder="Full name">
                                                </div>
                                                <div class="email-address-wrap">
                                                    <input type="text" class="email-address" placeholder="Email Address">
                                                </div>
                                            </div>
                                            <div class="message-wrap">
                                                <textarea name="comment" id="comment-message" rows="8" placeholder="Type here Message"></textarea>
                                            </div>
                                            <div class="mg-top30">
                                                <button class="btn btn-post-comment box-shadow-type1">
                                                    Post Comment
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </article>
                    </div>
                    <div class="related-posts">
                        <div class="title">
                            Related Posts
                        </div>
                        <div class="flat-testimonial-carousel">
                            <div class="flat-carousel-box data-effect clearfix" data-gap="30" data-column="2" data-column2="2" data-column3="1"  data-column4="1" data-dots="false" data-auto="false">
                                <div class="owl-carousel">
                                    <article class="post related-posts-wrap">
                                        <div class="post-border">
                                            <div class="featured-post">
                                                <img src="images/blog-single/02.png" alt="images">
                                            </div>
                                            <div class="content-related-post">
                                                <div class="related-post-inner">
                                                    <h5 class="post-title lt-sp025">
                                                        <a href="#">5 Tips To Improve Your Design Skills</a>
                                                    </h5>
                                                    <div class="text">
                                                        Tips To Improve Your Design Skills. Learn to identify good design. If you want to create great designs, first you need to learn.
                                                    </div>
                                                    <div class="read-more">
                                                        <a href="#">Read more</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </article>
                                    <article class="post related-posts-wrap">
                                        <div class="post-border">
                                            <div class="featured-post">
                                                <img src="images/blog-single/03.png" alt="images">
                                            </div>
                                            <div class="content-related-post">
                                                <div class="related-post-inner">
                                                    <h5 class="post-title lt-sp025">
                                                        <a href="#">5 Tips To Improve Your Design Skills</a>
                                                    </h5>
                                                    <div class="text">
                                                        Tips To Improve Your Design Skills. Learn to identify good design. If you want to create great designs, first you need to learn.
                                                    </div>
                                                    <div class="read-more">
                                                        <a href="#">Read more</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </article>
                                    <article class="post related-posts-wrap">
                                        <div class="post-border">
                                            <div class="featured-post">
                                                <img src="images/blog-single/02.png" alt="images">
                                            </div>
                                            <div class="content-related-post">
                                                <div class="related-post-inner">
                                                    <h5 class="post-title lt-sp025">
                                                        <a href="#">5 Tips To Improve Your Design Skills</a>
                                                    </h5>
                                                    <div class="text">
                                                        Tips To Improve Your Design Skills. Learn to identify good design. If you want to create great designs, first you need to learn.
                                                    </div>
                                                    <div class="read-more">
                                                        <a href="#">Read more</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </article>
                                    <article class="post related-posts-wrap">
                                        <div class="post-border">
                                            <div class="featured-post">
                                                <img src="images/blog-single/03.png" alt="images">
                                            </div>
                                            <div class="content-related-post">
                                                <div class="related-post-inner">
                                                    <h5 class="post-title lt-sp025">
                                                        <a href="#">5 Tips To Improve Your Design Skills</a>
                                                    </h5>
                                                    <div class="text">
                                                        Tips To Improve Your Design Skills. Learn to identify good design. If you want to create great designs, first you need to learn.
                                                    </div>
                                                    <div class="read-more">
                                                        <a href="#">Read more</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </article>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @include('pages.blog.sidebar')
            </div>
        </div>
    </div><!-- blog-single -->

@endsection

@section('scripts')
@endsection

