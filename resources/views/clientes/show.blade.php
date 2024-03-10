@extends('layouts.app')
@section('css_custom')

    <link rel="stylesheet" href="{{ asset('assets/css/products.css') }}">
    <style>
        .modal-backdrop.show {
            opacity: 0 !important;
        }
        .modal-backdrop {
            --bs-backdrop-zindex: 0 !important;
            z-index: 0 !important;
        }
    </style>

@endsection

@section('content')

<section class="products bg_product ">

    <div class="row z-1 position-relative px-3 px-md-4 px-xl-5">

        <div class="col-12 mt-2 mb-3">
            <div class="d-flex justify-content-center ">
                <h5 class="tittle_dash text-center mt-2 mb-3 animation_card_header">
                    {{$cliente->nombre}}
                </h5>
            </div>
        </div>

        <div class="row">

            <div class="col-12 section_tab_bg mb-5">

                <ul class="nav nav-pills d-flex justify-content-around ul_nav_custom mb-3" id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="pills-compras-tab" data-bs-toggle="pill" data-bs-target="#pills-compras" type="button" role="tab" aria-controls="pills-compras" aria-selected="true">
                            <img class="tab_custom_icon" src="{{ asset('assets/media/icons/opciones.webp') }}" alt="" > Compras
                        </button>
                    </li>

                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-adeudos-tab" data-bs-toggle="pill" data-bs-target="#pills-adeudos" type="button" role="tab" aria-controls="pills-adeudos" aria-selected="false">
                            <img class="tab_custom_icon" src="{{ asset('assets/media/icons/resultado.webp') }}" alt="" > Adeudos
                        </button>
                    </li>

                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-cotizaciones-tab" data-bs-toggle="pill" data-bs-target="#pills-cotizaciones" type="button" role="tab" aria-controls="pills-cotizaciones" aria-selected="false">
                            <img class="tab_custom_icon" src="{{ asset('assets/media/icons/resultado.webp') }}" alt="" > Cotizaciones
                        </button>
                    </li>
                </ul>

                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-compras" role="tabpanel" aria-labelledby="pills-compras-tab" tabindex="0">
                        <div class="row">
                            @foreach ($compras as $compra)
                                @include('components.ordenes_ventas')
                            @endforeach
                        </div>
                    </div>

                    <div class="tab-pane fade" id="pills-adeudos" role="tabpanel" aria-labelledby="pills-adeudos-tab" tabindex="0">
                        <div class="row">
                            @if (empty($adeudos))
                                <div class="col-12">
                                    <h2 class="tiitle_modal_dark text-center mt-3 mb-3">Sin Adeudo</h2>
                                </div>
                            @else
                                @foreach ($adeudos as $adeudo)
                                    <div class="col-6 px-4 py-1">
                                        <div class="row bg_minicart_ventas">
                                            <div class="col-12">

                                                <div class="row">
                                                    <div class="col-6">
                                                        <p class="text_empleado text-start">Empleado</p>
                                                    </div>

                                                    <div class="col-6">
                                                        <p class="text_empleado text-end"><strong> #{{$adeudo->id}}</strong></p>
                                                    </div>

                                                    <div class="col-12 mb-2">
                                                        <P class="text_empleado_value text-start">
                                                            {{$adeudo->User->name}}
                                                        </P>
                                                    </div>

                                                    <div class="col-4 mb-1">
                                                        <p class="text_subtittle_ventas text-start">
                                                            <img class="img_subtittle_ventas" src="{{ asset('assets/media/icons/etiqueta-del-precio.webp') }}" alt="">
                                                            Telefono:
                                                        </p>
                                                        <p class="text_subtittle_ventas_sv text-center">
                                                            <a  target="_blank"  href="https://api.whatsapp.com/send?phone=521{{$adeudo->Cliente->telefono}}&text=¡Hola!">{{$adeudo->Cliente->telefono}}</a>
                                                        </p>
                                                    </div>

                                                    <div class="col-4 mb-1">
                                                        <p class="text_subtittle_ventas text-start">
                                                            <img class="img_subtittle_ventas" src="{{ asset('assets/media/icons/coins.webp') }}" alt="">
                                                            Total :
                                                        </p>
                                                        <p class="text_subtittle_ventas_sv text-center">
                                                            ${{$adeudo->total}}
                                                        </p>
                                                    </div>

                                                    <div class="col-12 mb-2 mt-2">
                                                        <div class="d-flex justify-content-between  ">
                                                            <P class="text_empleado_value text-start mt-2">
                                                                {{\Carbon\Carbon::createFromFormat('Y-m-d', $adeudo->fecha)->format('d \d\e F Y')}}

                                                            </P>
                                                            <a type="button" class="btn btn-sm btn_edit_prodcut_warning" href="{{ route('orders.show', $adeudo->id) }}">
                                                                Ver <img class="icon_edit_btn_warning" src="{{ asset('assets/media/icons/editar.webp') }}" alt="">
                                                            </a>
                                                        </div>
                                                    </div>

                                                </div>

                                            </div>

                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-cotizaciones" role="tabpanel" aria-labelledby="pills-cotizaciones-tab" tabindex="0">
                        <div class="row">
                            @if(empty($cotizaciones))
                                <div class="col-12">
                                    <h2 class="tiitle_modal_dark text-center mt-3 mb-3">Sin Cotizaciones</h2>
                                </div>
                            @else
                                @foreach ($cotizaciones as $orden)
                                    <div class="col-6 px-4 py-1">
                                        <div class="row bg_minicart_ventas">
                                            <div class="col-12">

                                                <div class="row">
                                                    <div class="col-6">
                                                        <p class="text_empleado text-start">Empleado</p>
                                                    </div>

                                                    <div class="col-6">
                                                        <p class="text_empleado text-end"><strong> #{{$orden->id}}</strong></p>
                                                    </div>

                                                    <div class="col-12 mb-2">
                                                        <P class="text_empleado_value text-start">
                                                            {{$orden->User->name}}
                                                        </P>
                                                    </div>

                                                    <div class="col-4 mb-1">
                                                        <p class="text_subtittle_ventas text-start">
                                                            <img class="img_subtittle_ventas" src="{{ asset('assets/media/icons/etiqueta-del-precio.webp') }}" alt="">
                                                            Telefono:
                                                        </p>
                                                        <p class="text_subtittle_ventas_sv text-center">
                                                            <a  target="_blank"  href="https://api.whatsapp.com/send?phone=521{{$orden->Cliente->telefono}}&text=¡Hola!">{{$orden->Cliente->telefono}}</a>
                                                        </p>
                                                    </div>

                                                    <div class="col-4 mb-1">
                                                        <p class="text_subtittle_ventas text-start">
                                                            <img class="img_subtittle_ventas" src="{{ asset('assets/media/icons/coins.webp') }}" alt="">
                                                            Total :
                                                        </p>
                                                        <p class="text_subtittle_ventas_sv text-center">
                                                            ${{$orden->total}}
                                                        </p>
                                                    </div>

                                                    <div class="col-12 mb-2 mt-2">
                                                        <div class="d-flex justify-content-between  ">
                                                            <P class="text_empleado_value text-start mt-2">
                                                                {{\Carbon\Carbon::createFromFormat('Y-m-d', $orden->fecha)->format('d \d\e F Y')}}

                                                            </P>
                                                            <a type="button" class="btn btn-sm btn_edit_prodcut_warning" href="{{ route('orders.show', $orden->id) }}">
                                                                Ver <img class="icon_edit_btn_warning" src="{{ asset('assets/media/icons/editar.webp') }}" alt="">
                                                            </a>
                                                        </div>
                                                    </div>

                                                </div>

                                            </div>

                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>

            </div>

        </div>


    </div>

</section>

@endsection
