@extends('layouts.app')

@section('css_custom')

<link rel="stylesheet" href="{{ asset('assets/css/caja.css') }}">

@endsection


@section('content')

<section class="products bg_caja row px-3">

    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-6">

            <div class="d-flex justify-content-center">
                <h5 class="tittle_caja text-center mt-2 mb-3">
                    ¡Caja!
                </h5>
            </div>

            <div class="row">
                <div class="col-12 ">
                    <div class="form-group col-12 mb-3 ">
                        <div class="d-flex justify-content-center">
                            <div style="width: 500px" id="reader"></div>
                        </div>
                    </div>
                </div>

                <div class="form-group col-10 px-2 py-1">
                    <label for="name" class="label_custom_primary_product_white mb-2">Busqueda Manual :</label>
                    <div class="input-group ">
                        <span class="input-group-text span_custom_tab" >
                            <img class="icon_span_tab" src="{{ asset('assets/media/icons/buscar.webp') }}" alt="" >
                        </span>
                        <input id="" name="" type="text"  class="form-control input_custom_tab_dark @error('') is-invalid @enderror"  value="{{ old('') }}" required autocomplete="" autofocus>
                    </div>
                </div>

                <div class="form-group col-2 px-2 py-1">
                    <label for="name" class="label_custom_primary_product_white mb-2"></label>
                    <div class="input-group ">
                        <button class="input-group-text span_custom_primary_white mt-3" data-bs-dismiss="modal">
                            <img class="icon_span_form" src="{{ asset('assets/media/icons/buscar.webp') }}" alt="" >
                        </button>
                    </div>
                </div>

            </div>

    </div>

    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-6 z-1">

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
                    <input id="" name="" type="text"  class="form-control input_custom_tab_dark @error('') is-invalid @enderror"  value="{{ old('') }}" required autocomplete="" autofocus>
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
                    <input id="" name="" type="text"  class="form-control input_custom_tab_dark @error('') is-invalid @enderror"  value="{{ old('') }}" required autocomplete="" autofocus>
                </div>
            </div>

            <div class="form-group col-6 px-3 py-2 collapse"  id="collapseNewClient">
                <label for="name" class="label_custom_primary_sm_dark mb-2">Apellido(s) *</label>
                <div class="input-group ">
                    <span class="input-group-text span_custom_tab" >
                        <img class="icon_span_tab" src="{{ asset('assets/media/icons/fuente.webp') }}" alt="" >
                    </span>
                    <input id="" name="" type="text"  class="form-control input_custom_tab_dark @error('') is-invalid @enderror"  value="{{ old('') }}" required autocomplete="" autofocus>
                </div>
            </div>

            <div class="form-group col-6 px-3 py-2 collapse"  id="collapseNewClient">
                <label for="name" class="label_custom_primary_sm_dark mb-2">WhatsApp *</label>
                <div class="input-group ">
                    <span class="input-group-text span_custom_tab" >
                        <img class="icon_span_tab" src="{{ asset('assets/media/icons/whatsapp.webp') }}" alt="" >
                    </span>
                    <input id="" name="" type="tel" minlength="10" maxlength="10" class="form-control input_custom_tab_dark @error('') is-invalid @enderror"  value="{{ old('') }}" required autocomplete="" autofocus>
                </div>
            </div>

            <div class="form-group col-6 px-3 py-2 collapse"  id="collapseNewClient">
                <label for="name" class="label_custom_primary_sm_dark mb-2">Correo Electronico</label>
                <div class="input-group ">
                    <span class="input-group-text span_custom_tab" >
                        <img class="icon_span_tab" src="{{ asset('assets/media/icons/sobre.png.webp') }}" alt="" >
                    </span>
                    <input id="" name="" type="email"  class="form-control input_custom_tab_dark @error('') is-invalid @enderror"  value="{{ old('') }}" required autocomplete="" autofocus>
                </div>
            </div>

            <div class="form-group col-12 px-2 py-1">
                <h2 class="tiitle_modal_white text-left">Productos</h2>
            </div>

            <!--  search products -->
            <div class="col-12">
                <div class="bg_productos_search row p-2">

                    <div class="col-4" style="padding:5px;">
                        <h5 class="tiitle_search_caja text-left">Nombre:</h5>
                        <h6 class="subtittle_search_caja mb-3   ">Chamarra para Nieve Oversize</h6>
                        <p class="items_search_caja" style="margin:5px;">
                            <img class="icon_item_Caja" src="{{ asset('assets/media/icons/code_barras.webp') }}" alt="">
                            <strong>Sku:</strong> 153202
                        </p>
                        <p class="items_search_caja">
                            <img class="icon_item_Caja" src="{{ asset('assets/media/icons/en-stock.png.webp') }}" alt="">
                            <strong>Stock:</strong> 51 Piezas
                        </p>
                        <div class="card_container_img">
                            <p class="text-center mb-0">
                                <img class="img_portada_product" src="{{ asset('assets/media/img/ilustraciones/chamarra.png') }}" alt="">
                            </p>
                        </div>
                    </div>

                    <div class="col-4" style="padding:5px;">
                        <label for="name" class="tiitle_search_caja_items mb-2">Precio:</label>
                        <div class="input-group mb-3">
                            <span class="input-group-text span_custom_tab" >
                                <img class="icon_caja_item" src="{{ asset('assets/media/icons/etiqueta-del-precio.webp') }}" alt="" >
                            </span>
                            <input id="" name="" type="number"  class="form-control input_custom_tab_dark @error('') is-invalid @enderror"  value="{{ old('') }}" required autocomplete="" autofocus>
                        </div>

                        <a class="btn_push_cantidad" href="#" >
                            <img class="img_plus_dash" src="{{ asset('assets/media/icons/menos.webp') }}" alt="" style="opacity: 0">
                        </a>
                        <a class="btn_push_cantidad" href="#" >
                            <img class="img_plus_dash" src="{{ asset('assets/media/icons/menos.webp') }}" alt="" style="opacity: 0">
                        </a>

                        <label for="name" class="tiitle_search_caja_items mb-2 mt-3 d-block">Tipo Des   :</label>
                        <div class="input-group mb-2">
                            <span class="input-group-text span_custom_tab" >
                                <img class="icon_caja_item" src="{{ asset('assets/media/icons/descuento.webp') }}" alt="" >
                            </span>
                            <input id="" name="" type="number"  class="form-control input_custom_tab_dark @error('') is-invalid @enderror"  value="{{ old('') }}" required autocomplete="" autofocus>
                        </div>

                        <label for="name" class="tiitle_search_caja_items mb-2">Eliminar</label>
                        <div class="input-group mb-3">
                            <a href="" class="btn w-100 btn_trash_caja mt-1">
                                <img class="icon_caja_item" src="{{ asset('assets/media/icons/borrar.webp') }}" alt="" >
                            </a>
                        </div>

                    </div>

                    <div class="col-4" style="padding:5px;">
                        <label for="name" class="tiitle_search_caja_items mb-2">Cantidad:</label>
                        <div class="input-group mb-3">
                            <span class="input-group-text span_custom_tab" >
                                <img class="icon_caja_item" src="{{ asset('assets/media/icons/retail.webp') }}" alt="" >
                            </span>
                            <input id="" name="" type="number"  class="form-control input_custom_tab_dark @error('') is-invalid @enderror"  value="{{ old('') }}" required autocomplete="" autofocus>
                        </div>

                        <a class="btn_push_cantidad_mas" href="#" >
                            <img class="img_plus_dash" src="{{ asset('assets/media/icons/anadir_white.webp') }}" alt="">
                        </a>
                        <a class="btn_push_cantidad_menos" href="#" >
                            <img class="img_plus_dash" src="{{ asset('assets/media/icons/menos.webp') }}" alt="">
                        </a>

                        <label for="name" class="tiitle_search_caja_items mb-2 mt-3 d-block">Monto:</label>
                        <div class="input-group mb-2">
                            <span class="input-group-text span_custom_tab" >
                                <img class="icon_caja_item" src="{{ asset('assets/media/icons/descuento.webp') }}" alt="" >
                            </span>
                            <input id="" name="" type="number"  class="form-control input_custom_tab_dark @error('') is-invalid @enderror"  value="{{ old('') }}" required autocomplete="" autofocus>
                        </div>

                        <label for="name" class="tiitle_search_caja_items mb-2">Subtotal:</label>
                        <div class="input-group mb-3">
                            <span class="input-group-text span_custom_tab" >
                                <img class="icon_caja_item" src="{{ asset('assets/media/icons/efectivo.webp') }}" alt="" >
                            </span>
                            <input id="" name="" type="number"  class="form-control input_custom_tab_dark @error('') is-invalid @enderror"  value="{{ old('') }}" required autocomplete="" autofocus>
                        </div>
                    </div>

                </div>
            </div>
            <!--  search products -->

            <div class="form-group col-12 px-2 py-1">
                <h2 class="tiitle_modal_white text-left">Datos de Pago</h2>
            </div>

            <div class="form-group col-6 px-2 py-1">
                <label for="name" class="label_custom_primary_product_white mb-2">Metodo de Pago :</label>
                <div class="input-group ">
                    <span class="input-group-text span_custom_tab" >
                        <img class="icon_span_tab" src="{{ asset('assets/media/icons/metodo-de-pago.webp') }}" alt="" >
                    </span>
                    <select name="" id="" class="form-select d-inline-block input_custom_tab_dark"  value="{{old('')}}">
                        <option value="" {{ old('') == '' ? 'selected' : '' }}>Selecionar </option>
                    </select>
                </div>
            </div>

            <div class="form-group col-6 px-2 py-1">
                <label for="name" class="label_custom_primary_product_white mb-2">Comprobante :</label>
                <div class="input-group ">
                    <span class="input-group-text span_custom_tab" >
                        <img class="icon_span_tab" src="{{ asset('assets/media/icons/imagen.webp') }}" alt="" >
                    </span>
                    <input id="" name="" type="file"  class="form-control input_custom_tab_dark @error('') is-invalid @enderror"  value="{{ old('') }}" required autocomplete="" autofocus>
                </div>
            </div>

            <div class="form-group col-6 px-2 py-1">
                <label for="name" class="label_custom_primary_product_white mb-2">Metodo de Pago 2 :</label>
                <div class="input-group ">
                    <span class="input-group-text span_custom_tab" >
                        <img class="icon_span_tab" src="{{ asset('assets/media/icons/metodo-de-pago.webp') }}" alt="" >
                    </span>
                    <select name="" id="" class="form-select d-inline-block input_custom_tab_dark"  value="{{old('')}}">
                        <option value="" {{ old('') == '' ? 'selected' : '' }}>Selecionar </option>
                    </select>
                </div>
            </div>

            <div class="form-group col-6 px-2 py-1">
                <label for="name" class="label_custom_primary_product_white mb-2">Tipo :</label>
                <div class="input-group ">
                    <span class="input-group-text span_custom_tab" >
                        <img class="icon_span_tab" src="{{ asset('assets/media/icons/gear.webp') }}" alt="" >
                    </span>
                    <select name="" id="" class="form-select d-inline-block input_custom_tab_dark"  value="{{old('')}}">
                        <option value="" {{ old('') == '' ? 'selected' : '' }}>Selecionar </option>
                        <option value="Tipo" {{ old('') == '' ? 'selected' : '' }}>Tipo </option>
                        <option value="Porcentaje" {{ old('') == '' ? 'selected' : '' }}>Porcentaje </option>
                    </select>
                </div>
            </div>

            <div class="form-group col-6 px-2 py-1">
                <label for="name" class="label_custom_primary_product_white mb-2">Descuento :</label>
                <div class="input-group ">
                    <span class="input-group-text span_custom_tab" >
                        <img class="icon_span_tab" src="{{ asset('assets/media/icons/descuento.webp') }}" alt="" >
                    </span>
                    <input id="" name="" type="text"  class="form-control input_custom_tab_dark @error('') is-invalid @enderror"  value="{{ old('') }}" required autocomplete="" autofocus>
                </div>
            </div>

            <div class="form-group col-6 px-2 py-1">
                <label for="name" class="label_custom_primary_product_white mb-2">Total :</label>
                <div class="input-group ">
                    <span class="input-group-text span_custom_tab" >
                        <img class="icon_span_tab" src="{{ asset('assets/media/icons/bolsa-de-dinero.webp') }}" alt="" >
                    </span>
                    <input id="" name="" type="text"  class="form-control input_custom_tab_dark @error('') is-invalid @enderror"  value="{{ old('') }}" required autocomplete="" autofocus>
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
                        <input id="" name="" type="text"  class="form-control input_custom_tab_dark @error('') is-invalid @enderror"  value="{{ old('') }}" required autocomplete="" autofocus>
                    </div>
                </div>

                <div class="form-group col-6 px-4 py-3" >
                    <label for="name" class="label_custom_primary_product_white mb-2">RFC:</label>
                    <div class="input-group ">
                        <span class="input-group-text span_custom_tab" >
                            <img class="icon_span_tab" src="{{ asset('assets/media/icons/sat.webp') }}" alt="" >
                        </span>
                        <input id="" name="" type="text"  class="form-control input_custom_tab_dark @error('') is-invalid @enderror"  value="{{ old('') }}" required autocomplete="" autofocus>
                    </div>
                </div>

                <div class="form-group col-6 px-4 py-3" >
                    <label for="name" class="label_custom_primary_product_white mb-2">CFDI :</label>
                    <div class="input-group ">
                        <span class="input-group-text span_custom_tab" >
                            <img class="icon_span_tab" src="{{ asset('assets/media/icons/categorias.webp') }}" alt="" >
                        </span>
                        <select name="" id="" class="form-select d-inline-block input_custom_tab_dark"  value="{{old('')}}">
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
                        <input id="" name="" type="text"  class="form-control input_custom_tab_dark @error('') is-invalid @enderror"  value="{{ old('') }}" required autocomplete="" autofocus>
                    </div>
                </div>

            </div>

            <div class="form-group col-12 mt-4 mb-4 ">
                <p class="text-center ">
                    <button class="btn btn-success btn_save_custom">Guardar</button>
                </p>
            </div>

        </div>

    </div>



</section>

@endsection

@section('js_custom')

    <script>

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


    </script>

@endsection

