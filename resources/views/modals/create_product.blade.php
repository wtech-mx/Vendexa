@section('css_custom')


@endsection

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">

        <div class="modal-body modal_bg row">

            <form action="" class="z-1" action="/file-upload"class="dropzone" id="my-awesome-dropzone">>

                <div class="col-12">
                    <h2 class="tiitle_modal_dark text-center mt-3">Crear Producto</h2>
                </div>

                <div class="form-group col-12 mb-3 p-2">
                    <label for="name" class="label_custom_primary_product mb-2">Nombre :</label>
                    <div class="input-group ">
                        <span class="input-group-text span_custom_primary_dark" >
                            <img class="icon_span_form" src="{{ asset('assets/media/icons/una.webp') }}" alt="" >
                        </span>
                        <input id="" name="" type="text"  class="form-control input_custom_primary_dark @error('') is-invalid @enderror"  value="{{ old('') }}" required autocomplete="" autofocus>
                    </div>
                </div>

                <div class="form-group col-12 mb-3 p-2">
                    <label for="name" class="label_custom_primary_product mb-2">Descripcion :</label>
                    <div class="input-group ">
                        <textarea class="form-control textarea_custom_primary_dark" placeholder="" id="" name=""></textarea>
                    </div>
                </div>

                <div class="form-group col-12 mb-3 p-2">
                    <label for="name" class="label_custom_primary_product mb-2">Escanear o generar SKU :</label>
                    <div class="input-group mb-3">
                        <span class="input-group-text span_custom_primary_dark" >
                            <img class="icon_span_form" src="{{ asset('assets/media/icons/scanner2.webp') }}" alt="" >
                        </span>
                        <select name="opcion" id="opcion" class="form-select d-inline-block select_custom_primary_dark"  value="{{old('')}}">
                            <option value="" {{ old('') == '' ? 'selected' : '' }}>Selecionar opcion</option>
                            <option value="Generar SKU" {{ old('') == 'Generar SKU' ? 'selected' : '' }}>Generar SKU</option>
                            <option value="Escanear Codigo" {{ old('') == 'Escanear Codigo' ? 'selected' : '' }}>Escanear Codigo</option>
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
                        <label for="name" class="label_custom_primary_product mb-2">SKU :</label>
                        <div class="input-group ">
                            <span class="input-group-text span_custom_primary_dark" >
                                <img class="icon_span_form" src="{{ asset('assets/media/icons/code_barras.webp') }}" alt="" >
                            </span>

                            <input id="skuInput" name="" type="number" class="form-control input_custom_primary_dark @error('') is-invalid @enderror" value="{{ old('') }}" required autocomplete="" autofocus>
                        </div>
                    </div>
                </div>


                <div class="row mb-3 " id="contentEscanearCodigo" style="display: none;">

                    <div class="form-group col-12 mb-3 ">
                        <div style="width: 500px" id="reader"></div>
                    </div>


                    <div class="form-group col-10 mb-3 ">
                        <label for="name" class="label_custom_primary_product mb-2">SKU :</label>
                        <div class="input-group ">
                            <span class="input-group-text span_custom_primary_dark" >
                                <img class="icon_span_form" src="{{ asset('assets/media/icons/code_barras.webp') }}" alt="" >
                            </span>

                            <input id="skuInputScanner" name="" type="number" class="form-control input_custom_primary_dark @error('') is-invalid @enderror" value="{{ old('') }}" required autocomplete="" autofocus>
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
                                <button class="nav-link" id="pills-metadatos-tab" data-bs-toggle="pill" data-bs-target="#pills-metadatos" type="button" role="tab" aria-controls="pills-metadatos" aria-selected="false">
                                    <img class="tab_custom_icon" src="{{ asset('assets/media/icons/gear.webp') }}" alt="" > Metadatos
                                </button>
                            </li>

                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-atributos-tab" data-bs-toggle="pill" data-bs-target="#pills-atributos" type="button" role="tab" aria-controls="pills-atributos" aria-selected="false">
                                    <img class="tab_custom_icon" src="{{ asset('assets/media/icons/resultado.webp') }}" alt="" > Atributos
                                </button>
                            </li>
                        </ul>

                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-detalles" role="tabpanel" aria-labelledby="pills-detalles-tab" tabindex="0">
                                <div class="row">

                                    <div class="form-group col-6 col-xs-6 col-sm-6 col-md-6 col-xl-6 px-4 py-3">
                                        <label for="name" class="label_custom_primary_product mb-2">Proveedor :</label>
                                        <div class="input-group ">
                                            <span class="input-group-text span_custom_tab" >
                                                <img class="icon_span_tab" src="{{ asset('assets/media/icons/camion.webp') }}" alt="" >
                                            </span>
                                            <input id="" name="" type="text"  class="form-control input_custom_tab @error('') is-invalid @enderror"  value="{{ old('') }}" required autocomplete="" autofocus>
                                        </div>
                                    </div>

                                    <div class="form-group col-6 col-xs-6 col-sm-6 col-md-6 col-xl-6 px-4 py-3">
                                        <label for="name" class="label_custom_primary_product mb-2">ID Proveedor :</label>
                                        <div class="input-group ">
                                            <span class="input-group-text span_custom_tab" >
                                                <img class="icon_span_tab" src="{{ asset('assets/media/icons/cero.webp') }}" alt="" >
                                            </span>
                                            <input id="" name="" type="text"  class="form-control input_custom_tab @error('') is-invalid @enderror"  value="{{ old('') }}" required autocomplete="" autofocus>
                                        </div>
                                    </div>

                                    <div class="form-group col-6 col-xs-6 col-sm-6 col-md-6 col-xl-6 px-4 py-3">
                                        <label for="name" class="label_custom_primary_product mb-2">Stock :</label>
                                        <div class="input-group ">
                                            <span class="input-group-text span_custom_tab" >
                                                <img class="icon_span_tab" src="{{ asset('assets/media/icons/en-stock.png.webp') }}" alt="" >
                                            </span>
                                            <input id="" name="" type="text"  class="form-control input_custom_tab @error('') is-invalid @enderror"  value="{{ old('') }}" required autocomplete="" autofocus>
                                        </div>
                                    </div>

                                    <div class="form-group col-6 col-xs-6 col-sm-6 col-md-6 col-xl-6 px-4 py-3">
                                        <label for="name" class="label_custom_primary_product mb-2">Costo :</label>
                                        <div class="input-group ">
                                            <span class="input-group-text span_custom_tab" >
                                                <img class="icon_span_tab" src="{{ asset('assets/media/icons/efectivo.webp') }}" alt="" >
                                            </span>
                                            <input id="" name="" type="text"  class="form-control input_custom_tab @error('') is-invalid @enderror"  value="{{ old('') }}" required autocomplete="" autofocus>
                                        </div>
                                    </div>

                                    <div class="form-group col-6 col-xs-6 col-sm-6 col-md-6 col-xl-6 px-4 py-3">
                                        <label for="name" class="label_custom_primary_product mb-2">Precio normal :</label>
                                        <div class="input-group ">
                                            <span class="input-group-text span_custom_tab" >
                                                <img class="icon_span_tab" src="{{ asset('assets/media/icons/monedas.webp') }}" alt="" >
                                            </span>
                                            <input id="" name="" type="text"  class="form-control input_custom_tab @error('') is-invalid @enderror"  value="{{ old('') }}" required autocomplete="" autofocus>
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


                            <div class="tab-pane row fade" id="pills-metadatos" role="tabpanel" aria-labelledby="pills-metadatos-tab" tabindex="0">

                                <div class="row">

                                    <div class="form-group col-9 px-4 py-3">
                                        <label for="name" class="label_custom_primary_product mb-2">Marca :</label>
                                        <div class="input-group ">
                                            <span class="input-group-text span_custom_tab" >
                                                <img class="icon_span_tab" src="{{ asset('assets/media/icons/marca.webp') }}" alt="" >
                                            </span>
                                            <select name="" id="" class="form-select d-inline-block input_custom_tab"  value="{{old('')}}">
                                                <option value="" {{ old('') == '' ? 'selected' : '' }}>Selecionar </option>
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
                                            <input id="" name="" type="text"  class="form-control input_custom_tab @error('') is-invalid @enderror"  value="{{ old('') }}" required autocomplete="" autofocus>
                                        </div>
                                    </div>

                                    <div class="form-group col-9 px-4 py-3">
                                        <label for="name" class="label_custom_primary_product mb-2">Categoria :</label>
                                        <div class="input-group ">
                                            <span class="input-group-text span_custom_tab" >
                                                <img class="icon_span_tab" src="{{ asset('assets/media/icons/categorias.webp') }}" alt="" >
                                            </span>
                                            <select name="" id="" class="form-select d-inline-block input_custom_tab"  value="{{old('')}}">
                                                <option value="" {{ old('') == '' ? 'selected' : '' }}>Selecionar </option>
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
                                            <input id="" name="" type="text"  class="form-control input_custom_tab @error('') is-invalid @enderror"  value="{{ old('') }}" required autocomplete="" autofocus>
                                        </div>
                                    </div>

                                    <div class="form-group col-9 px-4 py-3">
                                        <label for="name" class="label_custom_primary_product mb-2">Subcategoria :</label>
                                        <div class="input-group ">
                                            <span class="input-group-text span_custom_tab" >
                                                <img class="icon_span_tab" src="{{ asset('assets/media/icons/paquete.webp') }}" alt="" >
                                            </span>
                                            <select name="" id="" class="form-select d-inline-block input_custom_tab"  value="{{old('')}}">
                                                <option value="" {{ old('') == '' ? 'selected' : '' }}>Selecionar </option>

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
                                            <input id="" name="" type="text"  class="form-control input_custom_tab @error('') is-invalid @enderror"  value="{{ old('') }}" required autocomplete="" autofocus>
                                        </div>
                                    </div>

                                    <div class="form-group col-12 px-4 py-3">
                                        <label for="name" class="label_custom_primary_product mb-2">Imagen de Portada :</label>
                                        <div class="input-group ">
                                            <span class="input-group-text span_custom_tab" >
                                                <img class="icon_span_tab" src="{{ asset('assets/media/icons/imagen.webp') }}" alt="" >
                                            </span>
                                            <input id="" name="" type="file"  class="form-control input_custom_tab @error('') is-invalid @enderror"  value="{{ old('') }}" required autocomplete="" autofocus>
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


                            <div class="tab-pane row fade" id="pills-atributos" role="tabpanel" aria-labelledby="pills-atributos-tab" tabindex="0">

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

            var html5QrcodeScanner = new Html5QrcodeScanner("reader", { fps: 10, qrbox: 200 });
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
