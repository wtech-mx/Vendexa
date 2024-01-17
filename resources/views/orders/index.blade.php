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

                <form class="d-flex" role="search">
                    <input class="form-control input_search" type="search" placeholder="Buscar Orden" aria-label="Search">
                    <button class="btn btn_search me-0 me-md-3 me-lg-5 me-xl-5" type="submit">
                        <img class="icon_search" src="{{ asset('assets/media/icons/buscar.webp') }}" alt="">
                    </button>
                  </form>

                  <a class="btn btn_filter" data-bs-toggle="collapse" href="#collapseFilter" role="button" aria-expanded="false" aria-controls="collapseFilter">
                    <img class="icon_search" src="{{ asset('assets/media/icons/filtrar.webp') }}" alt="">
                  </a>
            </div>
              <div class="collapse" id="collapseFilter">
                Procimamente
              </div>

        </div>

        @foreach ($ordenes as $orden)
            <div class="col-12 col-xs-6 col-sm-6 col-md-4 col-xl-3 d-flex justify-content-center px-3 py-3">
                <div class="row px-3">
                    <div class="col-12 bg_minicart_ventas ">
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
                                    <a type="button" target="_blank" class="btn btn-sm btn_edit_prodcut_warning" href="{{ route('orders.show', $orden->id) }}">
                                        Ver Orden <img class="icon_edit_btn_warning" src="{{ asset('assets/media/icons/validando-billete.webp') }}" alt="">
                                    </a>
                                </div>

                            </div>

                        </div>

                    </div>
                </div>
            </div>
        @endforeach

    </div>

</section>

@endsection
