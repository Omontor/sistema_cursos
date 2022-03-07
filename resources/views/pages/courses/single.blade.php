@extends('partials.template2')
@section ('header2')
  <title>edukin</title>
@endsection


@section('name')
Curso
@endsection
@section('content')

    <div class="courses-single-page">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="content-page-wrap clearfix">
                        <div class="course-single">
                            <div class="featured-post">
                                <div class="entry-image">
                                    <div class="videobox">
                                   
                                            
    <div id="player"></div>
                                     
                                    </div>
                                </div>
                            </div>
                            <div class="content">
                                <div class="title">
                                    <a>{{$elcurso->title}}</a>
                                </div>
                                <p>{{$elcurso->excerpt}}</p>
                                <div class="author-price">
                                    <div class="author">
                                        <div class="avatar">
                                        <img src=" {{$elcurso->teacher->avatar ? $elcurso->teacher->avatar->getUrl() : ""}}" alt="images" style="width:50px;">
                                        </div>
                                        <div class="info">
                                            <div class="name">
                                                <a href="#"> {{$elcurso->teacher->name}}</a>
                                            </div>

                                            <div class="job">
                                                {{$elcurso->teacher->career}}
                                            </div>

                            <div class="wrap-rating-price">
                                <div class="meta-rate">
                                         @if($elcurso->courseReviews->count() > 0)

                                            <div class="rating">
                                                @for ($i = 0; $i < $course->courseReviews->average('value'); $i++)
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                @endfor

                                                <span>{{$course->courseReviews->average('value')}}</span>   
                                            </div>
                                            @else
                                            <div class="rating">
                                                <i class="fa fa-star-o" aria-hidden="true"></i>
                                                <span> Sin Valoraciones</span>
                                            </div>
                                        @endif
                                </div>
                            </div>

                                        </div>
                                    </div>
                                    <div class="price-wrap price-course-single">
                                        <div class="price">
                                            @if($elcurso->discount)
                                            <span class="price-now">${{$elcurso->discount}} MXN</span>
                                            @else
                                            <span class="price-now">${{$elcurso->price}} MXN</span>
                                            @endif
                                        </div>
                                        <br>
                                        <br>
                                        <div class="btn-buynow">
                                            <a href="#">Comprar</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="flat-tabs">
                            <ul class="tab-title type1 clearfix"> 
                                <li class="item-title  overview">
                                    <span class="inner">EL CURSO</span>
                                </li>
                                <li class="item-title curriculum">
                                    <span class="inner">CONTENIDO</span>
                                </li>
                                <li class="item-title instructor">
                                    <span class="inner">INSTRUCTOR</span>
                                </li>
                                <li class="item-title review">
                                    <span class="inner">COMENTARIOS</span>
                                </li>
                            </ul>
                            <div class="tab-content-wrap">
                                {{--Contenido El curso--}}
                                <div class="tab-content">
                                    <div class="item-content">
                                        <div class="question-sg text clearfix">
                                            <div class="title">
                                                <a>Descripción</a>
                                            </div>
                                            <p>{!!$elcurso->description!!}</p>
                                        </div>
                                          
                                        <div class="requirements-sg text clearfix">
                                            <div class="title">
                                                <a>Requerimientos</a>
                                            </div>
                                            <ul class="request">
                                                @forelse($elcurso->requirements as $requirement)
                                                <li>
                                                   {{$requirement->name}}
                                                </li>
                                                @empty
                                                <li>
                                                   Ningún requerimiento ha sido especificado
                                                </li>
                                                @endforelse
                                            </ul>
                                        </div>

                                        <div class="access-sg text clearfix">
                                            <div class="title">
                                                <a>Galería</a>
                                            </div>
                                            <!-- Add images to <div class="fotorama"></div> -->
                                            <div class="fotorama">
                                                @forelse($elcurso->thumbnail as $fotos)
                                              <img src="{{$fotos->getUrl()}}">     
                                                @empty
                                                @endforelse
                                            </div>
                                        </div>

                                        <div class="price-course-single">

                                            <div class="price">
                                                @if($elcurso->discount)
                                                <span class="price-previou">
                                                    <del>${{$elcurso->price}} MXN</del>
                                                    <span class="price-now">${{$elcurso->discount}} MXN</span>
                                                </span>
                                                @else
                                                <span class="price-now">${{$elcurso->discount}} MXN</span>
                                                @endif
                                            </div>

                                            <div class="btn-buynow">
                                                <a href="#">Comprar</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{--Contenido de contenido--}}
                                <div class="tab-content">
                                    <div class="item-content">
                                        <div class="question-sg text clearfix">
                                            <div class="title">
                                                <a>¿Qué voy a aprender?</a>
                                            </div>
                                            @include('partials.accordion_lessons')
                                        </div>
                                        

                                        <div class="price-course-single">
                                            <div class="price">
                                                @if($elcurso->discount)
                                                <span class="price-previou">
                                                    <del>${{$elcurso->price}} MXN</del>
                                                    <span class="price-now">${{$elcurso->discount}} MXN</span>
                                                </span>
                                                @else
                                                <span class="price-now">${{$elcurso->discount}} MXN</span>
                                                @endif
                                            </div>
                                            <div class="btn-buynow">
                                                <a href="#">Comprar</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{--Contenido de instructor--}}
                                <div class="tab-content">
                                    <div class="item-content">
                                        <div class="question-sg text clearfix">
                                            <div class="title">
                                                  <a>{{$elcurso->teacher->name}}</a>
                                            </div>
                                            <p>{!!$elcurso->teacher->bio!!}</p>
                                        </div>
                                        <div class="certificate-sg text clearfix">
                                            <div class="title">
                                                <a>Redes sociales</a>
                                            </div>
                                            <div class="certificate">
                                                <div class="certificate-wrap">
                                                    <ul class="list">
                                                        @if($elcurso->teacher->facebook != null)
                                                        <li>
                                                           <a href="{{$elcurso->teacher->facebook}}" target='_blank'><i class="fa fa-facebook" aria-hidden="true"></i>  Facebook</a>
                                                        </li>
                                                        @else
                                                        @endif

                                                        @if($elcurso->teacher->twitter != null)
                                                        <li>
                                                            <a href="{{$elcurso->teacher->twitter}}" target='_blank'><i class="fa fa-twitter" aria-hidden="true"></i>  Twitter</a>
                                                        </li>
                                                        @else
                                                        @endif
                                                        
                                                        @if($elcurso->teacher->instagram != null)
                                                        <li>
                                                            <a href="{{$elcurso->teacher->instagram}}" target='_blank'><i class="fa fa-instagram" aria-hidden="true"></i>  Instagram</a>
                                                        </li>
                                                        @else
                                                        @endif

                                                        @if($elcurso->teacher->linkedin != null)
                                                        <li>
                                                            <a href="{{$elcurso->teacher->linkedin}}" target='_blank'><i class="fa fa-linkedin" aria-hidden="true"></i>  Linkedin</a>
                                                        </li>
                                                        @else
                                                        @endif

                                                        @if($elcurso->teacher->website != null)
                                                        <li>
                                                            <a href="{{$elcurso->teacher->website}}" target='_blank'><i class="fa fa-globe" aria-hidden="true"></i>  Sitio Web</a>
                                                        </li>
                                                        @else
                                                        @endif

                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                          

                                    </div>
                                </div>
                                {{--Contenido de comentarios--}}
                                <div class="tab-content">
                                    <div class="item-content">
                                        <div class="question-sg text clearfix">
                                            <div class="title">
                                                <a href="#">What will i learn?</a>
                                            </div>
                                            <p>
                                                Learn cutting edge deep reinforcement learning algorithms from Deep Q Networks (DQN) to Deep Deterministic Policy Gradients (DDPG). Apply these concepts to train agents to walk, drive, or perform other complex tasks.
                                            </p>
                                        </div>
                                        <div class="access-sg text clearfix">
                                            <div class="title">
                                                <a href="#">Access on mobile and TV</a>
                                            </div>
                                            <p>
                                                Access  mobile deep reinforcement learning algorithms and from Deep Networks to Deep Deterministic Policy Gradients. Apply these concepts to train agents to tv walk, drive, or perform other complex tasks.
                                            </p>
                                        </div>
                                        <div class="certificate-sg text clearfix">
                                            <div class="title">
                                                <a href="#">Certificate of Completion</a>
                                            </div>
                                            <p>
                                                Access  mobile deep reinforcement learning algorithms from Deep Q Networks to Deep Deterministic Policy Gradients. Apply these concepts to train agents to tv walk, drive, or perform other complex tasks.
                                            </p>
                                            <div class="certificate">
                                                <div class="certificate-wrap">
                                                    <p>
                                                        An eduking is a blog created for educational purposes. Eduking blog archive and support student and teacher learning by facilitating reflection, questioning by self becoming a means for educators.
                                                    </p>
                                                    <ul class="list-certificate">
                                                        <li>
                                                            Graphic designers create visual concepts, 
                                                        </li>
                                                        <li>
                                                            Remember skill can developed with practice.
                                                        </li>
                                                        <li>
                                                            The field is considered a subset of visual communication design.
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="images-certificate">
                                                    <img src="images/course-single/3.jpg" alt="images">
                                                </div>
                                            </div>
                                        </div>
                                          
                                        <div class="requirements-sg text clearfix">
                                            <div class="title">
                                                <a href="#">Requirements</a>
                                            </div>
                                            <ul class="request">
                                                <li>
                                                   Understand what visual learning is for and how it is used
                                                </li>
                                                <li>
                                                   Need knowledge of photoshop and basic knowledge of indesign.
                                                </li>
                                                <li>
                                                   Preferable to have experience with PS, Sketch, Indesign and  Adobe XD.
                                                </li>
                                                <li>
                                                   Preferable to understand word embeddings
                                                </li>
                                            </ul>
                                        </div>
 
                                        <div class="description-single text clearfix">
                                            <div class="title">
                                                <a href="#">Description</a>
                                            </div>
                                            <p>
                                                Your ability to use types is one of the things that differentiates graphic design from others visual professions. A big parts of graphic design is understanding typography, developing your knowledge of typefaces, & how to apply them in your design. This will be a constant study throughout your career.
                                            </p>
                                        </div>

                                        <div class="price-course-single">
                                            <div class="price">
                                                <span class="price-previou">
                                                    <del>$169</del>
                                                </span>
                                                <span class="price-now">$169</span>
                                            </div>
                                            <div class="btn-buynow">
                                                <a href="#">Buy Now</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> 
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="sidebar-right">

    {{--APARECE SI TIENE LECCION EN VIVO--}}
            <div class="widget widget-class-start">
                <div class="widget-title">
                    Lección en vivo
                </div>
                <div class="content">
                    <div class="flat-counter count-time" data-day="00" data-month="00" data-year="2020" data-hour="00" data-minutes="00" data-second="00">
                        <div class="counter">
                            <ul>
                                <li class="content-counter">
                                    <div class="wrap-bg">
                                        <div class="inner-bg days">
                                            <div class="numb-count numb cl-667eea">178</div>
                                            <div class="name-count">Día</div>
                                        </div>
                                    </div>
                                </li>
                                <li class="content-counter">
                                    <div class="wrap-bg">
                                        <div class="inner-bg hours">
                                            <div class="numb-count numb cl-f0c41b">12</div>
                                            <div class="name-count">Hora</div>
                                        </div>
                                    </div>
                                </li>
                                <li class="content-counter">
                                    <div class="wrap-bg">
                                        <div class="inner-bg minutes">
                                            <div class="numb-count numb cl-8b46f4">55</div>
                                            <div class="name-count">Minutos</div>
                                        </div>
                                    </div>
                                </li>
                                <li class="content-counter">
                                    <div class="wrap-bg">
                                        <div class="inner-bg seconds">
                                            <div class="numb-count numb cl-ff5f60">55</div>
                                            <div class="name-count">Segundos</div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
    {{--APARECE SI TIENE LECCION EN VIVO CIERRE--}}
                        <div class="widget widget-features">
                            <div class="widget-title">
                                Características
                            </div>
                            <div class="content">
                                
                                <ul class="features">
                                    <li>
                                        <a href="#">Lecturas</a>
                                        <span>7</span>
                                    </li>
                                    <li>
                                        <a href="#">Duración</a>
                                        <span>60h</span>
                                    </li>
                                    <li>
                                        <a href="#">Estudiantes</a>
                                        <span>45</span>
                                    </li>
                                    <li>
                                        <a href="#">Certificado</a>
                                        <span>Yes</span>
                                    </li>
                                    <li>
                                        <a href="#">Habilidad</a>
                                        <span>Beginer</span>
                                    </li>
                                    <li>
                                        <a href="#">Categoría</a>
                                        <span>{{$elcurso->category->title}}</span>
                                    </li>
                                </ul>
                                <div class="share-via">
                                    <div class="title">
                                        Share via
                                    </div>
                                    <ul class="social-media">
                                        <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                        <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                        <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                                        <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="related-course related-course-single">
                            <div class="title">
                                Related Courses
                            </div>
                            <div class="related-course-wrap client-style3">
                                <div class="flat-carousel-box data-effect clearfix" data-gap="30" data-column="1" data-column2="1" data-column3="1" data-column4="1" data-dots="false" data-auto="false" data-nav="false">
                                    <div class="owl-carousel">
                                        <div class="flat-course">
                                            <div class="featured-post">
                                                <div class="entry-image">
                                                    <img src="images/course-grid/3.jpg" alt="images">
                                                </div>
                                            </div>
                                            <div class="course-content clearfix">
                                                <div class="wrap-course-content">
                                                    <h4>
                                                        <a href="#">Learn Photoshop CC With Nir Eyal Complete Course</a>
                                                    </h4>
                                                    <p>
                                                        Education City is initiative of our Qatar Foundation for Education, Science and Community Development.  
                                                    </p>
                                                    <div class="author-info">
                                                        <div class="author-name">
                                                            Perttick Sid
                                                        </div>
                                                        <div class="enroll">
                                                            <a href="#">Enroll</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="wrap-rating-price">
                                                    <div class="meta-rate">
                                                        <div class="rating">
                                                            <i class="fa fa-star" aria-hidden="true"></i>
                                                            <i class="fa fa-star" aria-hidden="true"></i>
                                                            <i class="fa fa-star" aria-hidden="true"></i>
                                                            <i class="fa fa-star" aria-hidden="true"></i>
                                                            <i class="fa fa-star" aria-hidden="true"></i>
                                                            <span>(4)</span>
                                                        </div>
                                                        <div class="price">
                                                            <span class="price-previou">
                                                                <del>$169</del>
                                                            </span>
                                                            <span class="price-now">$169</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="flat-course">
                                            <div class="featured-post">
                                                <div class="entry-image">
                                                    <img src="images/course-grid/3.jpg" alt="images">
                                                </div>
                                            </div>
                                            <div class="course-content clearfix">
                                                <div class="wrap-course-content">
                                                    <h4>
                                                        <a href="#">Learn Photoshop CC With Nir Eyal Complete Course</a>
                                                    </h4>
                                                    <p>
                                                        Education City is initiative of our Qatar Foundation for Education, Science and Community Development.  
                                                    </p>
                                                    <div class="author-info">
                                                        <div class="author-name">
                                                            Perttick Sid
                                                        </div>
                                                        <div class="enroll">
                                                            <a href="#">Enroll</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="wrap-rating-price">
                                                    <div class="meta-rate">
                                                        <div class="rating">
                                                            <i class="fa fa-star" aria-hidden="true"></i>
                                                            <i class="fa fa-star" aria-hidden="true"></i>
                                                            <i class="fa fa-star" aria-hidden="true"></i>
                                                            <i class="fa fa-star" aria-hidden="true"></i>
                                                            <i class="fa fa-star" aria-hidden="true"></i>
                                                            <span>(4)</span>
                                                        </div>
                                                        <div class="price">
                                                            <span class="price-previou">
                                                                <del>$169</del>
                                                            </span>
                                                            <span class="price-now">$169</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="flat-course">
                                            <div class="featured-post">
                                                <div class="entry-image">
                                                    <img src="images/course-grid/3.jpg" alt="images">
                                                </div>
                                            </div>
                                            <div class="course-content clearfix">
                                                <div class="wrap-course-content">
                                                    <h4>
                                                        <a href="#">Learn Photoshop CC With Nir Eyal Complete Course</a>
                                                    </h4>
                                                    <p>
                                                        Education City is initiative of our Qatar Foundation for Education, Science and Community Development. 
                                                    </p>
                                                    <div class="author-info">
                                                        <div class="author-name">
                                                            Perttick Sid
                                                        </div>
                                                        <div class="enroll">
                                                            <a href="#">Enroll</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="wrap-rating-price">
                                                    <div class="meta-rate">
                                                        <div class="rating">
                                                            <i class="fa fa-star" aria-hidden="true"></i>
                                                            <i class="fa fa-star" aria-hidden="true"></i>
                                                            <i class="fa fa-star" aria-hidden="true"></i>
                                                            <i class="fa fa-star" aria-hidden="true"></i>
                                                            <i class="fa fa-star" aria-hidden="true"></i>
                                                            <span>(4)</span>
                                                        </div>
                                                        <div class="price">
                                                            <span class="price-previou">
                                                                <del>$169</del>
                                                            </span>
                                                            <span class="price-now">$169</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- courses-single -->
    <div class="cta-cr parallax parallax3">
        <div class="overlay183251"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-7 col-sm-12 col-xs-12">
                    <div class="cta-content">
                        <div class="caption">How to start your teaching?</div>
                        <h3>
                            Starting your journey with us? Follow this guide still possible to become a teacher.
                        </h3>
                        <div class="btn-about-become">
                            <a href="#">Become a Teacher</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-5 col-sm-12 col-xs-12">
                    <div class="cta-information">
                        <div class="phone">
                            +91 254 785 587
                        </div>
                        <div class="email">
                            edukin@info.com
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- cta-cr -->


@endsection

@section('scripts')<!-- 1. The <iframe> (and video player) will replace this <div> tag. -->


    <script>
      // 2. This code loads the IFrame Player API code asynchronously.
      var tag = document.createElement('script');

      tag.src = "https://www.youtube.com/iframe_api";
      var firstScriptTag = document.getElementsByTagName('script')[0];
      firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

      // 3. This function creates an <iframe> (and YouTube player)
      //    after the API code downloads.
      var player;
      function onYouTubeIframeAPIReady() {
        player = new YT.Player('player', {
          height: '400',
          width: '100%',
          videoId: '{{$elcurso->video}}',
          events: {
            'onReady': onPlayerReady,
            'onStateChange': onPlayerStateChange
          }
        });
      }

      // 4. The API will call this function when the video player is ready.
      function onPlayerReady(event) {
        event.target.playVideo();
      }

      // 5. The API calls this function when the player's state changes.
      //    The function indicates that when playing a video (state=1),
      //    the player should play for six seconds and then stop.
      var done = false;
      function onPlayerStateChange(event) {
        if (event.data == YT.PlayerState.PLAYING && !done) {
          setTimeout(stopVideo, 6000);
          done = true;
        }
      }
      function stopVideo() {
        player.stopVideo();
      }
    </script>
@endsection