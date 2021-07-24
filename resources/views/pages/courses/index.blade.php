@extends('partials.template2')
@section ('header2')
  <title>edukin</title>
@endsection


    
    @section('name')
    Cursos
    @endsection
    @section('content')

    <div class="course-grid">
        <div class="container">
            <div class="flat-portfolio">
                <ul class="flat-filter-isotype">
                    <li class="active"><a href="#" data-filter="*">Todos</a></li>
                    <li><a href="#" data-filter=".Marketing"> Nuevos </a></li>
                    <li><a href="#" data-filter=".Popular"> Populares </a></li>
                 
                </ul>

                <div class="search-course">
                    <form action="#" class="search-form">
                        <input type="search" placeholder="Buscar curso....">
                        <button class="search-button">
                            <i class="fa fa-search" aria-hidden="true"></i> 
                        </button>
                    </form>
                </div>

            </div>
           
            <div class="flat-courses clearfix isotope-courses">

                <div class="course clearfix Marketing ">    
                    <div class="flat-course">
                        @forelse($loscursos as $curso)
                        <div class="featured-post post-media">
                            <div class="entry-image pic">
                                <img src="{{$curso->thumbnail->first()->getUrl()}}" alt="images">
                                <div class="hover-effect"></div>
                                <div class="links">
                                    <a href="#">Comprar</a>
                                </div>
                            </div>
                        </div>
                       
                        <div class="course-content clearfix">
                            <div class="wrap-course-content">
                                <h4>
                                    <a href="#">{{$curso->title}}</a>
                                </h4>
                                <p>
                                  {{Str::limit(strip_tags($curso->description), $limit = 150, $end = '...')}} 
                                </p>
                                <div class="author-info">
                                    <div class="author-name">
                                       {{$curso->teacher->name}}
                                    </div>
                                    <div class="enroll">
                                        <a href="#">Ver más</a>
                                    </div>
                                </div>
                            </div>



   



                            <div class="wrap-rating-price">
                                <div class="meta-rate">
                                         @if($curso->courseReviews->count() > 0)

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

                                    <div class="price">
                                        <span class="price-now">{{$curso->price}}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @empty
                        @endforelse
                    </div>
                </div> 
               
            </div> 
            <div class="pagination">
                <ul>
                    <li><a href="#" class="page-numbers current">1</a></li>
                    <li><a href="#" class="page-numbers">2</a></li>
                    <li><a href="#" class="page-numbers">3</a></li>
                    <li><a href="#" class="page-numbers">4</a></li>
                    <li><a href="#" class="page-numbers">5</a></li>
                    <li><a href="#" class="page-numbers">6</a></li>
                </ul>
            </div>
        </div>
    </div><!-- course-grid -->

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

    @section('scripts')
    @endsection

