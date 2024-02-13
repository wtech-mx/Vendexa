<!-- Modal -->
<div class="modal fade" id="editLiceincia_{{ $item->id }}" tabindex="-1" aria-labelledby="editLiceincia_{{ $item->id }}Label" aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">

        <div class="modal-body modal_bg row">

            <form method="POST" action="{{ route('licencias.update', $licencia->id) }}" class="z-1"  id="miFormularioLicenciasEdit" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="_method" value="PATCH">

                <div class="row">
                    <div class="col-10">
                        <h2 class="tiitle_modal_dark text-center mt-3">Ver Licencia</h2>
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
                        <label for="name" class="label_custom_primary_product mb-2">Empresa : *</label>
                        <div class="input-group mb-3">
                            <span class="input-group-text span_custom_primary_dark" >
                                <img class="icon_span_form" src="{{ asset('assets/media/icons/tienda.png.webp') }}" alt="" >
                            </span>
                            <select name="id_empresa" class="form-select d-inline-block select_custom_primary_dark">
                                <option value="" >{{ $item->nombre }} </option>
                                @foreach ($empresas as $empresa)
                                    <option value="{{ $empresa->id }}" >{{ $empresa->nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group col-12 mb-3 p-2">
                        <label for="name" class="label_custom_primary_product mb-2">Vendedor</label>
                        <div class="input-group ">
                            <span class="input-group-text span_custom_tab" >
                                <img class="icon_span_form" src="{{ asset('assets/media/icons/empleados.webp') }}" alt="" >
                            </span>
                            <input name="vendedor"  type="text" class="form-control input_custom_tab_dark telefono_input" value="{{ $licencia->vendedor }}" autocomplete="" autofocus>
                        </div>
                    </div>

                    <div class="form-group col-12 mb-3 p-2">
                        <label for="name" class="label_custom_primary_product mb-2">Membrecia : *</label>
                        <div class="input-group mb-3">
                            <span class="input-group-text span_custom_primary_dark" >
                                <img class="icon_span_form" src="{{ asset('assets/media/icons/megafono.webp') }}" alt="" >
                            </span>
                            <select name="membrecia" class="form-select d-inline-block select_custom_primary_dark">
                                <option value="" >{{ $licencia->membrecia }}</option>
                                <option value="Basica" >Basica</option>
                                <option value="Plata" >Plata</option>
                                <option value="Diamante" >Diamante</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group col-3 mb-3 " >
                        <label for="name" class="label_custom_primary_product mb-2">Generar</label>
                        <div class="input-group ">
                            <a id="generar_codigo" class="input-group-text span_custom_primary_dark" >
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
                            <input id="codigo_licencia" name="codigo" type="text" class="form-control input_custom_primary_dark" value="{{ $licencia->codigo }}" autocomplete="" autofocus>
                        </div>
                    </div>

                    <div class="form-group col-12 mb-3 p-2">
                        <label for="name" class="label_custom_primary_product mb-2">Codigo : *</label>
                        <div class="input-group mb-3">
                            <span class="input-group-text span_custom_primary_dark" >
                                <img class="icon_span_form" src="{{ asset('assets/media/icons/gear.webp') }}" alt="" >
                            </span>
                            <input id="code" name="code" type="text" class="form-control input_custom_primary_dark" value="{{ $item->code }}">
                        </div>
                    </div>

                    <div class="form-group col-12 mb-3 p-2">
                        <label for="name" class="label_custom_primary_product mb-2">Estatus : *</label>
                        <div class="input-group mb-3">
                            <span class="input-group-text span_custom_primary_dark" >
                                <img class="icon_span_form" src="{{ asset('assets/media/icons/gear.webp') }}" alt="" >
                            </span>
                            <select name="estatus" class="form-select d-inline-block select_custom_primary_dark">
                                <option value="" >{{ $licencia->estatus }}</option>
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
                            <input name="caducidad"  type="date" class="form-control input_custom_tab_dark telefono_input" value="{{ $licencia->caducidad }}" autocomplete="" autofocus>
                        </div>
                    </div>

                    <div class="form-group col-12 mb-3 p-2">
                        <label for="name" class="label_custom_primary_product mb-2">Comentario :</label>
                        <div class="input-group ">
                            <textarea class="form-control textarea_custom_primary_dark"  name="comentario">{{ $licencia->comentario }}</textarea>
                        </div>
                    </div>

                    <div class="form-group col-12 mt-4 mb-4 ">
                        <p class="text-center ">
                            <button type="submit" class="btn btn-success btn_save_custom">Actualizar</button>
                        </p>
                    </div>

                </div>
            </form>

        </div>

      </div>
    </div>
  </div>

  @section('js_custom_licencias')

  <script>

  $(document).ready(function() {


      // Manejar clic en el botón para generar SKU
      $('#generar_codigo').click(function() {
          // Definir caracteres permitidos
          var chars = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';

          // Generar un SKU alfanumérico de longitud 6
          var skuAlfanumerico = '';
          for (var i = 0; i < 9; i++) {
              skuAlfanumerico += chars.charAt(Math.floor(Math.random() * chars.length));
          }

          // Asignar el SKU alfanumérico al input correspondiente
          $('#codigo_licencia').val(skuAlfanumerico);

          const audio = new Audio("{{ asset('assets/media/audio/sku_notification.mp3')}}");
          audio.play();
      });

      $("#miFormularioLicenciasEdit").on("submit", function (event) {

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
                          saveSuccessLicenciaEdit(response);

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

      async function saveSuccessLicenciaEdit(response) {

          Swal.fire({
                  title: "Licencia Creada <strong>¡Exitosamente!</strong>",
                  icon: "success",
                  showCloseButton: true,
                  showCancelButton: true,
                  focusConfirm: false,
                  confirmButtonText: '<a class="btn_swalater_confirm"  style="text-decoration: none;color: #fff;" href="{{ route('empresas.index') }}" >Ver Licencias</a>',
                  cancelButtonText: `<a  class="btn_swalater_cancel" style="text-decoration: none;color: #fff;" href="" >Cerrar</a>`,
              }).then(() => {
                  // Recarga la página
              window.location.href = '/';
              });

      }

  });

  </script>
  @endsection
