<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

  <link rel="stylesheet" href="{{ asset('assets/css/ticket.css') }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">

</head>
<body>

<main class="ticket-system">
   <div class="top">
   <h1 class="title">Espera un segundo, tu tiket se está imprimiendo.</h1>
   <div class="printer">
   </div>

   <div class="receipts-wrapper">
      <div class="receipts">

        @yield('tiket')

      </div>
   </div>

</main>
<!-- partial -->

</body>
</html>
