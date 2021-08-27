@extends('partials.template2')
@section ('header2')
  <title>Instructores</title>
<style type="text/css">
    * {box-sizing:border-box}

/* Slideshow container */
.slideshow-container {
  max-width: 1000px;
  position: relative;
  margin: auto;
}

/* Hide the images by default */
.mySlides {
  display: none;
}

/* Next & previous buttons */
.prev, .next {
  cursor: pointer;
  position: absolute;
  top: 50%;
  width: auto;
  margin-top: -22px;
  padding: 16px;
  color: white;
  font-weight: bold;
  font-size: 18px;
  transition: 0.6s ease;
  border-radius: 0 3px 3px 0;
  user-select: none;
}

/* Position the "next button" to the right */
.next {
  right: 0;
  border-radius: 3px 0 0 3px;
}

/* On hover, add a black background color with a little bit see-through */
.prev:hover, .next:hover {
  background-color: rgba(0,0,0,0.8);
}

/* Caption text */
.text {
  color: #f2f2f2;
  font-size: 15px;
  padding: 8px 12px;
  position: absolute;
  bottom: 8px;
  width: 100%;
  text-align: center;
}

/* Number text (1/3 etc) */
.numbertext {
  color: #f2f2f2;
  font-size: 12px;
  padding: 8px 12px;
  position: absolute;
  top: 0;
}

/* The dots/bullets/indicators */
.dot {
  cursor: pointer;
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;
  transition: background-color 0.6s ease;
}

.active, .dot:hover {
  background-color: #717171;
}

/* Fading animation */
.fade {
  -webkit-animation-name: fade;
  -webkit-animation-duration: 1.5s;
  animation-name: fade;
  animation-duration: 1.5s;
}

@-webkit-keyframes fade {
  from {opacity: .4}
  to {opacity: 1}
}

@keyframes fade {
  from {opacity: .4}
  to {opacity: 1}
}

</style>
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

                                      <hr>  
                                      <!-- Slideshow container -->
<div class="slideshow-container">

  <!-- Full-width images with number and caption text -->

  @forelse($post->gallery as $photo)
  <div class="mySlides ">
    <img src="{{$photo->getUrl()}}" style="width:100%">
  </div>
@empty
@endforelse


  <!-- Next and previous buttons -->
  <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
  <a class="next" onclick="plusSlides(1)">&#10095;</a>
</div>
<br>

<!-- The dots/circles -->
<div style="text-align:center">
    @forelse($post->gallery as $photo)
     <span class="dot" onclick="currentSlide({{$loop->index + 1}})"></span>
    @empty
    @endforelse
</div>  

                                        <div class="blog-single-poster">
                                            <div class="blog-single-poster-wrap">
                                                <div class="avtar-poster">
                                                    <img src="/images/cohete.png" alt="images" style="width:50px;">
                                                </div>
                                                <div class="info-poster">
                                                    <div class="name">
                                                       Administración Aprendiending
                                                    </div>
                                                    <div class="position">
                                                       {{$post->created_at->diffForHumans()}}
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>





                                    <div id="respond" class="comment-respond">
                                        <h3 id="reply-title" class="comment-reply-title mg-bottom24">
                                          Comentarios
                                        </h3>
                                        <div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/es_ES/sdk.js#xfbml=1&version=v11.0&appId=351116262641536&autoLogAppEvents=1" nonce="KgUfec14"></script>
<div class="fb-comments" data-href="https://aprendiending.com" data-width="700" data-numposts="10"></div>
                                    </div>
                                </div>
                            </div>
                        </article>
                    </div>
                    <div class="related-posts">
                        <div class="title">
                           Posts Relacionados
                        </div>
                        <div class="flat-testimonial-carousel">
                            <div class="flat-carousel-box data-effect clearfix" data-gap="30" data-column="2" data-column2="2" data-column3="1"  data-column4="1" data-dots="false" data-auto="false">
                                <div class="owl-carousel">

                                    @forelse(App\Models\Blog::orderBy('id', 'desc')->take(6)->get() as $latest)
                                    <article class="post related-posts-wrap">
                                        <div class="post-border">
                                            <div class="featured-post">
                                                <img src="{{$latest->thumb_image->getUrl()}}" alt="images">
                                            </div>
                                            <div class="content-related-post">
                                                <div class="related-post-inner">
                                                    <h5 class="post-title lt-sp025">
                                                        <a href="{{route('blog.show', $latest->slug)}}">{{$latest->title}}</a>
                                                    </h5>
                                           
                                                    <div class="read-more">
                                                        <a href="{{route('blog.show', $latest->slug)}}">Ver</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </article>
                                    @empty
                                    @endforelse
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
<script>
    var slideIndex = 1;
showSlides(slideIndex);

// Next/previous controls
function plusSlides(n) {
  showSlides(slideIndex += n);
}

// Thumbnail image controls
function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " active";
}

</script>
@endsection

