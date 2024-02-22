<div class="accordion-body row" style="margin: 0!important;padding: 0!important;">

    <div class="form-group col-12 px-4 py-3">
        <h3 for="name" class="label_custom_primary_product mb-2"><strong>Cotizaciones</strong></h3>
    </div>

    <div class="form-group col-12 px-4 ">
        <h3 for="name" class="label_custom_primary_product ">Seleccione las fecha :</h3>
    </div>

    <form class="row mt-3 mb-3" action="{{ route('reportes.filtro_cotizacion') }}" method="GET" >
        <div class="form-group col-6 col-sm-6 col-md-6 col-lg-3 col-xl-3 px-4 py-3">
            <label for="name" class="label_custom_primary_sm mb-2">Fecha de inicio</label>
            <div class="input-group ">
                <span class="input-group-text span_custom_tab" >
                    <img class="icon_span_tab" src="{{ asset('assets/media/icons/calendar-dar.webp') }}" alt="" >
                </span>
                <input id="fecha_inicio_cotizacion" name="fecha_inicio_cotizacion" type="date"  class="form-control input_custom_tab" >
            </div>
        </div>

        <div class="form-group col-6 col-sm-6 col-md-6 col-lg-3 col-xl-3 px-4 py-3">
            <label for="name" class="label_custom_primary_sm mb-2">Fecha de Fin</label>
            <div class="input-group ">
                <span class="input-group-text span_custom_tab" >
                    <img class="icon_span_tab" src="{{ asset('assets/media/icons/calendar-dar.webp') }}" alt="" >
                </span>
                <input id="fecha_fin_cotizacion" name="fecha_fin_cotizacion" type="date"  class="form-control input_custom_tab">
            </div>
        </div>

        <div class="form-group col-4 col-sm-4 col-md-4 col-lg-3 col-xl-3 px-4 py-3">
            <label for="name" class="label_custom_primary_sm mb-2">Buscar</label>
            <div class="input-group ">
                <button class="btn btn_filter text-white" type="submit" style="">Buscar
                    <img class="icon_span_tab" src="{{ asset('assets/media/icons/buscar.webp') }}" alt="" >
                </button>
            </div>
        </div>

        <div class="form-group col-0 col-sm-0 col-md-0 col-lg-6 col-xl-6 px-4 py-3">

        </div>
    </form>

    <div class="form-group col-6 px-4 py-3">
        <h3 for="name" class="label_custom_primary_product mb-4">En espera</h3>

        @if(Route::currentRouteName() == 'reportes.filtro_cotizacion')
            @foreach ($cotizacionesVendidos as $cotizacioneVendido)
                @if ($cotizacioneVendido->estatus_cotizacion == 'Pendiente')
                    <div class="comtainer_products_width row">

                        <div class="col-6 col-sm-6 col-md-6 col-lg-9 my-auto">
                            <img class="img_prodcut_reportes d-inline" src="{{ asset('assets/media/icons/clientes.webp') }}" alt="" >
                            <h5 class="d-inline text_titlle_tab_reporte">{{$cotizacioneVendido->Cliente->nombre}}</h5>
                        </div>

                        <div class="col-6 col-sm-6 col-md-6 col-lg-3">
                            <h5 class="text_titlle_tab_reporte"># {{ $cotizacioneVendido->id}}</h5>
                            <h6 class="text_subtitlle_tab_reporte">Total : ${{ number_format($cotizacioneVendido->total, 2, '.', ',') }}</h6>
                            @if ($cotizacioneVendido->tipo_desc != 'Ninguno')
                                <h6 class="text_subtitlle_tab_reporte">{{$cotizacioneVendido->tipo_desc}}: {{$cotizacioneVendido->descuento}}</h6>
                            @endif
                            @if ($cotizacioneVendido->restante > 0)
                                <h6 class="text_subtitlle_tab_reporte">Deudor: ${{ number_format($cotizacioneVendido->restante, 2, '.', ',') }}</h6>
                            @endif
                            @if ($cotizacioneVendido->factura == 'Si')
                                <h5 class="text_titlle_tab_reporte">Factura</h5>
                            @endif
                            <a href="{{ route('orders.show', $cotizacioneVendido->id) }}" class="text_titlle_tab_reporte">Ver factura</a>
                        </div>

                    </div>
                @endif
            @endforeach
        @endif

    </div>

    <div class="form-group col-6 px-4 py-3">
        <h3 for="name" class="label_custom_primary_product mb-4">Aprobada</h3>


        @if(Route::currentRouteName() == 'reportes.filtro_cotizacion')
            @foreach ($cotizacionesVendidos as $cotizacioneVendido)
                @if ($cotizacioneVendido->estatus_cotizacion == 'Aprobada')
                    <div class="comtainer_products_width row">

                        <div class="col-6 col-sm-6 col-md-6 col-lg-9 my-auto">
                            <img class="img_prodcut_reportes d-inline" src="{{ asset('assets/media/icons/clientes.webp') }}" alt="" >
                            <h5 class="d-inline text_titlle_tab_reporte">{{$cotizacioneVendido->Cliente->nombre}}</h5>
                        </div>

                        <div class="col-6 col-sm-6 col-md-6 col-lg-3">
                            <h5 class="text_titlle_tab_reporte"># {{ $cotizacioneVendido->id}}</h5>
                            <h6 class="text_subtitlle_tab_reporte">Total : ${{ number_format($cotizacioneVendido->total, 2, '.', ',') }}</h6>
                            @if ($cotizacioneVendido->tipo_desc != 'Ninguno')
                                <h6 class="text_subtitlle_tab_reporte">{{$cotizacioneVendido->tipo_desc}}: {{$cotizacioneVendido->descuento}}</h6>
                            @endif
                            @if ($cotizacioneVendido->restante > 0)
                                <h6 class="text_subtitlle_tab_reporte">Deudor: ${{ number_format($cotizacioneVendido->restante, 2, '.', ',') }}</h6>
                            @endif
                            @if ($cotizacioneVendido->factura == 'Si')
                                <h5 class="text_titlle_tab_reporte">Factura</h5>
                            @endif
                            <a href="{{ route('orders.show', $cotizacioneVendido->id) }}" class="text_titlle_tab_reporte">Ver factura</a>
                        </div>

                    </div>
                @endif
            @endforeach
        @endif

    </div>

    <div class="form-group col-12 px-4 py-3 mb-3">
        @if(Route::currentRouteName() == 'reportes.filtro_cotizacion')
            <h3 for="name" class="label_custom_primary_product mb-4"> <img src="{{ asset('assets/media/icons/validando-billete.webp') }}" alt="" class="img_card_head_reportes"> Total <strong>{{count($cotizacionesVendidos)}} Cotizaciones</strong> </h3>
        @else
            <h3 for="name" class="label_custom_primary_product mb-4"> <img src="{{ asset('assets/media/icons/validando-billete.webp') }}" alt="" class="img_card_head_reportes"> Total <strong>0 Facturas</strong> </h3>
        @endif

        <a href="{{ route('orders.index', auth()->user()->Empresa->code) }}" class="btn_primary_blue_dash py-2">Generara Reporte  <img src="{{ asset('assets/media/icons/pdf.webp') }}" alt="" style="width: 23px"></a>
    </div>

</div>
