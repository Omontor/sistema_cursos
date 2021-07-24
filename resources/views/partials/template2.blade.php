<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    @yield('header2')
    @include('partials.header')
</head>
<body>
      @include('partials.loader') 
    <div class="wrap-header">
        @include('partials.header2')
    </div><!-- wrap-header -->  
    @yield('content')
    @include('partials.footer')
    @yield('scripts')
    @include('partials.scripts')
</body>
</html>