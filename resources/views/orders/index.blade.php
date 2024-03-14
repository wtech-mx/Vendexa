@extends('layouts.app')

@section('css_custom')

<link rel="stylesheet" href="{{ asset('assets/css/orders.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/products.css') }}">

@endsection


@section('content')

<section class="products bg_product ">

    <div class="row z-1 position-relative px-3 px-md-4 px-xl-5">

        <div class="col-12 d-flex justify-content-center">
            <h5 class="tittle_orders text-center mt-2 mb-3">
                ¡ Ordenes !
            </h5>
        </div>

        <div class="col-12 mb-5">
            <div class="d-flex justify-content-center">

                    <form action="{{ route('orders.filtro', $code_global) }}" method="GET" >
                        <input class="form-control input_search" type="search" placeholder="Buscar Cliente" name="id_client">
                        <button class="btn btn_search me-0 me-md-3 me-lg-5 me-xl-5" type="submit">
                            <img class="icon_search" src="{{ asset('assets/media/icons/buscar.webp') }}" alt="">
                        </button>
                    </form>

                    <a class="btn btn_filter" data-bs-toggle="collapse" href="#collapseFilter" role="button" aria-expanded="false" aria-controls="collapseFilter">
                        <img class="icon_search" src="{{ asset('assets/media/icons/filtrar.webp') }}" alt="">
                    </a>

                  @if(Route::currentRouteName() == 'orders.filtro')
                    <a class="btn btn_filter" href="{{ route('orders.index', $code_global) }}" role="button">
                        <img class="icon_search" src="{{ asset('assets/media/icons/eraser.webp') }}" alt="">
                    </a>
                  @endif
            </div>
              <div class="collapse container_filter p-2 mt-3" id="collapseFilter" style="background: #ffffff;">
                <form class="row mt-3 mb-3" action="{{ route('orders.filtro', $code_global) }}" method="GET" >
                    <div class="col-12">
                        <h6>Filtros</h6>
                    </div>

                    <div class="col-6 col-md-4 col-lg-4 py-3">
                        <label class="form-label tiitle_products">Tipo</label>
                        <div class="input-group">
                            <span class="input-group-text span_custom_tab" >
                                <img class="icon_span_tab" src="{{ asset('assets/media/icons/descuento.webp') }}" alt="" >
                            </span>
                            <select name="tipo" id="tipo" class="form-select d-inline-block input_custom_tab">
                                <option value="" {{ old('') == '' ? 'selected' : '' }}>Selecionar </option>
                                    <option value="Deudores" @if(old('tipo') == 'Deudores') selected @endif>Deudores</option>
                                    <option value="Pagadas" @if(old('tipo') == 'Pagadas') selected @endif>Pagadas</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-6 col-md-4 col-lg-4 py-3">
                        <label class="form-label tiitle_products">Rango Fecha de</label>
                        <div class="input-group">
                            <span class="input-group-text span_custom_tab" >
                                <img class="icon_span_tab" src="{{ asset('assets/media/icons/cero.webp') }}" alt="" >
                            </span>
                            <input id="fecha_de" name="fecha_de" type="date"  class="form-control input_custom_tab @error('fecha_de') is-invalid @enderror"  value="{{ old('fecha_de') }}" autocomplete="" autofocus>
                        </div>
                    </div>

                    <div class="col-6 col-md-4 col-lg-4 py-3">
                        <label class="form-label tiitle_products">hasta </label>
                        <div class="input-group">
                            <span class="input-group-text span_custom_tab" >
                                <img class="icon_span_tab" src="{{ asset('assets/media/icons/9.webp') }}" alt="" >
                            </span>
                            <input id="fecha_a" name="fecha_a" type="date"  class="form-control input_custom_tab @error('fecha_a') is-invalid @enderror"  value="{{ old('fecha_a') }}" autocomplete="" autofocus>
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

        @if ($ordenes->isEmpty())
            <h1 class="tittle_orders text-center" style="margin-bottom: 25rem; margin-top: 15rem !important;">Sin Registros</h1>
        @else
            @foreach ($ordenes as $orden)
                <div class="col-12 col-xs-6 col-sm-6 col-md-4 col-xl-3 d-flex justify-content-center px-3 py-3">
                    <div class="row px-3">
                        <div class="col-12 bg_minicart_ventas @if ($orden->restante > 0)borde_card_product_sin_stock @else borde_card_product_stock @endif">
                            <p class="text-center" style="margin: 0">
                                @foreach ($orden->Productos->take(1) as $producto)
                                    <img class="img_portada_product_edit_ventas" src="{{ asset('imagen_principal/empresa'.auth()->user()->id_empresa.'/'.$producto->Productos->imagen_principal) }}" alt="">
                                @endforeach

                            </p>

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

                                <div class="col-6 mb-3">
                                    <p class="text_subtittle_ventas text-start">
                                        <img class="img_subtittle_ventas" src="{{ asset('assets/media/icons/etiqueta-del-precio.webp') }}" alt="">
                                        Total :
                                    </p>
                                    <p class="text_subtittle_ventas_sv text-center">
                                        ${{$orden->total}}
                                    </p>
                                </div>

                                <div class="col-6 mb-3">
                                    <p class="text_subtittle_ventas text-start">
                                        <img class="img_subtittle_ventas" src="{{ asset('assets/media/icons/en-stock.png.webp') }}" alt="">
                                        Piezas :
                                    </p>
                                    <p class="text_subtittle_ventas_sv text-center">
                                        @if ($orden->Productos->count() > 1)
                                            @foreach ($orden->Productos->take(1) as $producto)
                                                {{ $producto->cantidad }} {{ $producto->Productos->unidad_venta }}
                                            @endforeach
                                            Más...
                                        @else
                                            @foreach ($orden->Productos as $producto)
                                                {{ $producto->cantidad }}
                                            @endforeach
                                        @endif
                                    </p>
                                </div>

                                <div class="col-6 mb-3">
                                    <p class="text_subtittle_ventas text-start">
                                        <img class="img_subtittle_ventas" src="{{ asset('assets/media/icons/efectivo.webp') }}" alt="">
                                        Metd. Pago :
                                    </p>
                                    <p class="text_subtittle_ventas_sv text-center">
                                        @if ($orden->Pagos->count() > 1)
                                            @foreach ($orden->Pagos->take(1) as $pago)
                                                {{ $pago->metodo_pago }}
                                            @endforeach
                                            Más...
                                        @else
                                            @foreach ($orden->Pagos as $pago)
                                                {{ $pago->metodo_pago }}
                                            @endforeach
                                        @endif
                                    </p>
                                </div>

                                <div class="col-6 mb-3">
                                    <p class="text_subtittle_ventas text-start">
                                        <img class="img_subtittle_ventas" src="{{ asset('assets/media/icons/calendar-dar.webp') }}" alt="">
                                        Fecha :
                                    </p>
                                    <p class="text_subtittle_ventas_sv text-center">
                                        {{ \Carbon\Carbon::parse($orden->fecha)->isoFormat('D MMMM YYYY') }}
                                    </p>
                                </div>

                                <div class="col-12">
                                    <p class="text_subtittle_ventas_sv text-start">
                                        Cliente
                                    </p>
                                    <p class="text_subtittle_ventas text-start">
                                        {{$orden->Cliente->nombre}}
                                </p>
                                </div>

                                <div class="col-12 mb-2 mt-3">
                                    <div class="d-flex justify-content-center">
                                        <a type="button" target="_blank" class="btn btn-sm btn_edit_prodcut_warning" href="{{ route('orders.show', ['id' => $orden->id, 'code' => $code_global]) }}">
                                            Ver Orden <img class="icon_edit_btn_warning" src="{{ asset('assets/media/icons/validando-billete.webp') }}" alt="">
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

</section>

@endsection
