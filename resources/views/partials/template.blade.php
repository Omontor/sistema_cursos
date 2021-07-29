<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    @yield('header')

    @include('partials.header')
</head>
<body>
    @include('partials.loader')
    <div class="wrap-header">
        @include('partials.nav')
    </div><!-- wrap-header -->
    @yield('content')
    @include('partials.footer')
    @yield('scripts')

    @include('partials.scripts')
</body>
</html>