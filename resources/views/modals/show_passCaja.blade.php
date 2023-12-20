<div class="modal" tabindex="-1" id="ModalPassCaja">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Identificate</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <form id="FormularioCajaPass" class="" method="POST" action="{{route('caja_pass.store')}}" enctype="multipart/form-data" role="form" style="margin:0!important;margin-right: -1.5rem!important;">
            @csrf

            <div class="modal-body row">
                <div class="form-group col-12 mb-3 p-2">
                    <label for="name" class="label_custom_primary_product mb-2">Clave de Cajero : *</label>
                    <div class="input-group ">
                        <span class="input-group-text span_custom_tab" >
                            <img class="icon_span_form" src="{{ asset('assets/media/icons/fuente.webp') }}" alt="" >
                        </span>
                        <input  name="password_caja" type="number"  class="form-control input_custom_tab_dark"  value=""  autocomplete="">
                    </div>
                </div>

                <div class="form-group col-12 mb-3 p-2">
                    <p class="text-center ">
                        <button type="submit" class="btn btn-success">Guardar</button>
                    </p>
                </div>
            </div>

        </form>

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
                            title: 'Faltan Campos',
                            html: errorMessage, // Usa "html" para mostrar el mensaje con formato HTML
                        });
                }
            });

});

async function saveSuccess(response) {
    const cliente_data = response.cliente_data;


        window.location.href = '/home/';


}

});

</script>

@endsection


