@php

# Iniciando la variable de control que permitirá mostrar o no el modal
$exibirModal = false;
# Verificando si existe o no la cookie
if (!isset($_COOKIE['mostrarModal'])) {
    # Caso no exista la cookie entra aquí
    # Creamos la cookie con la duración que queramos

    //$expirar = 3600; // muestra cada 1 hora
    //$expirar = 10800; // muestra cada 3 horas
    //$expirar = 21600; //muestra cada 6 horas
    //$expirar = 43200; //muestra cada 12 horas
    //$expirar = 86400;  // muestra cada 24 horas
    $expirar = 1209600; // muestra cada 15 dias

    setcookie('mostrarModal', 'SI', time() + $expirar); // mostrará cada 12 horas.
    # Ahora nuestra variable de control pasará a tener el valor TRUE (Verdadero)
    $exibirModal = true;
}
@endphp

<!doctype html>


<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>
        Vendexa - @yield('template_title')
    </title>

    @laravelPWA

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Bootstrap -->
     <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">-->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}">


     <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">-->
    <link rel="stylesheet" href="{{ asset('assets/css/twitter-bootstrap.css') }}">

    <!-- dataTables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">

    <!-- css custom -->
    <link rel="stylesheet" href="{{ asset('assets/css/estilos.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/animations.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/inputs.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/dashboard.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/navbar.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/acordeon.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/products.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/preloader.css') }}">

    <!-- Sweetalert2 -->
     <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.1/dist/sweetalert2.min.css">-->
    <link rel="stylesheet" href="{{ asset('assets/css/sweetalert2.css') }}">

    <!-- Select2  -->
     <!--<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />-->
    <link rel="stylesheet" href="{{ asset('assets/css/select2.css') }}">


    @yield('css_custom')

</head>

<body class="bg_dash">

    <div id="loader"></div>
    {{-- <div id="page-loader"><span class="preloader-interior"></span></div> --}}

    <div id="mobile" class="demo1">

        <div id="burgerBtn"></div>

        <ul id="nav">
            @include('layouts.menu_items')
        </ul>

        <div id="mobileBodyContent">
                <main class="">
                    @yield('content')
                </main>

                <a type="button" class="float" data-bs-toggle="modal" data-bs-target="#show_Scanner">
                    <img class="icon_float_scanner" src="{{ asset('assets/media/icons/scanner2.webp') }}" alt="">
                </a>
        </div>
    </div>

        @include('modals.show_passCaja')
        {{-- @include('modals.edit_product') --}}

        @include('modals.show_scanner')
        <!-- Bootstrap -->
        {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script> --}}
        <script type="text/javascript" src="{{ asset('assets/js/bootstrap_bundle.js') }}"></script>


        {{-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script> --}}
        <script type="text/javascript" src="{{ asset('assets/js/popper.js') }}"></script>

        {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script> --}}

        <!-- jquery -->
        {{-- <script src="https://code.jquery.com/jquery-3.7.0.js"></script> --}}
        <script type="text/javascript" src="{{ asset('assets/js/jquery-3.7.0.js') }}"></script>

        <!-- dataTables -->
        <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
        <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

        <!-- js custom -->
        <script type="text/javascript" src="{{ asset('assets/js/navbar.js') }}"></script>
        <script type="text/javascript" src="{{ asset('assets/js/preloader.js') }}"></script>
        <script type="text/javascript" src="{{ asset('assets/js/ofline.js') }}"></script>

        @if ($exibirModal === true)
            @include('layouts.modal_ios')
            <script type="text/javascript" src="{{ asset('assets/js/ios.js') }}"></script>
        @endif


        <!-- Sweetalert2 -->
         <!-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.1/dist/sweetalert2.all.min.js"></script>-->
        <script type="text/javascript" src="{{ asset('assets/js/sweetalert2.all.min.js') }}"></script>

        <!-- Select2  -->
         <!-- <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>-->
        <script type="text/javascript" src="{{ asset('assets/js/select2.min.js') }}"></script>

        <!-- Scanner  -->
         <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/html5-qrcode/2.3.4/html5-qrcode.min.js" integrity="sha512-k/KAe4Yff9EUdYI5/IAHlwUswqeipP+Cp5qnrsUjTPCgl51La2/JhyyjNciztD7mWNKLSXci48m7cctATKfLlQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>-->
        <script type="text/javascript" src="{{ asset('assets/js/html5-qrcode.min.js') }}"></script>

        <script>
            var token = $('meta[name="csrf-token"]').attr('content');


            var telefonoInput = document.getElementById('telefono_input');
            var telefono_input_client = document.getElementById('telefono_input_client');


            telefonoInput.addEventListener('input', function(event) {
                // Eliminar caracteres no numéricos
                var phoneNumber = event.target.value.replace(/\D/g, '');

                // Limitar a 10 dígitos
                phoneNumber = phoneNumber.slice(0, 10);

                // Actualizar el valor del input
                event.target.value = phoneNumber;
            });


            telefono_input_client.addEventListener('input', function(event) {
                // Eliminar caracteres no numéricos
                var phoneNumber = event.target.value.replace(/\D/g, '');

                // Limitar a 10 dígitos
                phoneNumber = phoneNumber.slice(0, 10);

                // Actualizar el valor del input
                event.target.value = phoneNumber;
            });

        </script>

        @yield('js_custom')
        @yield('js_clientes')
        @yield('js_custom_pdf')
        @yield('js_caja_pass')
        @yield('js_scanner')
        @yield('js_custom_productos')
        @yield('js_custom2_clientes')
        @yield('js_custom2_empleado')
        @yield('js_custom_caja_reg')
        @yield('js_custom_cliente')
        @yield('js_custom_settings')


</body>

</html>
