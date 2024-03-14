@extends('layouts.app')

@section('content')

<section class="dashboard bg_dash row">

    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-6 my-auto">

        <div class="border_card_header ">

            <div class="d-flex justify-content-center ">
                <h5 class="tittle_dash text-center mt-2 mb-3 animation_card_header">
                    ¡BIENVENIDO!
                </h5>
            </div>

            <div class="d-flex justify-content-center ">
                <h6 class="ingresos_dash text-center mt-2 mb-3 animation_card_header">
                    Ingresos : $
                </h6>
            </div>

            <div class="d-flex justify-content-center ">
                <p class="text-center mt-2 mb-3 subtiitle_dash animation_card_header">
                    Ordenes<br>#
                </p>
                <p class="text-center mt-2 mb-3 subtiitle_dash animation_card_header">
                    Cotizaciones<br>#
                </p>
            </div>

        </div>

    </div>

    {{-- Cards del menu de opciones --}}

    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-6 my-auto">

        <div class="section cards_dash row">

            <div class="col-6 col-xs-6 col-sm-6 col-md-6-col-xl-4 mb-3 d-flex justify-content-center animation_card">
                <div class="card_dashboard p-2">

                    <div class="card_img">
                        <a href="{{ route('empresas.index') }}">
                            <img class="img_icon_dash" src="{{ asset('assets/media/icons/tienda.png.webp') }}" alt="">
                        </a>
                    </div>


                    <h6 class="tittle_card_dash text-center mt-3 mb-3">Empresas</h6>

                        <a href="{{ route('empresas.index') }}" class="btn_primary_blue_dash">Acceder </a>

                        <a type="button" class="btn_plus_dash" data-bs-toggle="modal" data-bs-target="#creatEmpresa">
                            <img class="img_plus_dash" src="{{ asset('assets/media/icons/anadir_white.webp') }}" alt="">
                        </a>

                </div>
            </div>

            <div class="col-6 col-xs-6 col-sm-6 col-md-6-col-xl-4 mb-3 d-flex justify-content-center animation_card">
                <div class="card_dashboard p-2">

                    <div class="card_img">
                        <a href="">
                            <img class="img_icon_dash" src="{{ asset('assets/media/icons/keys.webp') }}" alt="">
                        </a>
                    </div>

                    <h6 class="tittle_card_dash text-center mt-3 mb-3">Licencias</h6>

                    <div class="d-flex justify-content-center">
                        <a href="" class="btn_primary_blue_dash"  data-bs-toggle="modal" data-bs-target="#creatLiceincia">
                            Crear
                        </a>
                    </div>

                </div>
            </div>

            <div class="col-6 col-xs-6 col-sm-6 col-md-6-col-xl-4 mb-3 d-flex justify-content-center animation_card">
                <div class="card_dashboard p-2">

                    <div class="card_img">
                        <a href="">
                            <img class="img_icon_dash" src="{{ asset('assets/media/icons/keys.webp') }}" alt="">
                        </a>
                    </div>

                    <h6 class="tittle_card_dash text-center mt-3 mb-3">Configuracion</h6>

                    <div class="d-flex justify-content-center">
                        <a href="{{ route('configuracion_admin.index') }}" class="btn_primary_blue_dash">
                            Acceder
                        </a>
                    </div>

                </div>
            </div>

        </div>

    </div>

</section>

@include('modals.create_licencia')
@include('modals.create_empresa')

@endsection


