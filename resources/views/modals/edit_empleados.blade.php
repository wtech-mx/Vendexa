@section('css_custom')


@endsection

<!-- Modal -->
<div class="modal fade" id="editEmpleado{{ $trabajador->id }}" tabindex="-1" aria-labelledby="editEmpleado{{ $trabajador->id }}Label" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">

        <div class="modal-body modal_bg row">

            <form method="POST" action="{{ route('empleados.update', $trabajador->id) }}" class="z-1 miFormularioEmpleadosEdit"  id="" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="_method" value="PATCH">

                <div class="row">
                    <div class="col-10">
                        <h2 class="tiitle_modal_dark text-center mt-3">  {{$trabajador->name}}</h2>
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
                        <label for="name" class="label_custom_primary_product mb-2">Nombre Completo: *</label>
                        <div class="input-group ">
                            <span class="input-group-text span_custom_tab" >
                                <img class="icon_span_form" src="{{ asset('assets/media/icons/fuente.webp') }}" alt="" >
                            </span>
                            <input  name="name" id="name" type="text"  class="form-control input_custom_tab_dark"  value=" {{$trabajador->name}}">
                        </div>
                    </div>

                    <div class="form-group col-6 mb-3 p-2">
                        <label for="name" class="label_custom_primary_product mb-2">Telefono *</label>
                        <div class="input-group ">
                            <span class="input-group-text span_custom_tab" >
                                <img class="icon_span_form" src="{{ asset('assets/media/icons/whatsapp.webp') }}" alt="" >
                            </span>
                            <input  name="telefono" id="number" type="number"  class="form-control input_custom_tab_dark"  value="{{$trabajador->email}}">
                        </div>
                    </div>

                    <div class="form-group col-6 mb-3 p-2">
                        <label for="name" class="label_custom_primary_product mb-2">Correo*</label>
                        <div class="input-group ">
                            <span class="input-group-text span_custom_tab" >
                                <img class="icon_span_form" src="{{ asset('assets/media/icons/sobre.png.webp') }}" alt="" >
                            </span>
                            <input  name="correo" type="email"  class="form-control input_custom_tab_dark "  value="{{$trabajador->correo}}">
                        </div>
                    </div>

                    <div class="form-group col-6 mb-3 p-2">
                        <label for="name" class="label_custom_primary_product mb-2">Contraseña *</label>
                        <div class="input-group ">
                            <span class="input-group-text span_custom_tab" >
                                <img class="icon_span_form" src="{{ asset('assets/media/icons/proteger.png.webp') }}" alt="" >
                            </span>
                            <input id="password" name="password" type="text"  class="form-control input_custom_tab_dark"  value="">
                        </div>
                    </div>

                    <div class="form-group col-6 mb-3 p-2">
                        <label for="name" class="label_custom_primary_product mb-2">Pin de Seguridad *</label>
                        <div class="input-group ">
                            <span class="input-group-text span_custom_tab" >
                                <img class="icon_span_form" src="{{ asset('assets/media/icons/restablecer-la-contrasena.webp') }}" alt="" >
                            </span>
                            <input id="password_caja" name="password_caja" type="number"  class="form-control input_custom_tab_dark"  value="{{$trabajador->password_caja}}">
                        </div>
                    </div>

                    <div class="form-group col-12 mb-3 p-2">
                        <label for="name" class="label_custom_primary_product mb-2">Foto de perfil</label>
                        <div class="input-group ">
                            <span class="input-group-text span_custom_tab" >
                                <img class="icon_span_form" src="{{ asset('assets/media/icons/user_predeterminado.webp') }}" alt="" >
                            </span>
                            <input  name="foto" type="file"  class="form-control input_custom_tab_dark"  value="">
                        </div>
                    </div>

                    <div class="form-group text-left col-12 mt-4 p-2">
                        <h6 class="subtittle_clientes">Permisos</h6>
                     </div>

                    <div class="form-group text-left col-12 mt-4 p-2">
                        <h6 class="subtittle_clientes">Dirección</h6>
                     </div>

                     <div class="form-group col-6 mb-3 p-2">
                        <label for="name" class="label_custom_primary_product mb-2">Codigo Postal</label>
                        <div class="input-group ">
                            <span class="input-group-text span_custom_tab" >
                                <img class="icon_span_form" src="{{ asset('assets/media/icons/cero.webp') }}" alt="" >
                            </span>
                            <input  name="codigo_postal" type="number"  class="form-control input_custom_tab_dark"  value="{{ $trabajador->Direcion->codigo_postal }}">
                        </div>
                    </div>

                    <div class="form-group col-6 mb-3 p-2">
                        <label for="name" class="label_custom_primary_product mb-2">Estado</label>
                        <div class="input-group ">
                            <span class="input-group-text span_custom_tab" >
                                <img class="icon_span_form" src="{{ asset('assets/media/icons/independencia.webp') }}" alt="" >
                            </span>
                            <input  name="estado" type="text"  class="form-control input_custom_tab_dark "  value="{{ $trabajador->Direcion->estado }}">
                        </div>
                    </div>

                    <div class="form-group col-6 mb-3 p-2">
                        <label for="name" class="label_custom_primary_product mb-2">Alcaldia  / Municipio</label>
                        <div class="input-group ">
                            <span class="input-group-text span_custom_tab" >
                                <img class="icon_span_form" src="{{ asset('assets/media/icons/alcaldia.webp') }}" alt="" >
                            </span>
                            <input  name="alcaldia" type="text"  class="form-control input_custom_tab_dark "  value="{{ $trabajador->Direcion->alcaldia }}">
                        </div>
                    </div>

                    <div class="form-group col-6 mb-3 p-2">
                        <label for="name" class="label_custom_primary_product mb-2">Ciudad</label>
                        <div class="input-group ">
                            <span class="input-group-text span_custom_tab" >
                                <img class="icon_span_form" src="{{ asset('assets/media/icons/edificios_ciudad.webp') }}" alt="" >
                            </span>
                            <input  name="ciudad" type="text"  class="form-control input_custom_tab_dark "  value="{{ $trabajador->Direcion->estado }}">
                        </div>
                    </div>

                    <div class="form-group col-6 mb-3 p-2">
                        <label for="name" class="label_custom_primary_product mb-2">Colonia</label>
                        <div class="input-group ">
                            <span class="input-group-text span_custom_tab" >
                                <img class="icon_span_form" src="{{ asset('assets/media/icons/poste_luz.webp') }}" alt="" >
                            </span>
                            <input  name="colonia" type="text"  class="form-control input_custom_tab_dark "  value="{{ $trabajador->Direcion->colonia }}">
                        </div>
                    </div>

                    <div class="form-group col-6 mb-3 p-2">
                        <label for="name" class="label_custom_primary_product mb-2">Calle y Numero</label>
                        <div class="input-group ">
                            <span class="input-group-text span_custom_tab" >
                                <img class="icon_span_form" src="{{ asset('assets/media/icons/mapa-de-la-ciudad.webp') }}" alt="" >
                            </span>
                            <input  name="calle_numero" type="text"  class="form-control input_custom_tab_dark"  value="{{ $trabajador->Direcion->calle_numero }}">
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

  @section('js_custom')

  <script type="text/javascript">

    $(document).ready(function() {

        $(".miFormularioEmpleadosEdit").on("submit", function (event) {

            event.preventDefault();
            var formID = $(this).attr("id");

            $.ajax({
                url: $(this).attr("action"),
                type: "POST",
                data: new FormData(this),
                contentType: false,
                processData: false,
                success: async function(response) {
                    saveSuccessEditEmpleado(response);
                },
                error: function (xhr, status, error) {
                    // Manejo de errores
                }
            });

        });

        async function saveSuccessEditEmpleado(response) {
            const user_data = response.user_data;

            Swal.fire({
                title: "Empleado Actualizado <strong>¡Exitosamente!</strong>",
                icon: "success",
                html: "<div class='row'><div class='col-12 mt-3'><img class='icon_span_tab' src='{{ asset('assets/media/icons/fuente.webp') }}' ><p><strong>Nombre:</strong> <br>"+ user_data.name +"</p></div>",
                showCloseButton: true,
                showCancelButton: false,
                focusConfirm: false,
                confirmButtonText: '<a class="btn_swalater_confirm"  style="text-decoration: none;color: #fff;" href="#" >Cerrar</a>',
                }).then(() => {
                    // Cierra todos los modales abiertos
                    $('.modal').modal('hide');
                });
        }
    });

  </script>

@endsection
