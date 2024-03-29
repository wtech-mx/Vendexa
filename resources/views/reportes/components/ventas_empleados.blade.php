<div class="accordion-body row" style="margin: 0!important;padding: 0!important;">

    <div class="form-group col-12 px-4 py-3">
        <h3 for="name" class="label_custom_primary_product mb-2"><strong>Ventas de Empleados</strong></h3>
    </div>

    <div class="form-group col-12 px-4 ">
        <h3 for="name" class="label_custom_primary_product ">Seleccione las fecha :</h3>
    </div>

    <form class="row mt-3 mb-3" action="{{ route('reportes.filtro_empleados') }}" method="GET" >
        <div class="form-group col-6 col-sm-6 col-md-6 col-lg-3 col-xl-3 px-4 py-3">
            <label for="name" class="label_custom_primary_sm mb-2">Fecha de inicio</label>
            <div class="input-group ">
                <span class="input-group-text span_custom_tab" >
                    <img class="icon_span_tab" src="{{ asset('assets/media/icons/calendar-dar.webp') }}" alt="" >
                </span>
                <input id="fecha_inicio_empleados" name="fecha_inicio_empleados" type="date"  class="form-control input_custom_tab" >
            </div>
        </div>

        <div class="form-group col-6 col-sm-6 col-md-6 col-lg-3 col-xl-3 px-4 py-3">
            <label for="name" class="label_custom_primary_sm mb-2">Fecha de Fin</label>
            <div class="input-group ">
                <span class="input-group-text span_custom_tab" >
                    <img class="icon_span_tab" src="{{ asset('assets/media/icons/calendar-dar.webp') }}" alt="" >
                </span>
                <input id="fecha_fin_empleados" name="fecha_fin_empleados" type="date"  class="form-control input_custom_tab">
            </div>
        </div>

        {{-- <div class="form-group col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6 px-4 py-3">
            <label for="name" class="label_custom_primary_sm mb-2">Reporte de uno o varios empleados</label>
            <div class="input-group ">
                <span class="input-group-text span_custom_tab" >
                    <img class="icon_span_tab" src="{{ asset('assets/media/icons/empleados.webp') }}" alt="" >
                </span>
                <select name="empleados_nombre[]" class="form-select empleados-multiple" style="width: 70%!important;" multiple="multiple">

                    @foreach ($empleados as $empleado)
                        <option value="{{ $empleado->id }}" {{ in_array($empleado->id, old('empleados_nombre', [])) ? 'selected' : '' }}>
                            {{$empleado->name}}
                        </option>
                    @endforeach
                </select>
            </div>
        </div> --}}

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

    <div class="form-group col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6 px-4 py-3">
        <h3 for="name" class="label_custom_primary_product mb-4">Empleados con Mas ventas</h3>


        @if(Route::currentRouteName() == 'reportes.filtro_empleados')

            @foreach ($vendedoresMasVendieron as $vendedorMasVendieron)
                <div class="comtainer_products_width row mb-3">

                    <div class="col-8 col-sm-8 col-md-6 col-lg-9 my-auto">
                        <img class="img_prodcut_reportes d-inline" src="{{ asset('assets/media/icons/clientes.webp') }}" alt="" >
                        <h5 class="d-inline text_titlle_tab_reporte">{{$vendedorMasVendieron->name}}</h5>
                    </div>

                    <div class="col-4 col-sm-4 col-md-6 col-lg-3">
                        <h6 class="text_subtitlle_tab_reporte">telefono : {{$vendedorMasVendieron->telefono}}</h6>
                        <h5 class="text_titlle_tab_reporte">{{$vendedorMasVendieron->total_ventas}} Ventas</h5>
                        <a href="{{ route('trabajadores.show', $vendedorMasVendieron->id) }}" class="text_titlle_tab_reporte">Ver ventas</a>
                    </div>

                </div>
            @endforeach

        @endif


    </div>

    <div class="form-group col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6 px-4 py-3">
        <h3 for="name" class="label_custom_primary_product mb-4">Empleados con Menos ventas</h3>


        @if(Route::currentRouteName() == 'reportes.filtro_empleados')
            @foreach ($vendedoresMenosVendieron as $vendedorMenosVendieron)
                <div class="comtainer_products_width row">

                    <div class="col-6 col-sm-6 col-md-6 col-lg-9 my-auto">
                        <img class="img_prodcut_reportes d-inline" src="{{ asset('assets/media/icons/clientes.webp') }}" alt="" >
                        <h5 class="d-inline text_titlle_tab_reporte">{{$vendedorMenosVendieron->name}}</h5>
                    </div>

                    <div class="col-6 col-sm-6 col-md-6 col-lg-3">
                        <h6 class="text_subtitlle_tab_reporte">telefono : {{$vendedorMenosVendieron->telefono}}</h6>
                        <h5 class="text_titlle_tab_reporte">{{$vendedorMenosVendieron->total_ventas}} Ventas</h5>
                        <a href="{{ route('trabajadores.show', $vendedorMenosVendieron->id) }}" class="text_titlle_tab_reporte">Ver ventas</a>
                    </div>

                </div>
            @endforeach
        @endif

    </div>

    <div class="form-group col-12 px-4 py-3 mb-3">

        <a href="{{ route('orders.index', auth()->user()->Empresa->code) }}" class="btn_primary_blue_dash py-2">Generara Reporte  <img src="{{ asset('assets/media/icons/pdf.webp') }}" alt="" style="width: 23px"></a>
    </div>

</div>
