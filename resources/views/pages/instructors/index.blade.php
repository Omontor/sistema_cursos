@extends('partials.template2')
@section ('header2')
  <title>Instructores</title>
@endsection  
@section('name')
Instructores
@endsection
@section('content')
<!--Así es como se agrega la imagen de fondo en cada página -->
@section('background')
style="background-image: url(/images/instructor.png);"
@endsection
    
<section class="online-courses-style3">
            <div class="container">
                <div class="title-section">
                    <div class="flat-title larger heading-type9">Nuestros Instructores</div>
                </div>
                <div class="wrap-courses-style3">
                    <div class="row">
                        @forelse($instructors as $instructor)
                        @php
                        $currentuser = \App\Models\User::where('id', $instructor->user_id)->first();
                        @endphp
                        <div class="col-lg-4 col-md-6 col-sm-12">
                            <div class="imagebox-courses-type2 box-shadow-type1">
                                <div class="featured data-effect-item has-effect-icon">
                                    <div class="featured-post">
                                        <img src="{{isset($currentuser->avatar) ? $currentuser->avatar->getUrl() : '/images/cohete.png'}}" alt="images">  
                                    </div>
                                
                                    <div class="elm-link elm-link-style3">
                                        <a href="{{route('instructor', $currentuser->id)}}">
                                            <i class="fa fa-user" aria-hidden="true"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="info-courses">
                                    <div class="courses-name pd-courses-name">
                                        <a href="{{route('instructor', $currentuser->id)}}">{{$currentuser->name}}</a>
                                        <p>{{$currentuser->career}}</p>
                                    </div>
                                </div>
                                <div class="evaluate clearfix">
                                    <div class="rating-star">
                                        Reviews:
                                        <span class="cl-474f57">
                                            @php
                                            $totalreviews =0;
                                            @endphp 
                                            @if($currentuser->courses)
                                            @forelse($currentuser->courses as $courses)

                                            @php
                                            $totalreviews ++;
                                            @endphp
                                            
                                            @empty
                                            @endforelse
                                            @endif
                                            
                                                {{$totalreviews}}
                                            </span>
                                    </div>
                                    <div class="price">
                                        @if($currentuser->courses)
                                       Cursos: {{$currentuser->courses->count()}}
                                       @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        @empty
                        @endforelse
                        
            
                    </div>
                </div>
            </div>
        </section><!-- online-courses -->


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

