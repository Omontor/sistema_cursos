<section class="online-courses online-courses-style1">
        <div class="container">
            <div class="title-section text-center">
                <p class="sub-title lt-sp17">Nuestros cursos más populares </p>
                <div class="flat-title medium">
                   Cursos Destacados
                </div>
            </div>
            <div class="online-courses-wrap">
                <div class="row">
                    @forelse($featured->first()->courses as $course)
                    <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
                        <div class="imagebox-courses-type1">
                            <div class="featured-post">

                                <img src="{{$course->thumbnail->first()->getUrl()}}" alt="{{$course->title}}">
                            </div>
                            <div class="author-info">
  
                                <div class="category">
                                    {{$course->category->title}}
                                </div>
                                <div class="name">
                                    <a href="#">{{$course->title}}</a> 
                                </div>
                                <div class="border-bt">
                                    
                                </div>
                                <div class="evaluate">
                                    <div class="price">
                                        <span class="price-now">${{$course->price}}</span>
                                        
                                    </div>
                                @if($course->courseReviews->count() > 0)

                       
                                        <div class="review">
                                            @for ($i = 0; $i < $course->courseReviews->average('value'); $i++)
                                               <i class="fa fa-star" aria-hidden="true"></i>
                                            @endfor
                                      
                                        <span>{{$course->courseReviews->average('value')}}</span>
                                    </div>
                                @else
                                    <div class="review">
                                        <i class="far fa-star" aria-hidden="true"></i>

                                        <span> Sin Valoraciones</span>
                                    </div>
                                @endif

                                </div>
                            </div>
                        </div>
                    </div>
                    @empty
                    @endforelse
                </div>
            </div>
            <div class="browse-all-courses pd-browse-course text-center">
                <a href="#" class="btn-browse-courses">Ver todos los cursos</a>
            </div>
        </div>
    </section><!-- online-courses -->