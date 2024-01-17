@section('css_custom')

@endsection

<!-- Modal -->
  <div class="modal fade" id="creatClient" tabindex="-1" aria-labelledby="creatClientLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">

        <div class="modal-body modal_bg row">

            <form method="POST" action="{{ route('clientes.store') }}" class="z-1"  id="miFormularioClientes" enctype="multipart/form-data">
                @csrf

                <div class="row">
                    <div class="col-10">
                        <h2 class="tiitle_modal_dark text-center mt-3">Crear Cliente</h2>
                    </div>

                    <div class="col-2">
                        <a class="input-group-text span_custom_primary_dark mt-3" data-bs-dismiss="modal" style="margin-right: 0rem!important;">
                            <img class="icon_span_form" src="{{ asset('assets/media/icons/close_white.webp') }}" alt="" >
                        </a>
                    </div>
                </div>

                <div class="row px-3">

                    <div class="form-group text-left col-12 mt-4 p-2">
                       <h6 class="subtittle_clientes">Datos Generales</h6>
                    </div>

                    <div class="form-group col-12 mb-3 p-2">
                        <label for="name" class="label_custom_primary_product mb-2">Nombre : *</label>
                        <div class="input-group ">
                            <span class="input-group-text span_custom_tab" >
                                <img class="icon_span_form" src="{{ asset('assets/media/icons/fuente.webp') }}" alt="" >
                            </span>
                            <input  name="nombre_cliente" type="text"  class="form-control input_custom_tab_dark @error('') is-invalid @enderror"  value="{{ old('') }}"  autocomplete="" autofocus>
                        </div>
                    </div>

                    <div class="form-group col-12 mb-3 p-2">
                        <label for="name" class="label_custom_primary_product mb-2">Apellido(s) *</label>
                        <div class="input-group ">
                            <span class="input-group-text span_custom_tab" >
                                <img class="icon_span_form" src="{{ asset('assets/media/icons/fuente.webp') }}" alt="" >
                            </span>
                            <input  name="apellido_cliente" type="text"  class="form-control input_custom_tab_dark @error('') is-invalid @enderror"  value="{{ old('') }}"  autocomplete="" autofocus>
                        </div>
                    </div>

                    <div class="form-group col-6 mb-3 p-2">
                        <label for="name" class="label_custom_primary_product mb-2">WhatsApp *</label>
                        <div class="input-group ">
                            <span class="input-group-text span_custom_tab" >
                                <img class="icon_span_form" src="{{ asset('assets/media/icons/whatsapp.webp') }}" alt="" >
                            </span>

                            <input name="telefono" id="telefono_input_client" type="tel" class="form-control input_custom_tab_dark @error('whats_cliente') is-invalid @enderror" value="{{ old('whats_cliente') }}" autocomplete="" autofocus>

                        </div>
                    </div>

                    <div class="form-group col-6 mb-3 p-2">
                        <label for="name" class="label_custom_primary_product mb-2">Correo Electronico *</label>
                        <div class="input-group ">
                            <span class="input-group-text span_custom_tab" >
                                <img class="icon_span_form" src="{{ asset('assets/media/icons/sobre.png.webp') }}" alt="" >
                            </span>
                            <input  name="email_cliente" type="text"  class="form-control input_custom_tab_dark @error('') is-invalid @enderror"  value="{{ old('') }}"  autocomplete="" autofocus>
                        </div>
                    </div>

                    <div class="form-group col-6 mb-3 p-2">
                        <label for="name" class="label_custom_primary_product mb-2">Imagen de perfil</label>
                        <div class="input-group ">
                            <span class="input-group-text span_custom_tab" >
                                <img class="icon_span_form" src="{{ asset('assets/media/icons/user_predeterminado.webp') }}" alt="" >
                            </span>
                            <input  name="img_perfil" type="file"  class="form-control input_custom_tab_dark @error('') is-invalid @enderror"  value="{{ old('') }}"  autocomplete="" autofocus>
                        </div>
                    </div>

                    <div class="form-group col-6 mb-3 p-2">
                        <label for="name" class="label_custom_primary_product mb-2">_</label>

                    </div>

                    <div class="form-group col-6 mb-3 p-2">
                        <label for="name" class="label_custom_primary_product mb-2">Fecha de Nacimiento</label>
                        <div class="input-group ">
                            <span class="input-group-text span_custom_tab" >
                                <img class="icon_span_form" src="{{ asset('assets/media/icons/calendar-dar.webp') }}" alt="" >
                            </span>
                            <input  name="fecha_nacimiento" type="date"  class="form-control input_custom_tab_dark @error('') is-invalid @enderror"  value="{{ old('') }}"  autocomplete="" autofocus>
                        </div>
                    </div>

                    <div class="form-group col-6 mb-3 p-2">
                        <label for="name" class="label_custom_primary_product mb-2">Recomendacion de:</label>
                        <div class="input-group ">
                            <span class="input-group-text span_custom_tab" >
                                <img class="icon_span_form" src="{{ asset('assets/media/icons/referencia.webp') }}" alt="" >
                            </span>
                            <input  name="recomendacion" type="text"  class="form-control input_custom_tab_dark @error('') is-invalid @enderror"  value="{{ old('') }}"  autocomplete="" autofocus>
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
                            <input  name="codigo_postal" type="number"  class="form-control input_custom_tab_dark @error('codigo_postal') is-invalid @enderror"  value="{{ old('codigo_postal') }}"  autocomplete="" autofocus>
                        </div>
                    </div>

                    <div class="form-group col-6 mb-3 p-2">
                        <label for="name" class="label_custom_primary_product mb-2">Estado</label>
                        <div class="input-group ">
                            <span class="input-group-text span_custom_tab" >
                                <img class="icon_span_form" src="{{ asset('assets/media/icons/independencia.webp') }}" alt="" >
                            </span>
                            <input  name="estado" type="text"  class="form-control input_custom_tab_dark @error('estado') is-invalid @enderror"  value="{{ old('estado') }}"  autocomplete="" autofocus>
                        </div>
                    </div>

                    <div class="form-group col-6 mb-3 p-2">
                        <label for="name" class="label_custom_primary_product mb-2">Alcaldia  / Municipio</label>
                        <div class="input-group ">
                            <span class="input-group-text span_custom_tab" >
                                <img class="icon_span_form" src="{{ asset('assets/media/icons/alcaldia.webp') }}" alt="" >
                            </span>
                            <input  name="alcaldia" type="text"  class="form-control input_custom_tab_dark @error('alcaldia') is-invalid @enderror"  value="{{ old('alcaldia') }}"  autocomplete="" autofocus>
                        </div>
                    </div>

                    <div class="form-group col-6 mb-3 p-2">
                        <label for="name" class="label_custom_primary_product mb-2">Ciudad</label>
                        <div class="input-group ">
                            <span class="input-group-text span_custom_tab" >
                                <img class="icon_span_form" src="{{ asset('assets/media/icons/edificios_ciudad.webp') }}" alt="" >
                            </span>
                            <input  name="ciudad" type="text"  class="form-control input_custom_tab_dark @error('ciudad') is-invalid @enderror"  value="{{ old('ciudad') }}"  autocomplete="" autofocus>
                        </div>
                    </div>

                    <div class="form-group col-6 mb-3 p-2">
                        <label for="name" class="label_custom_primary_product mb-2">Colonia</label>
                        <div class="input-group ">
                            <span class="input-group-text span_custom_tab" >
                                <img class="icon_span_form" src="{{ asset('assets/media/icons/poste_luz.webp') }}" alt="" >
                            </span>
                            <input  name="colonia" type="text"  class="form-control input_custom_tab_dark @error('colonia') is-invalid @enderror"  value="{{ old('colonia') }}"  autocomplete="" autofocus>
                        </div>
                    </div>

                    <div class="form-group col-6 mb-3 p-2">
                        <label for="name" class="label_custom_primary_product mb-2">Calle y Numero</label>
                        <div class="input-group ">
                            <span class="input-group-text span_custom_tab" >
                                <img class="icon_span_form" src="{{ asset('assets/media/icons/mapa-de-la-ciudad.webp') }}" alt="" >
                            </span>
                            <input  name="calle_numero" type="text"  class="form-control input_custom_tab_dark @error('calle_numero') is-invalid @enderror"  value="{{ old('calle_numero') }}"  autocomplete="" autofocus>
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

      </div>
    </div>
  </div>


@section('js_custom2_clientes')

<script>

$(document).ready(function() {

    $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
    });

    $("#miFormularioClientes").on("submit", function (event) {

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
        const cliente_data = response.cliente_data;

        Swal.fire({
                title: "Cliente Guardado <strong>¡Exitosamente!</strong>",
                icon: "success",
                showCloseButton: true,
                showCancelButton: true,
                focusConfirm: false,
                confirmButtonText: '<a class="btn_swalater_confirm"  style="text-decoration: none;color: #fff;" href="{{ route('productos.index') }}" >Ver Clientes</a>',
                cancelButtonText: `<a  class="btn_swalater_cancel" style="text-decoration: none;color: #fff;" href="" >Cerrar</a>`,
            }).then(() => {
                // Recarga la página
            window.location.href = '/home/';
            });

    }

});


</script>

@endsection
