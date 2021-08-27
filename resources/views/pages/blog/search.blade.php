@extends('partials.template2')
@section ('header2')
  <title>{{$posts->count()}} resultados</title>
@endsection  
@section('name')
Resultados de la búsqueda
@endsection
@section('content')
<!--Así es como se agrega la imagen de fondo en cada página -->
@section('background')
style="background-image: url(/images/blog.png);"
@endsection
@include('pages.blog.blogcards')
@endsection

@section('scripts')
@endsection

