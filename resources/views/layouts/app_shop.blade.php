<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>
         @yield('template_title')
    </title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/twitter-bootstrap.css') }}">

    <!-- css custom -->
    <link rel="stylesheet" href="{{ asset('assets/css/estilos.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/sidebars.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/shop.css') }}">
    <!-- css custom -->
    <link rel="stylesheet" href="{{ asset('assets/css/animations.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/dashboard.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/preloader.css') }}">

    @if ($empresa->logo == NULL)
        <link rel="icon" type="image/x-icon" href="{{ asset('assets/media/img/logos/LogosinF.png ') }}">
        @else

        <link rel="icon" type="image/x-icon" href="{{ asset('assets/media/img/logos/'. $empresa->logo) }}">
    @endif

    @yield('css_custom')

</head>

    <body>
        <div id="loader"></div>

        @yield('shop')

    </body>
        <script type="text/javascript" src="{{ asset('assets/js/preloader.js') }}"></script>

        <!-- Bootstrap -->
        {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script> --}}
        <script type="text/javascript" src="{{ asset('assets/js/bootstrap_bundle.js') }}"></script>

        {{-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script> --}}
        <script type="text/javascript" src="{{ asset('assets/js/popper.js') }}"></script>

        <script type="text/javascript" src="{{ asset('assets/js/sidebars.js') }}"></script>

        {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script> --}}

        <!-- jquery -->
        {{-- <script src="https://code.jquery.com/jquery-3.7.0.js"></script> --}}
        <script type="text/javascript" src="{{ asset('assets/js/jquery-3.7.0.js') }}"></script>

<script>

</script>
</html>
