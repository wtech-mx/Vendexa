@extends('layouts.app')

@section('template_title')
    Caja
@endsection

@section('css_custom')

<link rel="stylesheet" href="{{ asset('assets/css/caja.css') }}">

@endsection


@section('content')

<section class="products bg_caja row px-3">

    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-4 col-xl-4 col-xxl-6">

            <div class="d-flex justify-content-center">
                <h5 class="tittle_caja text-center mt-2 mb-3">
                    ¡Caja!
                </h5>
            </div>

            <div class="row">

            <div class="form-group col-10 px-2 py-1">
                <label for="name" class="label_custom_primary_product_white mb-2">Busqueda Manual :</label>
                <div class="input-group ">
                    <span class="input-group-text span_custom_tab" >
                        <img class="icon_span_tab" src="{{ asset('assets/media/icons/fuente.webp') }}" alt="" >
                    </span>
                    <select name="producto_id" id="producto_id" class="form-select d-inline-block producto">
                        <option value="">Seleccione producto</option>
                        @foreach ($productos as $producto)
                        <option value="{{ explode('_', $producto->sku)[0] }}" data-image="{{ asset('imagen_principal/empresa'.auth()->user()->id_empresa.'/'.$producto->imagen_principal) }}">{{ $producto->nombre }}</option>
                        @endforeach
                    </select>

                </div>
            </div>

            <div class="form-group col-2 px-2 py-1">
                <label for="name" class="label_custom_primary_product_white mb-2"></label>
                <div class="input-group ">
                    <button type="button" class="input-group-text span_custom_primary_white mt-3" id="buscarBtn">
                        <img class="icon_span_form" src="{{ asset('assets/media/icons/buscar.webp') }}" alt="" >
                    </button>
                </div>
            </div>

            <div class="col-12  mt-5">
                <div class="form-group col-12 mb-3 ">
                    <div class="d-flex justify-content-center">
                        <div style="width: 500px" id="reader"></div>
                    </div>
                </div>
            </div>

            </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8 col-xl-8 col-xxl-6 z-1">
        <form id="miFormulario" class="row" method="POST" action="{{route('caja.store')}}" enctype="multipart/form-data" role="form" style="margin:0!important;margin-right: -1.5rem!important;">
            @csrf

            @php
                $currentURL = $_SERVER['REQUEST_URI'];
                $parts = explode('/', rtrim($currentURL, '/'));
                $lastPart = end($parts);
            @endphp

            <input type="hidden" name="id_cajero" value="{{ $lastPart }}">

            <div class="row">

                <div class="form-group col-12 px-2 py-1">
                    <h2 class="tiitle_modal_white text-left">Datos del cliente</h2>
                </div>

                <div class="form-group col-9 px-2 py-2">
                    <label for="name" class="label_custom_primary_product_white mb-2">Cliente :</label>
                    <div class="input-group ">
                        <span class="input-group-text span_custom_tab" >
                            <img class="icon_span_tab" src="{{ asset('assets/media/icons/user_predeterminado.webp') }}" alt="" >
                        </span>
                        <select name="id_client" class="form-select d-inline-block cliente">
                            <option value="">Seleccione cliente</option>
                            @foreach ($clientes as $cliente)
                            <option value="{{ $cliente->id }}">{{ $cliente->nombre }} - {{ $cliente->telefono }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group col-3 px-2 py-2">
                    <label for="name" class="label_custom_primary_product_white mb-4 d-block">Agregar</label>
                    <a class="btn_collapse_caja" data-bs-toggle="collapse" href="#collapseNewClient" role="button" aria-expanded="false" aria-controls="collapseNewClient">
                        <img class="img_plus_dash" src="{{ asset('assets/media/icons/anadir_white.webp') }}" alt="">
                    </a>
                </div>

                <div class="form-group col-6 px-3 py-2 collapse"  id="collapseNewClient">
                    <label for="name" class="label_custom_primary_sm_dark mb-2">Nombre(s) *</label>
                    <div class="input-group ">
                        <span class="input-group-text span_custom_tab" >
                            <img class="icon_span_tab" src="{{ asset('assets/media/icons/fuente.webp') }}" alt="" >
                        </span>
                        <input id="nombre_cliente" name="nombre_cliente" type="text"  class="form-control input_custom_tab_dark @error('nombre_cliente') is-invalid @enderror"  value="{{ old('nombre_cliente') }}">
                    </div>
                </div>

                <div class="form-group col-6 px-3 py-2 collapse"  id="collapseNewClient">
                    <label for="name" class="label_custom_primary_sm_dark mb-2">Apellido(s) *</label>
                    <div class="input-group ">
                        <span class="input-group-text span_custom_tab" >
                            <img class="icon_span_tab" src="{{ asset('assets/media/icons/fuente.webp') }}" alt="" >
                        </span>
                        <input id="apellido_cliente" name="apellido_cliente" type="text"  class="form-control input_custom_tab_dark @error('apellido_cliente') is-invalid @enderror"  value="{{ old('apellido_cliente') }}">
                    </div>
                </div>

                <div class="form-group col-6 px-3 py-2 collapse"  id="collapseNewClient">
                    <label for="name" class="label_custom_primary_sm_dark mb-2">WhatsApp *</label>
                    <div class="input-group ">
                        <span class="input-group-text span_custom_tab" >
                            <img class="icon_span_tab" src="{{ asset('assets/media/icons/whatsapp.webp') }}" alt="" >
                        </span>
                        <input id="whats_cliente" name="whats_cliente" type="tel" minlength="10" maxlength="10" class="form-control input_custom_tab_dark @error('whats_cliente') is-invalid @enderror"  value="{{ old('whats_cliente') }}">
                    </div>
                </div>

                <div class="form-group col-6 px-3 py-2 collapse"  id="collapseNewClient">
                    <label for="name" class="label_custom_primary_sm_dark mb-2">Correo Electronico</label>
                    <div class="input-group ">
                        <span class="input-group-text span_custom_tab" >
                            <img class="icon_span_tab" src="{{ asset('assets/media/icons/sobre.png.webp') }}" alt="" >
                        </span>
                        <input id="email_cliente" name="email_cliente" type="email"  class="form-control input_custom_tab_dark @error('email_cliente') is-invalid @enderror"  value="{{ old('email_cliente') }}">
                    </div>
                </div>

                <div class="form-group col-12 px-2 py-1">
                    <h2 class="tiitle_modal_white text-left">Productos</h2>
                </div>

                <!--  search products -->
                    <div id="carrito-container" class="col-12">
                        <div id="result">
                            <div id="listaProductos"></div>
                        </div>
                    </div>
                <!--  search products -->

                <div class="form-group col-6 px-2 py-3">
                    <h2 class="tiitle_modal_white text-left">¿Generar cotización?</h2>

                    <div class="input-group text-white d-flex justify-content-around mt-3">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input " type="radio" name="inlineCorizacion"  id="radioSiCotizacion" value="Si">
                            <label class="form-check-label" for="">Si</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input " type="radio" name="inlineCorizacion"  id="radioNoCotizacion" value="No" checked>
                            <label class="form-check-label" for="">No</label>
                        </div>
                    </div>
                </div>

                <div class="form-group col-12 px-2 py-1">
                    <h2 class="tiitle_modal_white text-left">Datos de Pago</h2>
                </div>

                <div class="form-group col-6 px-2 py-3">
                    <label for="name" class="label_custom_primary_product_white mb-2">Tipo Descuento:</label>
                    <div class="input-group ">
                        <span class="input-group-text span_custom_tab" >
                            <img class="icon_span_tab" src="{{ asset('assets/media/icons/gear.webp') }}" alt="" >
                        </span>
                        <select name="tipoDescuento" id="tipoDescuento" class="form-select d-inline-block input_custom_tab_dark" onchange="actualizarSumaSubtotales()">
                            <option value="Ninguno">Ninguno</option>
                            <option value="Fijo">Fijo</option>
                            <option value="Porcentaje">Porcentaje</option>
                        </select>
                    </div>
                </div>

                <div class="form-group col-6 px-2 py-3" id="divDescuento" style="display: none;">
                    <label for="name" class="label_custom_primary_product_white mb-2">Descuento :</label>
                    <div class="input-group ">
                        <span class="input-group-text span_custom_tab" >
                            <img class="icon_span_tab" src="{{ asset('assets/media/icons/descuento.webp') }}" alt="" >
                        </span>
                        <input id="montoDescuento" name="montoDescuento" type="double"  class="form-control input_custom_tab_dark @error('montoDescuento') is-invalid @enderror"  value="0" onchange="actualizarSumaSubtotales()">
                    </div>
                </div>

                <div class="form-group col-6 px-2 py-3 cotizacion-div">
                    <label for="name" class="label_custom_primary_product_white mb-2">Metodo de Pago :</label>
                    <div class="input-group ">
                        <span class="input-group-text span_custom_tab" >
                            <img class="icon_span_tab" src="{{ asset('assets/media/icons/metodo-de-pago.webp') }}" alt="" >
                        </span>
                        <select name="metodo_pago" id="metodo_pago" class="form-select d-inline-block input_custom_tab_dark">
                            @if ($configuracion->efectivo == 1)
                                <option value="Efectivo" @if(old('unidad_venta') == 'Efectivo') selected @endif>Efectivo</option>
                            @endif
                            @if ($configuracion->tarjeta == 1)
                                <option value="Tarjeta Credito/Debito" @if(old('unidad_venta') == 'Tarjeta Credito/Debito') selected @endif>Tarjeta Credito/Debito</option>
                            @endif
                            @if ($configuracion->transferencia == 1)
                                <option value="Transferencia" @if(old('unidad_venta') == 'Transferencia') selected @endif>Transferencia</option>
                            @endif
                            @if ($configuracion->mercado_pago == 1)
                                <option value="Mercado Pago" @if(old('unidad_venta') == 'Mercado Pago') selected @endif>Mercado Pago</option>
                            @endif
                        </select>
                    </div>
                </div>

                <div class="form-group col-6 px-2 py-3" id="comprobanteContainer">
                    <label for="name" class="label_custom_primary_product_white mb-2">Comprobante :</label>
                    <div class="input-group ">
                        <span class="input-group-text span_custom_tab" >
                            <img class="icon_span_tab" src="{{ asset('assets/media/icons/imagen.webp') }}" alt="">
                        </span>
                        <input id="comprobante" name="comprobante" type="file"  class="form-control input_custom_tab_dark @error('comprobante') is-invalid @enderror">
                    </div>
                </div>

                <div class="form-group col-6 px-2 py-3 cotizacion-div">
                    <label for="name" class="label_custom_primary_product_white mb-2">Dinero recibido :</label>
                    <div class="input-group ">
                        <span class="input-group-text span_custom_tab" >
                            <img class="icon_span_tab" src="{{ asset('assets/media/icons/efectivo.webp') }}" alt="" >
                        </span>
                        <input id="dineroRecibido" name="dineroRecibido" type="double"  class="form-control input_custom_tab_dark @error('dineroRecibido') is-invalid @enderror" onchange="actualizarSumaSubtotales()">
                    </div>
                </div>

                <div class="form-group col-6 px-2 py-3 cotizacion-div">
                    <label for="name" class="label_custom_primary_product_white mb-2">¿Metodo de Pago 2? </label>

                    <div class="input-group text-white d-flex justify-content-around mt-3">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input " type="radio" name="inlinePago"  id="radioSiPago" value="Si">
                            <label class="form-check-label" for="">Si</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input " type="radio" name="inlinePago"  id="radioNoPago" value="No" checked>
                            <label class="form-check-label" for="">No</label>
                        </div>
                    </div>
                </div>

                <div class="row" id="PagoContainer" style="display: none;">
                    <div class="form-group col-6 px-2 py-3">
                        <label for="name" class="label_custom_primary_product_white mb-2">Metodo de Pago 2:</label>
                        <div class="input-group ">
                            <span class="input-group-text span_custom_tab" >
                                <img class="icon_span_tab" src="{{ asset('assets/media/icons/metodo-de-pago.webp') }}" alt="" >
                            </span>
                            <select name="metodo_pago2" id="metodo_pago2" class="form-select d-inline-block input_custom_tab_dark">
                                <option value="" @if(old('unidad_venta') == '') selected @endif>Elige una opcion</option>
                                @if ($configuracion->efectivo == 1)
                                    <option value="Efectivo" @if(old('unidad_venta') == 'Efectivo') selected @endif>Efectivo</option>
                                @endif
                                @if ($configuracion->tarjeta == 1)
                                    <option value="Tarjeta Credito/Debito" @if(old('unidad_venta') == 'Tarjeta Credito/Debito') selected @endif>Tarjeta Credito/Debito</option>
                                @endif
                                @if ($configuracion->transferencia == 1)
                                    <option value="Transferencia" @if(old('unidad_venta') == 'Transferencia') selected @endif>Transferencia</option>
                                @endif
                                @if ($configuracion->mercado_pago == 1)
                                    <option value="Mercado Pago" @if(old('unidad_venta') == 'Mercado Pago') selected @endif>Mercado Pago</option>
                                @endif
                            </select>
                        </div>
                    </div>

                    <div class="form-group col-6 px-2 py-3">
                        <label for="name" class="label_custom_primary_product_white mb-2">Dinero recibido 2:</label>
                        <div class="input-group ">
                            <span class="input-group-text span_custom_tab" >
                                <img class="icon_span_tab" src="{{ asset('assets/media/icons/efectivo.webp') }}" alt="" >
                            </span>
                            <input id="dineroRecibido2" name="dineroRecibido2" type="double"  class="form-control input_custom_tab_dark @error('dineroRecibido2') is-invalid @enderror" onchange="actualizarSumaSubtotales()">
                        </div>
                    </div>
                </div>

                <div class="form-group col-6 px-2 py-3">
                    <label for="name" class="label_custom_primary_product_white mb-2">Total :</label>
                    <div class="input-group ">
                        <span class="input-group-text span_custom_tab" >
                            <img class="icon_span_tab" src="{{ asset('assets/media/icons/bolsa-de-dinero.webp') }}" alt="" >
                        </span>
                        <input id="sumaSubtotales" name="sumaSubtotales" type="text"  class="form-control input_custom_tab_dark @error('sumaSubtotales') is-invalid @enderror"  value="{{ old('sumaSubtotales') }}" readonly>
                    </div>
                </div>

                <div class="form-group col-6 px-2 py-3 cotizacion-div" id="restanteContainer">
                    <label for="name" class="label_custom_primary_product_white mb-2">Restante :</label>
                    <div class="input-group ">
                        <span class="input-group-text span_custom_tab" >
                            <img class="icon_span_tab" src="{{ asset('assets/media/icons/monedas.webp') }}" alt="" >
                        </span>
                        <input id="restante" name="restante" type="number"  class="form-control input_custom_tab_dark @error('restante') is-invalid @enderror"  value="{{ old('restante') }}" readonly>
                    </div>
                </div>

                <div class="form-group col-6 px-2 py-3 cotizacion-div" id="cambioContainer">
                    <label for="name" class="label_custom_primary_product_white mb-2">Cambio :</label>
                    <div class="input-group ">
                        <span class="input-group-text span_custom_tab" >
                            <img class="icon_span_tab" src="{{ asset('assets/media/icons/coins.webp') }}" alt="" >
                        </span>
                        <input id="cambio" name="cambio" type="number"  class="form-control input_custom_tab_dark @error('cambio') is-invalid @enderror"  value="{{ old('cambio') }}" readonly>
                    </div>
                </div>

                @if ($configuracion->opcion_factura == 1)
                    <div class="form-group col-6 px-2 py-3">
                        <label for="name" class="label_custom_primary_product_white mb-2">Factura </label>

                        <div class="input-group text-white d-flex justify-content-around mt-3">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input " type="radio" name="inlineFact"  id="radioSiFact" value="Si">
                                <label class="form-check-label" for="">Si</label>
                            </div>

                            <div class="form-check form-check-inline">
                                <input class="form-check-input " type="radio" name="inlineFact"  id="radioNoFact" value="No">
                                <label class="form-check-label" for="">No</label>
                            </div>
                        </div>
                    </div>
                @endif

                <div class="row" id="FacturaContainer" style="display: none;">
                    <div class="form-group col-12 px-2 py-1">
                        <h2 class="tiitle_modal_white text-left">Datos de facturación</h2>
                    </div>

                    <div class="form-group col-6 px-2 py-1">
                        <label for="name" class="label_custom_primary_product_white mb-2">Facturas Guardadas:</label>
                        <div class="input-group ">
                            <span class="input-group-text span_custom_tab" >
                                <img class="icon_span_tab" src="{{ asset('assets/media/icons/metodo-de-pago.webp') }}" alt="" >
                            </span>
                            <select name="id_factura" id="facturas" class="form-select d-inline-block input_custom_tab_dark facturas">
                                <option value="">Seleccione Cliente </option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group col-12 px-4 py-3" >
                        <label for="name" class="label_custom_primary_product_white mb-2">Nombre / Razon Social :</label>
                        <div class="input-group ">
                            <span class="input-group-text span_custom_tab" >
                                <img class="icon_span_tab" src="{{ asset('assets/media/icons/fuente.webp') }}" alt="" >
                            </span>
                            <input id="razon_cliente" name="razon_cliente" type="text"  class="form-control input_custom_tab_dark @error('razon_cliente') is-invalid @enderror"  value="{{ old('razon_cliente') }}">
                        </div>
                    </div>

                    <div class="form-group col-6 px-4 py-3" >
                        <label for="name" class="label_custom_primary_product_white mb-2">RFC:</label>
                        <div class="input-group ">
                            <span class="input-group-text span_custom_tab" >
                                <img class="icon_span_tab" src="{{ asset('assets/media/icons/sat.webp') }}" alt="" >
                            </span>
                            <input id="rfc_cliente" name="rfc_cliente" type="text"  class="form-control input_custom_tab_dark @error('rfc_cliente') is-invalid @enderror"  value="{{ old('rfc_cliente') }}">
                        </div>
                    </div>

                    <div class="form-group col-6 px-4 py-3" >
                        <label for="name" class="label_custom_primary_product_white mb-2">CFDI :</label>
                        <div class="input-group ">
                            <span class="input-group-text span_custom_tab" >
                                <img class="icon_span_tab" src="{{ asset('assets/media/icons/categorias.webp') }}" alt="" >
                            </span>
                            <select name="cfdi_cliente" id="cfdi_cliente" class="form-select d-inline-block input_custom_tab_dark">
                                <option value="" {{ old('') == '' ? 'selected' : '' }}>Selecionar </option>
                                <option value="G01 Adquisición de Mercancías" {{ old('') == '' ? 'selected' : '' }}>G01 Adquisición de Mercancías </option>
                                <option value="G02 Devoluciones, Descuentos o bonificaciones" {{ old('') == '' ? 'selected' : '' }}>G02 Devoluciones, Descuentos o bonificaciones </option>
                                <option value="G03 Gastos en general" {{ old('') == '' ? 'selected' : '' }}>G03 Gastos en general </option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group col-12 px-4 py-3" >
                        <label for="name" class="label_custom_primary_product_white mb-2">Direccion de Facturacion:</label>
                        <div class="input-group ">
                            <span class="input-group-text span_custom_tab" >
                                <img class="icon_span_tab" src="{{ asset('assets/media/icons/mapa-de-la-ciudad.webp') }}" alt="" >
                            </span>
                            <input id="direccion_cliente" name="direccion_cliente" type="text"  class="form-control input_custom_tab_dark @error('direccion_cliente') is-invalid @enderror"  value="{{ old('direccion_cliente') }}">
                        </div>
                    </div>

                </div>

                <div class="form-group col-12 mt-4 mb-4 ">
                    <p class="text-center ">
                        <button type="submit" class="btn btn-success btn_save_custom">Guardar</button>
                    </p>
                </div>

            </div>
        </form>
    </div>

</section>

@endsection

@section('js_custom')

<script type="text/javascript">

    $(document).ready(function() {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('.cliente').select2();

        $('.producto').select2({
            templateResult: formatOption, // Utiliza la función formatOption para personalizar la presentación
            templateSelection: formatOption, // Utiliza la función formatOption para personalizar la presentación en la selección
        });

                // Oculta el campo del comprobante al cargar la página
            $('#comprobanteContainer').hide();

            // Detecta el cambio en el select de Método de Pago
            $('#metodo_pago').change(function() {
                var selectedOption = $(this).val();

                // Muestra u oculta el campo del comprobante según la opción seleccionada
                if (selectedOption !== 'Efectivo') {
                    $('#comprobanteContainer').show();
                } else {
                    $('#comprobanteContainer').hide();
                }
            });

        // Función para personalizar la presentación de cada opción
        function formatOption(option) {
            if (!option.id) {
                return option.text;
            }

            // Puedes acceder a la imagen usando option.element.getAttribute('data-image')
            var imageUrl = option.element.getAttribute('data-image');

            // Personaliza la presentación de la opción con la imagen
            return $('<span><img src="' + imageUrl + '" class="img-thumbnail" style="width: 40px; height: 40px;" /> ' + option.text + '</span>');
        }

        const radioSiPago = document.getElementById('radioSiPago');
        const radioNoPago = document.getElementById('radioNoPago');

        const PagoContainer = document.getElementById('PagoContainer');

        radioSiPago.addEventListener('change', function() {
            if (radioSiPago.checked) {
                PagoContainer.style.display = 'contents';
            }
        });

        radioNoPago.addEventListener('change', function() {
            if (radioNoPago.checked) {
                PagoContainer.style.display = 'none';
            }
        });

        const radioSiFact = document.getElementById('radioSiFact');
        const radioNoFact = document.getElementById('radioNoFact');

        const FacturaContainer = document.getElementById('FacturaContainer');

        radioSiFact.addEventListener('change', function() {
            if (radioSiFact.checked) {
                FacturaContainer.style.display = 'contents';
            }
        });

        radioNoFact.addEventListener('change', function() {
            if (radioNoFact.checked) {
                FacturaContainer.style.display = 'none';
            }
        });

        $("#miFormulario").on("submit", function (event) {
            event.preventDefault(); // Evita el envío predeterminado del formulario

            // Realiza la solicitud POST usando AJAX
            $.ajax({
                url: $(this).attr("action"),
                type: "POST",
                data: new FormData(this),
                contentType: false,
                processData: false,
                success: async function(response) { // Agrega "async" aquí
                    // El formulario se ha enviado correctamente, ahora realiza la impresión
                    saveSuccess(response);

                },
                error: function (xhr, status, error) {
                        var errors = xhr.responseJSON.errors;
                        var errorMessage = '';

                        // Itera a través de los errores y agrega cada mensaje de error al mensaje final
                        for (var key in errors) {
                            if (errors.hasOwnProperty(key)) {
                                var errorMessages = errors[key].join('<br>'); // Usamos <br> para separar los mensajes
                                errorMessage += '<strong>' + key + ':</strong><br>' + errorMessages + '<br>';
                            }
                        }
                        console.log(errorMessage);
                        // Muestra el mensaje de error en una SweetAlert
                        Swal.fire({
                            icon: 'error',
                            title: 'Faltan Campos',
                            html: errorMessage, // Usa "html" para mostrar el mensaje con formato HTML
                        });
                }
            });

        });

        async function saveSuccess(response) {
            const ticket_data = response.ticket_data;
            let contenidoHtml = `<div class='row'><div class='col-6 mt-3'><img class='icon_span_tab' src='{{ asset('assets/media/icons/gear.webp') }}'><p><strong>Descuento</strong><br>${ticket_data.tipo_desc}</p></div><div class='col-6 mt-3'><img class='icon_span_tab' src='{{ asset('assets/media/icons/bolsa-de-dinero.webp') }}'><p><strong>Total</strong><br>$ ${ticket_data.total}</p></div>`;

            if (ticket_data.cotizacion === 'No') {
                contenidoHtml += `<div class='col-6'><img class='icon_span_tab' src='{{ asset('assets/media/icons/efectivo.webp') }}'><p><strong>Dinero Recibido</strong><br>$ ${ticket_data.recibido}</p></div><div class='col-6'><img class='icon_span_tab' src='{{ asset('assets/media/icons/monedas.webp') }}'><p><strong>Restante</strong><br>$ ${ticket_data.restante}</p></div><div class='col-6'><img class='icon_span_tab' src='{{ asset('assets/media/icons/coins.webp') }}'><p><strong>Cambio</strong><br>$ ${ticket_data.cambio}</p></div>`;
            }

            contenidoHtml += `</div>`;

            Swal.fire({
                title: "Orden Guardada <strong>¡Exitosamente!</strong>",
                icon: "success",
                html: contenidoHtml,
                showCloseButton: true,
                showCancelButton: true,
                focusConfirm: false,
                confirmButtonText: ticket_data.cotizacion === 'Si' ? 'Ver Cotizacion' : 'Ver Recibo',
                cancelButtonText: `<a  class="btn_swalater_cancel" style="text-decoration: none;color: #fff;" href="/caja" >Cerrar</a>`,
            }).then((result) => {
                if (result.isConfirmed) {

                    if (ticket_data.cotizacion === 'Si') {
                        window.open(`/cotizaciones/pdf/${ticket_data.id}`, '_blank');
                    } else {
                        // Redirige a la ruta con el ticket_data.id
                        window.open(`/orders/ticket/${ticket_data.id}`, '_blank');
                    }
                        // Recarga la página actual
                    location.reload();
                }
            });

        }

    });


    const html5QrcodeScanner = new Html5QrcodeScanner("reader", { fps: 5, qrbox: {width: 250, height: 250, autostart: false} },{ facingMode: "environment" }, false);

        let escanerHabilitado = true;
        let productosEscaneados = [];

        html5QrcodeScanner.render(onScanSuccess, onScanFailure);

        function onScanSuccess(result) {
            if (escanerHabilitado) {
                console.log(`Producto: ${result}`);
                mostrarNombreProducto(result);

                escanerHabilitado = false;
                setTimeout(function () {
                    escanerHabilitado = true;
                }, 5000);

                const audio = new Audio("{{ asset('assets/media/audio/barras.mp3')}}");
                audio.play();
            }
        }

        document.getElementById('buscarBtn').addEventListener('click', function () {
            const sku = document.getElementById('producto_id').value;
            mostrarNombreProducto(sku); // Llamar a la misma función con el SKU
            const audiosku = new Audio("{{ asset('assets/media/audio/sku_notification.mp3')}}");
            audiosku.play();
        });

        function onScanFailure(error) {
            if (error !== "NotFound") {
                console.log(`Error al escanear: ${error}`);
            }
        }

        function mostrarNombreProducto(codigo) {
            if (productoYaEscaneado(codigo)) {
                console.log("Producto duplicado");
                const audio = new Audio("{{ asset('assets/media/audio/duplicate.mp3')}}");
                audio.play();
                return;
            }

            const url = "{{ route('agregar.al.carrito') }}";
            const data = { codigo: codigo };
            var user = {{ $user }};

            const audiomas = new Audio("{{ asset('assets/media/audio/suma.mp3')}}");
            const audiomenos = new Audio("{{ asset('assets/media/audio/restar.mp3')}}");

            function reproducirSonidoMas() {
                audiomas.play();
            }

            function reproducirSonidoMenos() {
                audiomenos.play();
            }

            $.ajax({
                url: url,
                method: "GET",
                data: data,
                success: function (response) {
                    if (response.nombre) {
                        const precio = parseFloat(response.precio_normal);
                        const precioDescuento = parseFloat(response.precio_descuento);
                        const fechaInicioDescuento = new Date(response.fecha_inicio_desc);
                        const fechaFinDescuento = new Date(response.fecha_fin_desc);
                        const fechaActual = new Date();

                        const productoContainer = document.createElement("div");
                        productoContainer.classList.add("producto-container");
                        productoContainer.setAttribute("data-product-id", response.id);
                        productoContainer.classList.add("bg_productos_search");
                        productoContainer.classList.add("p-2");
                        productoContainer.classList.add("mb-3");
                        productoContainer.classList.add("row");

                        const inputnombreDiv = document.createElement("div");
                        inputnombreDiv.classList.add("d-none");
                        inputnombreDiv.innerHTML = `<input type="hidden" name="name[]" value="${response.nombre}">`;

                        const idDiv = document.createElement("div");
                        idDiv.classList.add("d-none");
                        idDiv.innerHTML = `<p style="text-align: left;margin-top:2rem;"><strong>id:</strong></p><input class="form-control" type="hidden" name="id[]" value="${response.id}">`;

                        const sku = response.sku;
                        const skuPart = sku.substring(0, sku.indexOf('_'));

                        // Luego puedes usar skuPart en tu código
                        console.log(skuPart);


                        // =============== D A T O S  P R O D U C T O ===============================
                        const nombreDiv = document.createElement("div");
                        nombreDiv.classList.add("col-4");
                        nombreDiv.classList.add("espaciosnullcols");
                        nombreDiv.innerHTML = `
                                <h5 class="tiitle_search_caja text-left">Nombre:</h5>
                                <h6 class="subtittle_search_caja mb-3   ">${response.nombre}</h6>
                                <p class="items_search_caja" style="margin:5px;">
                                    <img class="icon_item_Caja" src="{{ asset('assets/media/icons/code_barras.webp') }}" alt="">
                                    <strong>Sku:</strong> ${skuPart}
                                </p>
                                <p class="items_search_caja">
                                    <img class="icon_item_Caja" src="{{ asset('assets/media/icons/en-stock.png.webp') }}" alt="">
                                    <strong>Stock:</strong> ${response.stock} ${response.unidad_venta}(s)
                                </p>
                                <div class="card_container_img">
                                    <p class="text-center mb-0">
                                        <img class="img_portada_product" src="{{ asset('imagen_principal/empresa') }}${user}/${response.imagen_principal}" alt="">
                                    </p>
                                </div>
                        `;


                        // =============== P R E C I O ===============================
                        const precioDiv = document.createElement("div");
                            precioDiv.classList.add("col-4");
                            precioDiv.classList.add("espaciosnullcols");
                            precioDiv.innerHTML = `
                                <label for="name" class="tiitle_search_caja_items mb-2">Precio</label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text span_custom_tab" >
                                        <img class="icon_caja_item" src="{{ asset('assets/media/icons/etiqueta-del-precio.webp') }}" alt="" >
                                    </span>
                                    <input class="form-control input_custom_tab_dark" type="number" name="precio[]" value="${response.precio_normal}" readonly>
                                </div>
                            `;

                        // =============== P R E C I O  C O N  D E S C ===============================
                        const precioDescDiv = document.createElement("div");
                        if (fechaActual >= fechaInicioDescuento && fechaActual <= fechaFinDescuento) {

                            precioDescDiv.classList.add("col-4");
                            precioDescDiv.classList.add("espaciosnullcols");
                            precioDescDiv.innerHTML = `
                                <label for="name" class="tiitle_search_caja_items mb-2">Precio Descuento</label>
                                <div class="input-group">
                                    <span class="input-group-text span_custom_tab" >
                                        <img class="icon_caja_item" src="{{ asset('assets/media/icons/descuento.webp') }}" alt="" >
                                    </span>
                                    <input class="form-control input_custom_tab_dark" type="number" name="precioDesc[]" value="${response.precio_descuento}" readonly>
                                    <label for="name" class="tiitle_search_caja_items mb-2" style="text-decoration: line-through;margin-top: -2px;">$ ${response.precio_normal}.00</label>
                                </div>
                            `;
                        }

                        // =============== C A N T I D A D ===============================
                        const cantidadDiv = document.createElement("div");
                        cantidadDiv.classList.add("col-4");
                        cantidadDiv.classList.add("espaciosnullcols");

                        cantidadDiv.innerHTML = `
                            <label for="name" class="tiitle_search_caja_items mb-2">Cantidad</label>
                            <div class="input-group">
                                <span class="input-group-text span_custom_tab" >
                                    <img class="icon_caja_item" src="{{ asset('assets/media/icons/retail.webp') }}" alt="" >
                                </span>
                                <label for="name" class="tiitle_search_caja_items mb-2">-</label>

                            </div>
                        `;

                        const cantidadInput = document.createElement("input");
                        cantidadInput.classList.add("form-control","input_custom_tab_dark");
                        cantidadInput.type = "number";
                        cantidadInput.name = "cantidad[]";
                        cantidadInput.value = 1;

                        cantidadInput.addEventListener("input", calcularSubtotal); // Usar calcularSubtotal aquí

                        // Obtener el elemento span dentro de cantidadDiv
                        const spanElement = cantidadDiv.querySelector('.span_custom_tab');

                        // Insertar cantidadInput después del span
                        spanElement.parentNode.insertBefore(cantidadInput, spanElement.nextSibling);


                        // =============== B O T O N E S  I N C R E   D E C R E ===============================
                        const incrementButton = document.createElement("button");
                        const stockDisponible = response.stock;
                        incrementButton.classList.add("btn", "btn_push_cantidad_mas");
                        incrementButton.type = "button";
                        incrementButton.innerHTML = "<img class='img_plus_dash' src='{{ asset('assets/media/icons/anadir_white.webp') }}'>";
                        incrementButton.onclick = () => {
                            increment(cantidadInput);
                            reproducirSonidoMas();
                            calcularSubtotal();
                        };
                        cantidadDiv.appendChild(incrementButton);

                        const decrementButton = document.createElement("button");
                        decrementButton.classList.add("btn", "btn_push_cantidad_menos");
                        decrementButton.type = "button";
                        decrementButton.innerHTML = "<img class='img_plus_dash' src='{{ asset('assets/media/icons/menos.webp') }}'>";
                        decrementButton.onclick = () => {
                            decrement(cantidadInput);
                            reproducirSonidoMenos();
                            calcularSubtotal();
                        };
                        cantidadDiv.appendChild(decrementButton);

                        function increment(input) {
                            if (parseInt(input.value) < stockDisponible) {
                                input.stepUp();
                            }
                        }

                        function decrement(input) {
                            if (parseInt(input.value) > 0) {
                                input.stepDown();
                            }
                        }

                        // Espacios en blanco

                        const colEspaciador = document.createElement("div");
                        colEspaciador.classList.add("col-4");
                        colEspaciador.classList.add("col-sm-4");
                        colEspaciador.classList.add("col-md-4");
                        colEspaciador.classList.add("col-lg-4");
                        colEspaciador.classList.add("col-lg-4");

                        // =============== S U B T O T A L ===============================
                        const subtotalDiv = document.createElement("div");
                        subtotalDiv.classList.add("col-8");
                        subtotalDiv.classList.add("col-sm-8");
                        subtotalDiv.classList.add("col-md-8");
                        subtotalDiv.classList.add("col-lg-8");
                        subtotalDiv.classList.add("col-lg-8");
                        subtotalDiv.classList.add("mt-3");
                        subtotalDiv.classList.add("px-0");

                        subtotalDiv.innerHTML = `
                            <label for="name" class="tiitle_search_caja_items mb-2">Subtotal</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text span_custom_tab span_custom_tab_sub" >
                                    <img class="icon_caja_item" src="{{ asset('assets/media/icons/efectivo.webp') }}" alt="" >
                                </span>
                            </div>
                        `;

                        const subtotalInput = document.createElement("input");
                        subtotalInput.classList.add("form-control","input_custom_tab_dark");
                        subtotalInput.type = "double";
                        subtotalInput.name = "subtotal[]";
                        subtotalDiv.appendChild(subtotalInput);

                        // Obtener el elemento span dentro de cantidadDiv
                        const spanElementsub = subtotalDiv.querySelector('.span_custom_tab_sub');

                        // Insertar cantidadInput después del span
                        spanElementsub.parentNode.insertBefore(subtotalInput, spanElementsub.nextSibling);

                        if (fechaActual >= fechaInicioDescuento && fechaActual <= fechaFinDescuento) {
                            subtotalInput.value = (precioDescuento * cantidadInput.value).toFixed(2);
                        } else {
                            subtotalInput.value = (precio * cantidadInput.value).toFixed(2);
                        }

                        // =============== E L I M I N A R ===============================

                        const eliminarBtn = document.createElement("a");
                        eliminarBtn.classList.add("btn", "w-100", "btn_trash_caja", "mt-3");
                        eliminarBtn.innerHTML = "<img class='icon_caja_item' src='{{ asset('assets/media/icons/borrar.webp') }}'>";
                        eliminarBtn.addEventListener("click", eliminarProducto);

                        const eliminarBtndesc = document.createElement("a");
                        eliminarBtndesc.classList.add("btn", "w-100", "btn_trash_caja", "mt-1");
                        eliminarBtndesc.innerHTML = "<img class='icon_caja_item' src='{{ asset('assets/media/icons/borrar.webp') }}'>";
                        eliminarBtndesc.addEventListener("click", eliminarProducto);


                        precioDiv.appendChild(eliminarBtn);
                        precioDescDiv.appendChild(eliminarBtndesc);

                        // =============== M U E S T R A  L O S  I N P U T S  (EL ORDEN ES IMPORTANTE) ===============================
                        productoContainer.appendChild(idDiv);
                        productoContainer.appendChild(nombreDiv);
                        productoContainer.appendChild(inputnombreDiv);

                        if (fechaActual >= fechaInicioDescuento && fechaActual <= fechaFinDescuento) {
                            productoContainer.appendChild(precioDescDiv);

                        }else{
                            productoContainer.appendChild(precioDiv);

                        }
                        //productoContainer.appendChild(eliminarBtn);
                        productoContainer.appendChild(cantidadDiv);
                        productoContainer.appendChild(colEspaciador);
                        productoContainer.appendChild(subtotalDiv);

                        const listaProductos = document.getElementById("listaProductos");
                        listaProductos.appendChild(productoContainer);

                        productosEscaneados.push(codigo);

                        // =============== M U E S T R A  L O S  I N P U T S  (EL ORDEN ES IMPORTANTE) ===============================
                        function calcularSubtotal() {
                            let preciof;

                            if (fechaActual >= fechaInicioDescuento && fechaActual <= fechaFinDescuento) {
                                preciof = precioDescuento;
                            } else {
                                preciof = precio;
                            }

                            const cantidad = parseFloat(cantidadInput.value);
                            subtotalInput.value = (preciof * cantidad).toFixed(2);
                            actualizarSumaSubtotales();
                        }

                        cantidadInput.addEventListener("input", calcularSubtotal);
                        precioDiv.querySelector("input[name='precio[]']").addEventListener("input", calcularSubtotal);

                        actualizarSumaSubtotales();
                    } else {
                        console.log("Producto no encontrado");
                    }
                },
                error: function (error) {
                    console.log(`Error en la petición AJAX: ${error}`);
                }
            });
        }

        function eliminarProducto() {
        const productoContainer = this.closest(".producto-container");
        const productoId = productoContainer.getAttribute("data-product-id");

        // Eliminar el contenedor del producto escaneado de la lista
        productoContainer.remove();

        // Eliminar el producto de la lista de productos escaneados
        const index = productosEscaneados.findIndex((id) => id === productoId);
        if (index > -1) {
            productosEscaneados.splice(index, 1);
        }

        // Recalcular los subtotales
        actualizarSumaSubtotales();
    }

    let facturaSeleccionada = false;
    let porcentajeFactura = {{$configuracion->porcentaje_factura}};
    const tipoFacturaDB = "{{ $configuracion->tipo_factura ?? '' }}";

    function actualizarSumaSubtotales() {
        const tipoDescuentoSelect = document.getElementById("tipoDescuento");
        const divDescuento = document.getElementById("divDescuento");

        // Mostrar u ocultar el div de descuento según el tipo seleccionado
        divDescuento.style.display = tipoDescuentoSelect.value === "Ninguno" ? "none" : "block";

        // Obtener los subtotales y calcular la suma
        const subtotales = document.getElementsByName("subtotal[]");
        let sumaSubtotales = 0;

        for (let i = 0; i < subtotales.length; i++) {
            const subtotal = parseFloat(subtotales[i].value);
            if (!isNaN(subtotal)) {
                sumaSubtotales += subtotal;
            }
        }

        // Obtener los valores del descuento
        const tipoDescuento = tipoDescuentoSelect.value;
        const montoDescuentoInput = document.getElementById("montoDescuento");
        const montoDescuento = parseFloat(montoDescuentoInput.value);

        // Aplicar el descuento según el tipo seleccionado
        if (tipoDescuento === "Fijo") {
            sumaSubtotales -= montoDescuento;
        } else if (tipoDescuento === "Porcentaje") {
            sumaSubtotales *= (1 - montoDescuento / 100);
        }

        if (facturaSeleccionada) {
            sumaSubtotales *= (1 + porcentajeFactura / 100);
        }

        // Obtener los valores de dinero recibido
        const dineroRecibidoInput = document.getElementById("dineroRecibido");
        const dineroRecibidoInput2 = document.getElementById("dineroRecibido2");

        const dineroRecibidoValue = parseFloat(dineroRecibidoInput.value);
        const dineroRecibido2Value = parseFloat(dineroRecibidoInput2.value);

        const dineroRecibido = (isNaN(dineroRecibidoValue) ? 0 : dineroRecibidoValue) + (isNaN(dineroRecibido2Value) ? 0 : dineroRecibido2Value);

        // Actualizar el valor del input de sumaSubtotales
        const sumaSubtotalesInput = document.getElementById("sumaSubtotales");
        sumaSubtotalesInput.value = sumaSubtotales.toFixed(2);

        const cambioInput = document.getElementById("cambio");
        const restanteInput = document.getElementById("restante");
        const restanteContainer = document.getElementById('restanteContainer');
        const cambioContainer = document.getElementById('cambioContainer');

        if (!isNaN(dineroRecibido)) {
            if (dineroRecibido > sumaSubtotales) {
                const cambio = dineroRecibido - sumaSubtotales;
                cambioInput.value = cambio.toFixed(2);
                restanteInput.value = "0.00";
                restanteContainer.style.display = 'none';
                cambioContainer.style.display = 'block';
            } else if (dineroRecibido === sumaSubtotales) {
                cambioInput.value = "0.00";
                restanteInput.value = "0.00";
                restanteContainer.style.display = 'none';
                cambioContainer.style.display = 'none';
            } else {
                const restante = sumaSubtotales - dineroRecibido;
                cambioInput.value = "0.00";
                restanteInput.value = restante.toFixed(2);
                restanteContainer.style.display = 'block';
                cambioContainer.style.display = 'none';
            }
        } else {
            cambioInput.value = "0.00";
            restanteInput.value = "0.00";
            restanteContainer.style.display = 'block';
            cambioContainer.style.display = 'none';
        }
    }

    if(tipoFacturaDB === "Precio Desglosado"){
        // Función para actualizar el estado de la factura seleccionada
        function actualizarFacturaSeleccionada() {
            const radioSiFact = document.getElementById("radioSiFact");
            facturaSeleccionada = radioSiFact.checked;

            // Llamar a la función para actualizar la suma de subtotales cuando cambia la factura
            actualizarSumaSubtotales();
        }
    }

    // Asignar la función al evento change del radio de factura
    document.getElementById("radioSiFact").addEventListener("change", actualizarFacturaSeleccionada);
    document.getElementById("radioNoFact").addEventListener("change", actualizarFacturaSeleccionada);

    const montoDescuentoInput = document.getElementById("montoDescuento");
    montoDescuentoInput.addEventListener("input", function() {
        actualizarSumaSubtotales();
    });

    const dineroRecibidoInput = document.getElementById("dineroRecibido");
    dineroRecibidoInput.addEventListener("input", function() {
        actualizarSumaSubtotales();
    });

    const dineroRecibidoInput2 = document.getElementById("dineroRecibido2");
    dineroRecibidoInput2.addEventListener("input", function() {
        actualizarSumaSubtotales();
    });

    function productoYaEscaneado(codigo) {
        return productosEscaneados.includes(codigo);
    }


</script>

<script>
    $(document).ready(function () {
        // Agregar un event listener al radio button
        $('input[name="inlineCorizacion"]').change(function () {
            // Obtener el valor seleccionado
            var valorSeleccionado = $('input[name="inlineCorizacion"]:checked').val();

            // Mostrar u ocultar el div según la opción seleccionada
            if (valorSeleccionado === 'Si') {
                $('.cotizacion-div').hide();
            } else {
                $('.cotizacion-div').show();
            }
        });

        // Asegurarse de que el estado inicial esté configurado correctamente
        $('input[name="inlineCorizacion"]:checked').change();
    });
</script>

<script>
    $(document).ready(function () {
        // Evento que se ejecuta cuando cambia la selección del primer select
        $('.cliente').change(function () {
            // Obtener el valor seleccionado del primer select
            var clienteId = $(this).val();

            // Realizar una petición AJAX para obtener los registros relacionados
            $.ajax({
                url: '/vendexa/obtener-registros-cliente/' + clienteId, // Ajusta la ruta según tu aplicación
                type: 'GET',
                dataType: 'json',
                success: function (data) {
                    // Limpiar el segundo select
                    $('.facturas').empty();

                    // Agregar la opción predeterminada
                    $('.facturas').append('<option value="">Seleccione factura</option>');

                    // Agregar las opciones basadas en los datos obtenidos
                    $.each(data, function (key, value) {
                        $('.facturas').append('<option value="' + value.id + '">' + value.razon_social + '</option>');
                    });
                }
            });
        });
    });
</script>
@endsection

