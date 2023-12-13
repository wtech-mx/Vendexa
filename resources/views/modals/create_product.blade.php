@section('css_custom')


@endsection

<!-- Modal -->
<div class="modal fade" id="creatProduct" tabindex="-1" aria-labelledby="creatProductLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">

        <div class="modal-body modal_bg row">

            <form method="POST" action="{{ route('productos.store') }}" class="z-1 dropzone"  id="miFormulario" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-10">
                        <h2 class="tiitle_modal_dark text-center mt-3">Crear Producto</h2>
                    </div>

                    <div class="col-2">
                        <a class="input-group-text span_custom_primary_dark mt-3" data-bs-dismiss="modal" style="margin-right: 0rem!important;">
                            <img class="icon_span_form" src="{{ asset('assets/media/icons/close_white.webp') }}" alt="" >
                        </a>
                    </div>
                </div>

                <div class="form-group col-12 mb-3 p-2">
                    <label for="name" class="label_custom_primary_product mb-2">Nombre : *</label>
                    <div class="input-group ">
                        <span class="input-group-text span_custom_primary_dark" >
                            <img class="icon_span_form" src="{{ asset('assets/media/icons/una.webp') }}" alt="" >
                        </span>
                        <input id="nombre" name="nombre" type="text"  class="form-control input_custom_primary_dark @error('nombre') is-invalid @enderror"  value="{{ old('nombre') }}"  autocomplete="" autofocus>
                    </div>
                </div>

                <div class="form-group col-12 mb-3 p-2">
                    <label for="name" class="label_custom_primary_product mb-2">Descripcion :</label>
                    <div class="input-group ">
                        <textarea class="form-control textarea_custom_primary_dark @error('descripcion') is-invalid @enderror" id="descripcion" name="descripcion" value="{{ old('descripcion') }}"></textarea>
                    </div>
                </div>

                <div class="form-group col-12 mb-3 p-2">
                    <label for="name" class="label_custom_primary_product mb-2">Escanear o generar SKU : *</label>
                    <div class="input-group mb-3">
                        <span class="input-group-text span_custom_primary_dark" >
                            <img class="icon_span_form" src="{{ asset('assets/media/icons/scanner2.webp') }}" alt="" >
                        </span>
                        <select name="opcion" id="opcion" class="form-select d-inline-block select_custom_primary_dark">
                            <option value="" @if(old('opcion') == '') selected @endif>Seleccionar opción</option>
                            <option value="Generar SKU" @if(old('opcion') == 'Generar SKU') selected @endif>Generar SKU</option>
                            <option value="Escanear Codigo" @if(old('opcion') == 'Escanear Codigo') selected @endif>Escanear Código</option>
                        </select>
                    </div>
                </div>

                {{-- Contenedores dinamicos del select --}}

                <div class="row mb-3 " id="contentGenerarSKU" style="display: none;">

                    <div class="form-group col-3 mb-3 " >
                        <label for="name" class="label_custom_primary_product mb-2">Generar</label>
                        <div class="input-group ">
                            <a id="generarSKU" class="input-group-text span_custom_primary_dark" >
                                <img class="icon_span_form" src="{{ asset('assets/media/icons/sincronizando.webp') }}" alt="" >
                            </a>
                        </div>
                    </div>

                    <div class="form-group col-9 mb-3 " >
                        <label for="name" class="label_custom_primary_product mb-2">SKU : *</label>
                        <div class="input-group ">
                            <span class="input-group-text span_custom_primary_dark" >
                                <img class="icon_span_form" src="{{ asset('assets/media/icons/code_barras.webp') }}" alt="" >
                            </span>

                            <input id="skuInput" name="sku_generado" type="number" class="form-control input_custom_primary_dark @error('sku_generado') is-invalid @enderror" value="{{ old('sku_generado') }}" autocomplete="" autofocus>
                        </div>
                    </div>
                </div>


                <div class="row mb-3 " id="contentEscanearCodigo" style="display: none;">

                    <div class="form-group col-12 mb-3 px-5 ">
                            <div style="width: 415px" id="reader"></div>
                    </div>


                    <div class="form-group col-10 mb-3 ">
                        <label for="name" class="label_custom_primary_product mb-2">SKU : *</label>
                        <div class="input-group ">
                            <span class="input-group-text span_custom_primary_dark" >
                                <img class="icon_span_form" src="{{ asset('assets/media/icons/code_barras.webp') }}" alt="" >
                            </span>

                            <input id="skuInputScanner" name="sku_scanner" type="text" class="form-control input_custom_primary_dark @error('sku_scanner') is-invalid @enderror" value="{{ old('sku_scanner') }}" autocomplete="" autofocus>
                        </div>
                    </div>

                    <div class="form-group col-2 mb-3 ">
                        <label for="name" class="label_custom_primary_product mb-2">Reiniciar</label>
                        <div class="input-group ">
                            <a id="resetScannerBtn" class="input-group-text span_custom_primary_warning">
                                <img class="icon_span_form" src="{{ asset('assets/media/icons/reset.webp') }}" alt="" >
                            </a>
                        </div>
                    </div>

                </div>

                {{-- Tab para informacion de productos --}}
                <div class="row">
                    <div class="col-12 section_tab_bg">

                        <ul class="nav nav-pills d-flex justify-content-around ul_nav_custom mb-3" id="pills-tab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="pills-detalles-tab" data-bs-toggle="pill" data-bs-target="#pills-detalles" type="button" role="tab" aria-controls="pills-detalles" aria-selected="true">
                                    <img class="tab_custom_icon" src="{{ asset('assets/media/icons/opciones.webp') }}" alt="" > Detalles
                                </button>
                            </li>

                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-atributos-tab" data-bs-toggle="pill" data-bs-target="#pills-atributos" type="button" role="tab" aria-controls="pills-atributos" aria-selected="false">
                                    <img class="tab_custom_icon" src="{{ asset('assets/media/icons/resultado.webp') }}" alt="" > Atributos
                                </button>
                            </li>

                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-metadatos-tab" data-bs-toggle="pill" data-bs-target="#pills-metadatos" type="button" role="tab" aria-controls="pills-metadatos" aria-selected="false">
                                    <img class="tab_custom_icon" src="{{ asset('assets/media/icons/gear.webp') }}" alt="" > Metadatos
                                </button>
                            </li>
                        </ul>

                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-detalles" role="tabpanel" aria-labelledby="pills-detalles-tab" tabindex="0">
                                <div class="row">

                                    <div class="form-group col-9 px-4 py-3">
                                        <label for="name" class="label_custom_primary_product mb-2">Proveedor :</label>
                                        <div class="input-group ">
                                            <span class="input-group-text span_custom_tab" >
                                                <img class="icon_span_tab" src="{{ asset('assets/media/icons/camion.webp') }}" alt="" >
                                            </span>
                                            <select name="id_proveedor" id="id_proveedor" class="form-select d-inline-block input_custom_tab"  value="{{old('')}}">
                                                <option value="" {{ old('') == '' ? 'selected' : '' }}>Selecionar </option>
                                                @foreach ($proveedores as $proveedor)
                                                    <option value="{{ $proveedor->id }}" @if(old('id_proveedor') == $proveedor->id) selected @endif>{{ $proveedor->nombre }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group col-3 px-4 py-3">
                                        <label for="name" class="label_custom_primary_product mb-4">Agregar</label>
                                        <a class="btn_plus_dash" data-bs-toggle="collapse" href="#collapseProveedor" role="button" aria-expanded="false" aria-controls="collapseProveedor">
                                            <img class="img_plus_dash" src="{{ asset('assets/media/icons/anadir_white.webp') }}" alt="">
                                        </a>
                                    </div>

                                    <div class="form-group col-12 px-5 py-3 collapse"  id="collapseProveedor">
                                        <label for="name" class="label_custom_primary_sm mb-2">Agregar Proveedor :</label>
                                        <div class="input-group ">
                                            <span class="input-group-text span_custom_tab" >
                                                <img class="icon_span_tab" src="{{ asset('assets/media/icons/camion.webp') }}" alt="" >
                                            </span>
                                            <input id="" name="" type="text"  class="form-control input_custom_tab @error('') is-invalid @enderror"  value="{{ old('') }}" autocomplete="" autofocus>
                                        </div>
                                    </div>

                                    <div class="form-group col-6 col-xs-6 col-sm-6 col-md-6 col-xl-6 px-4 py-3">
                                        <label for="name" class="label_custom_primary_product mb-2">ID Proveedor :</label>
                                        <div class="input-group ">
                                            <span class="input-group-text span_custom_tab" >
                                                <img class="icon_span_tab" src="{{ asset('assets/media/icons/cero.webp') }}" alt="" >
                                            </span>
                                            <input id="codigo_proveedor" name="codigo_proveedor" type="text"  class="form-control input_custom_tab @error('codigo_proveedor') is-invalid @enderror"  value="{{ old('codigo_proveedor') }}" autocomplete="" autofocus>
                                        </div>
                                    </div>

                                    <div class="form-group col-6 col-xs-6 col-sm-6 col-md-6 col-xl-6 px-4 py-3">
                                        <label for="name" class="label_custom_primary_product mb-2">Stock : *</label>
                                        <div class="input-group ">
                                            <span class="input-group-text span_custom_tab" >
                                                <img class="icon_span_tab" src="{{ asset('assets/media/icons/en-stock.png.webp') }}" alt="" >
                                            </span>
                                            <input id="stock" name="stock" type="number"  class="form-control input_custom_tab @error('stock') is-invalid @enderror"  value="{{ old('stock') }}"  autocomplete="" autofocus>
                                        </div>
                                    </div>

                                    <div class="form-group col-6 col-xs-6 col-sm-6 col-md-6 col-xl-6 px-4 py-3">
                                        <label for="name" class="label_custom_primary_product mb-2">Costo : *</label>
                                        <div class="input-group ">
                                            <span class="input-group-text span_custom_tab" >
                                                <img class="icon_span_tab" src="{{ asset('assets/media/icons/efectivo.webp') }}" alt="" >
                                            </span>
                                            <input id="costo" name="costo" type="number"  class="form-control input_custom_tab @error('costo') is-invalid @enderror"  value="{{ old('costo') }}"  autocomplete="" autofocus>
                                        </div>
                                    </div>

                                    <div class="form-group col-6 col-xs-6 col-sm-6 col-md-6 col-xl-6 px-4 py-3">
                                        <label for="name" class="label_custom_primary_product mb-2">Precio normal : *</label>
                                        <div class="input-group ">
                                            <span class="input-group-text span_custom_tab" >
                                                <img class="icon_span_tab" src="{{ asset('assets/media/icons/monedas.webp') }}" alt="" >
                                            </span>
                                            <input id="precio_normal" name="precio_normal" type="number"  class="form-control input_custom_tab @error('precio_normal') is-invalid @enderror"  value="{{ old('precio_normal') }}"  autocomplete="" autofocus>
                                        </div>
                                    </div>

                                    <div class="form-group col-6 col-xs-6 col-sm-6 col-md-6 col-xl-6 px-4 py-3">
                                        <label for="name" class="label_custom_primary_product mb-2">Precio Mayorista</label>

                                        <div class="input-group d-flex justify-content-around mt-3">
                                              <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="radioSiMayo" value="Si">
                                                <label class="form-check-label" for="">Si</label>
                                              </div>

                                              <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="radioNoMayo" value="No">
                                                <label class="form-check-label" for="">No</label>
                                              </div>
                                        </div>
                                    </div>

                                    <div class="form-group col-6 col-xs-6 col-sm-6 col-md-6 col-xl-6 px-4 py-3" id="precioMayoristaContainer" style="display: none;">
                                        <label for="name" class="label_custom_primary_product mb-2">Precio Mayorista :</label>
                                        <div class="input-group ">
                                            <span class="input-group-text span_custom_tab" >
                                                <img class="icon_span_tab" src="{{ asset('assets/media/icons/signo-de-dolar.webp') }}" alt="" >
                                            </span>
                                            <input id="precio_mayo" name="precio_mayo" type="text"  class="form-control input_custom_tab @error('precio_mayo') is-invalid @enderror"  value="{{ old('precio_mayo') }}" autocomplete="" autofocus>
                                        </div>
                                    </div>

                                    <div class="form-group col-6 col-xs-6 col-sm-6 col-md-6 col-xl-6 px-4 py-3">
                                        <label for="name" class="label_custom_primary_product mb-2">Precio rebajado</label>

                                        <div class="input-group d-flex justify-content-around mt-3">
                                              <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="radioSirebaja" value="Si">
                                                <label class="form-check-label" for="">Si</label>
                                              </div>

                                              <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="radioNorebaja" value="No">
                                                <label class="form-check-label" for="">No</label>
                                              </div>
                                        </div>
                                    </div>

                                    <div class="row" id="precioPromoContainer" style="display: none;">

                                        <div class="form-group col-6 px-4 py-3" >
                                            <label for="name" class="label_custom_primary_product mb-2">Precio Rebajado :</label>
                                            <div class="input-group ">
                                                <span class="input-group-text span_custom_tab" >
                                                    <img class="icon_span_tab" src="{{ asset('assets/media/icons/descuento.webp') }}" alt="" >
                                                </span>
                                                <input id="precio_descuento" name="precio_descuento" type="number"  class="form-control input_custom_tab @error('precio_descuento') is-invalid @enderror"  value="{{ old('precio_descuento') }}" autocomplete="" autofocus>
                                            </div>
                                        </div>

                                        <div class="form-group col-6 px-4 py-3">
                                            <label for="name" class="label_custom_primary_product mb-2">Fecha de inicio :</label>
                                            <div class="input-group ">
                                                <span class="input-group-text span_custom_tab" >
                                                    <img class="icon_span_tab" src="{{ asset('assets/media/icons/calendar-dar.webp') }}" alt="" >
                                                </span>
                                                <input id="fecha_inicio_desc" name="fecha_inicio_desc" type="date"  class="form-control input_custom_tab @error('fecha_inicio_desc') is-invalid @enderror"  value="{{ old('fecha_inicio_desc') }}" autocomplete="" autofocus>
                                            </div>
                                        </div>

                                        <div class="form-group col-6 px-4 py-3" >
                                            <label for="name" class="label_custom_primary_product mb-2">Fecha de Fin :</label>
                                            <div class="input-group ">
                                                <span class="input-group-text span_custom_tab" >
                                                    <img class="icon_span_tab" src="{{ asset('assets/media/icons/calendar-dar.webp') }}" alt="" >
                                                </span>
                                                <input id="fecha_fin_desc" name="fecha_fin_desc" type="date"  class="form-control input_custom_tab @error('fecha_fin_desc') is-invalid @enderror"  value="{{ old('fecha_fin_desc') }}" autocomplete="" autofocus>
                                            </div>
                                        </div>

                                    </div>


                                </div>

                            </div>

                            <div class="tab-pane row fade" id="pills-metadatos" role="tabpanel" aria-labelledby="pills-metadatos-tab" tabindex="0">

                                <div class="row">

                                    <div class="form-group col-9 px-4 py-3">
                                        <label for="name" class="label_custom_primary_product mb-2">Marca :</label>
                                        <div class="input-group ">
                                            <span class="input-group-text span_custom_tab" >
                                                <img class="icon_span_tab" src="{{ asset('assets/media/icons/marca.webp') }}" alt="" >
                                            </span>
                                            <select name="id_marca" id="id_marca" class="form-select d-inline-block input_custom_tab">
                                                <option value="" {{ old('') == '' ? 'selected' : '' }}>Selecionar </option>
                                                @foreach ($marcas as $marca)
                                                    <option value="{{ $marca->id }}" @if(old('id_marca') == $marca->id) selected @endif>{{ $marca->nombre }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group col-3 px-4 py-3">
                                        <label for="name" class="label_custom_primary_product mb-4">Agregar</label>
                                        <a class="btn_plus_dash" data-bs-toggle="collapse" href="#collapseMarca" role="button" aria-expanded="false" aria-controls="collapseMarca">
                                            <img class="img_plus_dash" src="{{ asset('assets/media/icons/anadir_white.webp') }}" alt="">
                                        </a>
                                    </div>

                                    <div class="form-group col-12 px-5 py-3 collapse"  id="collapseMarca">
                                        <label for="name" class="label_custom_primary_sm mb-2">Agregar Marca :</label>
                                        <div class="input-group ">
                                            <span class="input-group-text span_custom_tab" >
                                                <img class="icon_span_tab" src="{{ asset('assets/media/icons/marca.webp') }}" alt="" >
                                            </span>
                                            <input id="nombre_marca" name="nombre_marca" type="text"  class="form-control input_custom_tab @error('nombre_marca') is-invalid @enderror"  value="{{ old('nombre_marca') }}" autocomplete="" autofocus>
                                        </div>
                                    </div>

                                    <div class="form-group col-9 px-4 py-3">
                                        <label for="name" class="label_custom_primary_product mb-2">Categoria :</label>
                                        <div class="input-group ">
                                            <span class="input-group-text span_custom_tab" >
                                                <img class="icon_span_tab" src="{{ asset('assets/media/icons/categorias.webp') }}" alt="" >
                                            </span>
                                            <select name="id_categoria" id="id_categoria" class="form-select d-inline-block input_custom_tab">
                                                <option value="" {{ old('') == '' ? 'selected' : '' }}>Selecionar </option>
                                                @foreach ($categorias as $categoria)
                                                    <option value="{{ $categoria->id }}" @if(old('id_categoria') == $categoria->id) selected @endif>{{ $categoria->nombre }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group col-3 px-4 py-3">
                                        <label for="name" class="label_custom_primary_product mb-4">Agregar</label>
                                        <a class="btn_plus_dash" data-bs-toggle="collapse" href="#collapseCategoria" role="button" aria-expanded="false" aria-controls="collapseCategoria">
                                            <img class="img_plus_dash" src="{{ asset('assets/media/icons/anadir_white.webp') }}" alt="">
                                        </a>
                                    </div>

                                    <div class="form-group col-12 px-5 py-3 collapse"  id="collapseCategoria">
                                        <label for="name" class="label_custom_primary_sm mb-2">Agregar Categoria :</label>
                                        <div class="input-group ">
                                            <span class="input-group-text span_custom_tab" >
                                                <img class="icon_span_tab" src="{{ asset('assets/media/icons/categorias.webp') }}" alt="" >
                                            </span>
                                            <input id="nombre_categoria" name="nombre_categoria" type="text"  class="form-control input_custom_tab @error('nombre_categoria') is-invalid @enderror"  value="{{ old('nombre_categoria') }}" autocomplete="" autofocus>
                                        </div>
                                    </div>

                                    <div class="form-group col-9 px-4 py-3">
                                        <label for="name" class="label_custom_primary_product mb-2">Subcategoria :</label>
                                        <div class="input-group ">
                                            <span class="input-group-text span_custom_tab" >
                                                <img class="icon_span_tab" src="{{ asset('assets/media/icons/paquete.webp') }}" alt="" >
                                            </span>
                                            <select name="id_subcategoria" id="id_subcategoria" class="form-select d-inline-block input_custom_tab">
                                                <option value="" {{ old('') == '' ? 'selected' : '' }}>Selecionar </option>
                                                @foreach ($subcategorias as $subcategoria)
                                                    <option value="{{ $subcategoria->id }}" @if(old('id_subcategoria') == $subcategoria->id) selected @endif>{{ $subcategoria->nombre }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group col-3 px-4 py-3">
                                        <label for="name" class="label_custom_primary_product mb-4">Agregar </label>
                                        <a class="btn_plus_dash" data-bs-toggle="collapse" href="#collapseSubcategoria" role="button" aria-expanded="false" aria-controls="collapseSubcategoria">
                                            <img class="img_plus_dash" src="{{ asset('assets/media/icons/anadir_white.webp') }}" alt="">
                                        </a>
                                    </div>

                                    <div class="form-group col-12 px-5 py-3 collapse"  id="collapseSubcategoria">
                                        <label for="name" class="label_custom_primary_sm mb-2">Agregar Subcategoria :</label>
                                        <div class="input-group ">
                                            <span class="input-group-text span_custom_tab" >
                                                <img class="icon_span_tab" src="{{ asset('assets/media/icons/paquete.webp') }}" alt="" >
                                            </span>
                                            <input id="nombre_subcategoria" name="nombre_subcategoria" type="text"  class="form-control input_custom_tab @error('nombre_subcategoria') is-invalid @enderror"  value="{{ old('nombre_subcategoria') }}"  autocomplete="" autofocus>
                                        </div>
                                    </div>

                                    <div class="form-group col-12 px-4 py-3">
                                        <label for="name" class="label_custom_primary_product mb-2">Imagen de Portada : *</label>
                                        <div class="input-group ">
                                            <span class="input-group-text span_custom_tab" >
                                                <img class="icon_span_tab" src="{{ asset('assets/media/icons/imagen.webp') }}" alt="" >
                                            </span>
                                            <input id="imagen_principal" name="imagen_principal" type="file"  class="form-control input_custom_tab @error('imagen_principal') is-invalid @enderror"  value="{{ old('imagen_principal') }}"  autocomplete="" autofocus>
                                        </div>
                                    </div>

                                    <div class="form-group col-12 px-4 py-3">
                                        <label for="name" class="label_custom_primary_product mb-2">Galeria :</label>
                                        <div class="input-group ">
                                            <span class="input-group-text span_custom_tab" >
                                                <img class="icon_span_tab" src="{{ asset('assets/media/icons/galeria-de-imagenes.webp') }}" alt="" >
                                            </span>
                                            <input type="file" name="file" />

                                        </div>
                                    </div>

                                </div>

                            </div>

                            <div class="tab-pane fade" id="pills-atributos" role="tabpanel" aria-labelledby="pills-atributos-tab" tabindex="0">

                                <div class="row">

                                    <div class="form-group col-12 px-4 py-3">
                                        <label for="name" class="label_custom_primary_product mb-2">Seleciona la unidad: *</label>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text span_custom_primary_dark" >
                                                <img class="icon_span_form" src="{{ asset('assets/media/icons/cinta-metrica.webp') }}" alt="" >
                                            </span>
                                            <select name="unidad_venta" id="unidad_venta" class="form-select d-inline-block select_custom_primary_dark" >
                                                <option value="" @if(old('unidad_venta') == '') selected @endif>Seleccionar</option>
                                                <option value="Pieza" @if(old('unidad_venta') == 'Pieza') selected @endif>Pieza</option>
                                                <option value="Metro" @if(old('unidad_venta') == 'Metro') selected @endif>Metro</option>
                                                <option value="Kilo" @if(old('unidad_venta') == 'Kilo') selected @endif>Kilo</option>
                                                <option value="Litro" @if(old('unidad_venta') == 'Litro') selected @endif>Litro</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group col-6 col-xs-6 col-sm-6 col-md-6 col-xl-6 px-4 py-3">
                                        <label for="name" class="label_custom_primary_product mb-2">Clave SAT :</label>
                                        <div class="input-group ">
                                            <span class="input-group-text span_custom_tab" >
                                                <img class="icon_span_tab" src="{{ asset('assets/media/icons/sat.webp') }}" alt="" >
                                            </span>
                                            <select name="clave_sat" id="clave_sat" class="form-select d-inline-block input_custom_tab">
                                                <option value="" @if(old('clave_sat') == '') selected @endif>Seleccionar</option>
                                                <option value="10101500 - Animales vivos de granja" @if(old('clave_sat') == '10101500 - Animales vivos de granja') selected @endif>10101500 - Animales vivos de granja</option>
                                                <option value="30151800 - Bicicletas y accesorios" @if(old('clave_sat') == '30151800 - Bicicletas y accesorios') selected @endif>30151800 - Bicicletas y accesorios</option>
                                                <option value="50161500 - Vehículos terrestres" @if(old('clave_sat') == '50161500 - Vehículos terrestres') selected @endif>50161500 - Vehículos terrestres</option>
                                                <option value="70171500 - Herramientas generales" @if(old('clave_sat') == '70171500 - Herramientas generales') selected @endif>70171500 - Herramientas generales</option>
                                                <option value="90181600 - Productos farmacéuticos" @if(old('clave_sat') == '90181600 - Productos farmacéuticos') selected @endif>90181600 - Productos farmacéuticos</option>
                                                <option value="11111700 - Confitería" @if(old('clave_sat') == '11111700 - Confitería') selected @endif>11111700 - Confitería</option>
                                                <option value="12121800 - Equipos de audio y video" @if(old('clave_sat') == '12121800 - Equipos de audio y video') selected @endif>12121800 - Equipos de audio y video</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group col-6 col-xs-6 col-sm-6 col-md-6 col-xl-6 px-4 py-3">
                                        <label for="name" class="label_custom_primary_product mb-2">Estatus </label>

                                        <div class="input-group d-flex justify-content-around mt-3">
                                              <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="visibilidad_estatus" id="" value="Si">
                                                <label class="form-check-label" for="">Publicado</label>
                                              </div>

                                              <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="visibilidad_estatus" id="" value="No">
                                                <label class="form-check-label" for="">Pausa</label>
                                              </div>
                                        </div>
                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>
                </div>

                <div class="form-group col-12 mt-4 mb-4 ">
                    <p class="text-center ">
                        <button type="submit" class="btn btn-success btn_save_custom">Guardar</button>
                    </p>
                </div>

            </form>

        </div>

      </div>
    </div>
  </div>

@section('js_custom_productos')

  <script>

        $(document).ready(function() {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
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
                const producto_data = response.producto_data;

                Swal.fire({
                        title: "Producto Guardado <strong>¡Exitosamente!</strong>",
                        icon: "success",
                        html: "<div class='row'><div class='col-6 mt-3'><img class='icon_span_tab' src='{{ asset('assets/media/icons/fuente.webp') }}' ><p><strong>Nombre:</strong> <br>"+ producto_data.nombre +"</p></div><div class='col-6 mt-3'><img class='icon_span_tab' src='{{ asset('assets/media/icons/en-stock.png.webp') }}' ><p><strong>Stock:</strong><br>"+ producto_data.stock +" </p> </div><div class='col-6'><img class='icon_span_tab' src='{{ asset('assets/media/icons/monedas.webp') }}' ><p><strong>Precio:</strong><br> "+ producto_data.precio +"</p></div><div class='col-6'><img class='icon_span_tab' src='{{ asset('assets/media/icons/sku.webp') }}'><p><strong>Sku:</strong><br>"+ producto_data.sku +" </p></div></div>",
                        showCloseButton: true,
                        showCancelButton: true,
                        focusConfirm: false,
                        confirmButtonText: '<a class="btn_swalater_confirm"  style="text-decoration: none;color: #fff;" href="{{ route('productos.index') }}" >Ver Productos</a>',
                        cancelButtonText: `<a  class="btn_swalater_cancel" style="text-decoration: none;color: #fff;" href="" >Cerrar</a>`,
                    }).then(() => {
                        // Recarga la página
                       window.location.href = '/home/';
                    });

            }

            const radioSiMayo = document.getElementById('radioSiMayo');
            const radioNoMayo = document.getElementById('radioNoMayo');

            const radioSirebaja = document.getElementById('radioSirebaja');
            const radioNorebaja = document.getElementById('radioNorebaja');

            const precioMayoristaContainer = document.getElementById('precioMayoristaContainer');
            const precioPromoContainer = document.getElementById('precioPromoContainer');

            radioSiMayo.addEventListener('change', function() {
                if (radioSiMayo.checked) {
                    precioMayoristaContainer.style.display = 'block';
                }
            });

            radioNoMayo.addEventListener('change', function() {
                if (radioNoMayo.checked) {
                    precioMayoristaContainer.style.display = 'none';
                }
            });

            radioSirebaja.addEventListener('change', function() {
                if (radioSirebaja.checked) {
                    precioPromoContainer.style.display = 'contents';
                }
            });

            radioNorebaja.addEventListener('change', function() {
                if (radioNorebaja.checked) {
                    precioPromoContainer.style.display = 'none';
                }
            });


            // Manejar el cambio en el select
            $('#opcion').change(function() {
                var selectedOption = $(this).val();

                // Ocultar todas las secciones al cambiar la opción
                $('#contentGenerarSKU').hide();
                $('#contentEscanearCodigo').hide();

                // Mostrar la sección correspondiente según la opción seleccionada
                if (selectedOption === 'Generar SKU') {
                    $('#contentGenerarSKU').show();
                } else if (selectedOption === 'Escanear Codigo') {
                    $('#contentEscanearCodigo').show();
                }
            });


            // Manejar clic en el botón para generar SKU
            $('#generarSKU').click(function() {
                // Generar un número aleatorio de 6 dígitos
                var skuNumber = Math.floor(100000 + Math.random() * 900000);

                // Asignar el número aleatorio al input correspondiente
                $('#skuInput').val(skuNumber);
            });

            var html5QrcodeScanner;

            function onScanSuccess(decodedText, decodedResult) {
                // Manejar el éxito del escaneo y actualizar el valor del input
                $('#skuInputScanner').val(decodedText);

                // Detener la cámara después de un escaneo exitoso
                if (html5QrcodeScanner) {
                    html5QrcodeScanner.clear();
                    html5QrcodeScanner.stop();
                }
            }

            function onScanError(errorMessage) {
                // handle on error condition, with error message
                console.console.log(errorMessage);
            }

            var html5QrcodeScanner = new Html5QrcodeScanner("reader", { fps: 15, qrbox: 250 });
            html5QrcodeScanner.render(onScanSuccess, onScanError);

            document.getElementById('resetScannerBtn').addEventListener('click', () => {
            resetScanner();
            });

            function resetScanner() {
                html5QrcodeScanner.clear();
                html5QrcodeScanner.render(onScanSuccess);
                $('#reaedr').empty();
                document.getElementById('result').innerHTML = '';
            }

            });

  </script>


@endsection
