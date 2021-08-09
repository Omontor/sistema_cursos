@extends('partials.template2')
@section ('header2')
  <title>   {{$instructor->name}}</title>
@endsection  
@section('name')
  {{$instructor->name}}
@endsection
@section('content')
<!--Así es como se agrega la imagen de fondo en cada página -->
@section('background')
style="background-image: url(/images/instructors.png);"
@endsection
<div class="flat-about pd-about clearfix">
<section class="testimonial testimonial-style5 clearfix">
        <div class="container">
            <div class="col-left">
                <div class="featured-post">
                    <img src="{{isset($instructor->avatar) ?$instructor->avatar->getUrl() : "/images/cohete.png"}}" alt="images">
                    <div class="stand-behind">
                        <img src="/images/home5/09.png" alt="images">
                    </div>
                </div>
            </div>
            <div class="col-right">
                <div class="title-section">
                    <div class="flat-title medium heading-type15"> 
   {{$instructor->name}} </div>
   <h3>{{$instructor->career}}</h3>
   <br>
       	<div>
            {!!$instructor->bio!!}
                     </div>

                     <hr>
                @php
                   $totalreviews = 0;
                   $totalstudents = 0;
                   @endphp
                   @forelse($instructor->courses as $curso)
                    @forelse($curso->courseReviews as $review)
                        @php
                        $totalreviews ++;
                        @endphp
                    @empty
                    @endforelse
                   @empty
                   @endforelse
               <p style="font-size: 16pt;">  Total de Valoraciones:  <strong> {{$totalreviews}}</strong>
 <br>

                @forelse($instructor->courses as $curso)
                    @forelse($curso->students as $review)
                        @php
                        $totalstudents ++;
                        @endphp
                    @empty
                    @endforelse
                   @empty
                   @endforelse
                Total de Estudiantes Registrados: <strong> {{$totalstudents}}</strong></p>
                         <br>        
                </div>

                           <div class="row">

<div class="col"> 

</div>
                                    @if($instructor->facebook)
                                 
                                      <div class="col">  <a href="{{$instructor->facebook}}" target="_blank"><i style="color:darkblue;" class="fa fa-facebook-f fa-3x" aria-hidden="true"></i> </a>
                                   </div>
                                    @endif
                                     @if($instructor->twitter)
                                 
                                      <div class="col">  <a href="{{$instructor->twitter}}" target="_blank"><i style="color:darkblue;" class="fa fa-twitter fa-3x" aria-hidden="true"></i> </a>
                                   </div>
                                     @endif
                                     @if($instructor->instagram)
                                 
                                      <div class="col">  <a href="{{$instructor->instagram}}" target="_blank"><i style="color:darkblue;" class="fa fa-instagram fa-3x" aria-hidden="true"></i></a>
                                   </div>
                                    @endif 

                                    @if($instructor->linkedin)
                                 
                                      <div class="col">  <a href="{{$instructor->linkedin}}" target="_blank"><i style="color:darkblue;" class="fa fa-linkedin fa-3x" aria-hidden="true"></i></a>
                                   </div>
                                   @endif                            
                                   @if($instructor->website)
                                 
                                      <div class="col">  <a href="{{$instructor->website}}" target="_blank"><i style="color:darkblue;" class="fa fa-globe fa-3x" aria-hidden="true"></i></a>
                                   </div>
                                   @endif
                                   <div class="col"> 
								</div>
                                    
                                    </div>
       
            </div>

        </div>
    </section><!-- testimonial -->
    <section class="online-courses online-courses-style1">
        <div class="container">
                     

            <div class="title-section text-center">
                <p class="sub-title lt-sp17">Todos Los</p>
                <div class="flat-title medium">
                   Cursos

                </div>

            </div>
            <div class="online-courses-wrap">
                <div class="row">
                    @forelse($courses as $course)
                    <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
                        <div class="imagebox-courses-type1">
                            <div class="featured-post">

                                <img src="{{isset($course->thumbnail) ? $course->thumbnail->first()->getUrl():"/images/cohete.png"}}" alt="{{$course->title}}">
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
                                        <i class="fa fa-star" aria-hidden="true"></i>

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

        </div>
    </section><!-- online-courses -->
    <center> {{$courses->links()}}</center>
   </div>
@endsection



@section('scripts')
@endsection



