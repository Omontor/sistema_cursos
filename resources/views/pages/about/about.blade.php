@extends('partials.template2')
@section ('header2')
  <title>Acerca de Nosotros</title>
@endsection  
@section('name')
Nosotros
@endsection
@section('content')
<!--Así es como se agrega la imagen de fondo en cada página -->
@section('background')
style="background-image: url(/images/about.png);"
@endsection
    
<div class="flat-about pd-about clearfix">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="textbox-about">
                        <div class="title-section">
                            <div class="flat-title medium heading-type18">
                                {{$about->title}}
                            </div>
                        </div>
                        <div class="textbox-content">
                            <div class="about-introduce">
                                {!!$about->content!!}
                            </div>
                        </div>  
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="iconbox-about">
                        <div class="iconbox-about-wrap clearfix">
                            <div class="list-1">
                                <div class="iconbox iconbox-teacher">
                                    <div class="counter">                      
                                        <div class="content-counter">
                                            <div class="numb-count bg-cl25cf71" data-from="0" data-to="{{\App\Models\RoleUser::where('role_id', 3)->count()}}" data-speed="2000" data-inviewport="yes">50</div>
                                            <div class="name-count">Instructores</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="iconbox iconbox-students">
                                    <div class="counter">                            
                                        <div class="content-counter">
                                            <div class="numb-count bg-cla476b4" data-from="0" data-to="{{\App\Models\RoleUser::where('role_id', 2)->count()}}" data-speed="2000" data-inviewport="yes"></div>
                                            <div class="name-count">Estudiantes</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="list-2">
                                <div class="iconbox iconbox-courses">
                                    <div class="counter">                            
                                        <div class="content-counter">
                                            <div class="numb-count bg-clffbe34" data-from="0" data-to="{{\App\Models\Course::where('is_published', 1)->count()}}" data-speed="2000" data-inviewport="yes"></div>
                                            <div class="name-count">Cursos</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="iconbox iconbox-award">
                                    <div class="counter">
                                        <div class="content-counter">
                                            <div class="numb-count bg-clfb6d6d" data-from="0" data-to="{{\App\Models\OnlineClass::count()}}" data-speed="2000" data-inviewport="yes"></div>
                                            <div class="name-count">Clases en vivo</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- flat-about -->
{{--
    <div class="edukin-introduce equalize sm-equalize-auto clearfix">
        <div class="element-col50 bg-element1 element-text">
            <div class="title-section">
                <div class="flat-title medium heading-type18 text-white">
                    Edukin is the best! 
                </div>
            </div>
            <p>
                Education is about teaching, learning skills & knowledge. Education also mean helping people learn how to do things and encouraging them to think. eduking the best psd template.
            </p>
            <p>
                Education gives us a knowledge of world around us and changes it into something better.It develops in us perspective of looking at life. It helps us build opinions and have points of view.
            </p>
        </div>
        <div class="element-col50 bg-element2 element-bg">
            <div class="flat-spacer" data-desktop="0" data-mobi="400" data-smobi="300"></div>
        </div>
        <div class="element-col50 bg-element3 element-bg">
            <div class="flat-spacer" data-desktop="0" data-mobi="400" data-smobi="300"></div>
        </div>
        <div class="element-col50 bg-element4 element-text">
            <div class="title-section">
                <div class="flat-title medium heading-type19 text-white">
                    Edukin Key Of Success!
                </div>
            </div>
            <p>
                Education is about teaching, learning skills & knowledge. Education also mean helping people learn how to do things and encouraging them to think. eduking the best psd template.
            </p>
            <p>
                Education gives us a knowledge of world around us and changes it into something better.It develops in us perspective of looking at life. It helps us build opinions and have points of view.
            </p>
        </div>
    </div><!-- edukin-introduce -->
    --}}
<div class="flat-team mg-flat-team">
        <div class="container"> 
            <div class="section-heading">
                <div class="title-section text-center">
                    <div class="flat-title medium heading-type20">Instructores</div>
                </div>
                <p class="caption text-center">
                    Profesionales en su ramo
                </p>
            </div>
            <div class="pd-list-team">
                <div class="flat-carousel-box data-effect clearfix" data-gap="30" data-column="4" data-column2="2" data-column3="1" data-column4="1" data-dots="false" data-auto="false" data-nav="false">
                    <div class="owl-carousel">
                        @forelse(\App\Models\RoleUser::where('role_id', 3)->get() as $user)
                        @php
                        $currentuser = \App\Models\User::where('id', $user->user_id)->first();
                        @endphp
                        <div class="team-box-layout-h1">
                            <div class="item-img"> 
                                <img src="{{isset($currentuser->avatar) ? $currentuser->avatar->getUrl(): "/images/cohete.png"}}" alt="images" class="img-fluid">
                            </div>

                            <div class="item-content">
                                <div class="item-title">
                                    <a href="{{route('instructor', $currentuser->id)}}">{{$currentuser->name}}</a>
                                </div>
                                <div class="item-subtitle">{{$currentuser->career}}
                                    <br>    
                                    @if($currentuser->website)
                                        <a href="{{$currentuser->website}}" target="_blank">Sitio Personal </a>
                                        @endif
                                </div>

                                <ul class="item-social">

                                    @if($currentuser->facebook)
                                    <li>
                                        <a href="{{$currentuser->facebook}}" target="_blank"><i class="fa fa-facebook-f" aria-hidden="true"></i> </a>
                                    </li>
                                    @endif
                                     @if($currentuser->twitter)
                                    <li>
                                        <a href="{{$currentuser->twitter}}" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i> </a>
                                    </li>
                                     @endif
                                     @if($currentuser->instagram)
                                    <li>
                                        <a href="{{$currentuser->instagram}}" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                                    </li>
                                    @endif 

                                    @if($currentuser->linkedin)
                                    <li>
                                        <a href="{{$currentuser->linkedin}}" target="_blank"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                                    </li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                        @empty
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div><!-- flat-team -->

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

