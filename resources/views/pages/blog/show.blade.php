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
    

{{$post}}    

@endsection

@section('scripts')
@endsection

