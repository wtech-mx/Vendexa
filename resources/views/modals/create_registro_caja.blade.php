@section('css_custom')


@endsection

<!-- Modal -->
<div class="modal fade" id="creatRegCaja" tabindex="-1" aria-labelledby="creatRegCajaLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">

        <div class="modal-body modal_bg row">

            <form method="POST" action="{{ route('caja_corte.store') }}" class="z-1"  id="miFormularioRegCaja" enctype="multipart/form-data">
                @csrf

                <div class="row">
                    <div class="col-10">
                        <h3 class="tiitle_modal_dark text-center mt-3">Ingreso/Egreso Caja</h3>
                    </div>

                    <div class="col-2">
                        <a class="input-group-text span_custom_primary_dark mt-3" data-bs-dismiss="modal" style="margin-right: 0rem!important;">
                            <img class="icon_span_form" src="{{ asset('assets/media/icons/close_white.webp') }}" alt="" >
                        </a>
                    </div>
                </div>

                <div class="row px-3">

                    <div class="form-group col-6 mb-3 p-2">
                        <label for="name" class="label_custom_primary_product mb-2">Tipo : *</label>
                        <div class="input-group ">
                            <span class="input-group-text span_custom_tab" >
                                <img class="icon_span_tab" src="{{ asset('assets/media/icons/paquete.webp') }}" alt="" >
                            </span>
                            <select name="tipo" id="tipo" class="form-select d-inline-block input_custom_tab">
                                <option value="Egreso">Egreso</option>
                                <option value="Ingreso">Ingreso</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group col-6 mb-3 p-2">
                        <label for="name" class="label_custom_primary_product mb-2">Monto : *</label>
                        <div class="input-group ">
                            <span class="input-group-text span_custom_tab" >
                                <img class="icon_span_form" src="{{ asset('assets/media/icons/efectivo.webp') }}" alt="" >
                            </span>
                            <input  name="monto" id="monto" type="number"  class="form-control input_custom_tab_dark @error('monto') is-invalid @enderror"  value="{{ old('monto') }}"  autocomplete="" autofocus>
                        </div>
                    </div>

                    <div class="form-group col-12 mb-3 p-2">
                        <label for="name" class="label_custom_primary_product mb-2">Concepto : *</label>

                        <div class="input-group ">
                            <textarea class="form-control textarea_custom_primary_dark @error('concepto') is-invalid @enderror" id="concepto" name="concepto" value="{{ old('concepto') }}"></textarea>
                        </div>
                    </div>

                    <div class="form-group col-12 mb-3 p-2">
                        <label for="name" class="label_custom_primary_product mb-2">Comprobante: </label>
                        <div class="input-group ">
                            <span class="input-group-text span_custom_tab" >
                                <img class="icon_span_tab" src="{{ asset('assets/media/icons/imagen.webp') }}" alt="" >
                            </span>
                            <input id="foto" name="foto" type="file"  class="form-control input_custom_tab @error('foto') is-invalid @enderror"  value="{{ old('foto') }}"  autocomplete="" autofocus>
                        </div>
                    </div>

                    <div class="form-group col-12 mb-3 p-2">
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

@section('js_custom_caja_reg')

<script>
    $(document).ready(function() {

        $("#miFormularioRegCaja").on("submit", function (event) {
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
                    saveSuccessCajaReg(response);

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

        async function saveSuccessCajaReg(response) {
            const caja_data = response.caja_data;

            Swal.fire({
                    title: "Producto Guardado <strong>¡Exitosamente!</strong>",
                    icon: "success",
                    html: "<div class='row'><div class='col-6 mt-3'><img class='icon_span_tab' src='{{ asset('assets/media/icons/fuente.webp') }}' ><p><strong>Tipo:</strong> <br>"+ caja_data.Tipo +"</p></div><div class='col-6 mt-3'><img class='icon_span_tab' src='{{ asset('assets/media/icons/efectivo.webp') }}' ><p><strong>Monto:</strong><br>"+ caja_data.Monto +" </p> </div></div>",
                    showCloseButton: true,
                    showCancelButton: true,
                    focusConfirm: false,
                    cancelButtonText: `<a  class="btn_swalater_cancel" style="text-decoration: none;color: #fff;" href="" >Cerrar</a>`,
                }).then(() => {
                    // Recarga la página
                window.location.href = '/home/$code_global';
                });

        }
    });
</script>

@endsection
