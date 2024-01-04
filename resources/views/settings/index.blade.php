@extends('layouts.app')
@section('css_custom')

    <link rel="stylesheet" href="{{ asset('assets/css/products.css') }}">
    <style>
        .modal-backdrop.show {
            opacity: 0 !important;
        }
        .modal-backdrop {
            --bs-backdrop-zindex: 0 !important;
            z-index: 0 !important;
        }
    </style>

@endsection

@section('content')

<section class="products bg_product ">

    <div class="row z-1 position-relative px-3 px-md-4 px-xl-5">

        <div class="col-12">
            <h2 class="tiitle_modal_dark text-center mt-3 mb-3">¡Ajustes!</h2>
        </div>

        <div class="row">

            <div class="col-12 section_tab_bg">

                <ul class="nav nav-pills d-flex justify-content-around ul_nav_custom mb-3" id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="pills-empresa-tab" data-bs-toggle="pill" data-bs-target="#pills-empresa" type="button" role="tab" aria-controls="pills-empresa" aria-selected="true">
                            <img class="tab_custom_icon" src="{{ asset('assets/media/icons/opciones.webp') }}" alt="" > Empresa
                        </button>
                    </li>

                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-caja-tab" data-bs-toggle="pill" data-bs-target="#pills-caja" type="button" role="tab" aria-controls="pills-caja" aria-selected="false">
                            <img class="tab_custom_icon" src="{{ asset('assets/media/icons/resultado.webp') }}" alt="" > Caja
                        </button>
                    </li>

                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-generales-tab" data-bs-toggle="pill" data-bs-target="#pills-generales" type="button" role="tab" aria-controls="pills-generales" aria-selected="false">
                            <img class="tab_custom_icon" src="{{ asset('assets/media/icons/resultado.webp') }}" alt="" > Generales
                        </button>
                    </li>
                </ul>

                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-empresa" role="tabpanel" aria-labelledby="pills-empresa-tab" tabindex="0">
                        <form method="POST" action="{{ route('configuracion_empresa.update', $empresa->code) }}" enctype="multipart/form-data" class="z-1 px-4 dropzone formularioConfigEmpresa">
                            @csrf
                            <input type="hidden" name="_method" value="PATCH">
                            <div class="row">
                                <div class="form-group text-left col-12 mt-4 p-2">
                                    <h6 class="subtittle_clientes">General</h6>
                                 </div>

                                <div class="form-group col-6 px-5 py-3">
                                    <label for="name" class="label_custom_primary_sm mb-2">Nombre Empresa : *</label>
                                    <div class="input-group ">
                                        <span class="input-group-text span_custom_tab" >
                                            <img class="icon_span_tab" src="{{ asset('assets/media/icons/camion.webp') }}" alt="" >
                                        </span>
                                        <input id="" name="nombre_empresa" type="text"  class="form-control input_custom_tab @error('nombre_empresa') is-invalid @enderror"  value="{{ $empresa->nombre }}" autocomplete="" autofocus>
                                    </div>
                                </div>

                                <div class="form-group col-6 px-4 py-3">
                                    <label for="name" class="label_custom_primary_product mb-2">Logo Empresa : *</label>
                                    <div class="input-group ">
                                        <span class="input-group-text span_custom_tab" >
                                            <img class="icon_span_tab" src="{{ asset('assets/media/icons/imagen.webp') }}" alt="" >
                                        </span>
                                        <input id="logo" name="logo" type="file"  class="form-control input_custom_tab @error('logo') is-invalid @enderror"  value="{{ $empresa->logo }}"  autocomplete="" autofocus>
                                    </div>
                                </div>

                                <div class="form-group col-3 px-5 py-3">
                                    <label for="name" class="label_custom_primary_sm mb-2">Telefono : *</label>
                                    <div class="input-group ">
                                        <span class="input-group-text span_custom_tab" >
                                            <img class="icon_span_tab" src="{{ asset('assets/media/icons/camion.webp') }}" alt="" >
                                        </span>
                                        <input id="" name="telefono_empresa" type="number"  class="form-control input_custom_tab @error('telefono_empresa') is-invalid @enderror"  value="{{ $empresa->telefono }}" autocomplete="" autofocus>
                                    </div>
                                </div>

                                <div class="form-group col-3 px-5 py-3">
                                    <label for="name" class="label_custom_primary_sm mb-2">Correo : *</label>
                                    <div class="input-group ">
                                        <span class="input-group-text span_custom_tab" >
                                            <img class="icon_span_tab" src="{{ asset('assets/media/icons/camion.webp') }}" alt="" >
                                        </span>
                                        <input id="" name="correo_empresa" type="email"  class="form-control input_custom_tab @error('correo_empresa') is-invalid @enderror"  value="{{ $empresa->correo }}" autocomplete="" autofocus>
                                    </div>
                                </div>

                                <div class="form-group col-6 px-5 py-3">
                                    <p class="text-center mb-0">
                                        <img class="" src="{{ asset('logo/empresa'.auth()->user()->id_empresa.'/'.$empresa->logo) }}" alt="">
                                    </p>
                                </div>

                                <div class="form-group text-left col-12 mt-4 p-2">
                                    <h6 class="subtittle_clientes">Horario de Trabajo</h6>
                                 </div>

                                 <div class="form-group col-3 mb-3 p-2">
                                    <label for="name" class="label_custom_primary_product mb-2">Lunes</label>
                                    <div class="input-group d-flex justify-content-around mt-3">
                                          <input class="form-control" type="time" name="lunes_inicio" id="lunes_inicio">

                                          <input class="form-control" type="time" name="lunes_fin" id="lunes_fin">
                                  </div>
                                </div>

                                <div class="form-group col-3 mb-3 p-2">
                                    <label for="name" class="label_custom_primary_product mb-2">Martes</label>
                                    <div class="input-group d-flex justify-content-around mt-3">
                                          <input class="form-control" type="time" name="martes_inicio" id="martes_inicio">

                                          <input class="form-control" type="time" name="martes_fin" id="martes_fin">
                                  </div>
                                </div>

                                <div class="form-group col-3 mb-3 p-2">
                                    <label for="name" class="label_custom_primary_product mb-2">Miercoles</label>
                                    <div class="input-group d-flex justify-content-around mt-3">
                                          <input class="form-control" type="time" name="miercoles_inicio" id="miercoles_inicio">

                                          <input class="form-control" type="time" name="miercoles_fin" id="miercoles_fin">
                                  </div>
                                </div>

                                <div class="form-group col-3 mb-3 p-2">
                                    <label for="name" class="label_custom_primary_product mb-2">Jueves</label>
                                    <div class="input-group d-flex justify-content-around mt-3">
                                          <input class="form-control" type="time" name="jueves_inicio" id="jueves_inicio">

                                          <input class="form-control" type="time" name="jueves_fin" id="jueves_fin">
                                  </div>
                                </div>

                                <div class="form-group col-3 mb-3 p-2">
                                    <label for="name" class="label_custom_primary_product mb-2">Viernes</label>
                                    <div class="input-group d-flex justify-content-around mt-3">
                                          <input class="form-control" type="time" name="viernes_inicio" id="viernes_inicio">

                                          <input class="form-control" type="time" name="viernes_fin" id="viernes_fin">
                                  </div>
                                </div>

                                <div class="form-group col-3 mb-3 p-2">
                                    <label for="name" class="label_custom_primary_product mb-2">Sabado</label>
                                    <div class="input-group d-flex justify-content-around mt-3">
                                          <input class="form-control" type="time" name="sabado_inicio" id="sabado_inicio">

                                          <input class="form-control" type="time" name="sabado_fin" id="sabado_fin">
                                  </div>
                                </div>

                                <div class="form-group col-3 mb-3 p-2">
                                    <label for="name" class="label_custom_primary_product mb-2">Domingo</label>
                                    <div class="input-group d-flex justify-content-around mt-3">
                                          <input class="form-control" type="time" name="domingo_inicio" id="domingo_inicio">

                                          <input class="form-control" type="time" name="domingo_fin" id="domingo_fin">
                                  </div>
                                </div>

                                <div class="form-group text-left col-12 mt-4 p-2">
                                    <h6 class="subtittle_clientes">Datos de Direccion</h6>
                                 </div>

                                 <div class="form-group col-6 mb-3 p-2">
                                    <label for="name" class="label_custom_primary_product mb-2">Codigo Postal</label>
                                    <div class="input-group ">
                                        <span class="input-group-text span_custom_tab" >
                                            <img class="icon_span_form" src="{{ asset('assets/media/icons/cero.webp') }}" alt="" >
                                        </span>
                                        <input  name="codigo_postal" type="number"  class="form-control input_custom_tab_dark @error('codigo_postal') is-invalid @enderror"  value="{{ $configuracion->Direccion->codigo_postal }}"  autocomplete="" autofocus>
                                    </div>
                                </div>

                                <div class="form-group col-6 mb-3 p-2">
                                    <label for="name" class="label_custom_primary_product mb-2">Estado</label>
                                    <div class="input-group ">
                                        <span class="input-group-text span_custom_tab" >
                                            <img class="icon_span_form" src="{{ asset('assets/media/icons/independencia.webp') }}" alt="" >
                                        </span>
                                        <input  name="estado" type="text"  class="form-control input_custom_tab_dark @error('estado') is-invalid @enderror"  value="{{ $configuracion->Direccion->estado }}"  autocomplete="" autofocus>
                                    </div>
                                </div>

                                <div class="form-group col-6 mb-3 p-2">
                                    <label for="name" class="label_custom_primary_product mb-2">Alcaldia  / Municipio</label>
                                    <div class="input-group ">
                                        <span class="input-group-text span_custom_tab" >
                                            <img class="icon_span_form" src="{{ asset('assets/media/icons/alcaldia.webp') }}" alt="" >
                                        </span>
                                        <input  name="alcaldia" type="text"  class="form-control input_custom_tab_dark @error('alcaldia') is-invalid @enderror"  value="{{ $configuracion->Direccion->alcaldia }}"  autocomplete="" autofocus>
                                    </div>
                                </div>

                                <div class="form-group col-6 mb-3 p-2">
                                    <label for="name" class="label_custom_primary_product mb-2">Ciudad</label>
                                    <div class="input-group ">
                                        <span class="input-group-text span_custom_tab" >
                                            <img class="icon_span_form" src="{{ asset('assets/media/icons/edificios_ciudad.webp') }}" alt="" >
                                        </span>
                                        <input  name="pais" type="text"  class="form-control input_custom_tab_dark @error('pais') is-invalid @enderror"  value="{{ $configuracion->Direccion->pais }}"  autocomplete="" autofocus>
                                    </div>
                                </div>

                                <div class="form-group col-6 mb-3 p-2">
                                    <label for="name" class="label_custom_primary_product mb-2">Colonia</label>
                                    <div class="input-group ">
                                        <span class="input-group-text span_custom_tab" >
                                            <img class="icon_span_form" src="{{ asset('assets/media/icons/poste_luz.webp') }}" alt="" >
                                        </span>
                                        <input  name="colonia" type="text"  class="form-control input_custom_tab_dark @error('colonia') is-invalid @enderror"  value="{{ $configuracion->Direccion->colonia }}"  autocomplete="" autofocus>
                                    </div>
                                </div>

                                <div class="form-group col-6 mb-3 p-2">
                                    <label for="name" class="label_custom_primary_product mb-2">Calle y Numero</label>
                                    <div class="input-group ">
                                        <span class="input-group-text span_custom_tab" >
                                            <img class="icon_span_form" src="{{ asset('assets/media/icons/mapa-de-la-ciudad.webp') }}" alt="" >
                                        </span>
                                        <input  name="calle_numero" type="text"  class="form-control input_custom_tab_dark @error('calle_numero') is-invalid @enderror"  value="{{ $configuracion->Direccion->calle_numero }}"  autocomplete="" autofocus>
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
                    <div class="tab-pane fade" id="pills-caja" role="tabpanel" aria-labelledby="pills-caja-tab" tabindex="0">
                        <form method="POST" action="{{ route('productos.update', $empresa->code) }}" enctype="multipart/form-data" class="z-1 px-4 dropzone formularioProducto">
                            @csrf
                            <input type="hidden" name="_method" value="PATCH">
                            <div class="row">

                                <div class="form-group col-6 col-xs-6 col-sm-6 col-md-6 col-xl-6 px-4 py-3">
                                    <label for="name" class="label_custom_primary_product mb-2">¿Solicitar codigo en caja?</label>

                                    <div class="input-group d-flex justify-content-around mt-3">
                                          <div class="form-check form-check-inline">
                                            @if ($configuracion->codigo_caja == 1)
                                                <input class="form-check-input" type="radio" name="codigo_caja" id="radioSicodigo_caja" value="1" checked>
                                            @else
                                                <input class="form-check-input" type="radio" name="codigo_caja" id="radioSicodigo_caja" value="1">
                                            @endif
                                            <label class="form-check-label" for="">Si</label>
                                          </div>

                                          <div class="form-check form-check-inline">
                                            @if ($configuracion->codigo_caja == 0)
                                                <input class="form-check-input" type="radio" name="codigo_caja" id="radioNocodigo_caja" value="0" checked>
                                            @else
                                                <input class="form-check-input" type="radio" name="codigo_caja" id="radioNocodigo_caja" value="0">
                                            @endif
                                            <label class="form-check-label" for="">No</label>
                                          </div>
                                    </div>
                                </div>

                                <div class="form-group text-left col-12">
                                    <h4 class="subtittle_clientes">Metodos de pago</h4>
                                 </div>

                                 <div class="form-group col-6 col-md-4 col-lg-3">
                                     <label for="name" class="label_custom_primary_product mb-2">Tarjeta C/D</label>
                                     <div class="input-group mb-3">
                                         <div class="form-check">
                                            @if ($configuracion->tarjeta == 1)
                                                <input class="form-check-input" name="tarjeta" type="checkbox" value="1" checked>
                                            @else
                                                <input class="form-check-input" name="tarjeta" type="checkbox" value="1" >
                                            @endif
                                         </div>
                                     </div>
                                 </div>

                                 <div class="form-group col-6 col-md-4 col-lg-3">
                                     <label for="name" class="label_custom_primary_product mb-2">Efectivo</label>
                                     <div class="input-group mb-3">
                                         <div class="form-check">
                                            @if ($configuracion->efectivo == 1)
                                                <input class="form-check-input" name="efectivo" type="checkbox" value="1" checked>
                                            @else
                                                <input class="form-check-input" name="efectivo" type="checkbox" value="1" >
                                            @endif
                                         </div>
                                     </div>
                                 </div>

                                 <div class="form-group col-6 col-md-4 col-lg-3">
                                     <label for="name" class="label_custom_primary_product mb-2">Transferencia</label>
                                     <div class="input-group mb-3">
                                         <div class="form-check">
                                            @if ($configuracion->transferencia == 1)
                                                <input class="form-check-input" name="transferencia" type="checkbox" value="1" checked>
                                            @else
                                                <input class="form-check-input" name="transferencia" type="checkbox" value="1" >
                                            @endif
                                         </div>
                                     </div>
                                 </div>

                                 <div class="form-group col-6 col-md-4 col-lg-3">
                                     <label for="name" class="label_custom_primary_product mb-2">Mercado Pago</label>
                                     <div class="input-group mb-3">
                                         <div class="form-check">
                                            @if ($configuracion->mercado_pago == 1)
                                                <input class="form-check-input" name="mercado_pago" type="checkbox" value="1" checked>
                                            @else
                                                <input class="form-check-input" name="mercado_pago" type="checkbox" value="1" >
                                            @endif
                                         </div>
                                     </div>
                                </div>

                                <div class="form-group text-left col-12">
                                    <h4 class="subtittle_clientes">Medidor stock</h4>
                                 </div>

                                <div class="form-group col-6 col-md-4 col-lg-4 mb-3">
                                    <label for="name" class="label_custom_primary_product mb-2">Bajo : *</label>
                                    <div class="input-group ">
                                        <span class="input-group-text span_custom_tab" >
                                            <img class="icon_span_form" src="{{ asset('assets/media/icons/out-of-stock.webp') }}" alt="" >
                                        </span>
                                        <input  name="stock_bajo" id="stock_bajo" type="number"  class="form-control input_custom_tab_dark @error('stock_bajo') is-invalid @enderror"  value="{{ $configuracion->stock_bajo }}"  autocomplete="" autofocus>
                                    </div>
                                </div>

                                <div class="form-group col-6 col-md-4 col-lg-4 mb-3">
                                    <label for="name" class="label_custom_primary_product mb-2">Medio : *</label>
                                    <div class="input-group ">
                                        <span class="input-group-text span_custom_tab" >
                                            <img class="icon_span_form" src="{{ asset('assets/media/icons/dead-stock.webp') }}" alt="" >
                                        </span>
                                        <input  name="stock_medio" id="stock_medio" type="number"  class="form-control input_custom_tab_dark @error('stock_medio') is-invalid @enderror"  value="{{ $configuracion->stock_medio }}"  autocomplete="" autofocus>
                                    </div>
                                </div>

                                <div class="form-group col-6 col-md-4 col-lg-4 mb-3">
                                    <label for="name" class="label_custom_primary_product mb-2">Alto : *</label>
                                    <div class="input-group ">
                                        <span class="input-group-text span_custom_tab" >
                                            <img class="icon_span_form" src="{{ asset('assets/media/icons/in-stock.webp') }}" alt="" >
                                        </span>
                                        <input  name="stock_alto" id="stock_alto" type="number"  class="form-control input_custom_tab_dark @error('stock_alto') is-invalid @enderror"  value="{{ $configuracion->stock_alto }}"  autocomplete="" autofocus>
                                    </div>
                                </div>

                                <div class="form-group text-left col-12">
                                    <h4 class="subtittle_clientes">Precio Mayo</h4>
                                 </div>

                                 <div class="form-group col-4 col-md-4 col-lg-4 mb-3">
                                    <label for="name" class="label_custom_primary_product mb-2">¿Opción precio mayorista?</label>
                                    <div class="input-group mb-3">
                                        <div class="form-check">
                                            @if ($configuracion->precio_mayorista == 1)
                                                <input class="form-check-input" id="checkboxPrecioMayorista" name="precio_mayorista" type="checkbox" value="1" checked>
                                            @else
                                                <input class="form-check-input" id="checkboxPrecioMayorista" name="precio_mayorista" type="checkbox" value="1">
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group col-4 col-md-4 col-lg-4 mb-3 encriptar-mayo-div">
                                    <label for="name" class="label_custom_primary_product mb-2">¿Encriptar precio mayorista?</label>
                                    <div class="input-group mb-3">
                                        <div class="form-check">
                                            @if ($configuracion->encriptar_mayo == 1)
                                                <input class="form-check-input" id="checkboxEncriptarMayo" name="encriptar_mayo" type="checkbox" value="1" checked>
                                            @else
                                                <input class="form-check-input" id="checkboxEncriptarMayo" name="encriptar_mayo" type="checkbox" value="1">
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group col-4 mb-3">
                                        <label for="name" class="label_custom_primary_product mb-2">Palabra para encriptacion:</label>
                                        <div class="input-group ">
                                            <span class="input-group-text span_custom_tab" >
                                                <img class="icon_span_tab" src="{{ asset('assets/media/icons/camion.webp') }}" alt="" >
                                            </span>
                                            <select name="palabra_encriptada" id="palabra_encriptada" class="form-select d-inline-block input_custom_tab" >
                                                @if ($configuracion->palabra_encriptada == NULL)
                                                    <option value="">Seleccionar palabra</option>
                                                @else
                                                    <option value="{{$configuracion->palabra_encriptada}}">{{$configuracion->palabra_encriptada}}</option>
                                                @endif
                                                <option value="GUACAMAYAS" @if(old('palabra_encriptada') == 'GUACAMAYAS') selected @endif>G U A C A M A Y A S</option>
                                                <option value="MURCIELAGO" @if(old('palabra_encriptada') == 'MURCIELAGO') selected @endif>M U R C I E L A G O</option>
                                                <option value="COCODRILOS" @if(old('palabra_encriptada') == 'COCODRILOS') selected @endif>C O C O D R I L O S</option>
                                                <option value="MARQUESITO" @if(old('palabra_encriptada') == 'MARQUESITO') selected @endif>M A R Q U E S I T O</option>
                                            </select>
                                        </div>
                                </div>

                                <div class="form-group text-left col-12">
                                    <h4 class="subtittle_clientes">Factura</h4>
                                 </div>

                                 <div class="form-group col-6 col-md-4 col-lg-4 mb-3 encriptar-mayo-div">
                                    <label for="name" class="label_custom_primary_product mb-2">¿Opción factura?</label>
                                    <div class="input-group mb-3">
                                        <div class="form-check">
                                            @if ($configuracion->opcion_factura == 1)
                                                <input class="form-check-input" id="checkboxEncriptarMayo" name="opcion_factura" type="checkbox" value="1" checked>
                                            @else
                                                <input class="form-check-input" id="checkboxEncriptarMayo" name="opcion_factura" type="checkbox" value="1">
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group col-6 col-md-4 col-lg-4 mb-3">
                                    <label for="name" class="label_custom_primary_product mb-2">Porcentaje</label>
                                    <div class="input-group ">
                                        <span class="input-group-text span_custom_tab" >
                                            <img class="icon_span_form" src="{{ asset('assets/media/icons/comisiones.webp') }}" alt="" >
                                        </span>
                                        <input  name="porcentaje_factura" id="porcentaje_factura" type="number" value="{{$configuracion->porcentaje_factura}}" class="form-control input_custom_tab_dark @error('porcentaje_factura') is-invalid @enderror" autocomplete="" autofocus>
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
                    <div class="tab-pane fade" id="pills-generales" role="tabpanel" aria-labelledby="pills-generales-tab" tabindex="0">
                        <div class="row">
                            <h1>Proximamente</h1>
                        </div>
                    </div>
                </div>

            </div>

        </div>


    </div>

</section>

@endsection
