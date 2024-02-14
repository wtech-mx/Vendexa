@section('css_custom')


@endsection

<!-- Modal -->
<div class="modal fade" id="creatEmpresa" tabindex="-1" aria-labelledby="creatEmpresaLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">

        <div class="modal-body modal_bg row">

            <form method="POST" action="{{ route('empresas.store') }}" class="z-1"  id="miFormularioEmpresas" enctype="multipart/form-data">
                @csrf

                <div class="row">
                    <div class="col-10">
                        <h2 class="tiitle_modal_dark text-center mt-3">Crear Empresa</h2>
                    </div>

                    <div class="col-2">
                        <a class="input-group-text span_custom_primary_dark mt-3" data-bs-dismiss="modal" style="margin-right: 0rem!important;">
                            <img class="icon_span_form" src="{{ asset('assets/media/icons/close_white.webp') }}" alt="" >
                        </a>
                    </div>
                </div>

                <div class="row px-3">

                    <div class="form-group text-left col-12 mt-4 p-2">
                       <h6 class="subtittle_clientes">Empresa</h6>
                    </div>

                    <div class="form-group col-12 mb-3 p-2">
                        <label for="name" class="label_custom_primary_product mb-2">Nombre Empresa : *</label>
                        <div class="input-group mb-3">
                            <span class="input-group-text span_custom_tab" >
                                <img class="icon_span_form" src="{{ asset('assets/media/icons/fuente.webp') }}" alt="" >
                            </span>
                            <input name="nombre_empresa"  type="text" class="form-control input_custom_tab_dark @error('nombre_empresa') is-invalid @enderror" value="{{ old('nombre_empresa') }}" autocomplete="" autofocus>
                        </div>
                    </div>

                    <div class="form-group col-6 mb-3 p-2">
                        <label for="name" class="label_custom_primary_product mb-2">Telefono Empresa *</label>
                        <div class="input-group ">
                            <span class="input-group-text span_custom_tab" >
                                <img class="icon_span_form" src="{{ asset('assets/media/icons/telefono.png.webp') }}" alt="" >
                            </span>
                            <input name="telefono_empresa"  type="tel" class="form-control input_custom_tab_dark @error('telefono_empresa') is-invalid @enderror" value="{{ old('telefono_empresa') }}" autocomplete="" autofocus>
                        </div>
                    </div>

                    <div class="form-group col-6 mb-3 p-2">
                        <label for="name" class="label_custom_primary_product mb-2">Correo Empresa </label>
                        <div class="input-group ">
                            <span class="input-group-text span_custom_tab" >
                                <img class="icon_span_form" src="{{ asset('assets/media/icons/sobre.png.webp') }}" alt="" >
                            </span>
                            <input  name="email_empresa" type="text"  class="form-control input_custom_tab_dark @error('email_empresa') is-invalid @enderror"  value="{{ old('email_empresa') }}">
                        </div>
                    </div>

                    <div class="form-group text-left col-12 mt-4 p-2">
                        <h6 class="subtittle_clientes">Usuario</h6>
                     </div>

                     <div class="form-group col-6 mb-3 p-2">
                        <label for="name" class="label_custom_primary_product mb-2">Nombre Usuario : *</label>
                        <div class="input-group mb-3">
                            <span class="input-group-text span_custom_tab" >
                                <img class="icon_span_form" src="{{ asset('assets/media/icons/fuente.webp') }}" alt="" >
                            </span>
                            <input name="nombre_usuario" id="nombre_usuario" type="text" class="form-control input_custom_tab_dark @error('nombre_usuario') is-invalid @enderror" value="{{ old('nombre_usuario') }}" autocomplete="" autofocus>
                        </div>
                    </div>

                    <div class="form-group col-6 mb-3 p-2">
                        <label for="name" class="label_custom_primary_product mb-2">Apellido(s) *</label>
                        <div class="input-group ">
                            <span class="input-group-text span_custom_tab" >
                                <img class="icon_span_form" src="{{ asset('assets/media/icons/fuente.webp') }}" alt="" >
                            </span>
                            <input  name="apellido_usuario" id="apellido_usuario" type="text"  class="form-control input_custom_tab_dark @error('apellido_usuario') is-invalid @enderror"  value="{{ old('apellido_usuario') }}"  autocomplete="" autofocus>
                        </div>
                    </div>

                    <div class="form-group col-6 mb-3 p-2">
                        <label for="name" class="label_custom_primary_product mb-2">Telefono Usuario *</label>
                        <div class="input-group ">
                            <span class="input-group-text span_custom_tab" >
                                <img class="icon_span_form" src="{{ asset('assets/media/icons/telefono.png.webp') }}" alt="" >
                            </span>
                            <input name="telefono_usuario" id="telefono_usuario" type="tel" class="form-control input_custom_tab_dark telefono_usuario @error('telefono_usuario') is-invalid @enderror" value="{{ old('telefono_usuario') }}" autocomplete="" required>
                        </div>
                    </div>

                    <div class="form-group col-6 mb-3 p-2">
                        <label for="name" class="label_custom_primary_product mb-2">Correo Usuario *</label>
                        <div class="input-group ">
                            <span class="input-group-text span_custom_tab" >
                                <img class="icon_span_form" src="{{ asset('assets/media/icons/sobre.png.webp') }}" alt="" >
                            </span>
                            <input  name="email_usuario" type="text"  class="form-control input_custom_tab_dark @error('email_usuario') is-invalid @enderror"  value="{{ old('email_usuario') }}">
                        </div>
                    </div>

                    <div class="form-group col-6 mb-3 p-2">
                        <label for="name" class="label_custom_primary_product mb-2">Contraseña *</label>
                        <div class="input-group ">
                            <span class="input-group-text span_custom_tab" >
                                <img class="icon_span_form" src="{{ asset('assets/media/icons/proteger.png.webp') }}" alt="" >
                            </span>
                            <input id="password" name="password" type="text"  class="form-control input_custom_tab_dark @error('password') is-invalid @enderror"  value="{{ old('password') }}"  autocomplete="" autofocus>
                        </div>
                    </div>

                    <div class="form-group text-left col-12 mt-4 p-2">
                        <h6 class="subtittle_clientes">Licencia</h6>
                     </div>

                    <div class="form-group col-12 mb-3 p-2">
                        <label for="name" class="label_custom_primary_product mb-2">Membrecia : *</label>
                        <div class="input-group mb-3">
                            <span class="input-group-text span_custom_primary_dark" >
                                <img class="icon_span_form" src="{{ asset('assets/media/icons/megafono.webp') }}" alt="" >
                            </span>
                            <select name="membrecia" class="form-select d-inline-block select_custom_primary_dark">
                                <option value="" >Seleccionar opción</option>
                                <option value="Basica" >Basica</option>
                                <option value="Plata" >Plata</option>
                                <option value="Diamante" >Diamante</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group col-3 mb-3 " >
                        <label for="name" class="label_custom_primary_product mb-2">Generar</label>
                        <div class="input-group ">
                            <a id="generar_codigo2" class="input-group-text span_custom_primary_dark" >
                                <img class="icon_span_form" src="{{ asset('assets/media/icons/sincronizando.webp') }}" alt="" >
                            </a>
                        </div>
                    </div>

                    <div class="form-group col-9 mb-3 " >
                        <label for="name" class="label_custom_primary_product mb-2">Licencia : *</label>
                        <div class="input-group ">
                            <span class="input-group-text span_custom_primary_dark" >
                                <img class="icon_span_form" src="{{ asset('assets/media/icons/keys.webp') }}" alt="" >
                            </span>
                            <input id="codigo_licencia2" name="codigo" type="text" class="form-control input_custom_primary_dark" value="{{ old('codigo_licencia2') }}" autocomplete="" autofocus>
                        </div>
                    </div>

                    <div class="form-group col-12 mb-3 p-2">
                        <label for="name" class="label_custom_primary_product mb-2">Estatus : *</label>
                        <div class="input-group mb-3">
                            <span class="input-group-text span_custom_primary_dark" >
                                <img class="icon_span_form" src="{{ asset('assets/media/icons/gear.webp') }}" alt="" >
                            </span>
                            <select name="estatus" class="form-select d-inline-block select_custom_primary_dark">
                                <option value="Activado" >Activado</option>
                                <option value="Desactivado" >Desactivado</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group col-12 mb-3 p-2">
                        <label for="name" class="label_custom_primary_product mb-2">Fecha de caducidad </label>
                        <div class="input-group ">
                            <span class="input-group-text span_custom_tab" >
                                <img class="icon_span_form" src="{{ asset('assets/media/icons/calendario.webp') }}" alt="" >
                            </span>
                            <input name="caducidad"  type="date" class="form-control input_custom_tab_dark telefono_input @error('caducidad') is-invalid @enderror" value="{{ old('caducidad') }}" autocomplete="" autofocus>
                        </div>
                    </div>

                    <div class="form-group col-12 mb-3 p-2">
                        <label for="name" class="label_custom_primary_product mb-2">Comentario :</label>
                        <div class="input-group ">
                            <textarea class="form-control textarea_custom_primary_dark"  name="comentario"></textarea>
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

@section('js_custom2_empleado')

<script>

    $(document).ready(function() {

        $("#miFormularioEmpresas").on("submit", function (event) {

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
                    saveSuccessLicencia(response);

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

        async function saveSuccessLicencia(response) {
            Swal.fire({
                title: "Empresa Creada <strong>¡Exitosamente!</strong>",
                icon: "success",
                showCloseButton: true,
                showCancelButton: true,
                focusConfirm: false,
                confirmButtonText: '<a class="btn_swalater_confirm"  style="text-decoration: none;color: #fff;" href="{{ route('empresas.index') }}" >Ver Empresas</a>',
                cancelButtonText: `<a  class="btn_swalater_cancel" style="text-decoration: none;color: #fff;" href="" >Cerrar</a>`,
            }).then(() => {
                // Recarga la página
            window.location.href = '/';
            });

        }

            // Manejar clic en el botón para generar SKU
            $('#generar_codigo2').click(function() {
                // Definir caracteres permitidos
                var chars = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';

                // Generar un SKU alfanumérico de longitud 6
                var skuAlfanumerico = '';
                for (var i = 0; i < 9; i++) {
                    skuAlfanumerico += chars.charAt(Math.floor(Math.random() * chars.length));
                }

                // Asignar el SKU alfanumérico al input correspondiente
                $('#codigo_licencia2').val(skuAlfanumerico);

                const audio = new Audio("{{ asset('assets/media/audio/sku_notification.mp3')}}");
                audio.play();
            });

        // Función para actualizar la contraseña
        function actualizarContrasena() {
            // Obtener los valores de los campos
            var nombre = $('#nombre_usuario').val().substring(0, 2);
            var apellido = $('#apellido_usuario').val().substring(0, 2);
            var telefono = $('.telefono_usuario').val().slice(-3);

            // Construir la contraseña
            var contrasenaGenerada = nombre + apellido + telefono;

            // Obtener la parte editada por el usuario
            var contrasenaEditada = $('#password').val().slice(contrasenaGenerada.length);

            // Unir las partes generada automáticamente y editada por el usuario
            var contrasenaFinal = contrasenaGenerada + contrasenaEditada;

            // Actualizar el valor del campo de contraseña
            $('#password').val(contrasenaFinal);
        }

        // Evento que se dispara cuando se ingresa algo en los campos de nombre, apellido, y correo electrónico
        $('#nombre_usuario, #apellido_usuario, .telefono_usuario').on('input', function () {
            actualizarContrasena();
        });

        // Evento que se dispara cuando se ingresa algo en el campo de contraseña
        $('#password').on('input', function () {
            actualizarContrasena();
        });
    });

</script>
@endsection
