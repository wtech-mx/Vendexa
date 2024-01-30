@extends('layouts.app')

@section('template_title')
    Clientes
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
                    Clientes
                </h5>
            </div>
        </div>

        <div class="col-12 mb-5">
            <div class="d-flex justify-content-center">

                <form class="d-flex" role="search">
                    <input class="form-control input_search" type="search" placeholder="Buscar clientes" aria-label="Search">
                    <button class="btn btn_search me-0 me-md-3 me-lg-5 me-xl-5" type="submit">
                        <img class="icon_search" src="{{ asset('assets/media/icons/buscar.webp') }}" alt="">
                    </button>
                  </form>

                  <a class="btn btn_filter" data-bs-toggle="collapse" href="#collapseFilter" role="button" aria-expanded="false" aria-controls="collapseFilter">
                    <img class="icon_search" src="{{ asset('assets/media/icons/filtrar.webp') }}" alt="">
                  </a>

                  @if(Route::currentRouteName() == 'clientes.filtro')
                  <a class="btn btn_filter" href="{{ route('clientes.index') }}" role="button">
                      <img class="icon_search" src="{{ asset('assets/media/icons/eraser.webp') }}" alt="">
                  </a>
                  @endif
            </div>
                <div class="collapse container_filter p-2 mt-3" id="collapseFilter" style="background: #ffffff;">

                <form class="row mt-3 mb-3" action="{{ route('clientes.filtro') }}" method="GET" >
                    <div class="col-12">
                        <h6>Filtros</h6>
                    </div>

                    <div class="col-6 col-md-4 col-lg-4 py-3">
                        <label class="form-label tiitle_products">Tipo cliente </label>
                        <div class="input-group">
                            <span class="input-group-text span_custom_tab" >
                                <img class="icon_span_tab" src="{{ asset('assets/media/icons/descuento.webp') }}" alt="" >
                            </span>
                            <select name="tipo_cliente" id="tipo_cliente" class="form-select d-inline-block input_custom_tab">
                                <option value="" {{ old('') == '' ? 'selected' : '' }}>Selecionar </option>
                                    <option value="Menudeo" @if(old('tipo_cliente') == 'Menudeo') selected @endif>Menudeo</option>
                                    <option value="Mayorista" @if(old('tipo_cliente') == 'Mayorista') selected @endif>Mayoreo</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-6 col-md-4 col-lg-4 py-3">
                        <label class="form-label tiitle_products">Rango Cumpleaños de</label>
                        <div class="input-group">
                            <span class="input-group-text span_custom_tab" >
                                <img class="icon_span_tab" src="{{ asset('assets/media/icons/cero.webp') }}" alt="" >
                            </span>
                            <input id="cumpleaños_de" name="cumpleaños_de" type="date"  class="form-control input_custom_tab @error('stock_de') is-invalid @enderror"  value="{{ old('stock_de') }}" autocomplete="" autofocus>
                        </div>
                    </div>

                    <div class="col-6 col-md-4 col-lg-4 py-3">
                        <label class="form-label tiitle_products">hasta </label>
                        <div class="input-group">
                            <span class="input-group-text span_custom_tab" >
                                <img class="icon_span_tab" src="{{ asset('assets/media/icons/9.webp') }}" alt="" >
                            </span>
                            <input id="cumpleaños_a" name="cumpleaños_a" type="date"  class="form-control input_custom_tab @error('stock_a') is-invalid @enderror"  value="{{ old('stock_a') }}" autocomplete="" autofocus>
                        </div>
                    </div>

                    <div class="col-6 col-md-4 col-lg-4 py-3">
                        <label class="form-label tiitle_products">-</label>
                        <div class="input-group">
                            <button class="btn btn_filter text-white" type="submit" style="">Buscar
                                <img class="icon_span_tab" src="{{ asset('assets/media/icons/buscar.webp') }}" alt="" >

                            </button>
                        </div>

                    </div>
                </form>
              </div>

        </div>

        <div class="col-12 mb-5">
            <div class="d-flex justify-content-center row ">

                <a class="card_box_colores me-5 stock">
                    <p class="text_estatus_product">Fiel</p>
                </a>

                <a class="card_box_colores me-5 ms-5 lowStock">
                    <p class="text_estatus_product">Recurrente</p>
                </a>

                <a class="card_box_colores me-5 ms-5 outStock">
                    <p class="text_estatus_product">Ocasional</p>
                </a>
            </div>
        </div>

        <div class="row medidor_altura">

            @foreach ($clientes as $item)

            <div class="col-12 col-sm-12 col-md-6 col-xl-4 px-2 px-md-4 px-lg-3 py-2 py-md-3 py-lg-1">
                <div class="row bg_minicart_ventas">

                    <div class="col-3 my-auto">
                        <p class="text-center" style="margin: 0">
                            @if($item->imagen_principal == NULL)
                                <img class="img_perfil_empleado" src="{{ asset('assets/media/icons/user_predeterminado.webp') }}" alt="">
                            @else
                                <img class="img_perfil_empleado" src="{{ asset('imagen_cliente/empresa'.auth()->user()->id_empresa.'/'.$trabajador->imagen_principal) }}" alt="">
                            @endif
                        </p>
                    </div>

                    <div class="col-9 ">

                        <div class="row">
                            <div class="col-6">
                                <p class="text_empleado text-start">Cliente</p>
                            </div>

                            <div class="col-6">
                                <p class="text_empleado text-end"><strong> #{{$item->id}}</strong></p>
                            </div>

                            <div class="col-12 mb-2">
                                <P class="text_empleado_value text-start">
                                    {{$item->nombre}}
                                </P>
                            </div>

                            <div class="col-4 mb-1">
                                <p class="text_subtittle_ventas text-start">
                                    <img class="img_subtittle_ventas" src="{{ asset('assets/media/icons/telefono.png.webp') }}" alt="">
                                    Telefono
                                </p>
                                <p class="text_subtittle_ventas_sv text-center">
                                    {{$item->telefono}}
                                </p>
                            </div>


                            <div class="col-4 mb-1">
                                <p class="text_subtittle_ventas text-start">
                                    <img class="img_subtittle_ventas" src="{{ asset('assets/media/icons/sobre.png.webp') }}" alt="">
                                    Correo
                                </p>
                                <p class="text_subtittle_ventas_sv text-center">
                                    {{$item->correo}}
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

                                    <a type="button" class="btn btn-sm btn_edit_prodcut_warning" href="{{ route('clientes.show', $item->id) }}">
                                        Details <img class="icon_edit_btn_warning" src="{{ asset('assets/media/icons/business-card-design.webp') }}" alt="">
                                    </a>

                                    <a type="button"  class="btn btn-sm btn_edit_prodcut_primary" data-bs-toggle="modal" data-bs-target="#editCliente{{ $item->id }}">
                                        Ver <img class="icon_edit_btn_warning" src="{{ asset('assets/media/icons/editar.webp') }}" alt="">
                                    </a>
                                </div>
                            </div>

                        </div>

                    </div>

                </div>
            </div>

            @include('modals.edit_clientes')

            @endforeach

        </div>


    </div>

</section>



@endsection
