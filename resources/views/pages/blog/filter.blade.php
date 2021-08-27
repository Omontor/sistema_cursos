@extends('partials.template2')
@section ('header2')
  <title>{{$posts->first() ? $posts->first()->category->title : "No hay posts"}}</title>
@endsection  
@section('name')
{{$posts->first() ? $posts->first()->category->title : "No hay posts"}}
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

