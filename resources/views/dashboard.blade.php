@extends('layouts.app')

@section('content')

<section class="dashboard bg_dash row">

    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-6">

        <div class="border_card_header">

            <div class="d-flex justify-content-center">
                <h5 class="tittle_dash text-center mt-2 mb-3">
                    ¡BIENVENIDO!
                </h5>
            </div>

            <div class="d-flex justify-content-center">
                <h6 class="ingresos_dash text-center mt-2 mb-3">
                    Ingresos : $15,550.00
                </h6>
            </div>

            <div class="d-flex justify-content-center">
                <p class="text-center mt-2 mb-3 subtiitle_dash">
                    Ordenes<br># 43
                </p>
                <p class="text-center mt-2 mb-3 subtiitle_dash">
                    productos vendidos<br># 150
                </p>
            </div>

            <div class="row">
                <div class="col-4 d-flex justify-content-center">
                    <div class="card_header_dash mb-3">
                        <p class="text-center mt-3">
                            <img src="{{ asset('assets/media/icons/t debito.webp') }}" alt="" class="img_card_head_dash">
                        </p>
                        <p class="text_minicards text-center">Tarjeta <br> <strong> $1,500.0 </strong>

                        </p>
                    </div>
                </div>
                <div class="col-4 d-flex justify-content-center">
                    <div class="card_header_dash mb-3">
                        <p class="text-center mt-3">
                            <img src="{{ asset('assets/media/icons/efectivo.webp') }}" alt="" class="img_card_head_dash">
                        </p>
                        <p class="text_minicards text-center">Efectivo <br> <strong> $1,500.0 </strong>

                        </p>
                    </div>
                </div>
                <div class="col-4 d-flex justify-content-center">
                    <div class="card_header_dash mb-3">
                        <p class="text-center mt-3">
                            <img src="{{ asset('assets/media/icons/pago-movil.webp') }}" alt="" class="img_card_head_dash">
                        </p>
                        <p class="text_minicards text-center">Transferencias <br> <strong> $1,500.0 </strong>

                        </p>
                    </div>
                </div>
            </div>

        </div>

    </div>

    {{-- Cards del menu de opciones --}}

    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-6">

        <div class="section cards_dash row">

            <div class="col-6 col-xs-6 col-sm-6 col-md-6-col-xl-4 mb-3 d-flex justify-content-center">
                <div class="card_dashboard p-2">

                    <div class="card_img">
                        <a href="">
                            <img class="img_icon_dash" src="{{ asset('assets/media/icons/puntoventa.webp') }}" alt="">
                        </a>
                    </div>


                    <h6 class="tittle_card_dash text-center mt-3 mb-3">Caja</h6>

                    <a href="" class="btn_primary_blue_dash">Acceder </a>

                    <a href="" class="btn_plus_dash">
                        <img class="img_plus_dash" src="{{ asset('assets/media/icons/anadir_white.webp') }}" alt="">
                    </a>

                </div>
            </div>

            <div class="col-6 col-xs-6 col-sm-6 col-md-6-col-xl-4 mb-3 d-flex justify-content-center">
                <div class="card_dashboard p-2">

                    <div class="card_img">
                        <a href="">
                            <img class="img_icon_dash" src="{{ asset('assets/media/icons/scanner.webp') }}" alt="">
                        </a>
                    </div>


                    <h6 class="tittle_card_dash text-center mt-3 mb-3">Scanner</h6>

                    <a href="" class="btn_primary_blue_dash">Acceder </a>

                    <a href="" class="btn_plus_dash">
                        <img class="img_plus_dash" src="{{ asset('assets/media/icons/anadir_white.webp') }}" alt="">
                    </a>

                </div>
            </div>

            <div class="col-6 col-xs-6 col-sm-6 col-md-6-col-xl-4 mb-3 d-flex justify-content-center">
                <div class="card_dashboard p-2">

                    <div class="card_img">
                        <a href="">
                            <img class="img_icon_dash" src="{{ asset('assets/media/icons/carrito.webp') }}" alt="">
                        </a>
                    </div>


                    <h6 class="tittle_card_dash text-center mt-3 mb-3">Productos</h6>

                    <a href="" class="btn_primary_blue_dash">Acceder </a>

                    <a type="button" class="btn_plus_dash" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        <img class="img_plus_dash" src="{{ asset('assets/media/icons/anadir_white.webp') }}" alt="">
                    </a>

                </div>
            </div>

            <div class="col-6 col-xs-6 col-sm-6 col-md-6-col-xl-4 mb-3 d-flex justify-content-center">
                <div class="card_dashboard p-2">

                    <div class="card_img">
                        <a href="">
                            <img class="img_icon_dash" src="{{ asset('assets/media/icons/clientes.webp') }}" alt="">
                        </a>
                    </div>


                    <h6 class="tittle_card_dash text-center mt-3 mb-3">Clientes</h6>

                    <a href="" class="btn_primary_blue_dash">Acceder </a>

                    <a href="" class="btn_plus_dash">
                        <img class="img_plus_dash" src="{{ asset('assets/media/icons/anadir_white.webp') }}" alt="">
                    </a>

                </div>
            </div>

            <div class="col-6 col-xs-6 col-sm-6 col-md-6-col-xl-4 mb-3 d-flex justify-content-center">
                <div class="card_dashboard p-2">

                    <div class="card_img">
                        <a href="">
                            <img class="img_icon_dash" src="{{ asset('assets/media/icons/resultado.webp') }}" alt="">
                        </a>
                    </div>


                    <h6 class="tittle_card_dash text-center mt-3 mb-3">Reportes</h6>

                    <a href="" class="btn_primary_blue_dash">Acceder </a>

                    <a href="" class="btn_plus_dash">
                        <img class="img_plus_dash" src="{{ asset('assets/media/icons/anadir_white.webp') }}" alt="">
                    </a>

                </div>
            </div>

            <div class="col-6 col-xs-6 col-sm-6 col-md-6-col-xl-4 mb-3 d-flex justify-content-center">
                <div class="card_dashboard p-2">

                    <div class="card_img">
                        <a href="">
                            <img class="img_icon_dash" src="{{ asset('assets/media/icons/comisiones.webp') }}" alt="">
                        </a>
                    </div>


                    <h6 class="tittle_card_dash text-center mt-3 mb-3">Comisiones</h6>

                    <a href="" class="btn_primary_blue_dash">Acceder </a>

                    <a href="" class="btn_plus_dash">
                        <img class="img_plus_dash" src="{{ asset('assets/media/icons/anadir_white.webp') }}" alt="">
                    </a>

                </div>
            </div>

        </div>

    </div>




</section>

@endsection
