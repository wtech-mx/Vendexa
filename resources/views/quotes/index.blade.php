@extends('layouts.app')

@section('css_custom')

<link rel="stylesheet" href="{{ asset('assets/css/orders.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/products.css') }}">

@endsection


@section('content')

<section class="bg_orders row">

    <div class="col-12 d-flex justify-content-center">
        <h5 class="tittle_orders text-center mt-2 mb-3">
            ¡ Cotizaciones !
        </h5>

        <a class="btn btn_filter" data-bs-toggle="collapse" href="#collapseFilterCotizacion" role="button" aria-expanded="false" aria-controls="collapseFilterCotizacion">
            <img class="icon_search" src="{{ asset('assets/media/icons/filtrar.webp') }}" alt="">
        </a>

        @if(Route::currentRouteName() == 'quotes.filtro')
        <a class="btn btn_filter" href="{{ route('quotes.index') }}" role="button">
            <img class="icon_search" src="{{ asset('assets/media/icons/eraser.webp') }}" alt="">
        </a>
        @endif
    </div>
    <div class="collapse container_filter p-2 mt-3" id="collapseFilterCotizacion" style="background: #ffffff;">

        <form class="row mt-3 mb-3" action="{{ route('quotes.filtro') }}" method="GET" >

                <div class="col-12">
                    <h6>Filtros</h6>
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
                    <label class="form-label tiitle_products">Cliente</label>
                    <div class="input-group">
                        <span class="input-group-text span_custom_tab" >
                            <img class="icon_span_tab" src="{{ asset('assets/media/icons/distribuidor-imageonline.co-1952752.webp') }}" alt="" >
                        </span>
                        <select name="id_cliente" id="id_cliente" class="form-select d-inline-block input_custom_tab cliente">
                            <option value="" {{ old('') == '' ? 'selected' : '' }}>Selecionar </option>
                            @foreach ($clientes as $cliente)
                                <option value="{{ $cliente->id }}" @if(old('id_cliente') == $cliente->id) selected @endif>{{ $cliente->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-6 col-md-4 col-lg-4 py-3">
                    <label class="form-label tiitle_products">Trabajador</label>
                    <div class="input-group">
                        <span class="input-group-text span_custom_tab" >
                            <img class="icon_span_tab" src="{{ asset('assets/media/icons/categorias.webp') }}" alt="" >
                        </span>
                        <select name="id_trabajador" id="id_trabajador" class="form-select d-inline-block input_custom_tab trabajador">
                            <option value="" {{ old('') == '' ? 'selected' : '' }}>Selecionar</option>
                            @foreach ($trabajadores as $trabajador)
                                <option value="{{ $trabajador->id }}" @if(old('id_trabajador') == $trabajador->id) selected @endif>{{ $trabajador->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-6 col-md-4 col-lg-4 py-3">
                    <label class="form-label tiitle_products">Estatus</label>
                    <div class="input-group">
                        <span class="input-group-text span_custom_tab" >
                            <img class="icon_span_tab" src="{{ asset('assets/media/icons/paquete.webp') }}" alt="" >
                        </span>
                        <select name="estatus_cotizacion" id="estatus_cotizacion" class="form-select d-inline-block input_custom_tab">
                            <option value="" {{ old('') == '' ? 'selected' : '' }}>Selecionar </option>
                            <option value="Pendiente" @if(old('estatus_cotizacion') == 'Pendiente') selected @endif>Pendiente</option>
                            <option value="Cancelado" @if(old('estatus_cotizacion') == 'Cancelado') selected @endif>Cancelado</option>
                        </select>
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
    @foreach ($cotizaciones as $cotizacion)
        <div class="col-12 col-xs-6 col-sm-6 col-md-4 col-xl-3 d-flex justify-content-center px-3 py-3">
            <div class="row px-3">
                <div class="col-12 bg_minicart_ventas ">
                    <p class="text-center" style="margin: 0">
                        @foreach ($cotizacion->Productos->take(1) as $producto)
                            <img class="img_portada_product_edit_ventas" src="{{ asset('imagen_principal/empresa'.auth()->user()->id_empresa.'/'.$producto->Productos->imagen_principal) }}" alt="">
                        @endforeach

                    </p>

                    <div class="row">
                        <div class="col-6">
                            <p class="text_empleado text-start">Empleado</p>
                        </div>

                        <div class="col-6">
                            <p class="text_empleado text-end"><strong> #{{$cotizacion->id}}</strong></p>
                        </div>

                        <div class="col-12 mb-2">
                            <P class="text_empleado_value text-start">
                                {{$cotizacion->User->name}}
                            </P>
                        </div>

                        <div class="col-6 mb-3">
                            <p class="text_subtittle_ventas text-start">
                                <img class="img_subtittle_ventas" src="{{ asset('assets/media/icons/etiqueta-del-precio.webp') }}" alt="">
                                Total :
                            </p>
                            <p class="text_subtittle_ventas_sv text-center">
                                ${{$cotizacion->total}}
                            </p>
                        </div>

                        <div class="col-6 mb-3">
                            <p class="text_subtittle_ventas text-start">
                                <img class="img_subtittle_ventas" src="{{ asset('assets/media/icons/en-stock.png.webp') }}" alt="">
                                Piezas :
                            </p>
                            <p class="text_subtittle_ventas_sv text-center">
                                @if ($cotizacion->Productos->count() > 1)
                                    @foreach ($cotizacion->Productos->take(1) as $producto)
                                        {{ $producto->cantidad }} {{ $producto->Productos->unidad_venta }}
                                    @endforeach
                                    Más...
                                @else
                                    @foreach ($cotizacion->Productos as $producto)
                                        {{ $producto->cantidad }}
                                    @endforeach
                                @endif
                            </p>
                        </div>

                        <div class="col-6 mb-3">
                            <p class="text_subtittle_ventas text-start">
                                <img class="img_subtittle_ventas" src="{{ asset('assets/media/icons/semaforos.webp') }}" alt="">
                                Esatus :
                            </p>
                            <p class="text_subtittle_ventas_sv text-center">
                                {{$cotizacion->estatus_cotizacion}}
                            </p>
                        </div>

                        <div class="col-6 mb-3">
                            <p class="text_subtittle_ventas text-start">
                                <img class="img_subtittle_ventas" src="{{ asset('assets/media/icons/calendar-dar.webp') }}" alt="">
                                Fecha :
                            </p>
                            <p class="text_subtittle_ventas_sv text-center">
                                {{ \Carbon\Carbon::parse($cotizacion->fecha)->isoFormat('D MMMM YYYY') }}
                            </p>
                        </div>

                        <div class="col-12">
                            <p class="text_subtittle_ventas_sv text-start">
                                Cliente
                            </p>
                            <p class="text_subtittle_ventas text-start">
                                {{$cotizacion->Cliente->nombre}}
                        </p>
                        </div>

                        <div class="col-12 mb-2 mt-3">
                            <div class="d-flex justify-content-center">
                                <a type="button" target="_blank" class="btn btn-sm btn_edit_prodcut_warning" href="{{ route('orders.show', $cotizacion->id) }}">
                                    Ver cotizacion <img class="icon_edit_btn_warning" src="{{ asset('assets/media/icons/validando-billete.webp') }}" alt="">
                                </a>
                            </div>

                        </div>

                    </div>

                </div>
            </div>
        </div>
    @endforeach

</section>

@endsection

@section('js_custom')
    <script type="text/javascript">
        $(document).ready(function() {
            $('.cliente').select2();
            $('.trabajador').select2();
        });
    </script>
@endsection
