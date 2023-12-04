<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">

    <!-- dataTables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">

    <!-- css custom -->
    <link rel="stylesheet" href="{{ asset('assets/css/estilos.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/inputs.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/dashboard.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/navbar.css') }}">

    <!-- Sweetalert2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.1/dist/sweetalert2.min.css">

    @yield('css_custom')

</head>

<body class="bg_dash">
    <div id="mobile" class="demo1">
        <div id="burgerBtn"></div>

        <ul id="nav">
            <li class="li_navbar">
                Caja <img class="icon_navbar" src="{{ asset('assets/media/icons/puntoventa.webp') }}" alt="">
            </li>

            <li class="li_navbar">
                Scanner <img class="icon_navbar" src="{{ asset('assets/media/icons/scanner.webp') }}" alt="">
            </li>

            <a href="{{ route('productos.index') }}">
                <li class="li_navbar">
                    Productos  <img class="icon_navbar" src="{{ asset('assets/media/icons/carrito.webp') }}" alt="">
                </li>
            </a>

            <li class="li_navbar">
                Clientes <img class="icon_navbar" src="{{ asset('assets/media/icons/clientes.webp') }}" alt="">
            </li>

            <li class="li_navbar">
                Reportes <img class="icon_navbar" src="{{ asset('assets/media/icons/resultado.webp') }}" alt="">
            </li>

            <li class="li_navbar">
                Comisiones <img class="icon_navbar" src="{{ asset('assets/media/icons/comisiones.webp') }}" alt="">
            </li>

        </ul>

        <div id="mobileBodyContent">
                <main class="">
                    @yield('content')
                </main>
        </div>
    </div>

        @include('modals.create_product')

        <!-- Bootstrap -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
        {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script> --}}

        <!-- jquery -->
        <script src="https://code.jquery.com/jquery-3.7.0.js"></script>

        <!-- dataTables -->
        <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
        <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

        <!-- js custom -->
        <script type="text/javascript" src="{{ asset('assets/js/navbar.js') }}"></script>

        <!-- Sweetalert2 -->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.1/dist/sweetalert2.all.min.js"></script>

        @yield('js_custom')

</body>

</html>
