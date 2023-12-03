@extends('layouts.app')

@section('css_custom')

<link rel="stylesheet" href="{{ asset('assets/css/products.css') }}">

@endsection


@section('content')

<section class="products bg_product ">

    <div class="row z-1 position-relative px-3 px-md-4 px-xl-5">

        <div class="col-12">
            <h2 class="tiitle_modal_dark text-center mt-3 mb-3">Productos</h2>
        </div>

    </div>

</section>

@endsection
