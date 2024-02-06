<div class="accordion-body row" style="margin: 0!important;padding: 0!important;">

    <div class="form-group col-12 px-4 py-3">
        <h3 for="name" class="label_custom_primary_product mb-2"><strong>Ventas de Empleados</strong></h3>
    </div>

    <div class="form-group col-12 px-4 ">
        <h3 for="name" class="label_custom_primary_product ">Seleccione las fecha :</h3>
    </div>

    <div class="form-group col-6 col-sm-6 col-md-6 col-lg-3 col-xl-3 px-4 py-3">
        <label for="name" class="label_custom_primary_sm mb-2">Fecha de inicio</label>
        <div class="input-group ">
            <span class="input-group-text span_custom_tab" >
                <img class="icon_span_tab" src="{{ asset('assets/media/icons/calendar-dar.webp') }}" alt="" >
            </span>
            <input id="fecha_inicio_desc_bulk" name="fecha_inicio_desc_bulk" type="date"  class="form-control input_custom_tab" >
        </div>
    </div>

    <div class="form-group col-6 col-sm-6 col-md-6 col-lg-3 col-xl-3 px-4 py-3">
        <label for="name" class="label_custom_primary_sm mb-2">Fecha de Fin</label>
        <div class="input-group ">
            <span class="input-group-text span_custom_tab" >
                <img class="icon_span_tab" src="{{ asset('assets/media/icons/calendar-dar.webp') }}" alt="" >
            </span>
            <input id="fecha_fin_desc_bulk" name="fecha_fin_desc_bulk" type="date"  class="form-control input_custom_tab">
        </div>
    </div>

    <div class="form-group col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6 px-4 py-3">
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
    </div>

    <div class="form-group col-6 px-4 py-3">
        <h3 for="name" class="label_custom_primary_product mb-4">Empleados con Mas ventas</h3>


        <div class="comtainer_products_width row">

            <div class="col-6 col-sm-6 col-md-6 col-lg-9 my-auto">
                <img class="img_prodcut_reportes d-inline" src="{{ asset('assets/media/icons/calendar-dar.webp') }}" alt="" >
                <h5 class="d-inline text_titlle_tab_reporte">NK300</h5>
            </div>

            <div class="col-6 col-sm-6 col-md-6 col-lg-3">
                <h6 class="text_subtitlle_tab_reporte">SKU : 1685513</h6>
                <h5 class="text_titlle_tab_reporte">100 Ventas</h5>
                <h6 class="text_subtitlle_tab_reporte">STOCK : 55</h6>
            </div>

        </div>

    </div>

    <div class="form-group col-6 px-4 py-3">
        <h3 for="name" class="label_custom_primary_product mb-4">Empleados con Menos ventas</h3>


        <div class="comtainer_products_width row">

            <div class="col-6 col-sm-6 col-md-6 col-lg-9 my-auto">
                <img class="img_prodcut_reportes d-inline" src="{{ asset('assets/media/icons/calendar-dar.webp') }}" alt="" >
                <h5 class="d-inline text_titlle_tab_reporte">NK300</h5>
            </div>

            <div class="col-6 col-sm-6 col-md-6 col-lg-3">
                <h6 class="text_subtitlle_tab_reporte">SKU : 1685513</h6>
                <h5 class="text_titlle_tab_reporte">100 Ventas</h5>
                <h6 class="text_subtitlle_tab_reporte">STOCK : 55</h6>
            </div>

        </div>

    </div>

    <div class="form-group col-12 px-4 py-3 mb-3">
        <h3 for="name" class="label_custom_primary_product mb-4"> <img src="{{ asset('assets/media/icons/empleados.webp') }}" alt="" class="img_card_head_reportes"> Total <strong>500 Ventas</strong> </h3>

        <a href="{{ route('orders.index', auth()->user()->Empresa->code) }}" class="btn_primary_blue_dash py-2">Generara Reporte  <img src="{{ asset('assets/media/icons/pdf.webp') }}" alt="" style="width: 23px"></a>
    </div>

</div>
