@section('css_custom')


@endsection

<!-- Modal -->
<div class="modal fade" id="editProduct-{{$producto->id}}" tabindex="-1" aria-labelledby="editProductLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">

        <div class="modal-body modal_bg_edit_product row">

            <form action="" class="z-1 px-4" action="/file-upload"class="dropzone" id="my-awesome-dropzone">

                <div class="row">

                    <div class="col-10">
                        <h5 class="subtittle_white mt-3 ms-2">Nombre: </h5>
                        <h2 class="tiitle_modal_white text-left ms-2">Chamarra de nieve</h2>
                    </div>

                    <div class="col-2">
                        <button class="input-group-text span_custom_primary_white mt-3" data-bs-dismiss="modal">
                            <img class="icon_span_form" src="{{ asset('assets/media/icons/close_dark.webp') }}" alt="" >
                        </button>
                    </div>

                </div>

                <div class="row">
                    <div class="col-12 bg_img_portada mb-4 mt-3">
                        <p class="text-center" style="margin: 0">
                            <img class="img_portada_product_edit" src="{{ asset('assets/media/img/ilustraciones/chamarra.png') }}" alt="">
                        </p>
                    </div>
                </div>

                {{-- Tab para informacion de productos --}}
                <div class="row">
                    <div class="col-12 section_tab_bg_white">

                        <ul class="nav nav-pills d-flex justify-content-around ul_nav_custom_white mb-3" id="pills-tab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link  active" id="pills-Info-tab" data-bs-toggle="pill" data-bs-target="#pills-Info" type="button" role="tab" aria-controls="pills-Info" aria-selected="true" style="color: #577590!important;">
                                    <img class="tab_custom_icon" src="{{ asset('assets/media/icons/opciones.webp') }}" alt="" > Info
                                </button>
                            </li>

                            <li class="nav-item" role="presentation">
                                <button class="nav-link " id="pills-Ventas-tab" data-bs-toggle="pill" data-bs-target="#pills-Ventas" type="button" role="tab" aria-controls="pills-Ventas" aria-selected="false" style="color: #577590!important;">
                                    <img class="tab_custom_icon" src="{{ asset('assets/media/icons/gear.webp') }}" alt="" > Ventas
                                </button>
                            </li>

                            <li class="nav-item" role="presentation">
                                <button class="nav-link " id="pills-Mods-tab" data-bs-toggle="pill" data-bs-target="#pills-Mods" type="button" role="tab" aria-controls="pills-Mods" aria-selected="false" style="color: #577590!important;">
                                    <img class="tab_custom_icon" src="{{ asset('assets/media/icons/resultado.webp') }}" alt="" > Mods
                                </button>
                            </li>

                        </ul>

                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-Info" role="tabpanel" aria-labelledby="pills-Info-tab" tabindex="0">
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
                                            <input id="" name="" type="text"  class="form-control input_custom_tab_dark @error('') is-invalid @enderror"  value="{{ old('') }}" required autocomplete="" autofocus>
                                        </div>
                                    </div>

                                    <div class="form-group col-12 px-4 py-3">
                                        <label for="name" class="label_custom_primary_product_white mb-2">Descripcion :</label>
                                        <div class="input-group ">
                                            <textarea class="form-control textarea_custom_primary_white" placeholder="" id="" name=""></textarea>
                                        </div>
                                    </div>

                                    <div class="form-groupcol-6 col-xs-6 col-sm-6 col-md-6 col-xl-6 px-4 py-3">
                                        <label for="name" class="label_custom_primary_product_white mb-2">Sku :</label>
                                        <div class="input-group ">
                                            <span class="input-group-text span_custom_tab" >
                                                <img class="icon_span_tab" src="{{ asset('assets/media/icons/sku.webp') }}" alt="" >
                                            </span>
                                            <input id="" name="" type="text"  class="form-control input_custom_tab_dark @error('') is-invalid @enderror"  value="{{ old('') }}" required autocomplete="" autofocus>
                                        </div>
                                    </div>

                                    <div class="form-group col-6 col-xs-6 col-sm-6 col-md-6 col-xl-6 px-4 py-3">
                                        <label for="name" class="label_custom_primary_product_white mb-2">Proveedor :</label>
                                        <div class="input-group ">
                                            <span class="input-group-text span_custom_tab" >
                                                <img class="icon_span_tab" src="{{ asset('assets/media/icons/camion.webp') }}" alt="" >
                                            </span>
                                            <input id="" name="" type="text"  class="form-control input_custom_tab_dark @error('') is-invalid @enderror"  value="{{ old('') }}" required autocomplete="" autofocus>
                                        </div>
                                    </div>

                                    <div class="form-group col-6 col-xs-6 col-sm-6 col-md-6 col-xl-6 px-4 py-3">
                                        <label for="name" class="label_custom_primary_product_white mb-2">ID Proveedor :</label>
                                        <div class="input-group ">
                                            <span class="input-group-text span_custom_tab" >
                                                <img class="icon_span_tab" src="{{ asset('assets/media/icons/cero.webp') }}" alt="" >
                                            </span>
                                            <input id="" name="" type="text"  class="form-control input_custom_tab_dark @error('') is-invalid @enderror"  value="{{ old('') }}" required autocomplete="" autofocus>
                                        </div>
                                    </div>

                                    <div class="form-group col-6 col-xs-6 col-sm-6 col-md-6 col-xl-6 px-4 py-3">
                                        <label for="name" class="label_custom_primary_product_white mb-2">Stock : </label>
                                        <div class="input-group ">
                                            <span class="input-group-text span_custom_tab" >
                                                <img class="icon_span_tab" src="{{ asset('assets/media/icons/en-stock.png.webp') }}" alt="" >
                                            </span>
                                            <input id="" name="" type="text"  class="form-control input_custom_tab_dark @error('') is-invalid @enderror"  value="{{ old('') }}" required autocomplete="" autofocus>
                                        </div>
                                    </div>

                                    <div class="form-group col-6 col-xs-6 col-sm-6 col-md-6 col-xl-6 px-4 py-3">
                                        <label for="name" class="label_custom_primary_product_white mb-2">Costo  :</label>
                                        <div class="input-group ">
                                            <span class="input-group-text span_custom_tab" >
                                                <img class="icon_span_tab" src="{{ asset('assets/media/icons/efectivo.webp') }}" alt="" >
                                            </span>
                                            <input id="" name="" type="text"  class="form-control input_custom_tab_dark @error('') is-invalid @enderror"  value="{{ old('') }}" required autocomplete="" autofocus>
                                        </div>
                                    </div>

                                    <div class="form-group col-6 col-xs-6 col-sm-6 col-md-6 col-xl-6 px-4 py-3">
                                        <label for="name" class="label_custom_primary_product_white mb-2">Precio normal  :</label>
                                        <div class="input-group ">
                                            <span class="input-group-text span_custom_tab" >
                                                <img class="icon_span_tab" src="{{ asset('assets/media/icons/monedas.webp') }}" alt="" >
                                            </span>
                                            <input id="" name="" type="text"  class="form-control input_custom_tab_dark @error('') is-invalid @enderror"  value="{{ old('') }}" required autocomplete="" autofocus>
                                        </div>
                                    </div>

                                    <div class="form-group col-6 col-xs-6 col-sm-6 col-md-6 col-xl-6 px-4 py-3">
                                        <label for="name" class="label_custom_primary_product_white mb-2">Precio Mayorista</label>

                                        <div class="input-group text-white d-flex justify-content-around mt-3">
                                              <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="radioSiMayoEdit" value="Si">
                                                <label class="form-check-label" for="">Si</label>
                                              </div>

                                              <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="radioNoMayoEdit" value="No">
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
                                            <input id="" name="" type="text"  class="form-control input_custom_tab_dark @error('') is-invalid @enderror"  value="{{ old('') }}" required autocomplete="" autofocus>
                                        </div>
                                    </div>

                                    <div class="form-group col-6 col-xs-6 col-sm-6 col-md-6 col-xl-6 px-4 py-3">
                                        <label for="name" class="label_custom_primary_product_white mb-2">Precio rebajado</label>

                                        <div class="input-group text-white d-flex justify-content-around mt-3">
                                              <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="radioSirebajaEdit" value="Si">
                                                <label class="form-check-label" for="">Si</label>
                                              </div>

                                              <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="radioNorebajaEdit" value="No">
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
                                                <input id="" name="" type="text"  class="form-control input_custom_tab_dark @error('') is-invalid @enderror"  value="{{ old('') }}" required autocomplete="" autofocus>
                                            </div>
                                        </div>

                                        <div class="form-group col-6 px-4 py-3">
                                            <label for="name" class="label_custom_primary_product_white mb-2">Fecha de inicio :</label>
                                            <div class="input-group ">
                                                <span class="input-group-text span_custom_tab" >
                                                    <img class="icon_span_tab" src="{{ asset('assets/media/icons/calendar-dar.webp') }}" alt="" >
                                                </span>
                                                <input id="" name="" type="date"  class="form-control input_custom_tab_dark @error('') is-invalid @enderror"  value="{{ old('') }}" required autocomplete="" autofocus>
                                            </div>
                                        </div>

                                        <div class="form-group col-6 px-4 py-3" >
                                            <label for="name" class="label_custom_primary_product_white mb-2">Fecha de Fin :</label>
                                            <div class="input-group ">
                                                <span class="input-group-text span_custom_tab" >
                                                    <img class="icon_span_tab" src="{{ asset('assets/media/icons/calendar-dar.webp') }}" alt="" >
                                                </span>
                                                <input id="" name="" type="date"  class="form-control input_custom_tab_dark @error('') is-invalid @enderror"  value="{{ old('') }}" required autocomplete="" autofocus>
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
                                            <select name="" id="" class="form-select d-inline-block select_custom_primary_dark_complete"  value="{{old('')}}">
                                                <option value="" {{ old('') == '' ? 'selected' : '' }}>Selecionar opcion</option>
                                                <option value="Pieza" {{ old('') == 'Pieza' ? 'selected' : '' }}>Pieza</option>
                                                <option value="Metro" {{ old('') == 'Metro' ? 'selected' : '' }}>Metro</option>
                                                <option value="Kilo" {{ old('') == 'Kilo' ? 'selected' : '' }}>Kilo</option>
                                                <option value="Litro" {{ old('') == 'Litro' ? 'selected' : '' }}>Litro</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group col-6 col-xs-6 col-sm-6 col-md-6 col-xl-6 px-4 py-3">
                                        <label for="name" class="label_custom_primary_product_white mb-2">Clave SAT :</label>
                                        <div class="input-group ">
                                            <span class="input-group-text span_custom_tab" >
                                                <img class="icon_span_tab" src="{{ asset('assets/media/icons/sat.webp') }}" alt="" >
                                            </span>
                                            <input id="" name="" type="text"  class="form-control input_custom_tab_dark @error('') is-invalid @enderror"  value="{{ old('') }}"  autocomplete="" autofocus>
                                        </div>
                                    </div>

                                    <div class="form-group col-6 col-xs-6 col-sm-6 col-md-6 col-xl-6 px-4 py-3">
                                        <label for="name" class="label_custom_primary_product_white mb-2">Estatus </label>

                                        <div class="input-group text-white d-flex justify-content-around mt-3">
                                              <div class="form-check form-check-inline">
                                                <input class="form-check-input " type="radio" name="inlineRadioOptions" id="" value="Si">
                                                <label class="form-check-label" for="">Publicado</label>
                                              </div>

                                              <div class="form-check form-check-inline">
                                                <input class="form-check-input " type="radio" name="inlineRadioOptions" id="" value="No">
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
                                            <select name="" id="" class="form-select d-inline-block input_custom_tab_dark"  value="{{old('')}}">
                                                <option value="" {{ old('') == '' ? 'selected' : '' }}>Selecionar </option>
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
                                            <input id="" name="" type="text"  class="form-control input_custom_tab_dark @error('') is-invalid @enderror"  value="{{ old('') }}" required autocomplete="" autofocus>
                                        </div>
                                    </div>

                                    <div class="form-group col-9 px-4 py-3">
                                        <label for="name" class="label_custom_primary_product_white mb-2">Categoria :</label>
                                        <div class="input-group ">
                                            <span class="input-group-text span_custom_tab" >
                                                <img class="icon_span_tab" src="{{ asset('assets/media/icons/categorias.webp') }}" alt="" >
                                            </span>
                                            <select name="" id="" class="form-select d-inline-block input_custom_tab_dark"  value="{{old('')}}">
                                                <option value="" {{ old('') == '' ? 'selected' : '' }}>Selecionar </option>
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
                                            <input id="" name="" type="text"  class="form-control input_custom_tab_dark @error('') is-invalid @enderror"  value="{{ old('') }}" required autocomplete="" autofocus>
                                        </div>
                                    </div>

                                    <div class="form-group col-9 px-4 py-3">
                                        <label for="name" class="label_custom_primary_product_white mb-2">Subcategoria :</label>
                                        <div class="input-group ">
                                            <span class="input-group-text span_custom_tab" >
                                                <img class="icon_span_tab" src="{{ asset('assets/media/icons/paquete.webp') }}" alt="" >
                                            </span>
                                            <select name="" id="" class="form-select d-inline-block input_custom_tab_dark"  value="{{old('')}}">
                                                <option value="" {{ old('') == '' ? 'selected' : '' }}>Selecionar </option>

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
                                            <input id="" name="" type="text"  class="form-control input_custom_tab_dark @error('') is-invalid @enderror"  value="{{ old('') }}" required autocomplete="" autofocus>
                                        </div>
                                    </div>

                                    <div class="form-group col-12 px-4 py-3">
                                        <label for="name" class="label_custom_primary_product_white mb-2">Imagen de Portada :</label>
                                        <div class="input-group ">
                                            <span class="input-group-text span_custom_tab" >
                                                <img class="icon_span_tab" src="{{ asset('assets/media/icons/imagen.webp') }}" alt="" >
                                            </span>
                                            <input id="" name="" type="file"  class="form-control input_custom_tab_dark @error('') is-invalid @enderror"  value="{{ old('') }}" required autocomplete="" autofocus>
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


                            <div class="tab-pane fade" id="pills-Ventas" role="tabpanel" aria-labelledby="pills-Ventas-tab" tabindex="0">
                                <div class="row">

                                    <div class="col-12 px-4 py-1">
                                        <h2 class="tiitle_modal_white text-left ms-2">Ventas</h2>
                                    </div>

                                    <div class="col-6 px-4 py-1">
                                        <div class="row">

                                            <div class="col-12 bg_minicart_ventas ">
                                                <p class="text-center" style="margin: 0">
                                                    <img class="img_portada_product_edit_ventas" src="{{ asset('assets/media/img/ilustraciones/chamarra.png') }}" alt="">
                                                </p>

                                                <div class="row">
                                                    <div class="col-6">
                                                        <p class="text_empleado text-start">Empleado</p>
                                                    </div>

                                                    <div class="col-6">
                                                        <p class="text_empleado text-end"><strong> #2342</strong></p>
                                                    </div>

                                                    <div class="col-12 mb-2">
                                                        <P class="text_empleado_value text-start">
                                                            Pablo sanoval barros
                                                        </P>
                                                    </div>

                                                    <div class="col-6 mb-3">
                                                        <p class="text_subtittle_ventas text-start">
                                                             <img class="img_subtittle_ventas" src="{{ asset('assets/media/icons/etiqueta-del-precio.webp') }}" alt="">
                                                             Monto :
                                                        </p>
                                                        <p class="text_subtittle_ventas_sv text-center">
                                                            $500.0
                                                        </p>
                                                    </div>

                                                    <div class="col-6 mb-3">
                                                        <p class="text_subtittle_ventas text-start">
                                                             <img class="img_subtittle_ventas" src="{{ asset('assets/media/icons/en-stock.png.webp') }}" alt="">
                                                             Piezas :
                                                        </p>
                                                        <p class="text_subtittle_ventas_sv text-center">
                                                            10 PZAS
                                                        </p>
                                                    </div>

                                                    <div class="col-6 mb-3">
                                                        <p class="text_subtittle_ventas text-start">
                                                             <img class="img_subtittle_ventas" src="{{ asset('assets/media/icons/efectivo.webp') }}" alt="">
                                                             Total :
                                                        </p>
                                                        <p class="text_subtittle_ventas_sv text-center">
                                                            $5,000.0
                                                        </p>
                                                    </div>

                                                    <div class="col-6 mb-3">
                                                        <p class="text_subtittle_ventas text-start">
                                                             <img class="img_subtittle_ventas" src="{{ asset('assets/media/icons/calendar-dar.webp') }}" alt="">
                                                             Fecha :
                                                        </p>
                                                        <p class="text_subtittle_ventas_sv text-center">
                                                            10 Abril 2023
                                                        </p>
                                                    </div>

                                                    <div class="col-12">
                                                        <p class="text_subtittle_ventas_sv text-start">
                                                            Cliente
                                                        </p>
                                                        <p class="text_subtittle_ventas text-start">
                                                            Jose Remedios Sandoval
                                                       </p>
                                                    </div>

                                                    <div class="col-12 mb-2 mt-3">
                                                        <div class="d-flex justify-content-center">
                                                            <a type="button"  class="btn btn-sm btn_edit_prodcut_warning" data-bs-toggle="modal" data-bs-target="#editProduct">
                                                                Ver/Editar <img class="icon_edit_btn_warning" src="{{ asset('assets/media/icons/editar.webp') }}" alt="">
                                                            </a>
                                                        </div>

                                                    </div>

                                                </div>

                                            </div>

                                        </div>
                                    </div>

                                </div>
                            </div>


                            <div class="tab-pane row fade" id="pills-Mods" role="tabpanel" aria-labelledby="pills-Mods-tab" tabindex="0">
                                <div class="row">

                                    <div class="col-12 px-4 py-1">
                                        <h2 class="tiitle_modal_white text-left ms-2">Modificaciones</h2>
                                    </div>

                                    <div class="col-12 px-4 py-1">
                                        <div class="row bg_minicart_ventas  ">

                                            <div class="col-4 my-auto">
                                                <p class="text-center" style="margin: 0">
                                                    <img class="img_portada_product_edit_ventas" src="{{ asset('assets/media/img/ilustraciones/chamarra.png') }}" alt="">
                                                </p>
                                            </div>

                                            <div class="col-8 ">

                                                <div class="row">
                                                    <div class="col-6">
                                                        <p class="text_empleado text-start">Empleado</p>
                                                    </div>

                                                    <div class="col-6">
                                                        <p class="text_empleado text-end"><strong> #2342</strong></p>
                                                    </div>

                                                    <div class="col-12 mb-2">
                                                        <P class="text_empleado_value text-start">
                                                            Pablo sanoval barros
                                                        </P>
                                                    </div>

                                                    <div class="col-4 mb-1">
                                                        <p class="text_subtittle_ventas text-start">
                                                             <img class="img_subtittle_ventas" src="{{ asset('assets/media/icons/etiqueta-del-precio.webp') }}" alt="">
                                                             Precio :
                                                        </p>
                                                        <p class="text_subtittle_ventas_sv text-center">
                                                            $500 a $450
                                                        </p>
                                                    </div>

                                                    <div class="col-4 mb-1">
                                                        <p class="text_subtittle_ventas text-start">
                                                             <img class="img_subtittle_ventas" src="{{ asset('assets/media/icons/en-stock.png.webp') }}" alt="">
                                                             Piezas :
                                                        </p>
                                                        <p class="text_subtittle_ventas_sv text-center">
                                                            50pza 30pza
                                                        </p>
                                                    </div>

                                                    <div class="col-4 mb-1">
                                                        <p class="text_subtittle_ventas text-start">
                                                             <img class="img_subtittle_ventas" src="{{ asset('assets/media/icons/coins.webp') }}" alt="">
                                                             Total :
                                                        </p>
                                                        <p class="text_subtittle_ventas_sv text-center">
                                                            $200 a $150
                                                        </p>
                                                    </div>

                                                    <div class="col-12 mb-2 mt-2">
                                                        <div class="d-flex justify-content-between  ">
                                                            <P class="text_empleado_value text-start mt-2">
                                                                20 de Abril 2023
                                                            </P>
                                                            <a type="button"  class="btn btn-sm btn_edit_prodcut_warning" data-bs-toggle="modal" data-bs-target="#editProduct">
                                                                Ver <img class="icon_edit_btn_warning" src="{{ asset('assets/media/icons/editar.webp') }}" alt="">
                                                            </a>
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
                </div>

                <div class="form-group col-12 mt-4 mb-4 ">
                    <p class="text-center ">
                        <button class="btn btn-success btn_save_custom">Guardar</button>
                    </p>
                </div>

            </form>

        </div>

      </div>
    </div>
  </div>

@section('js_custom')

<script src="https://cdnjs.cloudflare.com/ajax/libs/html5-qrcode/2.3.4/html5-qrcode.min.js" integrity="sha512-k/KAe4Yff9EUdYI5/IAHlwUswqeipP+Cp5qnrsUjTPCgl51La2/JhyyjNciztD7mWNKLSXci48m7cctATKfLlQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


  <script>

        $(document).ready(function() {

        });

  </script>


@endsection
