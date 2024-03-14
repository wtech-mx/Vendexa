@extends('layouts.app')

@section('template_title')
    Proveedores
@endsection

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
                    PROVEEDORES
                </h5>
            </div>
        </div>

        <div class="col-12 mb-5">
            <div class="d-flex justify-content-center ">

                <form class="d-flex" role="search">
                    <input class="form-control input_search" type="search" placeholder="Buscar Proveedor" aria-label="Search">
                    <button class="btn btn_search me-0 me-md-3 me-lg-5 me-xl-5" type="submit">
                        <img class="icon_search" src="{{ asset('assets/media/icons/buscar.webp') }}" alt="">
                    </button>
                  </form>

                  <a class="btn btn_filter" data-bs-toggle="collapse" href="#collapseFilter" role="button" aria-expanded="false" aria-controls="collapseFilter">
                    <img class="icon_search" src="{{ asset('assets/media/icons/filtrar.webp') }}" alt="">
                  </a>

                  <a class="btn btn_filter" data-bs-toggle="modal" data-bs-target="#creatProveedor" style="margin-left: 1rem">
                    <img class="icon_search" src="{{ asset('assets/media/icons/anadir_white.webp') }}" alt="">
                  </a>
            </div>
              <div class="collapse" id="collapseFilter">
                Proximamente
              </div>

        </div>
        @include('modals.create_proveedor')
        <div class="row medidor_altura">

            @foreach ($proveedores as $proveedor)

                <div class="col-12 col-sm-12 col-md-6 col-xl-4 px-2 px-md-4 px-lg-3 py-2 py-md-3 py-lg-1">

                    <div class="row bg_minicart_ventas">

                        <div class="col-2 col-sm-3  col-md-3 col-lg-3 my-auto">
                            <p class="text-center" style="margin: 0">
                                <img class="img_perfil_empleado" src="{{ asset('assets/media/icons/user_predeterminado.webp') }}" alt="">
                            </p>
                        </div>

                        <div class="col-10 col-sm-9  col-md-9 col-lg-9">

                            <div class="row">
                                <div class="col-6">
                                    <p class="text_empleado text-start">Proveedor</p>
                                </div>

                                <div class="col-6">
                                    <p class="text_empleado text-end"><strong> #{{$proveedor->id}}</strong></p>
                                </div>

                                <div class="col-12 mb-2">
                                    <P class="text_empleado_value text-start">
                                        {{$proveedor->nombre}}
                                    </P>
                                </div>

                                <div class="col-4 mb-1">
                                    <p class="text_subtittle_ventas text-start">
                                        <img class="img_subtittle_ventas" src="{{ asset('assets/media/icons/telefono.png.webp') }}" alt="">
                                        Tel
                                    </p>
                                    <p class="text_subtittle_ventas_sv text-center">
                                        {{$proveedor->telefono}}
                                    </p>
                                </div>


                                <div class="col-4 mb-1">
                                    <p class="text_subtittle_ventas text-start">
                                        <img class="img_subtittle_ventas" src="{{ asset('assets/media/icons/sobre.png.webp') }}" alt="">
                                        Correo
                                    </p>
                                    <p class="text_subtittle_ventas_sv text-center">
                                        {{$proveedor->correo}}
                                    </p>
                                </div>

                                <div class="col-12 mb-2 mt-2">
                                    <div class="d-flex justify-content-between  ">
                                        <P class="text_empleado_value text-start mt-2">
                                        </P>

                                        <a type="button" class="btn btn-sm btn_edit_prodcut_warning" href="{{ route('proveedor.show', ['id' => $proveedor->id, 'code' => $code_global]) }}">
                                            Facturas <img class="icon_edit_btn_warning" src="{{ asset('assets/media/icons/business-card-design.webp') }}" alt="">
                                        </a>


                                        <a type="button"  class="btn btn-sm btn_edit_prodcut_primary" data-bs-toggle="modal" data-bs-target="#editProveedor{{ $proveedor->id }}">
                                            Editar <img class="icon_edit_btn_warning" src="{{ asset('assets/media/icons/editar.webp') }}" alt="">
                                        </a>
                                    </div>
                                </div>

                            </div>

                        </div>

                    </div>

                </div>
                @include('modals.edit_proveedor')
                @include('modals.add_facturas')
            @endforeach
        </div>

    </div>

</section>

@endsection
