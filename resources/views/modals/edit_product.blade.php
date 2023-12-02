@section('css_custom')


@endsection

<!-- Modal -->
<div class="modal fade" id="editProduct" tabindex="-1" aria-labelledby="editProductLabel" aria-hidden="true">
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
                                <button class="nav-link " id="pills-Mods-tab" data-bs-toggle="pill" data-bs-target="#pills-Mods" type="button" role="tab" aria-controls="pills-Mods" aria-selected="false" style="color: #577590!important;">
                                    <img class="tab_custom_icon" src="{{ asset('assets/media/icons/resultado.webp') }}" alt="" > Mods
                                </button>
                            </li>

                            <li class="nav-item" role="presentation">
                                <button class="nav-link " id="pills-Ventas-tab" data-bs-toggle="pill" data-bs-target="#pills-Ventas" type="button" role="tab" aria-controls="pills-Ventas" aria-selected="false" style="color: #577590!important;">
                                    <img class="tab_custom_icon" src="{{ asset('assets/media/icons/gear.webp') }}" alt="" > Ventas
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
                                            <input id="" name="" type="text"  class="form-control input_custom_tab @error('') is-invalid @enderror"  value="{{ old('') }}" required autocomplete="" autofocus>
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
                                                <input id="" name="" type="text"  class="form-control input_custom_tab @error('') is-invalid @enderror"  value="{{ old('') }}" required autocomplete="" autofocus>
                                            </div>
                                        </div>

                                        <div class="form-group col-6 px-4 py-3">
                                            <label for="name" class="label_custom_primary_product mb-2">Fecha de inicio :</label>
                                            <div class="input-group ">
                                                <span class="input-group-text span_custom_tab" >
                                                    <img class="icon_span_tab" src="{{ asset('assets/media/icons/calendar-dar.webp') }}" alt="" >
                                                </span>
                                                <input id="" name="" type="date"  class="form-control input_custom_tab @error('') is-invalid @enderror"  value="{{ old('') }}" required autocomplete="" autofocus>
                                            </div>
                                        </div>

                                        <div class="form-group col-6 px-4 py-3" >
                                            <label for="name" class="label_custom_primary_product mb-2">Fecha de Fin :</label>
                                            <div class="input-group ">
                                                <span class="input-group-text span_custom_tab" >
                                                    <img class="icon_span_tab" src="{{ asset('assets/media/icons/calendar-dar.webp') }}" alt="" >
                                                </span>
                                                <input id="" name="" type="date"  class="form-control input_custom_tab @error('') is-invalid @enderror"  value="{{ old('') }}" required autocomplete="" autofocus>
                                            </div>
                                        </div>

                                    </div>

                                </div>

                            </div>

                            <div class="tab-pane row fade" id="pills-Mods" role="tabpanel" aria-labelledby="pills-Mods-tab" tabindex="0">

                                <div class="row">


                                </div>

                            </div>

                            <div class="tab-pane fade" id="pills-Ventas" role="tabpanel" aria-labelledby="pills-Ventas-tab" tabindex="0">

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
                const radioSiMayo = document.getElementById('radioSiMayo');
                const radioNoMayo = document.getElementById('radioNoMayo');

                const radioSirebaja = document.getElementById('radioSirebaja');
                const radioNorebaja = document.getElementById('radioNorebaja');

                const precioMayoristaContainer = document.getElementById('precioMayoristaContainer');
                const precioPromoContainer = document.getElementById('precioPromoContainer');


                radioSiMayo.addEventListener('change', function() {
                    if (radioSiMayo.checked) {
                        precioMayoristaContainer.style.display = 'block';
                        console.log('Entro');
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
                        console.log('Entro');
                    }
                });

                radioNorebaja.addEventListener('change', function() {
                    if (radioNorebaja.checked) {
                        precioPromoContainer.style.display = 'none';
                    }
                });
            });

  </script>


@endsection
