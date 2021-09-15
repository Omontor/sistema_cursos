
  <h1 class="display-3"> Nuevo correo de contacto de {{ $name }}</h1>
  <p class="lead">Correo electrónico:<strong> {{$email}}</strong>  </p>
  <p>Formulario de contacto:
  	<br>
  Nombre:{{ $name }}
  <br>
  Email: {{$email}}
  <br>
  Asunto: {{$subject}}
  </p>  
  <br>
  Contenido: {{$text}}
  </p>
  <hr>
  
  <p class="lead">
   <h2> <a  href="{{env('APP_URL')}}/admin">Iniciar Sesión</a></h2>
  </p>
