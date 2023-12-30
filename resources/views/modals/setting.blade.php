
<div class="modal " id="configuracionInicial" tabindex="-1" aria-labelledby="configuracionInicialLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">

        <div class="modal-body modal_bg row">
            <form method="POST" action="{{ route('configuracion.inicial', $configuracion->id) }}" class="z-1"  id="miFormularioConfiguracion" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="_method" value="PATCH">
                <div class="row">
                    <div class="col-12">
                        <h2 class="tiitle_modal_dark text-center mt-3">Configuracion inicial</h2>
                    </div>
                </div>

                <div class="row px-3">

                    <div class="form-group text-left col-12 mt-4 p-2">
                        <h6 class="subtittle_clientes">Empresa</h6>
                     </div>

                     <div class="form-group col-6 px-4 py-3">
                         <label for="name" class="label_custom_primary_product mb-2">Nombre Empresa</label>
                         <div class="input-group mb-3">
                            <span class="input-group-text span_custom_tab" >
                                <img class="icon_span_form" src="{{ asset('assets/media/icons/in-stock.webp') }}" alt="" >
                            </span>
                            <input  name="nombre_empresa" id="nombre_empresa" type="text"  class="form-control input_custom_tab_dark @error('nombre_empresa') is-invalid @enderror"  value="{{ old('nombre_empresa') }}" autocomplete="" autofocus>
                         </div>
                     </div>

                     <div class="form-group col-6 mb-3 p-2">
                        <label for="name" class="label_custom_primary_product mb-2">Imagen de empresa</label>
                        <div class="input-group ">
                            <span class="input-group-text span_custom_tab" >
                                <img class="icon_span_form" src="{{ asset('assets/media/icons/user_predeterminado.webp') }}" alt="" >
                            </span>
                            <input  name="logo" type="file"  class="form-control input_custom_tab_dark @error('logo') is-invalid @enderror"  value="{{ old('logo') }}"  autocomplete="" autofocus>
                        </div>
                    </div>

                    <div class="form-group text-left col-12 mt-4 p-2">
                       <h6 class="subtittle_clientes">Metodos de pago</h6>
                    </div>

                    <div class="form-group col-3 px-4 py-3">
                        <label for="name" class="label_custom_primary_product mb-2">Tarjeta C/D</label>
                        <div class="input-group mb-3">
                            <div class="form-check">
                                <input class="form-check-input" name="tarjeta" type="checkbox" value="1" checked>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-3 px-4 py-3">
                        <label for="name" class="label_custom_primary_product mb-2">Efectivo</label>
                        <div class="input-group mb-3">
                            <div class="form-check">
                                <input class="form-check-input" name="efectivo" type="checkbox" value="1" checked>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-3 px-4 py-3">
                        <label for="name" class="label_custom_primary_product mb-2">Transferencia</label>
                        <div class="input-group mb-3">
                            <div class="form-check">
                                <input class="form-check-input" name="transferencia" type="checkbox" value="1" checked>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-3 px-4 py-3">
                        <label for="name" class="label_custom_primary_product mb-2">Mercado Pago</label>
                        <div class="input-group mb-3">
                            <div class="form-check">
                                <input class="form-check-input" name="mercado_pago" type="checkbox" value="1" checked>
                            </div>
                        </div>
                    </div>

                    <div class="form-group text-left col-12 mt-4 p-2">
                        <h6 class="subtittle_clientes">Medidor stock</h6>
                     </div>

                     <div class="form-group col-4 mb-3 p-2">
                        <label for="name" class="label_custom_primary_product mb-2">Alto : *</label>
                        <div class="input-group ">
                            <span class="input-group-text span_custom_tab" >
                                <img class="icon_span_form" src="{{ asset('assets/media/icons/in-stock.webp') }}" alt="" >
                            </span>
                            <input  name="stock_alto" id="stock_alto" type="number"  class="form-control input_custom_tab_dark @error('stock_alto') is-invalid @enderror"  value="{{ old('stock_alto') }}"  autocomplete="" autofocus required>
                        </div>
                    </div>

                    <div class="form-group col-4 mb-3 p-2">
                        <label for="name" class="label_custom_primary_product mb-2">Medio : *</label>
                        <div class="input-group ">
                            <span class="input-group-text span_custom_tab" >
                                <img class="icon_span_form" src="{{ asset('assets/media/icons/dead-stock.webp') }}" alt="" >
                            </span>
                            <input  name="stock_medio" id="stock_medio" type="number"  class="form-control input_custom_tab_dark @error('stock_medio') is-invalid @enderror"  value="{{ old('stock_medio') }}"  autocomplete="" autofocus required>
                        </div>
                    </div>

                    <div class="form-group col-4 mb-3 p-2">
                        <label for="name" class="label_custom_primary_product mb-2">Bajo : *</label>
                        <div class="input-group ">
                            <span class="input-group-text span_custom_tab" >
                                <img class="icon_span_form" src="{{ asset('assets/media/icons/out-of-stock.webp') }}" alt="" >
                            </span>
                            <input  name="stock_bajo" id="stock_bajo" type="number"  class="form-control input_custom_tab_dark @error('stock_bajo') is-invalid @enderror"  value="{{ old('stock_bajo') }}"  autocomplete="" autofocus required>
                        </div>
                    </div>

                    <div class="form-group text-left col-12 mt-4 p-2">
                        <h6 class="subtittle_clientes">Factura</h6>
                     </div>

                     <div class="form-group col-6 px-4 py-3">
                        <label for="name" class="label_custom_primary_product mb-2">Opcion factura</label>
                        <div class="input-group mb-3">
                            <div class="form-check">
                                <input class="form-check-input" name="opcion_factura" type="checkbox" value="1" checked>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-6 mb-3 p-2">
                        <label for="name" class="label_custom_primary_product mb-2">Porcentaje para factura:</label>
                        <div class="input-group ">
                            <span class="input-group-text span_custom_tab" >
                                <img class="icon_span_form" src="{{ asset('assets/media/icons/comisiones.webp') }}" alt="" >
                            </span>
                            <input  name="porcentaje_factura" id="porcentaje_factura" type="number"  class="form-control input_custom_tab_dark @error('porcentaje_factura') is-invalid @enderror"  value="16"  autocomplete="" autofocus>
                        </div>
                    </div>

                    <div class="form-group text-left col-12 mt-4 p-2">
                        <h6 class="subtittle_clientes">Productos</h6>
                     </div>

                     <div class="form-group col-6 px-4 py-3">
                        <label for="name" class="label_custom_primary_product mb-2">¿Clave SAT en productos?</label>
                        <div class="input-group mb-3">
                            <div class="form-check">
                                <input class="form-check-input" name="sat_productos" type="checkbox" value="1" checked>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-6 px-4 py-3">
                        <label for="name" class="label_custom_primary_product mb-2">¿Solicitar codigo en caja?</label>
                        <div class="input-group mb-3">
                            <div class="form-check">
                                <input class="form-check-input" name="codigo_caja" type="checkbox" value="1">
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-6 px-4 py-3">
                        <label for="name" class="label_custom_primary_product mb-2">¿Opcion precio mayorista?</label>
                        <div class="input-group mb-3">
                            <div class="form-check">
                                <input class="form-check-input" id="checkboxPrecioMayorista" name="precio_mayorista" type="checkbox" value="1">
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-6 px-4 py-3 encriptar-mayo-div">
                        <label for="name" class="label_custom_primary_product mb-2">¿Encriptar precio mayorista?</label>
                        <div class="input-group mb-3">
                            <div class="form-check">
                                <input class="form-check-input" id="checkboxEncriptarMayo" name="encriptar_mayo" type="checkbox" value="1">
                            </div>
                        </div>
                    </div>

                    <div class="div-encriptacion">
                        <div class="row">
                        <div class="form-group col-6 mb-3 p-2">
                                <label for="name" class="label_custom_primary_product mb-2">Palabra para encriptacion:</label>
                                <div class="input-group ">
                                    <span class="input-group-text span_custom_tab" >
                                        <img class="icon_span_form" src="{{ asset('assets/media/icons/comisiones.webp') }}" alt="" >
                                    </span>
                                    <select name="palabra_encriptada" id="palabra_encriptada" class="form-select d-inline-block select_custom_primary_dark" >
                                        <option value="" @if(old('palabra_encriptada') == '') selected @endif>Seleccionar palabra</option>
                                        <option value="GUACAMAYAS" @if(old('palabra_encriptada') == 'GUACAMAYAS') selected @endif>G U A C A M A Y A S</option>
                                        <option value="MURCIELAGO" @if(old('palabra_encriptada') == 'MURCIELAGO') selected @endif>M U R C I E L A G O</option>
                                        <option value="COCODRILOS" @if(old('palabra_encriptada') == 'COCODRILOS') selected @endif>C O C O D R I L O S</option>
                                        <option value="MARQUESITO" @if(old('palabra_encriptada') == 'MARQUESITO') selected @endif>M A R Q U E S I T O</option>
                                    </select>
                                </div>
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

    </div>
  </div>
</div>
