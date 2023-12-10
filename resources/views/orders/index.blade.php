@extends('layouts.app')

@section('css_custom')

<link rel="stylesheet" href="{{ asset('assets/css/orders.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/products.css') }}">

@endsection


@section('content')

<section class="bg_orders row">

    <div class="col-12 d-flex justify-content-center">
        <h5 class="tittle_orders text-center mt-2 mb-3">
            ¡ Ordenes !
        </h5>
    </div>

    <div class="col-12 col-xs-6 col-sm-6 col-md-4 col-xl-3 d-flex justify-content-center px-3 py-3">
        <div class="row px-3">

            <div class="col-12 bg_minicart_ventas ">
                <p class="text-center" style="margin: 0">
                    <img class="img_portada_product_edit_ventas" src="{{ asset('assets/media/img/ilustraciones/chamarra.png') }}" alt="">
                </p>

                <div class="row">
                    <div class="col-6">
                        <p class="text_empleado text-start">Empleado</p>
                    </div>

                    <div class="col-6">
                        <p class="text_empleado text-end"><strong> #2342</strong></p>
                    </div>

                    <div class="col-12 mb-2">
                        <P class="text_empleado_value text-start">
                            Pablo sanoval barros
                        </P>
                    </div>

                    <div class="col-6 mb-3">
                        <p class="text_subtittle_ventas text-start">
                             <img class="img_subtittle_ventas" src="{{ asset('assets/media/icons/etiqueta-del-precio.webp') }}" alt="">
                             Monto :
                        </p>
                        <p class="text_subtittle_ventas_sv text-center">
                            $500.0
                        </p>
                    </div>

                    <div class="col-6 mb-3">
                        <p class="text_subtittle_ventas text-start">
                             <img class="img_subtittle_ventas" src="{{ asset('assets/media/icons/en-stock.png.webp') }}" alt="">
                             Piezas :
                        </p>
                        <p class="text_subtittle_ventas_sv text-center">
                            10 PZAS
                        </p>
                    </div>

                    <div class="col-6 mb-3">
                        <p class="text_subtittle_ventas text-start">
                             <img class="img_subtittle_ventas" src="{{ asset('assets/media/icons/efectivo.webp') }}" alt="">
                             Total :
                        </p>
                        <p class="text_subtittle_ventas_sv text-center">
                            $5,000.0
                        </p>
                    </div>

                    <div class="col-6 mb-3">
                        <p class="text_subtittle_ventas text-start">
                             <img class="img_subtittle_ventas" src="{{ asset('assets/media/icons/calendar-dar.webp') }}" alt="">
                             Fecha :
                        </p>
                        <p class="text_subtittle_ventas_sv text-center">
                            10 Abril 2023
                        </p>
                    </div>

                    <div class="col-12">
                        <p class="text_subtittle_ventas_sv text-start">
                            Cliente
                        </p>
                        <p class="text_subtittle_ventas text-start">
                            Jose Remedios Sandoval
                       </p>
                    </div>

                    <div class="col-12 mb-2 mt-3">
                        <div class="d-flex justify-content-center">
                            <a type="button"  class="btn btn-sm btn_edit_prodcut_warning" data-bs-toggle="modal" data-bs-target="#editProduct">
                                Ver Orden <img class="icon_edit_btn_warning" src="{{ asset('assets/media/icons/validando-billete.webp') }}" alt="">
                            </a>
                        </div>

                    </div>

                </div>

            </div>

        </div>
    </div>


</section>

@endsection
