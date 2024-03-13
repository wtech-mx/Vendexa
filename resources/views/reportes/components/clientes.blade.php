<div class="accordion-body row" style="margin: 0!important;padding: 0!important;">

    <div class="form-group col-12 px-4 py-3">
        <h3 for="name" class="label_custom_primary_product mb-2"><strong>Clientes</strong></h3>
    </div>

    <div class="form-group col-12 px-4 ">
        <h3 for="name" class="label_custom_primary_product ">Seleccione las fecha :</h3>
    </div>

    <form class="row mt-3 mb-3" action="{{ route('reportes.filtro_clientes') }}" method="GET" >
        <div class="form-group col-12 col-sm-6 col-md-6 col-lg-3 col-xl-3 px-4 py-3">
            <label for="name" class="label_custom_primary_sm mb-2">Fecha de inicio</label>
            <div class="input-group ">
                <span class="input-group-text span_custom_tab" >
                    <img class="icon_span_tab" src="{{ asset('assets/media/icons/calendar-dar.webp') }}" alt="" >
                </span>
                <input id="fecha_inicio_clientes" name="fecha_inicio_clientes" type="date"  class="form-control input_custom_tab" >
            </div>
        </div>

        <div class="form-group col-12 col-sm-6 col-md-6 col-lg-3 col-xl-3 px-4 py-3">
            <label for="name" class="label_custom_primary_sm mb-2">Fecha de Fin</label>
            <div class="input-group ">
                <span class="input-group-text span_custom_tab" >
                    <img class="icon_span_tab" src="{{ asset('assets/media/icons/calendar-dar.webp') }}" alt="" >
                </span>
                <input id="fecha_fin_clientes" name="fecha_fin_clientes" type="date"  class="form-control input_custom_tab">
            </div>
        </div>

        <div class="form-group col-6 col-sm-4 col-md-4 col-lg-3 col-xl-3 px-4 py-3">
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

    <div class="form-group col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6 px-4 py-3">
        <h3 for="name" class="label_custom_primary_product mb-4">Fieles</h3>

        @if(Route::currentRouteName() == 'reportes.filtro_clientes')
            @foreach ($clientesFieles as $clienteFiel)
                <div class="comtainer_products_width row mb-3">

                    <div class="col-8 col-sm-8 col-md-6 col-lg-9 my-auto">
                        <img class="img_prodcut_reportes d-inline" src="{{ asset('assets/media/icons/clientes.webp') }}" alt="" >
                        <h5 class="d-inline text_titlle_tab_reporte">{{$clienteFiel->nombre}}</h5>
                    </div>

                    <div class="col-4 col-sm-4 col-md-6 col-lg-3">
                        <h6 class="text_subtitlle_tab_reporte">telefono : {{$clienteFiel->telefono}}</h6>
                        <h5 class="text_titlle_tab_reporte">{{$clienteFiel->total_compras}} Compras</h5>
                        <a href="{{ route('clientes.show', $clienteFiel->id) }}" class="text_titlle_tab_reporte">Ver cliente</a>
                    </div>

                </div>
            @endforeach
        @endif

    </div>

    <div class="form-group col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6 px-4 py-3">
        <h3 for="name" class="label_custom_primary_product mb-4">Recurrentes</h3>


        @if(Route::currentRouteName() == 'reportes.filtro_clientes')
            @foreach ($clientesRecurrentes as $clienteRecurrente)
                <div class="comtainer_products_width row mb-3">

                    <div class="col-8 col-sm-8 col-md-6 col-lg-9 my-auto">
                        <img class="img_prodcut_reportes d-inline" src="{{ asset('assets/media/icons/clientes.webp') }}" alt="" >
                        <h5 class="d-inline text_titlle_tab_reporte">{{$clienteRecurrente->nombre}}</h5>
                    </div>

                    <div class="col-4 col-sm-4 col-md-6 col-lg-3">
                        <h6 class="text_subtitlle_tab_reporte">telefono : {{$clienteRecurrente->telefono}}</h6>
                        <h5 class="text_titlle_tab_reporte">{{$clienteRecurrente->total_compras}} Compras</h5>
                        <a href="{{ route('clientes.show', $clienteRecurrente->id) }}" class="text_titlle_tab_reporte">Ver cliente</a>
                    </div>

                </div>
            @endforeach
        @endif

    </div>

    <div class="form-group col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6 px-4 py-3">
        <h3 for="name" class="label_custom_primary_product mb-4">Ocacionales</h3>


        @if(Route::currentRouteName() == 'reportes.filtro_clientes')
            @foreach ($clientesOcacionales as $clienteOcacional)
                <div class="comtainer_products_width row mb-3">

                    <div class="col-8 col-sm-8 col-md-6 col-lg-9 my-auto">
                        <img class="img_prodcut_reportes d-inline" src="{{ asset('assets/media/icons/clientes.webp') }}" alt="" >
                        <h5 class="d-inline text_titlle_tab_reporte">{{$clienteOcacional->nombre}}</h5>
                    </div>

                    <div class="col-4 col-sm-4 col-md-6 col-lg-3">
                        <h6 class="text_subtitlle_tab_reporte">telefono : {{$clienteOcacional->telefono}}</h6>
                        <h5 class="text_titlle_tab_reporte">{{$clienteOcacional->total_compras}} Compras</h5>
                        <a href="{{ route('clientes.show', $clienteOcacional->id) }}" class="text_titlle_tab_reporte">Ver cliente</a>
                    </div>

                </div>
            @endforeach
        @endif

    </div>

    <div class="form-group col-12 px-4 py-3 mb-3">
        <h3 for="name" class="label_custom_primary_product mb-4"> <img src="{{ asset('assets/media/icons/clientes.webp') }}" alt="" class="img_card_head_reportes"> Total <strong>500 Clientes</strong> </h3>

        <a href="{{ route('orders.index', auth()->user()->Empresa->code) }}" class="btn_primary_blue_dash py-2">Generara Reporte  <img src="{{ asset('assets/media/icons/pdf.webp') }}" alt="" style="width: 23px"></a>
    </div>

</div>
