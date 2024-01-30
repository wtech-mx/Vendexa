<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Login') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/twitter-bootstrap.css') }}">


    <!-- css custom -->
    <link rel="stylesheet" href="{{ asset('assets/css/estilos.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/login.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/inputs.css') }}">

</head>

    <body>
            <main class="main-content main-content-bg my-auto">
                @yield('login')
            </main>

            <footer class="footer footer_login py-2">
                <div class="container">
                  <div class="row">
                    <div class="col-8 mx-auto text-center mt-1">
                      <p class="mb-0 text-white">
                        Power By <script>
                          document.write(new Date().getFullYear())
                        </script> WebTech
                      </p>
                    </div>
                  </div>
                </div>
              </footer>
    </body>

        <!-- Bootstrap -->
        {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script> --}}
        <script type="text/javascript" src="{{ asset('assets/js/bootstrap_bundle.js') }}"></script>

        {{-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script> --}}
        <script type="text/javascript" src="{{ asset('assets/js/popper.js') }}"></script>

        {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script> --}}

        <!-- jquery -->
        {{-- <script src="https://code.jquery.com/jquery-3.7.0.js"></script> --}}
        <script type="text/javascript" src="{{ asset('assets/js/jquery-3.7.0.js') }}"></script>

</html>
