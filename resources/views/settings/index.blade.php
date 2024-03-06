@extends('layouts.app')

@section('template_title')
    Ajustes
@endsection

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

    <div class="row z-1 position-relative">

        <div class="col-12">
            <div class="d-flex justify-content-center ">
                <h5 class="tittle_dash text-center mt-2 mb-3 animation_card_header">
                    Ajustes
                </h5>
            </div>
        </div>

        <div class="row mb-5" style="margin: 0 10px 0 0px;">

            <div class="col-12 section_tab_bg">

                <ul class="nav nav-pills d-flex justify-content-around ul_nav_custom mb-3" id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="pills-empresa-tab" data-bs-toggle="pill" data-bs-target="#pills-empresaTab" type="button" role="tab" aria-controls="pills-empresa" aria-selected="true" onclick="changeTab('pills-empresa')">
                            <img class="tab_custom_icon" src="{{ asset('assets/media/icons/opciones.webp') }}" alt="" > Empresa
                        </button>
                    </li>

                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-caja-tab" data-bs-toggle="pill" data-bs-target="#pills-cajaTab" type="button" role="tab" aria-controls="pills-caja" aria-selected="false" onclick="changeTab('pills-caja')">
                            <img class="tab_custom_icon" src="{{ asset('assets/media/icons/resultado.webp') }}" alt="" > Caja
                        </button>
                    </li>

                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-generales-tab" data-bs-toggle="pill" data-bs-target="#pills-generalesTab" type="button" role="tab" aria-controls="pills-generales" aria-selected="false" onclick="changeTab('pills-generales')">
                            <img class="tab_custom_icon" src="{{ asset('assets/media/icons/carrito.webp') }}" alt="" > Tienda Online
                        </button>
                    </li>
                </ul>

                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-empresaTab" role="tabpanel" aria-labelledby="pills-empresa-tab" tabindex="0">
                        <form method="POST" action="{{ route('configuracion_empresa.update', $empresa->code) }}" enctype="multipart/form-data" class="z-1 px-4 dropzone" id="empresaFormConfig_crea">
                            @csrf
                            <input type="hidden" name="_method" value="PATCH">
                            <div class="row">
                                <div class="form-group text-left col-12 mt-4 p-2">
                                    <h6 class="subtittle_clientes">Empresa</h6>
                                 </div>

                                <div class="form-group col-6 col-xs-6 col-sm-6 col-md-6 col-xl-3 px-4 py-3">
                                    <label for="name" class="label_custom_primary_sm mb-2">Nombre Empresa : *</label>
                                    <div class="input-group ">
                                        <span class="input-group-text span_custom_tab" >
                                            <img class="icon_span_tab" src="{{ asset('assets/media/icons/camion.webp') }}" alt="" >
                                        </span>
                                        <input id="" name="nombre_empresa" type="text"  class="form-control input_custom_tab @error('nombre_empresa') is-invalid @enderror"  value="{{ $empresa->nombre }}" autocomplete="" autofocus>
                                    </div>
                                </div>

                                <div class="form-group col-6 col-xs-6 col-sm-6 col-md-6 col-xl-3 px-4 py-3">
                                    <label for="name" class="label_custom_primary_sm mb-2">Logo Empresa : *</label>
                                    <div class="input-group ">
                                        <span class="input-group-text span_custom_tab" >
                                            <img class="icon_span_tab" src="{{ asset('assets/media/icons/imagen.webp') }}" alt="" >
                                        </span>
                                        <input id="logo" name="logo" type="file"  class="form-control input_custom_tab @error('logo') is-invalid @enderror"  value="{{ $empresa->logo }}"  autocomplete="" autofocus>
                                    </div>
                                </div>

                                <div class="form-group col-6 col-xs-6 col-sm-6 col-md-6 col-xl-3 px-4 py-3">
                                    <label for="name" class="label_custom_primary_sm mb-2">Telefono : *</label>
                                    <div class="input-group ">
                                        <span class="input-group-text span_custom_tab" >
                                            <img class="icon_span_tab" src="{{ asset('assets/media/icons/camion.webp') }}" alt="" >
                                        </span>
                                        <input id="" name="telefono_empresa" type="number"  class="form-control input_custom_tab @error('telefono_empresa') is-invalid @enderror"  value="{{ $empresa->telefono }}" autocomplete="" autofocus>
                                    </div>
                                </div>

                                <div class="form-group col-6 col-xs-6 col-sm-6 col-md-6 col-xl-3 px-4 py-3">
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

                                {{-- <div class="form-group text-left col-12 mt-4 p-2">
                                    <h6 class="subtittle_clientes">Horario de Trabajo</h6>
                                 </div>

                                 <div class="form-group col-3 mb-3 p-2">
                                    <label for="name" class="label_custom_primary_sm mb-2">Lunes</label>
                                    <div class="input-group d-flex justify-content-around mt-3">
                                          <input class="form-control" type="time" name="lunes_inicio" id="lunes_inicio">

                                          <input class="form-control" type="time" name="lunes_fin" id="lunes_fin">
                                  </div>
                                </div>

                                <div class="form-group col-3 mb-3 p-2">
                                    <label for="name" class="label_custom_primary_sm mb-2">Martes</label>
                                    <div class="input-group d-flex justify-content-around mt-3">
                                          <input class="form-control" type="time" name="martes_inicio" id="martes_inicio">

                                          <input class="form-control" type="time" name="martes_fin" id="martes_fin">
                                  </div>
                                </div>

                                <div class="form-group col-3 mb-3 p-2">
                                    <label for="name" class="label_custom_primary_sm mb-2">Miercoles</label>
                                    <div class="input-group d-flex justify-content-around mt-3">
                                          <input class="form-control" type="time" name="miercoles_inicio" id="miercoles_inicio">

                                          <input class="form-control" type="time" name="miercoles_fin" id="miercoles_fin">
                                  </div>
                                </div>

                                <div class="form-group col-3 mb-3 p-2">
                                    <label for="name" class="label_custom_primary_sm mb-2">Jueves</label>
                                    <div class="input-group d-flex justify-content-around mt-3">
                                          <input class="form-control" type="time" name="jueves_inicio" id="jueves_inicio">

                                          <input class="form-control" type="time" name="jueves_fin" id="jueves_fin">
                                  </div>
                                </div>

                                <div class="form-group col-3 mb-3 p-2">
                                    <label for="name" class="label_custom_primary_sm mb-2">Viernes</label>
                                    <div class="input-group d-flex justify-content-around mt-3">
                                          <input class="form-control" type="time" name="viernes_inicio" id="viernes_inicio">

                                          <input class="form-control" type="time" name="viernes_fin" id="viernes_fin">
                                  </div>
                                </div>

                                <div class="form-group col-3 mb-3 p-2">
                                    <label for="name" class="label_custom_primary_sm mb-2">Sabado</label>
                                    <div class="input-group d-flex justify-content-around mt-3">
                                          <input class="form-control" type="time" name="sabado_inicio" id="sabado_inicio">

                                          <input class="form-control" type="time" name="sabado_fin" id="sabado_fin">
                                  </div>
                                </div>

                                <div class="form-group col-3 mb-3 p-2">
                                    <label for="name" class="label_custom_primary_sm mb-2">Domingo</label>
                                    <div class="input-group d-flex justify-content-around mt-3">
                                          <input class="form-control" type="time" name="domingo_inicio" id="domingo_inicio">

                                          <input class="form-control" type="time" name="domingo_fin" id="domingo_fin">
                                  </div>
                                </div> --}}

                                <div class="form-group text-left col-12 mt-0 p-2">
                                    <h6 class="subtittle_clientes">Datos de Direccion</h6>
                                 </div>

                                 <div class="form-group col-12 col-xs-6 col-sm-6 col-md-6 col-lg-4 col-xl-3 px-4 py-3">
                                    <label for="name" class="label_custom_primary_sm mb-2">Codigo Postal</label>
                                    <div class="input-group ">
                                        <span class="input-group-text span_custom_tab" >
                                            <img class="icon_span_form" src="{{ asset('assets/media/icons/cero.webp') }}" alt="" >
                                        </span>
                                        <input  name="codigo_postal" type="number"  class="form-control input_custom_tab_dark @error('codigo_postal') is-invalid @enderror"  value="{{ $configuracion->Direccion->codigo_postal }}"  autocomplete="" autofocus>
                                    </div>
                                </div>

                                <div class="form-group col-12 col-xs-6 col-sm-6 col-md-6 col-lg-4 col-xl-3 px-4 py-3">
                                    <label for="name" class="label_custom_primary_sm mb-2">Estado</label>
                                    <div class="input-group ">
                                        <span class="input-group-text span_custom_tab" >
                                            <img class="icon_span_form" src="{{ asset('assets/media/icons/independencia.webp') }}" alt="" >
                                        </span>
                                        <input  name="estado" type="text"  class="form-control input_custom_tab_dark @error('estado') is-invalid @enderror"  value="{{ $configuracion->Direccion->estado }}"  autocomplete="" autofocus>
                                    </div>
                                </div>

                                <div class="form-group col-12 col-xs-6 col-sm-6 col-md-6 col-lg-4 col-xl-3 px-4 py-3">
                                    <label for="name" class="label_custom_primary_sm mb-2">Alcaldia  / Municipio</label>
                                    <div class="input-group ">
                                        <span class="input-group-text span_custom_tab" >
                                            <img class="icon_span_form" src="{{ asset('assets/media/icons/alcaldia.webp') }}" alt="" >
                                        </span>
                                        <input  name="alcaldia" type="text"  class="form-control input_custom_tab_dark @error('alcaldia') is-invalid @enderror"  value="{{ $configuracion->Direccion->alcaldia }}"  autocomplete="" autofocus>
                                    </div>
                                </div>

                                <div class="form-group col-12 col-xs-6 col-sm-6 col-md-6 col-lg-4 col-xl-3 px-4 py-3">
                                    <label for="name" class="label_custom_primary_sm mb-2">Ciudad</label>
                                    <div class="input-group ">
                                        <span class="input-group-text span_custom_tab" >
                                            <img class="icon_span_form" src="{{ asset('assets/media/icons/edificios_ciudad.webp') }}" alt="" >
                                        </span>
                                        <input  name="pais" type="text"  class="form-control input_custom_tab_dark @error('pais') is-invalid @enderror"  value="{{ $configuracion->Direccion->pais }}"  autocomplete="" autofocus>
                                    </div>
                                </div>

                                <div class="form-group col-12 col-xs-6 col-sm-6 col-md-6 col-lg-4 col-xl-3 px-4 py-3">
                                    <label for="name" class="label_custom_primary_sm mb-2">Colonia</label>
                                    <div class="input-group ">
                                        <span class="input-group-text span_custom_tab" >
                                            <img class="icon_span_form" src="{{ asset('assets/media/icons/poste_luz.webp') }}" alt="" >
                                        </span>
                                        <input  name="colonia" type="text"  class="form-control input_custom_tab_dark @error('colonia') is-invalid @enderror"  value="{{ $configuracion->Direccion->colonia }}"  autocomplete="" autofocus>
                                    </div>
                                </div>

                                <div class="form-group col-12 col-xs-6 col-sm-6 col-md-6 col-lg-4 col-xl-3 px-4 py-3">
                                    <label for="name" class="label_custom_primary_sm mb-2">Calle y Numero</label>
                                    <div class="input-group ">
                                        <span class="input-group-text span_custom_tab" >
                                            <img class="icon_span_form" src="{{ asset('assets/media/icons/mapa-de-la-ciudad.webp') }}" alt="" >
                                        </span>
                                        <input  name="calle_numero" type="text"  class="form-control input_custom_tab_dark @error('calle_numero') is-invalid @enderror"  value="{{ $configuracion->Direccion->calle_numero }}"  autocomplete="" autofocus>
                                    </div>
                                </div>

                                <div class="form-group col-12 mt-4 mb-4 ">
                                    <p class="text-center ">
                                        <button type="submit" id="guardarEmpresa" class="btn btn-success btn_save_custom">Guardar</button>
                                    </p>
                                </div>

                            </div>
                        </form>
                    </div>

                    <div class="tab-pane fade" id="pills-cajaTab" role="tabpanel" aria-labelledby="pills-caja-tab" tabindex="0">
                        <form method="POST" action="{{ route('configuracion_caja.update', $empresa->id) }}" enctype="multipart/form-data" class="z-1 px-4 dropzone" id="cajaForm_Config">
                            @csrf
                            <input type="hidden" name="_method" value="PATCH">
                            <div class="row">

                                <div class="form-group text-left col-12 mt-4 p-2">
                                    <h6 class="subtittle_clientes">Caja</h6>
                                 </div>

                                <div class="form-group col-12 col-xs-12 col-sm-6 col-md-6 col-xl-6 py-3">
                                    <label for="name" class="label_custom_primary_sm mb-2">¿Solicitar codigo en caja?</label>

                                    <div class="input-group d-flex justify-content-start mt-3">
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

                                <div class="form-group text-left col-12  mt-4 mb-4">
                                    <h4 class="subtittle_clientes">Metodos de pago</h4>
                                 </div>

                                 <div  class="form-group col-6 col-xs-6 col-sm-3 col-md-3 col-xl-3 px-4 py-3">
                                     <label for="name" class="label_custom_primary_sm mb-2">Tarjeta C/D</label>
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

                                 <div  class="form-group col-6 col-xs-6 col-sm-3 col-md-3 col-xl-3 px-4 py-3">
                                     <label for="name" class="label_custom_primary_sm mb-2">Efectivo</label>
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

                                 <div  class="form-group col-6 col-xs-6 col-sm-3 col-md-3 col-xl-3 px-4 py-3">
                                     <label for="name" class="label_custom_primary_sm mb-2">Transferencia</label>
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

                                 <div  class="form-group col-6 col-xs-6 col-sm-3 col-md-3 col-xl-3 px-4 py-3">
                                     <label for="name" class="label_custom_primary_sm mb-2">Mercado Pago</label>
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

                                <div class="form-group text-left col-12  mt-4 mb-4">
                                    <h4 class="subtittle_clientes">Medidor stock</h4>
                                 </div>

                                <div class="form-group col-6 col-md-4 col-lg-4 mb-3">
                                    <label for="name" class="label_custom_primary_sm mb-2">Bajo : *</label>
                                    <div class="input-group ">
                                        <span class="input-group-text span_custom_tab" >
                                            <img class="icon_span_form" src="{{ asset('assets/media/icons/out-of-stock.webp') }}" alt="" >
                                        </span>
                                        <input  name="stock_bajo" id="stock_bajo" type="number"  class="form-control input_custom_tab_dark @error('stock_bajo') is-invalid @enderror"  value="{{ $configuracion->stock_bajo }}"  autocomplete="" autofocus>
                                    </div>
                                </div>

                                <div class="form-group col-6 col-md-4 col-lg-4 mb-3">
                                    <label for="name" class="label_custom_primary_sm mb-2">Medio : *</label>
                                    <div class="input-group ">
                                        <span class="input-group-text span_custom_tab" >
                                            <img class="icon_span_form" src="{{ asset('assets/media/icons/dead-stock.webp') }}" alt="" >
                                        </span>
                                        <input  name="stock_medio" id="stock_medio" type="number"  class="form-control input_custom_tab_dark @error('stock_medio') is-invalid @enderror"  value="{{ $configuracion->stock_medio }}"  autocomplete="" autofocus>
                                    </div>
                                </div>

                                <div class="form-group col-6 col-md-4 col-lg-4 mb-3">
                                    <label for="name" class="label_custom_primary_sm mb-2">Alto : *</label>
                                    <div class="input-group ">
                                        <span class="input-group-text span_custom_tab" >
                                            <img class="icon_span_form" src="{{ asset('assets/media/icons/in-stock.webp') }}" alt="" >
                                        </span>
                                        <input  name="stock_alto" id="stock_alto" type="number"  class="form-control input_custom_tab_dark @error('stock_alto') is-invalid @enderror"  value="{{ $configuracion->stock_alto }}"  autocomplete="" autofocus>
                                    </div>
                                </div>

                                <div class="form-group text-left col-12  mt-4 mb-4">
                                    <h4 class="subtittle_clientes">Precio Mayo</h4>
                                 </div>

                                 <div class="form-group col-12 col-xs-6 col-sm-6 col-md-4 col-xl-4 px-4 py-1">
                                    <label for="name" class="label_custom_primary_sm mb-2">¿Opción precio mayorista?</label>
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

                                <div class="form-group col-12 col-xs-6 col-sm-6 col-md-4 col-xl-4 px-4 py-1 encriptar-mayo-div">
                                    <label for="name" class="label_custom_primary_sm mb-2">¿Encriptar precio mayorista?</label>
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

                                <div class="form-group col-12 col-xs-6 col-sm-6 col-md-4 col-xl-4 px-4 py-1">
                                        <label for="name" class="label_custom_primary_sm mb-2">Palabra para encriptacion:</label>
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

                                <div class="form-group text-left col-12  mt-4 mb-4">
                                    <h4 class="subtittle_clientes">Factura</h4>
                                 </div>

                                <div class="form-group col-6 col-md-4 col-lg-4 mb-3">
                                    <label for="name" class="label_custom_primary_sm mb-2">¿Opción factura?</label>
                                    <div class="input-group mb-3">
                                        <div class="form-check">
                                            @if ($configuracion->opcion_factura == 1)
                                                <input class="form-check-input" id="checkboxFactura" name="opcion_factura" type="checkbox" value="1" checked>
                                            @else
                                                <input class="form-check-input" id="checkboxFactura" name="opcion_factura" type="checkbox" value="1">
                                            @endif
                                        </div>
                                    </div>
                                </div>


                                 <div class="form-group col-6 col-md-4 col-lg-4 mb-3" id="mostrarDivFactura" @if ($configuracion->opcion_factura != 1) style="display: none;" @endif>
                                    <label for="name" class="label_custom_primary_sm mb-2">Tipo Factura</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group ">
                                            <span class="input-group-text span_custom_tab" >
                                                <img class="icon_span_tab" src="{{ asset('assets/media/icons/camion.webp') }}" alt="" >
                                            </span>
                                            <select name="tipo_factura" id="tipo_factura" class="form-select d-inline-block input_custom_tab" >
                                                @if ($configuracion->tipo_factura == NULL)
                                                    <option value="">Seleccionar tipo</option>
                                                @else
                                                    <option value="{{$configuracion->tipo_factura}}">{{$configuracion->tipo_factura}}</option>
                                                @endif
                                                <option value="Precio Neto" @if(old('tipo_factura') == 'Precio Neto') selected @endif>Precio Neto</option>
                                                <option value="Precio Desglosado" @if(old('tipo_factura') == 'Precio Desglosado') selected @endif>Precio Desglosado</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group col-6 col-md-4 col-lg-4 mb-3" id="mostrarDivPorcentaje" @if ($configuracion->tipo_factura != 'Precio Desglosado') style="display: none;" @endif>
                                    <label for="name" class="label_custom_primary_sm mb-2">Porcentaje</label>
                                    <div class="input-group ">
                                        <span class="input-group-text span_custom_tab" >
                                            <img class="icon_span_form" src="{{ asset('assets/media/icons/comisiones.webp') }}" alt="" >
                                        </span>
                                        <input  name="porcentaje_factura" id="porcentaje_factura" type="number" value="{{$configuracion->porcentaje_factura}}" class="form-control input_custom_tab_dark @error('porcentaje_factura') is-invalid @enderror" autocomplete="" autofocus>
                                    </div>
                                </div>

                                <div class="form-group col-12 mt-4 mb-4 ">
                                    <p class="text-center ">
                                        <button type="submit" id="guardarCaja" class="btn btn-success btn_save_custom">Guardar</button>
                                    </p>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane fade" id="pills-generalesTab" role="tabpanel" aria-labelledby="pills-generales-tab" tabindex="0">
                        <div class="row">
                            <form method="POST" action="{{ route('configuracion_tienda.update', $empresa->id) }}" enctype="multipart/form-data" class="z-1 px-4 dropzone" id="empresaFormConfig_tienda">
                                @csrf
                                <input type="hidden" name="_method" value="PATCH">
                                <div class="row">
                                    <div class="form-group text-left col-12 mt-0 p-2">
                                        <h6 class="subtittle_clientes">Redes Sociales</h6>
                                    </div>

                                    <div class="form-group col-6 col-xs-6 col-sm-6 col-md-6 col-xl-3 px-4 py-3">
                                        <label for="name" class="label_custom_primary_sm mb-2">Instagram : *</label>
                                        <div class="input-group ">
                                            <span class="input-group-text span_custom_tab" >
                                                <img class="icon_span_tab" src="{{ asset('assets/media/icons/instagram.webp') }}" alt="" >
                                            </span>
                                            <input id="instagram" name="instagram" type="text"  class="form-control input_custom_tab @error('instagram') is-invalid @enderror"  value="{{ $configuracion->instagram }}" autocomplete="" autofocus>
                                        </div>
                                    </div>

                                    <div class="form-group col-6 col-xs-6 col-sm-6 col-md-6 col-xl-3 px-4 py-3">
                                        <label for="name" class="label_custom_primary_sm mb-2">Facebook : *</label>
                                        <div class="input-group ">
                                            <span class="input-group-text span_custom_tab" >
                                                <img class="icon_span_tab" src="{{ asset('assets/media/icons/facebook.webp') }}" alt="" >
                                            </span>
                                            <input id="facebook" name="facebook" type="text"  class="form-control input_custom_tab @error('facebook') is-invalid @enderror"  value="{{ $configuracion->facebook }}" autocomplete="" autofocus>
                                        </div>
                                    </div>

                                    <div class="form-group col-6 col-xs-6 col-sm-6 col-md-6 col-xl-3 px-4 py-3">
                                        <label for="name" class="label_custom_primary_sm mb-2">TikTok : *</label>
                                        <div class="input-group ">
                                            <span class="input-group-text span_custom_tab" >
                                                <img class="icon_span_tab" src="{{ asset('assets/media/icons/tik-tok.webp') }}" alt="" >
                                            </span>
                                            <input id="tiktok" name="tiktok" type="text"  class="form-control input_custom_tab @error('tiktok') is-invalid @enderror"  value="{{ $configuracion->tiktok }}" autocomplete="" autofocus>
                                        </div>
                                    </div>

                                    <div class="form-group col-6 col-xs-6 col-sm-6 col-md-6 col-xl-3 px-4 py-3">
                                        <label for="name" class="label_custom_primary_sm mb-2">WhatsApp : *</label>
                                        <div class="input-group ">
                                            <span class="input-group-text span_custom_tab" >
                                                <img class="icon_span_tab" src="{{ asset('assets/media/icons/whatsapp.webp') }}" alt="" >
                                            </span>
                                            <input id="whatsapp" name="whatsapp" type="text"  class="form-control input_custom_tab @error('whatsapp') is-invalid @enderror"  value="{{ $configuracion->whatsapp }}" autocomplete="" autofocus>
                                        </div>
                                    </div>

                                    <div class="form-group text-left col-12 mt-0 p-2">
                                        <h6 class="subtittle_clientes">Baner Tienda</h6>
                                    </div>

                                    <div class="form-group col-6 col-xs-6 col-sm-6 col-md-6 col-xl-3 px-4 py-3">
                                        <label for="name" class="label_custom_primary_sm mb-2">Imagen : *</label>
                                        <div class="input-group ">
                                            <span class="input-group-text span_custom_tab" >
                                                <img class="icon_span_tab" src="{{ asset('assets/media/icons/imagen.webp') }}" alt="" >
                                            </span>
                                            <input id="imagen_banner" name="imagen_banner" type="file"  class="form-control input_custom_tab @error('imagen_banner') is-invalid @enderror"  autocomplete="" autofocus>
                                        </div>
                                    </div>

                                    <div class="form-group col-6 col-xs-6 col-sm-6 col-md-6 col-xl-3 px-4 py-3">
                                        <label for="name" class="label_custom_primary_sm mb-2">Orden : *</label>
                                        <div class="input-group ">
                                            <span class="input-group-text span_custom_tab" >
                                                <img class="icon_span_tab" src="{{ asset('assets/media/icons/tik-tok.webp') }}" alt="" >
                                            </span>
                                            <input id="orden_banner" name="orden_banner" type="text"  class="form-control input_custom_tab @error('orden_banner') is-invalid @enderror" autocomplete="" autofocus>
                                        </div>
                                    </div>

                                    <div class="form-group col-12 col-xs-6 col-sm-6 col-md-4 col-xl-4 px-4 py-1">
                                        <label for="name" class="label_custom_primary_sm mb-2">Estatus:</label>
                                        <div class="input-group ">
                                            <span class="input-group-text span_custom_tab" >
                                                <img class="icon_span_tab" src="{{ asset('assets/media/icons/camion.webp') }}" alt="" >
                                            </span>
                                            <select name="estatus_banner" id="estatus_banner" class="form-select d-inline-block input_custom_tab" >
                                                <option value="Activado">Activado</option>
                                                <option value="Desactivado">Desactivado</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group col-12 mt-4 mb-4 ">
                                        <p class="text-center ">
                                            <button type="submit" id="guardarCaja" class="btn btn-success btn_save_custom">Guardar</button>
                                        </p>
                                    </div>
                                </div>
                            </form>
                            <div id="sortable-list">
                                @foreach ($banners as $banner)
                                    <div class="sortable-item" data-id="{{ $banner->id }}">
                                        <img class="" src="{{ asset('banners/empresa'.auth()->user()->id_empresa.'/'.$banner->imagen) }}" style="height: 30px;">
                                        <label for="name" class="label_custom_primary_sm mb-2">{{ $banner->orden }}</label>
                                        <label for="name" class="label_custom_primary_sm mb-2">{{ $banner->estatus }}</label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>


    </div>

</section>

@endsection

@section('js_custom_settings')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Sortable/1.14.0/Sortable.min.js"></script>
<script>
    const sortableList = document.getElementById('sortable-list');

    const sortable = new Sortable(sortableList, {
        animation: 150, // Duración de la animación en milisegundos
        onUpdate: function (evt) {
            // Se ejecuta después de que se ha realizado el cambio de orden
            const items = evt.from.getElementsByClassName('sortable-item');
            const orderArray = Array.from(items).map((item, index) => ({
                id: item.dataset.id,
                order: index + 1,
            }));

            // Obtén el token CSRF desde la etiqueta meta
            const csrfToken = document.querySelector('meta[name="csrf-token"]').content;

            // Agrega el token CSRF al encabezado de la solicitud
            const headers = new Headers({
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': csrfToken,
            });

            // Ejemplo usando fetch:
            fetch('/actualizar-orden', {
                method: 'POST',
                headers: headers,
                body: JSON.stringify({ orderArray }),
            })
                .then(response => response.json())
                .then(data => console.log(data))
                .catch(error => console.error('Error:', error));
        },
    });
</script>

<script>
    $(document).ready(function() {

        $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $("#empresaFormConfig_crea").on("submit", function (event) {

            event.preventDefault();
            var formID = $(this).attr("id");

            $.ajax({
                url: $(this).attr("action"),
                type: "POST",
                data: new FormData(this),
                contentType: false,
                processData: false,
                success: async function(response) {
                    saveSuccessEditConfig(response);
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

        async function saveSuccessEditConfig(response) {
            Swal.fire({
                title: "Datos de Empresa Actualizado <br> <strong>¡Exitosamente!</strong>",
                icon: "success",
                showCloseButton: true,
                showCancelButton: false,
                focusConfirm: false,
                confirmButtonText: '<a class="btn_swalater_confirm"  style="text-decoration: none;color: #fff;" href="#" >Cerrar</a>',
                }).then(() => {
                    // Cierra todos los modales abiertos
                    $('.modal').modal('hide');
                });
        }

        $("#cajaForm_Config").on("submit", function (event) {

            event.preventDefault();
            var formID = $(this).attr("id");

            $.ajax({
                url: $(this).attr("action"),
                type: "POST",
                data: new FormData(this),
                contentType: false,
                processData: false,
                success: async function(response) {
                    SavecajaForm_Config(response);
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

        async function SavecajaForm_Config(response) {
        Swal.fire({
            title: "Configuracion de Caja Actualizado <br><strong>¡Exitosamente!</strong>",
            icon: "success",
            showCloseButton: true,
            showCancelButton: false,
            focusConfirm: false,
            confirmButtonText: '<a class="btn_swalater_confirm"  style="text-decoration: none;color: #fff;" href="#" >Cerrar</a>',
            }).then(() => {
                // Cierra todos los modales abiertos
                $('.modal').modal('hide');
            });
        }


        $("#empresaFormConfig_tienda").on("submit", function (event) {
            event.preventDefault();
            var formID = $(this).attr("id");

            $.ajax({
                url: $(this).attr("action"),
                type: "POST",
                data: new FormData(this),
                contentType: false,
                processData: false,
                success: async function(response) {
                    saveSuccessEditConfig(response);
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

        async function saveSuccessEditConfig(response) {
            Swal.fire({
                title: "Datos de Empresa Actualizado <br> <strong>¡Exitosamente!</strong>",
                icon: "success",
                showCloseButton: true,
                showCancelButton: false,
                focusConfirm: false,
                confirmButtonText: '<a class="btn_swalater_confirm"  style="text-decoration: none;color: #fff;" href="#" >Cerrar</a>',
            }).then(() => {
                // Cierra todos los modales abiertos
                $('.modal').modal('hide');
            });
        }

    });

    $(document).ready(function () {
        $('#checkboxFactura').change(function () {
            if (this.checked) {
                $('#mostrarDivFactura').show();
            } else {
                $('#mostrarDivFactura').hide();
            }
        });
    });

    $(document).ready(function () {
        $('#tipo_factura').change(function () {
            if ($(this).val() === 'Precio Desglosado') {
                $('#mostrarDivPorcentaje').show();
            } else {
                $('#mostrarDivPorcentaje').hide();
            }
        });
    });
</script>
@endsection
