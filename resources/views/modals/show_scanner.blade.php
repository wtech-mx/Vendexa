

<!-- Modal -->
<div class="modal fade" id="show_Scanner" tabindex="-1" aria-labelledby="show_ScannerLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">

          <div class="modal-body modal_bg row">

                  <div class="row" style="margin: 0!important;padding: 0!important;z-index: 10;">
                      <div class="col-10">
                          <h2 class="tiitle_modal_dark text-center mt-3">Scanner</h2>
                      </div>

                      <div class="col-2">
                          <a class="input-group-text span_custom_primary_dark mt-3" data-bs-dismiss="modal" style="margin-right: 0rem!important;">
                              <img class="icon_span_form" src="{{ asset('assets/media/icons/close_white.webp') }}" alt="" >
                          </a>
                      </div>

                      <div class="col-12"  style="margin: 0!important;padding: 0!important;">
                        <div class="accordion accoirdion_scanner px-4" id="accordionScanner">
                            <div class="accordion-item acoriden_items mb-2">
                              <h2 class="accordion-header accordeon_scanner_header">
                                <button class="accordion-button accordion_scanner d-block" type="button" data-bs-toggle="collapse" data-bs-target="#collapseProducts" aria-expanded="true" aria-controls="collapseProducts">
                                    <div class="d-flex justify-content-between">
                                        <p style="margin-bottom: 0;">Scanner</p>
                                        <p style="margin-bottom: 0;">
                                            <img class="img_scanner_dropdown" src="{{ asset('assets/media/icons/scanner.webp') }}" alt="">
                                        </p>
                                    </div>
                                </button>
                              </h2>

                              <div id="collapseProducts" class="accordion-collapse collapse show" data-bs-parent="#accordionScanner">
                                <div class="accordion-body row" style="margin: 0!important;padding: 0!important;">

                                    <div class="d-flex justify-content-center mt-3 mb-3">
                                        <div class="camscanner" style="" id="reader_search"></div>
                                    </div>


                                    <div class="d-flex justify-content-center">
                                        <a id="resetScannerProduct" class="input-group-text span_custom_primary_warning mt-2 mb-2">
                                            <img class="icon_span_form" src="{{ asset('assets/media/icons/reset.webp') }}" alt="" >
                                        </a>
                                    </div>

                                    <div class="row">
                                        <div class="col-6">
                                            <div id="servicio-data" class="">
                                            </div>
                                        </div>
                                        <div id="carrito-container" class="col-12">
                                            <div id="result">
                                                <div id="listaProductos"></div>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                              </div>
                            </div>
                            <div class="accordion-item acoriden_items mb-2">
                              <h2 class="accordion-header accordeon_scanner_header">
                                <button class="accordion-button accordion_scanner d-block collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseServices" aria-expanded="false" aria-controls="collapseServices">
                                    <div class="d-flex justify-content-between">
                                        <p style="margin-bottom: 0;">Busqueda avanzada</p>
                                        <p style="margin-bottom: 0;">
                                            <img class="img_scanner_dropdown" src="{{ asset('assets/media/icons/filtrar.webp') }}" alt="">
                                        </p>
                                    </div>
                                </button>
                              </h2>
                              <div id="collapseServices" class="accordion-collapse collapse" data-bs-parent="#accordionScanner">
                                <div class="accordion-body">
                                  <strong>This is the second item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                                </div>
                              </div>
                            </div>

                        </div>
                      </div>

                  </div>

          </div>

        </div>
      </div>
  </div>

@section('js_scanner')

<script>

$.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
    let html5Scanner = new Html5QrcodeScanner("reader_search", { fps: 15, qrbox: 200 });
    html5Scanner.render(onScanSuccess);

    function onScanSuccess(result, decodedResult) {
        html5Scanner.clear().then(_ => {

                $.ajax({
                    type: 'get',
                    url: '{{ route('scanner.index') }}',
                    data: { 'search': result },
                    success: function (data) {
                        console.log('Data from AJAX camara:', data);
                        if (data) {
                            const productoContainer = document.createElement("div");
                            const nombreDiv = document.createElement("div");
                            nombreDiv.innerHTML = `

                                <div class="row">
                                    <div class="col-12 section_tab_bg_white">
                                        <div class="row">

                                            <div class="form-group col-12 px-4 py-1">
                                                <h2 class="tiitle_modal_white text-left ms-2">Detalles Generales</h2>
                                            </div>

                                            <div class="form-group col-12 px-4 py-3">
                                                <label for="name" class="label_custom_primary_product_white mb-2">Nombre :</label>
                                                <div class="input-group ">
                                                    <span class="input-group-text span_custom_tab" >
                                                        <img class="icon_span_tab" src="{{ asset('assets/media/icons/camion.webp') }}" alt="" >
                                                    </span>
                                                    <input id="nombre" name="nombre" type="text"  class="form-control input_custom_tab_dark @error('nombre') is-invalid @enderror"  value="${data.producto_data.nombre}" autocomplete="" autofocus>
                                                </div>
                                            </div>

                                            <div class="form-group col-12 px-4 py-3">
                                                <label for="name" class="label_custom_primary_product_white mb-2">Descripcion :</label>
                                                <div class="input-group ">
                                                    <textarea class="form-control textarea_custom_primary_dark @error('descripcion') is-invalid @enderror" id="descripcion" name="descripcion">${data.producto_data.descripcion}</textarea>
                                                </div>
                                            </div>

                                            <div class="form-groupcol-6 col-xs-6 col-sm-6 col-md-6 col-xl-6 px-4 py-3">
                                                <label for="name" class="label_custom_primary_product_white mb-2">Sku :*</label>
                                                <div class="input-group ">
                                                    <span class="input-group-text span_custom_tab" >
                                                        <img class="icon_span_tab" src="{{ asset('assets/media/icons/sku.webp') }}" alt="" >
                                                    </span>
                                                    <input id="sku" name="sku" type="text"  class="form-control input_custom_tab_dark @error('sku') is-invalid @enderror"  value="${data.producto_data.sku}" autocomplete="" autofocus>
                                                </div>
                                            </div>

                                            <div class="form-group col-6 col-xs-6 col-sm-6 col-md-6 col-xl-6 px-4 py-3">
                                                <label for="name" class="label_custom_primary_product_white mb-2">Proveedor :</label>
                                                <div class="input-group ">
                                                    <span class="input-group-text span_custom_tab" >
                                                        <img class="icon_span_tab" src="{{ asset('assets/media/icons/camion.webp') }}" alt="" >
                                                    </span>
                                                    <select name="id_proveedor" id="id_proveedor" class="form-select d-inline-block input_custom_tab">
                                                        <option value="${data.producto_data.id_proveedor}">${data.producto_data.id_proveedor}</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group col-6 col-xs-6 col-sm-6 col-md-6 col-xl-6 px-4 py-3">
                                                <label for="name" class="label_custom_primary_product_white mb-2">ID Proveedor :</label>
                                                <div class="input-group ">
                                                    <span class="input-group-text span_custom_tab" >
                                                        <img class="icon_span_tab" src="{{ asset('assets/media/icons/cero.webp') }}" alt="" >
                                                    </span>
                                                    <input id="codigo_proveedor" name="codigo_proveedor" type="text"  class="form-control input_custom_tab_dark @error('codigo_proveedor') is-invalid @enderror"  value="${data.producto_data.codigo_proveedor}" autocomplete="" autofocus>
                                                </div>
                                            </div>

                                            <div class="form-group col-6 col-xs-6 col-sm-6 col-md-6 col-xl-6 px-4 py-3">
                                                <label for="name" class="label_custom_primary_product_white mb-2">Stock : </label>
                                                <div class="input-group ">
                                                    <span class="input-group-text span_custom_tab" >
                                                        <img class="icon_span_tab" src="{{ asset('assets/media/icons/en-stock.png.webp') }}" alt="" >
                                                    </span>
                                                    <input id="stock" name="stock" type="text"  class="form-control input_custom_tab_dark @error('stock') is-invalid @enderror"  value="${data.producto_data.stock}" autocomplete="" autofocus>
                                                </div>
                                            </div>

                                            <div class="form-group col-6 col-xs-6 col-sm-6 col-md-6 col-xl-6 px-4 py-3">
                                                <label for="name" class="label_custom_primary_product_white mb-2">Costo  :</label>
                                                <div class="input-group ">
                                                    <span class="input-group-text span_custom_tab" >
                                                        <img class="icon_span_tab" src="{{ asset('assets/media/icons/efectivo.webp') }}" alt="" >
                                                    </span>
                                                    <input id="costo" name="costo" type="text"  class="form-control input_custom_tab_dark @error('costo') is-invalid @enderror"  value="${data.producto_data.costo}" autocomplete="" autofocus>
                                                </div>
                                            </div>

                                            <div class="form-group col-6 col-xs-6 col-sm-6 col-md-6 col-xl-6 px-4 py-3">
                                                <label for="name" class="label_custom_primary_product_white mb-2">Precio normal  :</label>
                                                <div class="input-group ">
                                                    <span class="input-group-text span_custom_tab" >
                                                        <img class="icon_span_tab" src="{{ asset('assets/media/icons/monedas.webp') }}" alt="" >
                                                    </span>
                                                    <input id="precio_normal" name="precio_normal" type="text"  class="form-control input_custom_tab_dark @error('precio_normal') is-invalid @enderror"  value="${data.producto_data.precio_normal}" autocomplete="" autofocus>
                                                </div>
                                            </div>

                                            <div class="form-group col-6 col-xs-6 col-sm-6 col-md-6 col-xl-6 px-4 py-3">
                                                <label for="name" class="label_custom_primary_product_white mb-2">Precio Mayorista</label>

                                                <div class="input-group text-white d-flex justify-content-around mt-3">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="inlineRMayo" id="radioSiMayoEdit" value="Si">
                                                        <label class="form-check-label" for="">Si</label>
                                                    </div>

                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="inlineRMayo" id="radioNoMayoEdit" value="No">
                                                        <label class="form-check-label" for="">No</label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group col-6 col-xs-6 col-sm-6 col-md-6 col-xl-6 px-4 py-3" id="precioMayoristaContainerEdit" style="display: none;">
                                                <label for="name" class="label_custom_primary_product_white mb-2">Precio Mayorista :</label>
                                                <div class="input-group ">
                                                    <span class="input-group-text span_custom_tab" >
                                                        <img class="icon_span_tab" src="{{ asset('assets/media/icons/signo-de-dolar.webp') }}" alt="" >
                                                    </span>
                                                    <input id="precio_mayo" name="precio_mayo" type="number"  class="form-control input_custom_tab_dark @error('precio_mayo') is-invalid @enderror"  value="${data.producto_data.precio_mayo}" autocomplete="" autofocus>
                                                </div>
                                            </div>

                                            <div class="form-group col-6 col-xs-6 col-sm-6 col-md-6 col-xl-6 px-4 py-3">
                                                <label for="name" class="label_custom_primary_product_white mb-2">Precio rebajado</label>

                                                <div class="input-group text-white d-flex justify-content-around mt-3">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="inlineRebajado" id="radioSirebajaEdit" value="Si">
                                                        <label class="form-check-label" for="">Si</label>
                                                    </div>

                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="inlineRebajado" id="radioNorebajaEdit" value="No">
                                                        <label class="form-check-label" for="">No</label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row" id="precioPromoContainerEdit" style="display: none;">

                                                <div class="form-group col-6 px-4 py-3" >
                                                    <label for="name" class="label_custom_primary_product_white mb-2">Precio Rebajado :</label>
                                                    <div class="input-group ">
                                                        <span class="input-group-text span_custom_tab" >
                                                            <img class="icon_span_tab" src="{{ asset('assets/media/icons/descuento.webp') }}" alt="" >
                                                        </span>
                                                        <input id="precio_descuento" name="precio_descuento" type="number"  class="form-control input_custom_tab_dark "  value="${data.producto_data.precio_descuento}" autocomplete="" autofocus>
                                                    </div>
                                                </div>

                                                <div class="form-group col-6 px-4 py-3">
                                                    <label for="name" class="label_custom_primary_product_white mb-2">Fecha de inicio :</label>
                                                    <div class="input-group ">
                                                        <span class="input-group-text span_custom_tab" >
                                                            <img class="icon_span_tab" src="{{ asset('assets/media/icons/calendar-dar.webp') }}" alt="" >
                                                        </span>
                                                        <input id="fecha_inicio_desc" name="fecha_inicio_desc" type="date"  class="form-control input_custom_tab_dark"  value="${data.producto_data.fecha_inicio_desc}" autocomplete="" autofocus>
                                                    </div>
                                                </div>

                                                <div class="form-group col-6 px-4 py-3" >
                                                    <label for="name" class="label_custom_primary_product_white mb-2">Fecha de Fin :</label>
                                                    <div class="input-group ">
                                                        <span class="input-group-text span_custom_tab" >
                                                            <img class="icon_span_tab" src="{{ asset('assets/media/icons/calendar-dar.webp') }}" alt="" >
                                                        </span>
                                                        <input id="fecha_fin_desc" name="fecha_fin_desc type="date"  class="form-control input_custom_tab_dark @error('fecha_fin_desc') is-invalid @enderror"  value="${data.producto_data.fecha_fin_desc}" autocomplete="" autofocus>
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="form-group col-12 px-4 py-1">
                                                <h2 class="tiitle_modal_white text-left ms-2">Metadatos</h2>
                                            </div>

                                            <div class="form-group col-12 px-4 py-3">
                                                <label for="name" class="label_custom_primary_product_white mb-2">Seleciona la unidad:</label>
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text span_custom_primary_dark" >
                                                        <img class="icon_span_form" src="{{ asset('assets/media/icons/cinta-metrica.webp') }}" alt="" >
                                                    </span>
                                                    <select name="unidad_venta" id="unidad_venta" class="form-select d-inline-block select_custom_primary_dark_complete" >
                                                        <option value="${data.producto_data.unidad_venta}">${data.producto_data.unidad_venta}</option>
                                                        <option value="Pieza">Pieza</option>
                                                        <option value="Metro">Metro</option>
                                                        <option value="Kilo">Kilo</option>
                                                        <option value="Litro">Litro</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group col-6 col-xs-6 col-sm-6 col-md-6 col-xl-6 px-4 py-3">
                                                <label for="name" class="label_custom_primary_product_white mb-2">Clave SAT :</label>
                                                <div class="input-group ">
                                                    <span class="input-group-text span_custom_tab" >
                                                        <img class="icon_span_tab" src="{{ asset('assets/media/icons/sat.webp') }}" alt="" >
                                                    </span>
                                                    <input id="clave_sat" name="clave_sat" type="text"  class="form-control input_custom_tab_dark @error('clave_sat') is-invalid @enderror"  value="${data.producto_data.clave_sat}"  autocomplete="" autofocus>
                                                </div>
                                            </div>

                                            <div class="form-group col-6 col-xs-6 col-sm-6 col-md-6 col-xl-6 px-4 py-3">
                                                <label for="name" class="label_custom_primary_product_white mb-2">Estatus </label>

                                                <div class="input-group text-white d-flex justify-content-around mt-3">
                                                    <div class="form-check form-check-inline">
                                                            <input class="form-check-input " type="radio" name="visibilidad_estatus" id="" value="Si">

                                                        <label class="form-check-label" for="">Publicado</label>
                                                    </div>

                                                    <div class="form-check form-check-inline">
                                                            <input class="form-check-input " type="radio" name="visibilidad_estatus" id="" value="No">
                                                        <label class="form-check-label" for="">Pausa</label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group col-12 px-4 py-1">
                                                <h2 class="tiitle_modal_white text-left ms-2">Atributos</h2>
                                            </div>

                                            <div class="form-group col-9 px-4 py-3">
                                                <label for="name" class="label_custom_primary_product_white mb-2">Marca :</label>
                                                <div class="input-group ">
                                                    <span class="input-group-text span_custom_tab" >
                                                        <img class="icon_span_tab" src="{{ asset('assets/media/icons/marca.webp') }}" alt="" >
                                                    </span>
                                                    <select name="id_marca" id="id_marca" class="form-select d-inline-block input_custom_tab_dark">
                                                        <option value="${data.producto_data.id_marca}">${data.producto_data.id_marca}</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group col-3 px-4 py-3">
                                                <label for="name" class="label_custom_primary_product_white mb-4">Agregar</label>
                                                <a class="btn_plus_dash" data-bs-toggle="collapse" href="#collapseMarca" role="button" aria-expanded="false" aria-controls="collapseMarca">
                                                    <img class="img_plus_dash" src="{{ asset('assets/media/icons/anadir_white.webp') }}" alt="">
                                                </a>
                                            </div>

                                            <div class="form-group col-12 px-5 py-3 collapse"  id="collapseMarca">
                                                <label for="name" class="label_custom_primary_sm_dark mb-2">Agregar Marca :</label>
                                                <div class="input-group ">
                                                    <span class="input-group-text span_custom_tab" >
                                                        <img class="icon_span_tab" src="{{ asset('assets/media/icons/marca.webp') }}" alt="" >
                                                    </span>
                                                    <input id="nombre_marca" name="nombre_marca" type="text"  class="form-control input_custom_tab_dark @error('nombre_marca') is-invalid @enderror" autocomplete="" autofocus>
                                                </div>
                                            </div>

                                            <div class="form-group col-9 px-4 py-3">
                                                <label for="name" class="label_custom_primary_product_white mb-2">Categoria :</label>
                                                <div class="input-group ">
                                                    <span class="input-group-text span_custom_tab" >
                                                        <img class="icon_span_tab" src="{{ asset('assets/media/icons/categorias.webp') }}" alt="" >
                                                    </span>
                                                    <select name="id_categoria" id="id_categoria" class="form-select d-inline-block input_custom_tab_dark">
                                                        <option value="${data.producto_data.id_categoria}">${data.producto_data.id_categoria}</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group col-3 px-4 py-3">
                                                <label for="name" class="label_custom_primary_product_white mb-4">Agregar</label>
                                                <a class="btn_plus_dash" data-bs-toggle="collapse" href="#collapseCategoria" role="button" aria-expanded="false" aria-controls="collapseCategoria">
                                                    <img class="img_plus_dash" src="{{ asset('assets/media/icons/anadir_white.webp') }}" alt="">
                                                </a>
                                            </div>

                                            <div class="form-group col-12 px-5 py-3 collapse"  id="collapseCategoria">
                                                <label for="name" class="label_custom_primary_sm_dark mb-2">Agregar Categoria :</label>
                                                <div class="input-group ">
                                                    <span class="input-group-text span_custom_tab" >
                                                        <img class="icon_span_tab" src="{{ asset('assets/media/icons/categorias.webp') }}" alt="" >
                                                    </span>
                                                    <input id="nombre_categoria" name="nombre_categoria" type="text"  class="form-control input_custom_tab_dark @error('nombre_categoria') is-invalid @enderror" autocomplete="" autofocus>
                                                </div>
                                            </div>

                                            <div class="form-group col-9 px-4 py-3">
                                                <label for="name" class="label_custom_primary_product_white mb-2">Subcategoria :</label>
                                                <div class="input-group ">
                                                    <span class="input-group-text span_custom_tab" >
                                                        <img class="icon_span_tab" src="{{ asset('assets/media/icons/paquete.webp') }}" alt="" >
                                                    </span>
                                                    <select name="id_subcategoria" id="id_subcategoria" class="form-select d-inline-block input_custom_tab_dark">
                                                        <option value="${data.producto_data.id_subcategoria}">${data.producto_data.id_subcategoria}</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group col-3 px-4 py-3">
                                                <label for="name" class="label_custom_primary_product_white mb-4">Agregar </label>
                                                <a class="btn_plus_dash" data-bs-toggle="collapse" href="#collapseSubcategoria" role="button" aria-expanded="false" aria-controls="collapseSubcategoria">
                                                    <img class="img_plus_dash" src="{{ asset('assets/media/icons/anadir_white.webp') }}" alt="">
                                                </a>
                                            </div>

                                            <div class="form-group col-12 px-5 py-3 collapse"  id="collapseSubcategoria">
                                                <label for="name" class="label_custom_primary_sm_dark mb-2">Agregar Subcategoria :</label>
                                                <div class="input-group ">
                                                    <span class="input-group-text span_custom_tab" >
                                                        <img class="icon_span_tab" src="{{ asset('assets/media/icons/paquete.webp') }}" alt="" >
                                                    </span>
                                                    <input id="nombre_subcategoria" name="nombre_subcategoria" type="text"  class="form-control input_custom_tab_dark @error('nombre_subcategoria') is-invalid @enderror" autocomplete="" autofocus>
                                                </div>
                                            </div>

                                            <div class="form-group col-12 px-4 py-3">
                                                <label for="name" class="label_custom_primary_product_white mb-2">Imagen de Portada :</label>
                                                <div class="input-group ">
                                                    <span class="input-group-text span_custom_tab" >
                                                        <img class="icon_span_tab" src="{{ asset('assets/media/icons/imagen.webp') }}" alt="" >
                                                    </span>
                                                    <input id="imagen_principal" name="imagen_principal" type="file"  class="form-control input_custom_tab_dark @error('imagen_principal') is-invalid @enderror"  value="${data.producto_data.imagen_principal}" autocomplete="" autofocus>
                                                </div>
                                            </div>

                                            <div class="form-group col-12 px-4 py-3">
                                                <label for="name" class="label_custom_primary_product_white mb-2">Galeria :</label>
                                                <div class="input-group ">
                                                    <span class="input-group-text span_custom_tab" >
                                                        <img class="icon_span_tab" src="{{ asset('assets/media/icons/galeria-de-imagenes.webp') }}" alt="" >
                                                    </span>
                                                    <input type="file" name="file" />

                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            `;

                            // =============== M U E S T R A  L O S  I N P U T S  (EL ORDEN ES IMPORTANTE) ===============================
                            productoContainer.appendChild(nombreDiv);

                            const listaProductos = document.getElementById("listaProductos");
                            listaProductos.appendChild(productoContainer);

                        } else {
                            console.log("Producto no encontrado");
                        }
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });
                console.log(`folio_Product: = ${result}`);
                document.getElementById('resetScannerProduct').classList.remove('no_aparece');
                const audio = new Audio("{{ asset('assets/media/audio/barras.mp3')}}");
                audio.play();
                scanner.clear();
                // Clears scanning instance
                document.getElementById('reader_search').remove();
                // Removes reader element from DOM since no longer needed

            console.log(`clear = ${result}`);

        }).catch(error => {
        });
    }

    function onScanFailure(error) {
    }

    document.getElementById('resetScannerProduct').addEventListener('click', () => {
        resetScanner();
    });

    function resetScanner() {
        html5Scanner.clear();
        html5Scanner.render(onScanSuccess);
        $('#servicio-data').empty();
    }

</script>
@endsection
