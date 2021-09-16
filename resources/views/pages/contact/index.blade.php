@extends('partials.template2')
@section ('header2')
  <title>Contáctanos</title>
  <style type="text/css">
  	#map {
  height: 400px;
  /* The height is 400 pixels */
  width: 100%;
  /* The width is the width of the web page */
}
  </style>
@endsection  
@section('name')
Contacto
@endsection
@section('content')
<!--Así es como se agrega la imagen de fondo en cada página -->
@section('background')
style="background-image: url(/images/contact.png);"
@endsection



<div class="container-fluid">
  @include('partials.messages')
    <div class="row">

<div class="col-lg-6">
<div class="textbox-about">
<div class="title-section">
<div class="flat-title medium heading-type18">
Déjanos tu mensaje
</div>
</div>
<div class="textbox-content">
<div class="about-introduce">
<p>
Utiliza el siguiente formulario para contactarnos, nos pondremos en contacto a la brevedad. <br>Tus datos están protegidos bajo nuestra <a href="#">política de privacidad</a>
</p>

</div>
</div>
</div>
</div>
      <div class="col-md-6" style="padding-bottom:30px;">
                                       <form method="POST" action="{{ route("frontend.contact-forms.store") }}" enctype="multipart/form-data">
                        @method('POST')
                        @csrf
                        <div class="form-group">
                            
                            <input class="form-control" type="text" name="name" id="name" value="{{ old('name', '') }}" required placeholder="Nombre">
                            @if($errors->has('name'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('name') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.contactForm.fields.name_helper') }}</span>
                        </div>
                        <div class="form-group">
                            
                            <input class="form-control" type="text" name="subject" id="subject" value="{{ old('subject', '') }}" required placeholder="Asunto">
                            @if($errors->has('subject'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('subject') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.contactForm.fields.subject_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <input class="form-control" type="text" name="email" id="email" value="{{ old('email', '') }}" required placeholder="email">
                            @if($errors->has('email'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('email') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.contactForm.fields.email_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" type="text" name="message" id="message" value="{{ old('message', '') }}" required placeholder="mensaje"></textarea>
                            @if($errors->has('message')) 
                                <div class="invalid-feedback">
                                    {{ $errors->first('message') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.contactForm.fields.message_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary" type="submit">
                                Enviar
                            </button>
                        </div>
                    </form>
      </div>
    </div>
    <div class="col-12" style="padding-bottom: 30px;">
      
    </div>
</div>





<div class="cta-cr parallax parallax3" style="background-position: 50% -407px;">
<div class="overlay183251"></div>
<div class="container">
<div class="row">
<div class="col-lg-8 col-md-7 col-sm-12 col-xs-12">
<div class="cta-content">
<div class="caption">¿Quieres vender tus cursos en {{env('APP_NAME')}}?</div>
<h3>
Forma parte de nuestra oferta educativa hoy mismo, sólo tienes que llenar el formulario para iniciar tu trámite de inscripción
</h3>
<div class="btn-about-become">
<a href="#">Registrarse</a>
</div>
</div>
</div>

</div>
</div>
</div>

<div class="col-12" style="padding-bottom:30px; padding-top: 30px;">
  
</div>

    <div class="container-fluid">
    <div class="row">
 


          <div class="col-md-7" style="margin-bottom:30px;">
          <!--The div element for the map -->
          <div id="map"></div>

          <!-- Async script executes immediately and must be after any DOM elements used in callback. -->
          <script
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBfP48b6kHhIMfYHrFQBCHDTMB08zt7Izs&callback=initMap&libraries=&v=weekly"
            async
          ></script>
            </div>

            <div class="col-md-5">
 
<div class="col-right">
<div class="content-introduce content-introduce-style4">
<div class="title-section">
<p class="sub-title lt-sp25">{{$company->name}}</p>
<div class="flat-title small heading-type1">Contacto</div>
</div>
<div class="content-introduce-inner">
<p>
{{$company->address}}
</p>
<div class="content-list">
<ul>

@if($company->email)
 <li>
<span class="text">
{{$company->email}}
</span>
</li>
@endif

@if($company->phone)
 <li>
<span class="text">
{{$company->phone}}
</span>
</li>
@endif



</ul>
</div>
</div>
</div>
</div>



            </div>

<div class="col-12" style="padding-bottom:30px; padding-top: 30px;">
  
</div>

</div>
</div>





@endsection

@section('scripts')
<script>
	
// Initialize and add the map
function initMap() {
  // The location of Uluru
  const uluru = { lat: {{$company->lat}}, lng: {{$company->lng}} };
  // The map, centered at Uluru
  const map = new google.maps.Map(document.getElementById("map"), {
    zoom: 16,
    center: uluru,
  });
  // The marker, positioned at Uluru
  const marker = new google.maps.Marker({
    position: uluru,
    map: map,
  });
}	
</script>
@endsection

