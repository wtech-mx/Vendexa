@section('css_custom')

@endsection

<!-- Modal -->
  <div class="modal fade" id="editProveedorFact{{ $proveedor->id }}" tabindex="-1" aria-labelledby="creatClientLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">

        <div class="modal-body modal_bg row">

                <div class="row">
                    <div class="col-10">
                        <h2 class="tiitle_modal_dark text-center mt-3">Factura Proveedor</h2>
                    </div>

                    <div class="col-2">
                        <a class="input-group-text span_custom_primary_dark mt-3" data-bs-dismiss="modal" style="margin-right: 0rem!important;">
                            <img class="icon_span_form" src="{{ asset('assets/media/icons/close_white.webp') }}" alt="" >
                        </a>
                    </div>
                </div>

                <div class="row px-3">

                    <div class="form-group text-left col-12 mt-4 p-2">
                       <h6 class="subtittles">Ver Historial</h6>
                    </div>
                    <form method="POST" action="{{ route('proveedor_fact.store') }}" class="z-1"  id="miFormularioProveedorFactEdit" enctype="multipart/form-data">
                        @csrf
                        <input  name="id_proveedor" type="text"  class="form-control input_custom_tab_dark" style="display: none" value="{{ $proveedor->id }}">

                        <div class="row">
                            <div class="form-group col-6 mb-3 p-2">
                                <label for="name" class="label_custom_primary_product mb-2">Num Articulos Comprados *</label>
                                <div class="input-group ">
                                    <span class="input-group-text span_custom_tab" >
                                        <img class="icon_span_form" src="{{ asset('assets/media/icons/carrito.webp') }}" alt="" >
                                    </span>
                                    <input name="num_articulos_comprados" type="number"  class="form-control input_custom_tab_dark" multiple>
                                </div>
                            </div>

                            <div class="form-group col-6 mb-3 p-2">
                                <label for="name" class="label_custom_primary_product mb-2">Num Articulos Recibidos *</label>
                                <div class="input-group ">
                                    <span class="input-group-text span_custom_tab" >
                                        <img class="icon_span_form" src="{{ asset('assets/media/icons/carrito.webp') }}" alt="" >
                                    </span>
                                    <input name="num_articulos_recibidos" type="number"  class="form-control input_custom_tab_dark" multiple>
                                </div>
                            </div>

                            <div class="form-group col-6 mb-3 p-2">
                                <label for="name" class="label_custom_primary_product mb-2">Total *</label>
                                <div class="input-group ">
                                    <span class="input-group-text span_custom_tab" >
                                        <img class="icon_span_form" src="{{ asset('assets/media/icons/bolsa-de-dinero.webp') }}" alt="" >
                                    </span>
                                    <input name="total" type="number"  class="form-control input_custom_tab_dark" multiple>
                                </div>
                            </div>

                            <div class="col-6"></div>

                            <div class="form-group col-6 mb-3 p-2">
                                <label for="name" class="label_custom_primary_product mb-2">IMG o PDF  *</label>
                                <div class="input-group ">
                                    <span class="input-group-text span_custom_tab" >
                                        <img class="icon_span_form" src="{{ asset('assets/media/icons/imagen.webp') }}" alt="" >
                                    </span>
                                    <input name="factura" type="file"  class="form-control input_custom_tab_dark" multiple>
                                </div>
                            </div>

                            <div class="form-group col-6 mb-3 p-2">
                                <label for="name" class="label_custom_primary_product mb-2">IMG o PDF 2 Opcional</label>
                                <div class="input-group ">
                                    <span class="input-group-text span_custom_tab" >
                                        <img class="icon_span_form" src="{{ asset('assets/media/icons/imagen.webp') }}" alt="" >
                                    </span>
                                    <input name="factura2" type="file"  class="form-control input_custom_tab_dark" multiple>
                                </div>
                            </div>

                            <div class="form-group col-6 mb-3 p-2">
                                <label for="name" class="label_custom_primary_product mb-2">IMG o PDF 3 Opcional</label>
                                <div class="input-group ">
                                    <span class="input-group-text span_custom_tab" >
                                        <img class="icon_span_form" src="{{ asset('assets/media/icons/imagen.webp') }}" alt="" >
                                    </span>
                                    <input name="factura3" type="file"  class="form-control input_custom_tab_dark" multiple>
                                </div>
                            </div>

                            <div class="form-group col-6 mb-3 p-2">
                                <label for="name" class="label_custom_primary_product mb-2">IMG o PDF 4 Opcional</label>
                                <div class="input-group ">
                                    <span class="input-group-text span_custom_tab" >
                                        <img class="icon_span_form" src="{{ asset('assets/media/icons/imagen.webp') }}" alt="" >
                                    </span>
                                    <input name="factura4" type="file"  class="form-control input_custom_tab_dark" multiple>
                                </div>
                            </div>

                            <div class="form-group col-12 mt-4 mb-4 mx-auto">
                                <p class="text-center ">
                                    <button type="submit" class="btn btn-success btn_save_custom">Guardar</button>
                                </p>
                            </div>
                        </div>

                    </form>
                </div>

        </div>

      </div>
    </div>
  </div>


@section('js_proveedor')
<script>

    $(document).ready(function() {

        $("#miFormularioProveedorFactEdit").on("submit", function (event) {

            event.preventDefault(); // Evita el envío predeterminado del formulario

            // $(this).html('Sending..');

            // Realiza la solicitud POST usando AJAX
            $.ajax({
                        url: $(this).attr("action"),
                        type: "POST",
                        data: new FormData(this),
                        contentType: false,
                        processData: false,
                        success: async function(response) { // Agrega "async" aquí
                            // El formulario se ha enviado correctamente, ahora realiza la impresión
                            saveSuccessClientCreate(response);

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

        async function saveSuccessClientCreate(response) {
            const proveedor_data = response.proveedor_data;
            const code = "{{ $code_global }}";

            Swal.fire({
                    title: "Factura Agregada <strong>¡Exitosamente!</strong>",
                    icon: "success",
                    showCloseButton: true,
                    showCancelButton: true,
                    focusConfirm: false,
                    confirmButtonText: '<a class="btn_swalater_confirm"  style="text-decoration: none;color: #fff;" href="#" >Ver Facturas</a>',
                    cancelButtonText: `<a  class="btn_swalater_cancel" style="text-decoration: none;color: #fff;" href="" >Cerrar</a>`,
                }).then(() => {
                    // Recarga la página
                window.location.href = '/home/'+ code;
                });

        }

    });


    </script>
@endsection
