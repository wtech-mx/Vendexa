

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

                                    <div class="col-12">
                                        <div id="product_camera" class=""></div>
                                    </div>

                                    <div class="d-flex justify-content-center">
                                        <a id="resetScannerProduct" class="input-group-text span_custom_primary_warning mt-2 mb-2">
                                            <img class="icon_span_form" src="{{ asset('assets/media/icons/reset.webp') }}" alt="" >
                                        </a>
                                    </div>

                                </div>
                              </div>
                            </div>

                            <div class="accordion-item acoriden_items mb-2">
                                <h2 class="accordion-header accordeon_scanner_header">
                                  <button class="accordion-button accordion_scanner d-block collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseManual" aria-expanded="false" aria-controls="collapseManual">
                                      <div class="d-flex justify-content-between">
                                          <p style="margin-bottom: 0;">Busqueda Manual</p>
                                          <p style="margin-bottom: 0;">
                                              <img class="img_scanner_dropdown" src="{{ asset('assets/media/icons/buscar.webp') }}" alt="">
                                          </p>
                                      </div>
                                  </button>
                                </h2>
                                <div id="collapseManual" class="accordion-collapse collapse" data-bs-parent="#accordionScanner">
                                  <div class="accordion-body row">
                                    <div class="form-group col-12">
                                        <label for="name" class="label_custom_primary_product mb-2">Ingresa SKU : *</label>
                                        <div class="input-group ">
                                            <span class="input-group-text span_custom_primary_dark" >
                                                <img class="icon_span_form" src="{{ asset('assets/media/icons/code_barras.webp') }}" alt="" >
                                            </span>
                                            <input id="buscar" name="buscar" type="text"  class="form-control input_custom_primary_dark" >
                                        </div>
                                    </div>

                                    <div class="form-group col-12">
                                        <div class="d-flex justify-content-center">
                                            <div class="spinner-border" role="status" id="loadingSpinner" style="display:none">
                                                <span class="visually-hidden">Loading...</span>
                                            </div>
                                        </div>


                                        <p class="text-center">
                                            <button type="button" id="btn-buscar" class="span_custom_primary_dark mt-3 text-white"> Buscar
                                                <img class="img_scanner_dropdown" src="{{ asset('assets/media/icons/buscar.webp') }}" alt="">
                                            </button>
                                        </p>
                                    </div>

                                    <div class="col-12">
                                        <div id="input_camera" class=""></div>
                                    </div>

                                    <div class="d-flex justify-content-center">
                                        <a id="resetScannerProduct_input" class="input-group-text span_custom_primary_warning mt-2 mb-2">
                                            <img class="icon_span_form" src="{{ asset('assets/media/icons/reset.webp') }}" alt="" >
                                        </a>
                                    </div>

                                  </div>
                                </div>
                              </div>

                            <div class="accordion-item acoriden_items mb-2">
                              <h2 class="accordion-header accordeon_scanner_header">
                                <button class="accordion-button accordion_scanner d-block collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFilters" aria-expanded="false" aria-controls="collapseFilters">
                                    <div class="d-flex justify-content-between">
                                        <p style="margin-bottom: 0;">Busqueda avanzada</p>
                                        <p style="margin-bottom: 0;">
                                            <img class="img_scanner_dropdown" src="{{ asset('assets/media/icons/filtrar.webp') }}" alt="">
                                        </p>
                                    </div>
                                </button>
                              </h2>
                              <div id="collapseFilters" class="accordion-collapse collapse" data-bs-parent="#accordionScanner">
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

$(document).ready(function() {


    $('#btn-buscar').click(function() {
            buscar();
    });

    $('#resetScannerProduct').click(function() {
        resetScanner();
    });

    $('#resetScannerProduct_input').click(function() {
        resetScannerInput();
    });

    let html5ScannerProdcut = new Html5QrcodeScanner("reader_search", { fps: 15, qrbox: 200 , autostart: false });
    html5ScannerProdcut.render(onScanSuccess);

    function onScanSuccess(result, decodedResult) {
        html5ScannerProdcut.clear().then(_ => {
                $.ajax({
                    type: 'get',
                    url: '{{ route('scanner.index') }}',
                    data: {
                    'search': result,
                    '_token': token // Agregar el token CSRF a los datos enviados
                    },
                    success: function (data) {
                        console.log('Skus:', data);
                        $('#product_camera').html(data); // Actualiza la sección con los datos del servicio
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

    function buscar() {
        var result = $('#buscar').val();

        $('#loadingSpinner').show();


        $.ajax({
            url: '{{ route('scanner.index') }}',
            type: 'get',
            data: {
                'search': result,
                '_token': token // Agregar el token CSRF a los datos enviados
            },
            success: function(data) {
                console.log('Skus:', data);
                $('#input_camera').html(data); // Actualiza la sección con los datos del servicio
            },
            error: function(error) {
            console.log(error);
        },
            complete: function() {
                // Ocultar el spinner cuando la búsqueda esté completa
                $('#loadingSpinner').hide();

                // Resto del código después de la búsqueda
                console.log(`folio_Product: = ${result}`);
                const audio = new Audio("{{ asset('assets/media/audio/barras.mp3')}}");
                audio.play();
                scanner.clear();
                console.log(`clear = ${result}`);
            }

        });

    }

    function onScanFailure(error) {
    }

    function resetScanner() {
        html5ScannerProdcut.clear();
        html5ScannerProdcut.render(onScanSuccess);
        $('#product_camera').empty();
    }

    function resetScannerInput() {
        html5ScannerProdcut.clear();
        html5ScannerProdcut.render(onScanSuccess);
        $('#input_camera').empty();
        $('#buscar').val('');
    }

});


</script>
@endsection
