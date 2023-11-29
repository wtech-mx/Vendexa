<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">

        <div class="modal-body modal_bg row">

            <div class="col-12">
                <h2 class="tiitle_modal_dark text-center">Crear Producto</h2>
            </div>

            <div class="form-group col-12 mb-3 z-1">
                <label for="name" class="label_custom_primary_Dark mb-2">Nombre :</label>
                <div class="input-group ">
                    <span class="input-group-text span_custom_primary_dark" >
                        <img class="icon_span_form" src="{{ asset('assets/media/icons/una.webp') }}" alt="" >
                    </span>
                    <input id="" name="" type="text"  class="form-control input_custom_primary_dark @error('') is-invalid @enderror"  value="{{ old('') }}" required autocomplete="" autofocus>
                </div>
            </div>

            <div class="form-group col-12 mb-3 z-1">
                <label for="name" class="label_custom_primary_Dark mb-2">Descripcion :</label>
                <div class="input-group ">
                    <textarea class="form-control textarea_custom_primary_dark" placeholder="" id="" name=""></textarea>
                </div>
            </div>

            <div class="form-group col-12 mb-3 z-1">
                <label for="name" class="label_custom_primary_Dark mb-2">Escanear o generar SKU :</label>
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

            <div class="row mb-3 z-1" id="contentGenerarSKU" style="display: none;">

                <div class="form-group col-3 mb-3 z-1" >
                    <label for="name" class="label_custom_primary_Dark mb-2">Generar</label>
                    <div class="input-group ">
                        <a id="generarSKU" class="input-group-text span_custom_primary_dark" >
                            <img class="icon_span_form" src="{{ asset('assets/media/icons/sincronizando.webp') }}" alt="" >
                        </a>
                    </div>
                </div>

                <div class="form-group col-9 mb-3 z-1" >
                    <label for="name" class="label_custom_primary_Dark mb-2">SKU :</label>
                    <div class="input-group ">
                        <span class="input-group-text span_custom_primary_dark" >
                            <img class="icon_span_form" src="{{ asset('assets/media/icons/code_barras.webp') }}" alt="" >
                        </span>

                        <input id="skuInput" name="" type="number" class="form-control input_custom_primary_dark @error('') is-invalid @enderror" value="{{ old('') }}" required autocomplete="" autofocus>
                    </div>
                </div>
            </div>

            <div class="row mb-3 z-1" id="contentEscanearCodigo" style="display: none;">

                <div class="form-group col-12 mb-3 z-1">
                    <div style="width: 500px" id="reader"></div>
                </div>


                <div class="form-group col-10 mb-3 z-1">
                    <label for="name" class="label_custom_primary_Dark mb-2">SKU :</label>
                    <div class="input-group ">
                        <span class="input-group-text span_custom_primary_dark" >
                            <img class="icon_span_form" src="{{ asset('assets/media/icons/code_barras.webp') }}" alt="" >
                        </span>

                        <input id="skuInputScanner" name="" type="number" class="form-control input_custom_primary_dark @error('') is-invalid @enderror" value="{{ old('') }}" required autocomplete="" autofocus>
                    </div>
                </div>

                <div class="form-group col-2 mb-3 z-1">
                    <label for="name" class="label_custom_primary_Dark mb-2">Reiniciar</label>
                    <div class="input-group ">
                        <a id="resetScannerBtn" class="input-group-text span_custom_primary_warning">
                            <img class="icon_span_form" src="{{ asset('assets/media/icons/reset.webp') }}" alt="" >
                        </a>
                    </div>
                </div>
            </div>



        </div>

      </div>
    </div>
  </div>

@section('js_custom')
<script src="https://cdnjs.cloudflare.com/ajax/libs/html5-qrcode/2.3.4/html5-qrcode.min.js" integrity="sha512-k/KAe4Yff9EUdYI5/IAHlwUswqeipP+Cp5qnrsUjTPCgl51La2/JhyyjNciztD7mWNKLSXci48m7cctATKfLlQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

  <script>

        $(document).ready(function() {

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

            var html5QrcodeScanner = new Html5QrcodeScanner("reader", { fps: 10, qrbox: 250 });
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
