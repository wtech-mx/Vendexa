            <form method="POST" action="{{ route('productos.update', $producto->id) }}" enctype="multipart/form-data" class="z-1 px-4 dropzone formularioProductoEdit @if ($configuracion->stock_bajo >= $producto->stock)borde_card_product_sin_stock @elseif ($configuracion->stock_medio >= $producto->stock)borde_card_product_bajo_stock @elseif ($configuracion->stock_alto >= $producto->stock) borde_card_product_stock @endif" >

                @csrf
                <input type="hidden" name="_method" value="PATCH">
                <div class="row">

                    <div class="col-10">
                        <h5 class="subtittle_dark mt-3 ms-2">Nombre: </h5>
                        <h2 class="tiitle_modal_darksm text-left ms-2">{{$producto->nombre}}</h2>
                    </div>

                    <div class="col-2">
                        <a class="input-group-text span_custom_primary_white mt-3" data-bs-dismiss="modal" style="margin-right: 0rem!important;">
                            <img class="icon_span_form" src="{{ asset('assets/media/icons/close_dark.webp') }}" alt="" >
                        </a>
                    </div>

                </div>

                <div class="row">
                    <div class="col-12 bg_img_portada mb-4 mt-3">
                        <p class="text-center" style="margin: 0">
                            <img class="img_portada_product_edit" src="{{ asset('imagen_principal/empresa'.auth()->user()->id_empresa.'/'.$producto->imagen_principal) }}" alt="">
                        </p>

                        <p class="text-center">
                            <img src="data:image/png;base64, {{DNS1D::getBarcodePNG( explode('_', $producto->sku)[0], 'C128', 1.6, 35, array(0, 0, 0), true)}}" >
                        </p>

                        <div class="d-flex justify-content-around">
                            <a href="{{route('imprimir_etiqueta.product',$producto->sku)}}" target="_blank" class="btn mt-2 span_custom_primary_dark">
                                <img class="icon_span_form" src="{{ asset('assets/media/icons/impresora_White.webp') }}" alt="" >
                            </a>
                        </div>
                    </div>
                </div>

                {{-- Tab para informacion de productos --}}
                <div class="row">
                    <div class="col-12 section_tab_bg_white">

                        <ul class="nav nav-pills d-flex justify-content-around ul_nav_custom_white mb-3" id="pills-tab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link  active" id="pills-Info-tab{{$producto->id}}" data-bs-toggle="pill" data-bs-target="#pills-Info{{$producto->id}}" type="button" role="tab" aria-controls="pills-Info" aria-selected="true" style="color: #577590!important;">
                                    <img class="tab_custom_icon" src="{{ asset('assets/media/icons/opciones.webp') }}" alt="" > Info
                                </button>
                            </li>

                            <li class="nav-item" role="presentation">
                                <button class="nav-link " id="pills-Ventas-tab{{$producto->id}}" data-bs-toggle="pill" data-bs-target="#pills-Ventas{{$producto->id}}" type="button" role="tab" aria-controls="pills-Ventas" aria-selected="false" style="color: #577590!important;">
                                    <img class="tab_custom_icon" src="{{ asset('assets/media/icons/gear.webp') }}" alt="" > Ventas
                                </button>
                            </li>

                            <li class="nav-item" role="presentation">
                                <button class="nav-link " id="pills-Mods-tab{{$producto->id}}" data-bs-toggle="pill" data-bs-target="#pills-Mods{{$producto->id}}" type="button" role="tab" aria-controls="pills-Mods" aria-selected="false" style="color: #577590!important;">
                                    <img class="tab_custom_icon" src="{{ asset('assets/media/icons/resultado.webp') }}" alt="" > Mods
                                </button>
                            </li>

                        </ul>

                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-Info{{$producto->id}}" role="tabpanel" aria-labelledby="pills-Info-tab{{$producto->id}}" tabindex="0">
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
                                            <input id="nombre" name="nombre" type="text"  class="form-control input_custom_tab_dark @error('nombre') is-invalid @enderror"  value="{{old('nombre', $producto->nombre)}}" autocomplete="" autofocus>
                                        </div>
                                    </div>

                                    <div class="form-group col-12 px-4 py-3">
                                        <label for="name" class="label_custom_primary_product_white mb-2">Descripcion :</label>
                                        <div class="input-group ">
                                            <textarea class="form-control textarea_custom_primary_dark @error('descripcion') is-invalid @enderror" id="descripcion" name="descripcion">{{$producto->descripcion}}</textarea>
                                        </div>
                                    </div>

                                    <div class="form-group col-6 col-xs-6 col-sm-6 col-md-6 col-xl-6 px-4 py-3">
                                        <label for="name" class="label_custom_primary_product_white mb-2">Sku :*</label>
                                        <div class="input-group ">
                                            <span class="input-group-text span_custom_tab" >
                                                <img class="icon_span_tab" src="{{ asset('assets/media/icons/sku.webp') }}" alt="" >
                                            </span>
                                            <input id="sku" name="sku" type="text"  class="form-control input_custom_tab_dark @error('sku') is-invalid @enderror"  value="{{old('sku', explode('_', $producto->sku)[0])}}" autocomplete="" autofocus>
                                        </div>
                                    </div>

                                    <div class="form-group col-6 col-xs-6 col-sm-6 col-md-6 col-xl-6 px-4 py-3">
                                        <label for="name" class="label_custom_primary_product_white mb-2">Proveedor :</label>
                                        <div class="input-group ">
                                            <span class="input-group-text span_custom_tab" >
                                                <img class="icon_span_tab" src="{{ asset('assets/media/icons/camion.webp') }}" alt="" >
                                            </span>
                                            <select name="id_proveedor" id="id_proveedor" class="form-select d-inline-block input_custom_tab">
                                                @if ($producto->id_proveedor == NULL)
                                                    <option value="">Seleccionar proveedor</option>
                                                @else
                                                    <option value="{{$producto->id_proveedor}}">{{$producto->Proveedor->nombre}}</option>
                                                @endif

                                                @foreach ($proveedores as $proveedor)
                                                    <option value="{{ old($proveedor->id) }}" @if(old('id_proveedor') == $proveedor->id) selected @endif>{{ $proveedor->nombre }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group col-6 col-xs-6 col-sm-6 col-md-6 col-xl-6 px-4 py-3">
                                        <label for="name" class="label_custom_primary_product_white mb-2">ID Proveedor :</label>
                                        <div class="input-group ">
                                            <span class="input-group-text span_custom_tab" >
                                                <img class="icon_span_tab" src="{{ asset('assets/media/icons/cero.webp') }}" alt="" >
                                            </span>
                                            <input id="codigo_proveedor" name="codigo_proveedor" type="text"  class="form-control input_custom_tab_dark @error('codigo_proveedor') is-invalid @enderror"  value="{{ old('codigo_proveedor', $producto->codigo_proveedor) }}" autocomplete="" autofocus>
                                        </div>
                                    </div>

                                    <div class="form-group col-6 col-xs-6 col-sm-6 col-md-6 col-xl-6 px-4 py-3">
                                        <label for="name" class="label_custom_primary_product_white mb-2">Stock : </label>
                                        <div class="input-group ">
                                            <span class="input-group-text span_custom_tab" >
                                                <img class="icon_span_tab" src="{{ asset('assets/media/icons/en-stock.png.webp') }}" alt="" >
                                            </span>
                                            <input id="stock" name="stock" type="number"  class="form-control input_custom_tab_dark @error('stock') is-invalid @enderror"  value="{{ old('stock', $producto->stock) }}" autocomplete="" autofocus>
                                        </div>
                                    </div>

                                    <div class="form-group col-6 col-xs-6 col-sm-6 col-md-6 col-xl-6 px-4 py-3">
                                        <label for="name" class="label_custom_primary_product_white mb-2">Costo  :</label>
                                        <div class="input-group ">
                                            <span class="input-group-text span_custom_tab" >
                                                <img class="icon_span_tab" src="{{ asset('assets/media/icons/efectivo.webp') }}" alt="" >
                                            </span>
                                            <input id="costo" name="costo" type="number"  class="form-control input_custom_tab_dark"  value="{{ old('costo', $producto->costo) }}">
                                        </div>
                                    </div>

                                    <div class="form-group col-6 col-xs-6 col-sm-6 col-md-6 col-xl-6 px-4 py-3">
                                        <label for="name" class="label_custom_primary_product_white mb-2">Precio normal  :</label>
                                        <div class="input-group ">
                                            <span class="input-group-text span_custom_tab" >
                                                <img class="icon_span_tab" src="{{ asset('assets/media/icons/monedas.webp') }}" alt="" >
                                            </span>
                                            <input id="precio_normal" name="precio_normal" type="double"  class="form-control input_custom_tab_dark"  value="{{ old('precio_normal', $producto->precio_normal) }}">
                                        </div>
                                    </div>

                                    <div class="form-group col-6 col-xs-6 col-sm-6 col-md-6 col-xl-6 px-4 py-3" >
                                        <label for="name" class="label_custom_primary_product_white mb-2">Precio Mayorista :</label>
                                        <div class="input-group ">
                                            <span class="input-group-text span_custom_tab" >
                                                <img class="icon_span_tab" src="{{ asset('assets/media/icons/signo-de-dolar.webp') }}" alt="" >
                                            </span>
                                            <input id="precio_mayo" name="precio_mayo" type="number"  class="form-control input_custom_tab_dark @error('precio_mayo') is-invalid @enderror"  value="{{old('precio_mayo', $producto->precio_mayo)}}" autocomplete="" autofocus>
                                        </div>
                                    </div>


                                    <div class="form-group col-6 px-4 py-3" >
                                            <label for="name" class="label_custom_primary_product_white mb-2">Precio Rebajado :</label>
                                            <div class="input-group ">
                                                <span class="input-group-text span_custom_tab" >
                                                    <img class="icon_span_tab" src="{{ asset('assets/media/icons/descuento.webp') }}" alt="" >
                                                </span>
                                                <input id="precio_descuento" name="precio_descuento" type="number"  class="form-control input_custom_tab_dark "  value="{{old('precio_descuento', $producto->precio_descuento)}}" >
                                            </div>
                                    </div>

                                    <div class="form-group col-6 px-4 py-3">
                                            <label for="name" class="label_custom_primary_product_white mb-2">Fecha de inicio :</label>
                                            <div class="input-group ">
                                                <span class="input-group-text span_custom_tab" >
                                                    <img class="icon_span_tab" src="{{ asset('assets/media/icons/calendar-dar.webp') }}" alt="" >
                                                </span>
                                                <input id="fecha_inicio_desc" name="fecha_inicio_desc" type="date"  class="form-control input_custom_tab_dark"  value="{{old('fecha_inicio_desc', $producto->fecha_inicio_desc) }}" >
                                            </div>
                                    </div>

                                    <div class="form-group col-6 px-4 py-3" >
                                            <label for="name" class="label_custom_primary_product_white mb-2">Fecha de Fin :</label>
                                            <div class="input-group ">
                                                <span class="input-group-text span_custom_tab" >
                                                    <img class="icon_span_tab" src="{{ asset('assets/media/icons/calendar-dar.webp') }}" alt="" >
                                                </span>
                                                <input id="fecha_fin_desc" name="fecha_fin_desc" type="date"  class="form-control input_custom_tab_dark"  value="{{old('fecha_fin_desc', $producto->fecha_fin_desc)}}" >
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
                                                <option value="{{$producto->unidad_venta}}">{{$producto->unidad_venta}}</option>
                                                <option value="Pieza" @if(old('unidad_venta') == 'Pieza') selected @endif>Pieza</option>
                                                <option value="Metro" @if(old('unidad_venta') == 'Metro') selected @endif>Metro</option>
                                                <option value="Kilo" @if(old('unidad_venta') == 'Kilo') selected @endif>Kilo</option>
                                                <option value="Litro" @if(old('unidad_venta') == 'Litro') selected @endif>Litro</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group col-6 col-xs-6 col-sm-6 col-md-6 col-xl-6 px-4 py-3">
                                        <label for="name" class="label_custom_primary_product_white mb-2">Clave SAT :</label>
                                        <div class="input-group ">
                                            <span class="input-group-text span_custom_tab" >
                                                <img class="icon_span_tab" src="{{ asset('assets/media/icons/sat.webp') }}" alt="" >
                                            </span>
                                            <select name="clave_sat" id="clave_sat" class="form-select d-inline-block input_custom_tab">
                                                <option selected value="{{$producto->clave_sat}}">{{$producto->clave_sat}}</option>
                                                @include('components.claves_sat.options')
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group col-6 col-xs-6 col-sm-6 col-md-6 col-xl-6 px-4 py-3">
                                        <label for="name" class="label_custom_primary_product_white mb-2">Estatus </label>

                                        <div class="input-group text-white d-flex justify-content-around mt-3">
                                              <div class="form-check form-check-inline">
                                                @if ($producto->visibilidad_estatus == 'Si')
                                                    <input class="form-check-input " type="radio" name="visibilidad_estatus" id="" value="Si" checked>
                                                    @else
                                                    <input class="form-check-input " type="radio" name="visibilidad_estatus" id="" value="Si">
                                                @endif

                                                <label class="form-check-label" for="">Publicado</label>
                                              </div>

                                              <div class="form-check form-check-inline">
                                                @if ($producto->visibilidad_estatus == 'No')
                                                    <input class="form-check-input " type="radio" name="visibilidad_estatus" id="" value="No" checked>
                                                    @else
                                                    <input class="form-check-input " type="radio" name="visibilidad_estatus" id="" value="No">
                                                @endif
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
                                                <option value="{{$producto->id_marca}}">{{ $producto->Marca->nombre }}</option>
                                                @foreach ($marcas as $marca)
                                                    <option value="{{ $marca->id }}" @if(old('id_marca') == $marca->id) selected @endif>{{ $marca->nombre }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group col-3 px-4 py-3">
                                        <label for="name" class="label_custom_primary_product_white mb-4">Agregar</label>
                                        <a class="btn_plus_dash" data-bs-toggle="collapse" href="#collapseMarca_{{ $producto->id}}" role="button" aria-expanded="false" aria-controls="collapseMarca_{{ $producto->id}}">
                                            <img class="img_plus_dash" src="{{ asset('assets/media/icons/anadir_white.webp') }}" alt="">
                                        </a>
                                    </div>

                                    <div class="form-group col-12 px-5 py-3 collapse"  id="collapseMarca_{{ $producto->id}}">
                                        <label for="name" class="label_custom_primary_sm_dark mb-2">Agregar Marca :</label>
                                        <div class="input-group ">
                                            <span class="input-group-text span_custom_tab" >
                                                <img class="icon_span_tab" src="{{ asset('assets/media/icons/marca.webp') }}" alt="" >
                                            </span>
                                            <input id="nombre_marca" name="nombre_marca" type="text"  class="form-control input_custom_tab_dark"  value="{{ old('nombre_marca') }}" autocomplete="" autofocus>
                                        </div>
                                    </div>

                                    <div class="form-group col-9 px-4 py-3">
                                        <label for="name" class="label_custom_primary_product_white mb-2">Categoria :</label>
                                        <div class="input-group ">
                                            <span class="input-group-text span_custom_tab" >
                                                <img class="icon_span_tab" src="{{ asset('assets/media/icons/categorias.webp') }}" alt="" >
                                            </span>
                                            <select name="id_categoria" id="id_categoria" class="form-select d-inline-block input_custom_tab_dark">
                                                <option value="{{$producto->id_categoria}}">{{ $producto->Categoria->nombre }}</option>
                                                @foreach ($categorias as $categoria)
                                                    <option value="{{ $categoria->id }}" @if(old('id_categoria') == $categoria->id) selected @endif>{{ $categoria->nombre }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group col-3 px-4 py-3">
                                        <label for="name" class="label_custom_primary_product_white mb-4">Agregar</label>
                                        <a class="btn_plus_dash" data-bs-toggle="collapse" href="#collapseCategoria_{{ $producto->id}}" role="button" aria-expanded="false" aria-controls="collapseCategoria_{{ $producto->id}}">
                                            <img class="img_plus_dash" src="{{ asset('assets/media/icons/anadir_white.webp') }}" alt="">
                                        </a>
                                    </div>

                                    <div class="form-group col-12 px-5 py-3 collapse"  id="collapseCategoria_{{ $producto->id}}">
                                        <label for="name" class="label_custom_primary_sm_dark mb-2">Agregar Categoria :</label>
                                        <div class="input-group ">
                                            <span class="input-group-text span_custom_tab" >
                                                <img class="icon_span_tab" src="{{ asset('assets/media/icons/categorias.webp') }}" alt="" >
                                            </span>
                                            <input id="nombre_categoria" name="nombre_categoria" type="text"  class="form-control input_custom_tab_dark @error('nombre_categoria') is-invalid @enderror"  value="{{ old('nombre_categoria') }}" autocomplete="" autofocus>
                                        </div>
                                    </div>

                                    <div class="form-group col-9 px-4 py-3">
                                        <label for="name" class="label_custom_primary_product_white mb-2">Subcategoria :</label>
                                        <div class="input-group ">
                                            <span class="input-group-text span_custom_tab" >
                                                <img class="icon_span_tab" src="{{ asset('assets/media/icons/paquete.webp') }}" alt="" >
                                            </span>
                                            <select name="id_subcategoria" id="id_subcategoria" class="form-select d-inline-block input_custom_tab_dark">
                                                @if ($producto->id_subcategoria == NULL)
                                                    <option value="">Seleccionar</option>
                                                @else
                                                    <option value="{{$producto->id_subcategoria}}">{{ $producto->SubCategoria->nombre }}</option>
                                                @endif

                                                @foreach ($subcategorias as $subcategoria)
                                                    <option value="{{ $subcategoria->id }}" @if(old('id_subcategoria') == $subcategoria->id) selected @endif>{{ $subcategoria->nombre }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group col-3 px-4 py-3">
                                        <label for="name" class="label_custom_primary_product_white mb-4">Agregar </label>
                                        <a class="btn_plus_dash" data-bs-toggle="collapse" href="#collapseSubcategoria__{{ $producto->id}}" role="button" aria-expanded="false" aria-controls="collapseSubcategoria__{{ $producto->id}}">
                                            <img class="img_plus_dash" src="{{ asset('assets/media/icons/anadir_white.webp') }}" alt="">
                                        </a>
                                    </div>

                                    <div class="form-group col-12 px-5 py-3 collapse"  id="collapseSubcategoria__{{ $producto->id}}">
                                        <label for="name" class="label_custom_primary_sm_dark mb-2">Agregar Subcategoria :</label>
                                        <div class="input-group ">
                                            <span class="input-group-text span_custom_tab" >
                                                <img class="icon_span_tab" src="{{ asset('assets/media/icons/paquete.webp') }}" alt="" >
                                            </span>
                                            <input id="nombre_subcategoria" name="nombre_subcategoria" type="text"  class="form-control input_custom_tab_dark @error('nombre_subcategoria') is-invalid @enderror"  value="{{ old('nombre_subcategoria') }}" autocomplete="" autofocus>
                                        </div>
                                    </div>

                                    <div class="form-group col-12 px-4 py-3">
                                        <label for="name" class="label_custom_primary_product_white mb-2">Imagen de Portada :</label>
                                        <div class="input-group ">
                                            <span class="input-group-text span_custom_tab" >
                                                <img class="icon_span_tab" src="{{ asset('assets/media/icons/imagen.webp') }}" alt="" >
                                            </span>
                                            <input id="imagen_principal" name="imagen_principal" type="file"  class="form-control input_custom_tab_dark @error('imagen_principal') is-invalid @enderror"  value="{{ old('imagen_principal', $producto->imagen_principal) }}">
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


                            <div class="tab-pane fade" id="pills-Ventas{{$producto->id}}" role="tabpanel" aria-labelledby="pills-Ventas-tab{{$producto->id}}" tabindex="0">
                                <div class="row p-2">

                                    <div class="col-12 px-4 py-1">
                                        <h2 class="tiitle_modal_white text-left ms-2">Ventas</h2>
                                    </div>
                                    @foreach($ordesprodcutos as $item)
                                        @if($producto->id == $item->id_producto)
                                            @include('components.producto_ventas')
                                        @endif
                                    @endforeach
                                </div>
                            </div>


                            <div class="tab-pane row fade" id="pills-Mods{{$producto->id}}" role="tabpanel" aria-labelledby="pills-Mods-tab{{$producto->id}}" tabindex="0">
                                <div class="row">

                                    <div class="col-12 px-4 py-1">
                                        <h2 class="tiitle_modal_white text-left ms-2">Modificaciones</h2>
                                    </div>

                                    @include('components.producto_modificaciones')

                                </div>
                            </div>

                        </div>

                    </div>
                </div>

                    <div class="form-group col-12 mt-4 mb-4 ">
                        <p class="text-center ">
                            <button type="submit" class="btn btn-success btn_save_custom">Actualizar</button>
                        </p>
                    </div>

                </form>
