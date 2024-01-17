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
                    EMPLEADOS
                </h5>
            </div>
        </div>

        <div class="col-12 mb-5">
            <div class="d-flex justify-content-center">

                <form class="d-flex" role="search">
                    <input class="form-control input_search" type="search" placeholder="Buscar Empledo" aria-label="Search">
                     <a class="btn btn_search me-5" type="submit">
                        <img class="icon_search" src="{{ asset('assets/media/icons/buscar.webp') }}" alt="">
                    </a>
                  </form>

                  <a class="btn btn_filter" data-bs-toggle="collapse" href="#collapseFilter" role="button" aria-expanded="false" aria-controls="collapseFilter">
                    <img class="icon_search" src="{{ asset('assets/media/icons/filtrar.webp') }}" alt="">
                  </a>
            </div>
              <div class="collapse" id="collapseFilter">
                Procimamente
              </div>

        </div>

        <div class="row medidor_altura">

            @foreach ($trabajadores as $trabajador)

            <div class="col-12 col-xs-6 col-sm-6 col-md-4 col-xl-4  px-3 py-1">

                <div class="row bg_minicart_ventas">

                    <div class="col-3 my-auto">
                        <p class="text-center" style="margin: 0">
                            @if($trabajador->foto == NULL)
                                <img class="img_perfil_empleado" src="{{ asset('assets/media/icons/user_predeterminado.webp') }}" alt="">
                            @else
                                <img class="img_perfil_empleado" src="{{ asset('foto_trabajador/empresa'.auth()->user()->id_empresa.'/'.$trabajador->foto) }}" alt="">
                            @endif
                        </p>
                    </div>

                    <div class="col-9 ">

                        <div class="row">
                            <div class="col-6">
                                <p class="text_empleado text-start">Empleado</p>
                            </div>

                            <div class="col-6">
                                <p class="text_empleado text-end"><strong> #{{$trabajador->id}}</strong></p>
                            </div>

                            <div class="col-12 mb-2">
                                <P class="text_empleado_value text-start">
                                    {{$trabajador->name}}
                                </P>
                            </div>

                            <div class="col-4 mb-1">
                                <p class="text_subtittle_ventas text-start">
                                    <img class="img_subtittle_ventas" src="{{ asset('assets/media/icons/telefono.png.webp') }}" alt="">
                                    Tel
                                </p>
                                <p class="text_subtittle_ventas_sv text-center">
                                    {{$trabajador->email}}
                                </p>
                            </div>


                            <div class="col-4 mb-1">
                                <p class="text_subtittle_ventas text-start">
                                    <img class="img_subtittle_ventas" src="{{ asset('assets/media/icons/sobre.png.webp') }}" alt="">
                                    Correo
                                </p>
                                <p class="text_subtittle_ventas_sv text-center">
                                    {{$trabajador->correo}}
                                </p>
                            </div>

                            <div class="col-4 mb-1">
                                <p class="text_subtittle_ventas text-start">
                                    <img class="img_subtittle_ventas" src="{{ asset('assets/media/icons/carrito.webp') }}" alt="">
                                    Arts
                                </p>
                                <p class="text_subtittle_ventas_sv text-center">
                                    #
                                </p>
                            </div>

                            <div class="col-12 mb-2 mt-2">
                                <div class="d-flex justify-content-between  ">
                                    <P class="text_empleado_value text-start mt-2">
                                    </P>

                                    <a type="button" class="btn btn-sm btn_edit_prodcut_warning" href="{{ route('trabajadores.show', $trabajador->id) }}">
                                        Details <img class="icon_edit_btn_warning" src="{{ asset('assets/media/icons/business-card-design.webp') }}" alt="">
                                    </a>


                                    <a type="button"  class="btn btn-sm btn_edit_prodcut_primary" data-bs-toggle="modal" data-bs-target="#editEmpleado{{ $trabajador->id }}">
                                        Ver <img class="icon_edit_btn_warning" src="{{ asset('assets/media/icons/editar.webp') }}" alt="">
                                    </a>
                                </div>
                            </div>

                        </div>

                    </div>

                </div>

            </div>

            @include('modals.edit_empleados')
            @endforeach

        </div>


    </div>

</section>

@endsection
