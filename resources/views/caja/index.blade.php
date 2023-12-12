@extends('layouts.app')

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
                        <option value="{{ $producto->id }}" data-image="{{ asset('imagen_principal/empresa'.auth()->user()->id_empresa.'/'.$producto->imagen_principal) }}">{{ $producto->nombre }}</option>
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
        <form id="miFormulario" class="row" method="POST" action="{{route('caja.store')}}" enctype="multipart/form-data" role="form">
            @csrf
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
                    <label for="name" class="label_custom_primary_product_white mb-4">Agregar</label>
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

                <div class="form-group col-12 px-2 py-1">
                    <h2 class="tiitle_modal_white text-left">Datos de Pago</h2>
                </div>

                <div class="form-group col-6 px-2 py-1">
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

                <div class="form-group col-6 px-2 py-1">
                    <label for="name" class="label_custom_primary_product_white mb-2">Descuento :</label>
                    <div class="input-group ">
                        <span class="input-group-text span_custom_tab" >
                            <img class="icon_span_tab" src="{{ asset('assets/media/icons/descuento.webp') }}" alt="" >
                        </span>
                        <input id="montoDescuento" name="montoDescuento" type="number"  class="form-control input_custom_tab_dark @error('montoDescuento') is-invalid @enderror"  value="0" onchange="actualizarSumaSubtotales()">
                    </div>
                </div>

                <div class="form-group col-6 px-2 py-1">
                    <label for="name" class="label_custom_primary_product_white mb-2">Metodo de Pago :</label>
                    <div class="input-group ">
                        <span class="input-group-text span_custom_tab" >
                            <img class="icon_span_tab" src="{{ asset('assets/media/icons/metodo-de-pago.webp') }}" alt="" >
                        </span>
                        <select name="metodo_pago" id="metodo_pago" class="form-select d-inline-block input_custom_tab_dark">
                            <option value="Efectivo" @if(old('unidad_venta') == 'Efectivo') selected @endif>Efectivo</option>
                            <option value="Tarjeta Credito/Debito" @if(old('unidad_venta') == 'Tarjeta Credito/Debito') selected @endif>Tarjeta Credito/Debito</option>
                            <option value="Transferencia" @if(old('unidad_venta') == 'Transferencia') selected @endif>Transferencia</option>
                        </select>
                    </div>
                </div>

                <div class="form-group col-6 px-2 py-1">
                    <label for="name" class="label_custom_primary_product_white mb-2">Comprobante :</label>
                    <div class="input-group ">
                        <span class="input-group-text span_custom_tab" >
                            <img class="icon_span_tab" src="{{ asset('assets/media/icons/imagen.webp') }}" alt="">
                        </span>
                        <input id="comprobante" name="comprobante" type="file"  class="form-control input_custom_tab_dark @error('comprobante') is-invalid @enderror">
                    </div>
                </div>

                <div class="form-group col-6 px-2 py-1">
                    <label for="name" class="label_custom_primary_product_white mb-2">Total :</label>
                    <div class="input-group ">
                        <span class="input-group-text span_custom_tab" >
                            <img class="icon_span_tab" src="{{ asset('assets/media/icons/bolsa-de-dinero.webp') }}" alt="" >
                        </span>
                        <input id="sumaSubtotales" name="sumaSubtotales" type="text"  class="form-control input_custom_tab_dark @error('sumaSubtotales') is-invalid @enderror"  value="{{ old('sumaSubtotales') }}" readonly>
                    </div>
                </div>

                <div class="form-group col-6 px-2 py-1">
                    <label for="name" class="label_custom_primary_product_white mb-2">Dinero recibido :</label>
                    <div class="input-group ">
                        <span class="input-group-text span_custom_tab" >
                            <img class="icon_span_tab" src="{{ asset('assets/media/icons/efectivo.webp') }}" alt="" >
                        </span>
                        <input id="dineroRecibido" name="dineroRecibido" type="number"  class="form-control input_custom_tab_dark @error('dineroRecibido') is-invalid @enderror" onchange="actualizarSumaSubtotales()">
                    </div>
                </div>

                <div class="form-group col-6 px-2 py-1">
                    <label for="name" class="label_custom_primary_product_white mb-2">Restante :</label>
                    <div class="input-group ">
                        <span class="input-group-text span_custom_tab" >
                            <img class="icon_span_tab" src="{{ asset('assets/media/icons/monedas.webp') }}" alt="" >
                        </span>
                        <input id="restante" name="restante" type="number"  class="form-control input_custom_tab_dark @error('restante') is-invalid @enderror"  value="{{ old('restante') }}" readonly>
                    </div>
                </div>

                <div class="form-group col-6 px-2 py-1">
                    <label for="name" class="label_custom_primary_product_white mb-2">Cambio :</label>
                    <div class="input-group ">
                        <span class="input-group-text span_custom_tab" >
                            <img class="icon_span_tab" src="{{ asset('assets/media/icons/coins.webp') }}" alt="" >
                        </span>
                        <input id="cambio" name="cambio" type="number"  class="form-control input_custom_tab_dark @error('cambio') is-invalid @enderror"  value="{{ old('cambio') }}" readonly>
                    </div>
                </div>

                <div class="form-group col-6 px-2 py-1">
                    <label for="name" class="label_custom_primary_product_white mb-2">Factura </label>

                    <div class="input-group text-white d-flex justify-content-around mt-3">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input " type="radio" name="inlineRadioOptions"  id="radioSiFact" value="Si">
                            <label class="form-check-label" for="">Si</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input " type="radio" name="inlineRadioOptions"  id="radioNoFact" value="No">
                            <label class="form-check-label" for="">No</label>
                        </div>
                    </div>
                </div>

                <div class="row" id="FacturaContainer" style="display: none;">

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
<script src="https://cdnjs.cloudflare.com/ajax/libs/html5-qrcode/2.3.4/html5-qrcode.min.js" integrity="sha512-k/KAe4Yff9EUdYI5/IAHlwUswqeipP+Cp5qnrsUjTPCgl51La2/JhyyjNciztD7mWNKLSXci48m7cctATKfLlQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script type="text/javascript">

        $(document).ready(function() {
            $('.cliente').select2();

            $('.producto').select2({
                templateResult: formatOption, // Utiliza la función formatOption para personalizar la presentación
                templateSelection: formatOption, // Utiliza la función formatOption para personalizar la presentación en la selección
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

        });



    const html5QrcodeScanner = new Html5QrcodeScanner(
        "reader",

        { fps: 5, qrbox: {width: 250, height: 250} },
        { facingMode: "environment" },
        /* verbose= */ false);

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

                    // =============== D A T O S  P R O D U C T O ===============================
                    const nombreDiv = document.createElement("div");
                    nombreDiv.classList.add("col-4");
                    nombreDiv.innerHTML = `
                        <div style="padding:5px;">
                            <h5 class="tiitle_search_caja text-left">Nombre:</h5>
                            <h6 class="subtittle_search_caja mb-3   ">${response.nombre}</h6>
                            <p class="items_search_caja" style="margin:5px;">
                                <img class="icon_item_Caja" src="{{ asset('assets/media/icons/code_barras.webp') }}" alt="">
                                <strong>Sku:</strong> ${response.sku}
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
                        </div>
                    `;

                    // =============== P R E C I O ===============================
                    const precioDiv = document.createElement("div");
                    precioDiv.classList.add("col-4");
                    precioDiv.innerHTML = `
                        <label for="name" class="tiitle_search_caja_items mb-2">Precio</label>
                        <div class="input-group mb-3">
                            <span class="input-group-text span_custom_tab" >
                                <img class="icon_caja_item" src="{{ asset('assets/media/icons/etiqueta-del-precio.webp') }}" alt="" >
                            </span>
                            <input class="form-control input_custom_tab_dark" type="number" name="precio[]" value="${response.precio_normal}" readonly>
                        </div>
                        <label for="name" class="tiitle_search_caja_items mb-2">Eliminar</label>
                    `;

                    // =============== C A N T I D A D ===============================
                    const cantidadDiv = document.createElement("div");
                    cantidadDiv.classList.add("col-4");
                    cantidadDiv.innerHTML = `
                        <label for="name" class="tiitle_search_caja_items mb-2">Cantidad</label>
                        <div class="input-group mb-3">
                            <span class="input-group-text span_custom_tab" >
                                <img class="icon_caja_item" src="{{ asset('assets/media/icons/etiqueta-del-precio.webp') }}" alt="" >
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
                        input.stepUp();
                    }

                    function decrement(input) {
                        input.stepDown();
                    }

                    // Espacios en blanco

                    const colEspaciador = document.createElement("div");
                    colEspaciador.classList.add("col-8");

                    // =============== S U B T O T A L ===============================
                    const subtotalDiv = document.createElement("div");
                    subtotalDiv.classList.add("col-4");
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
                    subtotalInput.type = "number";
                    subtotalInput.name = "subtotal[]";
                    subtotalDiv.appendChild(subtotalInput);

                    // Obtener el elemento span dentro de cantidadDiv
                    const spanElementsub = subtotalDiv.querySelector('.span_custom_tab_sub');

                    // Insertar cantidadInput después del span
                    spanElementsub.parentNode.insertBefore(subtotalInput, spanElementsub.nextSibling);

                    const precio = parseFloat(response.precio_normal);
                    subtotalInput.value = (precio * cantidadInput.value).toFixed(2);

                    // =============== E L I M I N A R ===============================

                    const eliminarBtn = document.createElement("a");
                    eliminarBtn.classList.add("btn", "w-100", "btn_trash_caja", "mt-1");
                    eliminarBtn.innerHTML = "<img class='icon_caja_item' src='{{ asset('assets/media/icons/borrar.webp') }}'>";
                    eliminarBtn.addEventListener("click", eliminarProducto);
                    precioDiv.appendChild(eliminarBtn);


                    // =============== M U E S T R A  L O S  I N P U T S  (EL ORDEN ES IMPORTANTE) ===============================
                    productoContainer.appendChild(idDiv);
                    productoContainer.appendChild(nombreDiv);
                    productoContainer.appendChild(inputnombreDiv);
                    productoContainer.appendChild(precioDiv);
                    //productoContainer.appendChild(eliminarBtn);
                    productoContainer.appendChild(cantidadDiv);
                    productoContainer.appendChild(colEspaciador);
                    productoContainer.appendChild(subtotalDiv);

                    const listaProductos = document.getElementById("listaProductos");
                    listaProductos.appendChild(productoContainer);

                    productosEscaneados.push(codigo);

                    // =============== M U E S T R A  L O S  I N P U T S  (EL ORDEN ES IMPORTANTE) ===============================
                    function calcularSubtotal() {
                        const precio = parseFloat(precioDiv.querySelector("input[name='precio[]']").value);
                        const cantidad = parseFloat(cantidadInput.value);
                        subtotalInput.value = (precio * cantidad).toFixed(2);
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

    // Función para eliminar un producto escaneado
    // function eliminarProducto() {
    //     const productoContainer = this.parentNode;
    //     console.log(productoContainer.querySelector("input[name='id[]']"));
    //     const productoId = productoContainer.querySelector("input[name='id[]']").value;

    //     // Eliminar el contenedor del producto escaneado de la lista
    //     productoContainer.remove();

    //     // Eliminar el producto de la lista de productos escaneados
    //     const index = productosEscaneados.indexOf(productoId);
    //     if (index > -1) {
    //         productosEscaneados.splice(index, 1);
    //     }

    //     // Recalcular los subtotales
    //     actualizarSumaSubtotales();
    // }

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

    function actualizarSumaSubtotales() {
        const subtotales = document.getElementsByName("subtotal[]");
        let sumaSubtotales = 0;

        for (let i = 0; i < subtotales.length; i++) {
            const subtotal = parseFloat(subtotales[i].value);
            if (!isNaN(subtotal)) {
                sumaSubtotales += subtotal;
            }
        }

        // Obtener los valores del descuento
        const tipoDescuentoSelect = document.getElementById("tipoDescuento");
        const montoDescuentoInput = document.getElementById("montoDescuento");

        const tipoDescuento = tipoDescuentoSelect.value;
        const montoDescuento = parseFloat(montoDescuentoInput.value);

        // Aplicar el descuento según el tipo seleccionado
        if (tipoDescuento === "Fijo") {
            sumaSubtotales -= montoDescuento;
        } else if (tipoDescuento === "Porcentaje") {
            sumaSubtotales *= (1 - montoDescuento / 100);
        }

        // Actualizar el valor del input de sumaSubtotales
        const sumaSubtotalesInput = document.getElementById("sumaSubtotales");
        sumaSubtotalesInput.value = sumaSubtotales.toFixed(2);

        const dineroRecibidoInput = document.getElementById("dineroRecibido");
        const cambioInput = document.getElementById("cambio");
        const restanteInput = document.getElementById("restante");

        const dineroRecibido = parseFloat(dineroRecibidoInput.value);

        if (!isNaN(dineroRecibido)) {
            // Calcular el cambio o la cantidad restante según la situación
            if (dineroRecibido >= sumaSubtotales) {
                const cambio = dineroRecibido - sumaSubtotales;
                cambioInput.value = cambio.toFixed(2);
                restanteInput.value = "0.00";
            } else {
                const restante = sumaSubtotales - dineroRecibido;
                cambioInput.value = "0.00";
                restanteInput.value = restante.toFixed(2);
            }
        } else {
            // Manejar el caso en que el dinero recibido no sea un número válido
            cambioInput.value = "0.00";
            restanteInput.value = "0.00";
        }
    }

    const montoDescuentoInput = document.getElementById("montoDescuento");
    montoDescuentoInput.addEventListener("input", function() {
        actualizarSumaSubtotales();
    });

    const dineroRecibidoInput = document.getElementById("dineroRecibido");
    dineroRecibidoInput.addEventListener("input", function() {
        actualizarSumaSubtotales();
    });

    function productoYaEscaneado(codigo) {
        return productosEscaneados.includes(codigo);
    }


</script>
@endsection

