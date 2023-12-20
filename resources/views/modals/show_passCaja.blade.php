<!-- Modal -->
<div class="modal fade" id="ModalPassCaja" tabindex="-1" aria-labelledby="creatClientLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">

        <div class="modal-body modal_bg row">

            <form method="POST" action="{{route('caja_pass.store')}}" class="z-1"  id="FormularioCajaPass" enctype="multipart/form-data">
                @csrf

                <div class="row">
                    <div class="col-10">
                        <h2 class="tiitle_modal_dark text-center mt-3">Ingresar Clave</h2>
                    </div>

                    <div class="col-2">
                        <a class="input-group-text span_custom_primary_dark mt-3" data-bs-dismiss="modal" style="margin-right: 0rem!important;">
                            <img class="icon_span_form" src="{{ asset('assets/media/icons/close_white.webp') }}" alt="" >
                        </a>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-12 mt-3 mb-3 p-2">
                        <label for="name" class="label_custom_primary_product mb-2">Clave de Cajero : *</label>
                        <div class="input-group ">
                            <span class="input-group-text span_custom_tab" >
                                <img class="icon_span_form" src="{{ asset('assets/media/icons/proteger.png.webp') }}" alt="" >
                            </span>
                            <input  name="password_caja" type="number"  class="form-control input_custom_tab_dark"  value=""  autocomplete="">
                        </div>
                    </div>

                    <div class="form-group col-12 mt-4 mb-4 ">
                        <p class="text-center ">
                            <button type="submit" class="btn btn-success btn_save_custom">Acceder</button>
                        </p>
                    </div>
                </div>


            </form>


        </div>

      </div>
    </div>
  </div>
@section('js_caja_pass')

<script>

$(document).ready(function() {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $("#FormularioCajaPass").on("submit", function (event) {

                event.preventDefault(); // Evita el envío predeterminado del formulario

                $.ajax({
                            url: $(this).attr("action"),
                            type: "POST",
                            data: new FormData(this),
                            contentType: false,
                            processData: false,
                            success: async function(response) { // Agrega "async" aquí
                                // El formulario se ha enviado correctamente, ahora realiza la impresión
                                saveSuccess(response);

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
                                        title: 'Error',
                                        html: errorMessage, // Usa "html" para mostrar el mensaje con formato HTML
                                    });
                            }
                        });

            });

            async function saveSuccess(response) {

                const pass_data = response.pass; // Accede al objeto 'pass' enviado desde el servidor
                const clave = pass_data.clave; // Accede a la propiedad 'clave' dentro del objeto 'pass'
                // alert(`/caja/index/${clave}`);
                window.location.href = `/caja/${clave}`;
            }

});

</script>

@endsection


