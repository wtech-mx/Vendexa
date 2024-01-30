@extends('layouts.app')

@section('template_title')
    Corte caja
@endsection

@section('css_custom')

<link rel="stylesheet" href="{{ asset('assets/css/orders.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/products.css') }}">

@endsection


@section('content')

<section class="products bg_product ">

    <div class="row z-1 position-relative px-3 px-md-4 px-xl-5">

        <div class="col-12 d-flex justify-content-center">
            <h5 class="tittle_orders text-center mt-2 mb-3">
                ¡ Corte Caja !
            </h5>
        </div>

        <div class="col-12 mt-2 mb-3">
            <div class="d-flex justify-content-center">
                  <a class="btn btn_filter" href="{{ route('caja_corte.pdf') }}" role="button">
                      <img class="icon_search" src="{{ asset('assets/media/icons/eraser.webp') }}" alt="">
                  </a>
            </div>
        </div>

        <div class="col-12 col-xs-6 col-sm-6 col-md-4 col-xl-3 d-flex justify-content-center px-3 py-3 ">
            <div class="row px-3">
                <div class="col-12 bg_minicart_ventas ">
                    <h1>Ingresos</h1>
                    <h3>${{number_format($sumaCaja, 2, '.', ',');}}</h3>
                </div>
            </div>
        </div>

        <div class="col-12 col-xs-6 col-sm-6 col-md-4 col-xl-3 d-flex justify-content-center px-3 py-3 ">
            <div class="row px-3">
                <div class="col-12 bg_minicart_ventas ">
                    <h1>Egresos</h1>
                    <h3>${{number_format($sumaEgresos, 2, '.', ',');}}</h3>
                </div>
            </div>
        </div>

        <div class="col-12 col-xs-6 col-sm-6 col-md-4 col-xl-3 d-flex justify-content-center px-3 py-3 ">
            <div class="row px-3">
                <div class="col-12 bg_minicart_ventas ">
                    <h1>Total</h1>
                    <h3>${{number_format($restaCaja, 2, '.', ',');}}</h3>
                </div>
            </div>
        </div>

        <div class="col-8">
            <h4>Concepto</h4>
        </div>
        <div class="col-4">
            <h4>Total</h4>
        </div>

        @foreach ($registrosEgresos as $registroEgreso)
            <div class="col-8">
                <h5>{{$registroEgreso->concepto}}</h5>
            </div>
            <div class="col-4">
                <h5>{{$registroEgreso->monto}}</h5>
            </div>
        @endforeach

    </div>

</section>

@endsection
