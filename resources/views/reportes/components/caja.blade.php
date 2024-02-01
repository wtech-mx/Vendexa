<div class="accordion-body row" style="margin: 0!important;padding: 0!important;">
    @if(Route::currentRouteName() == 'reportes.filtro_caja')
        <div class="form-group col-12 px-4 py-3">
            <h3 for="name" class="label_custom_primary_product mb-2"><strong>Ingresos</strong></h3>
        </div>
        <div class="row comtainer_products_width  mb-2 mt-2" style="margin: 0px;">

            @foreach ($registrosIngresos as $registroIngreso)
                <div class="col-6 col-sm-6 col-md-6 col-lg-9 my-auto">
                    <img class="img_prodcut_reportes d-inline" src="{{ asset('assets/media/icons/ingresos.webp') }}" alt="" >
                    <h5 class="d-inline text_titlle_tab_reporte">{{$registroIngreso->concepto}}</h5>
                </div>

                <div class="col-6 col-sm-6 col-md-6 col-lg-3">
                    <h6 class="text_subtitlle_tab_reporte">ID : {{$registroIngreso->id}}</h6>
                    <h5 class="text_titlle_tab_reporte">${{number_format($registroIngreso->monto, 2, '.', ',')}}</h5>
                    <h6 class="text_subtitlle_tab_reporte">Fecha : <b>{{ \Carbon\Carbon::parse($registroIngreso->fecha)->format('d/m/Y') }}</b></h6>
                </div>
            @endforeach

        </div>
    @endif
    
    <div class="form-group col-12 px-4 ">
        <h3 for="name" class="label_custom_primary_product ">Selecione las fecha :</h3>
    </div>
    <form class="row mt-3 mb-3" action="{{ route('reportes.filtro_caja') }}" method="GET" >
        <div class="form-group col-4 col-sm-4 col-md-4 col-lg-3 col-xl-3 px-4 py-3">
            <label for="name" class="label_custom_primary_sm mb-2">Fecha de inicio</label>
            <div class="input-group ">
                <span class="input-group-text span_custom_tab" >
                    <img class="icon_span_tab" src="{{ asset('assets/media/icons/calendar-dar.webp') }}" alt="" >
                </span>
                <input id="fecha_inicio_caja" name="fecha_inicio_caja" type="date"  class="form-control input_custom_tab" >
            </div>
        </div>

        <div class="form-group col-4 col-sm-4 col-md-4 col-lg-3 col-xl-3 px-4 py-3">
            <label for="name" class="label_custom_primary_sm mb-2">Fecha de Fin</label>
            <div class="input-group ">
                <span class="input-group-text span_custom_tab" >
                    <img class="icon_span_tab" src="{{ asset('assets/media/icons/calendar-dar.webp') }}" alt="" >
                </span>
                <input id="fecha_fin_caja" name="fecha_fin_caja" type="date"  class="form-control input_custom_tab">
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

    @if(Route::currentRouteName() == 'reportes.filtro_caja')
        @if ($configuracion->efectivo == 1)
            <div class="form-group col-6 col-sm-4 col-md-3 col-lg-2 col-xl-2 px-4 py-3">
                <p  class="label_custom_primary_sm mb-2">
                    <img src="{{ asset('assets/media/icons/efectivo.webp') }}" alt="" class="img_card_head_reportes"> Efectivo <br> <strong>${{number_format($sumaEfectivo, 2, '.', ',')}}</strong>
                </p>
            </div>
        @endif
        @if ($configuracion->tarjeta == 1)
            <div class="form-group col-6 col-sm-4 col-md-3 col-lg-2 col-xl-2 px-4 py-3">
                <p  class="label_custom_primary_sm mb-2">
                    <img src="{{ asset('assets/media/icons/t debito.webp') }}" alt="" class="img_card_head_reportes"> Tarjeta C/D <br> <strong>${{number_format($sumaTarjeta, 2, '.', ',')}}</strong>
                </p>
            </div>
        @endif
        @if ($configuracion->transferencia == 1)
            <div class="form-group col-6 col-sm-4 col-md-3 col-lg-2 col-xl-2 px-4 py-3">
                <p  class="label_custom_primary_sm mb-2">
                    <img src="{{ asset('assets/media/icons/pago-movil.webp') }}" alt="" class="img_card_head_reportes"> Transferencia <br> <strong>${{number_format($sumaTransferencia, 2, '.', ',')}}</strong>
                </p>
            </div>
        @endif
        @if ($configuracion->mercado_pago == 1)
            <div class="form-group col-6 col-sm-4 col-md-3 col-lg-2 col-xl-2 px-4 py-3">
                <p  class="label_custom_primary_sm mb-2">
                    <img src="{{ asset('assets/media/icons/t credito.png.webp') }}" alt="" class="img_card_head_reportes"> Mercado Pago <br> <strong>${{number_format($sumaMercadoPago, 2, '.', ',')}}</strong>
                </p>
            </div>
        @endif
        <div class="form-group col-auto px-0 py-3">

        </div>

        <div class="form-group col-12 px-4 py-3 mb-3">
            <h3 for="name" class="label_custom_primary_product mb-4"> <img src="{{ asset('assets/media/icons/bolsa-de-dinero.webp') }}" alt="" class="img_card_head_reportes"> Total <strong>${{number_format($sumaTotal, 2, '.', ',')}}</strong> </h3>

            {{-- <a href="{{ route('reportes_caja.pdf', ['fecha_inicio_caja' => $fechaInicio, 'fecha_fin_caja' => $fechaFin]) }}" class="btn_primary_blue_dash py-2">Generara Reporte  <img src="{{ asset('assets/media/icons/pdf.webp') }}" alt="" style="width: 23px"></a> --}}
        </div>

        <div class="form-group col-12 px-4 py-3">
            <h3 for="name" class="label_custom_primary_product mb-2"><strong>Egresos</strong></h3>
        </div>
        <div class="row comtainer_products_width  mb-2 mt-2" style="margin: 0px;">

            @foreach ($registrosEgresos as $registroEgreso)
                <div class="col-6 col-sm-6 col-md-6 col-lg-9 my-auto">
                    <img class="img_prodcut_reportes d-inline" src="{{ asset('assets/media/icons/gasto.webp') }}" alt="" >
                    <h5 class="d-inline text_titlle_tab_reporte">{{$registroEgreso->concepto}}</h5>
                </div>

                <div class="col-6 col-sm-6 col-md-6 col-lg-3">
                    <h6 class="text_subtitlle_tab_reporte">ID : {{$registroEgreso->id}}</h6>
                    <h5 class="text_titlle_tab_reporte">${{number_format($registroEgreso->monto, 2, '.', ',')}}</h5>
                    <h6 class="text_subtitlle_tab_reporte">Fecha : <b>{{ \Carbon\Carbon::parse($registroEgreso->fecha)->format('d/m/Y') }}</b></h6>
                </div>
            @endforeach

        </div>
    @endif
  </div>
