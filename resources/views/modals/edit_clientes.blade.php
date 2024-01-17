@section('css_custom')


@endsection

<!-- Modal -->
<div class="modal fade" id="editCliente{{ $item->id }}" tabindex="-1" aria-labelledby="editCliente{{ $item->id }}Label" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">

        <div class="modal-body modal_bg row">


            <form method="POST" action="{{ route('clientes.update', $item->id) }}" class="z-1 miFormularioClientesEdit"  id="" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="_method" value="PATCH">

                <div class="row">
                    <div class="col-10">
                        <h2 class="tiitle_modal_dark text-center mt-3">  {{$item->nombre}}</h2>
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
                            <input  name="nombre" id="nombre" type="text"  class="form-control input_custom_tab_dark"  value=" {{$item->nombre}}">
                        </div>
                    </div>

                    <div class="form-group col-6 mb-3 p-2">
                        <label for="name" class="label_custom_primary_product mb-2">Telefono *</label>
                        <div class="input-group ">
                            <span class="input-group-text span_custom_tab" >
                                <img class="icon_span_form" src="{{ asset('assets/media/icons/whatsapp.webp') }}" alt="" >
                            </span>
                            <input id="telefono" name="telefono" type="tel" minlength="10" maxlength="10" class="form-control input_custom_tab_dark" value="{{$item->telefono}}" >
                        </div>
                    </div>

                    <div class="form-group col-6 mb-3 p-2">
                        <label for="name" class="label_custom_primary_product mb-2">Correo*</label>
                        <div class="input-group ">
                            <span class="input-group-text span_custom_tab" >
                                <img class="icon_span_form" src="{{ asset('assets/media/icons/sobre.png.webp') }}" alt="" >
                            </span>
                            <input  name="correo" type="email"  class="form-control input_custom_tab_dark "  value="{{$item->correo}}">
                        </div>
                    </div>


                    <div class="form-group col-12 mb-3 p-2">
                        <label for="name" class="label_custom_primary_product mb-2">Dado de alta por</label>
                        <div class="input-group ">
                            <span class="input-group-text span_custom_tab" >
                                <img class="icon_span_form" src="{{ asset('assets/media/icons/restablecer-la-contrasena.webp') }}" alt="" >
                            </span>
                            <input id="" name="" type="text"  class="form-control input_custom_tab_dark"  value="{{$item->User->name}}" disabled>
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

                     @if($item->id_direccion == NULL)

                     <div class="form-group col-6 mb-3 p-2">
                        <label for="name" class="label_custom_primary_product mb-2">Codigo Postal</label>
                        <div class="input-group ">
                            <span class="input-group-text span_custom_tab" >
                                <img class="icon_span_form" src="{{ asset('assets/media/icons/cero.webp') }}" alt="" >
                            </span>
                            <input  name="codigo_postal" type="number"  class="form-control input_custom_tab_dark"  value="">
                        </div>
                    </div>

                    <div class="form-group col-6 mb-3 p-2">
                        <label for="name" class="label_custom_primary_product mb-2">Estado</label>
                        <div class="input-group ">
                            <span class="input-group-text span_custom_tab" >
                                <img class="icon_span_form" src="{{ asset('assets/media/icons/independencia.webp') }}" alt="" >
                            </span>
                            <input  name="estado" type="text"  class="form-control input_custom_tab_dark "  value="">
                        </div>
                    </div>

                    <div class="form-group col-6 mb-3 p-2">
                        <label for="name" class="label_custom_primary_product mb-2">Alcaldia  / Municipio</label>
                        <div class="input-group ">
                            <span class="input-group-text span_custom_tab" >
                                <img class="icon_span_form" src="{{ asset('assets/media/icons/alcaldia.webp') }}" alt="" >
                            </span>
                            <input  name="alcaldia" type="text"  class="form-control input_custom_tab_dark " >
                        </div>
                    </div>

                    <div class="form-group col-6 mb-3 p-2">
                        <label for="name" class="label_custom_primary_product mb-2">Ciudad</label>
                        <div class="input-group ">
                            <span class="input-group-text span_custom_tab" >
                                <img class="icon_span_form" src="{{ asset('assets/media/icons/edificios_ciudad.webp') }}" alt="" >
                            </span>
                            <input  name="ciudad" type="text"  class="form-control input_custom_tab_dark ">
                        </div>
                    </div>

                    <div class="form-group col-6 mb-3 p-2">
                        <label for="name" class="label_custom_primary_product mb-2">Colonia</label>
                        <div class="input-group ">
                            <span class="input-group-text span_custom_tab" >
                                <img class="icon_span_form" src="{{ asset('assets/media/icons/poste_luz.webp') }}" alt="" >
                            </span>
                            <input  name="colonia" type="text"  class="form-control input_custom_tab_dark " >
                        </div>
                    </div>

                    <div class="form-group col-6 mb-3 p-2">
                        <label for="name" class="label_custom_primary_product mb-2">Calle y Numero</label>
                        <div class="input-group ">
                            <span class="input-group-text span_custom_tab" >
                                <img class="icon_span_form" src="{{ asset('assets/media/icons/mapa-de-la-ciudad.webp') }}" alt="" >
                            </span>
                            <input  name="calle_numero" type="text"  class="form-control input_custom_tab_dark" >
                        </div>
                    </div>

                     @else

                        <div class="form-group col-6 mb-3 p-2">
                            <label for="name" class="label_custom_primary_product mb-2">Codigo Postal</label>
                            <div class="input-group ">
                                <span class="input-group-text span_custom_tab" >
                                    <img class="icon_span_form" src="{{ asset('assets/media/icons/cero.webp') }}" alt="" >
                                </span>
                                <input  name="codigo_postal" type="number"  class="form-control input_custom_tab_dark"  value="{{$item->Direcion->codigo_postal}}">
                            </div>
                        </div>

                        <div class="form-group col-6 mb-3 p-2">
                            <label for="name" class="label_custom_primary_product mb-2">Estado</label>
                            <div class="input-group ">
                                <span class="input-group-text span_custom_tab" >
                                    <img class="icon_span_form" src="{{ asset('assets/media/icons/independencia.webp') }}" alt="" >
                                </span>
                                <input  name="estado" type="text"  class="form-control input_custom_tab_dark "  value="{{$item->Direcion->estado}}">
                            </div>
                        </div>

                        <div class="form-group col-6 mb-3 p-2">
                            <label for="name" class="label_custom_primary_product mb-2">Alcaldia  / Municipio</label>
                            <div class="input-group ">
                                <span class="input-group-text span_custom_tab" >
                                    <img class="icon_span_form" src="{{ asset('assets/media/icons/alcaldia.webp') }}" alt="" >
                                </span>
                                <input  name="alcaldia" type="text"  class="form-control input_custom_tab_dark "  value="{{$item->Direcion->alcaldia}}">
                            </div>
                        </div>

                        <div class="form-group col-6 mb-3 p-2">
                            <label for="name" class="label_custom_primary_product mb-2">Ciudad</label>
                            <div class="input-group ">
                                <span class="input-group-text span_custom_tab" >
                                    <img class="icon_span_form" src="{{ asset('assets/media/icons/edificios_ciudad.webp') }}" alt="" >
                                </span>
                                <input  name="ciudad" type="text"  class="form-control input_custom_tab_dark "  value="">
                            </div>
                        </div>

                        <div class="form-group col-6 mb-3 p-2">
                            <label for="name" class="label_custom_primary_product mb-2">Colonia</label>
                            <div class="input-group ">
                                <span class="input-group-text span_custom_tab" >
                                    <img class="icon_span_form" src="{{ asset('assets/media/icons/poste_luz.webp') }}" alt="" >
                                </span>
                                <input  name="colonia" type="text"  class="form-control input_custom_tab_dark "  value="{{$item->Direcion->colonia}}">
                            </div>
                        </div>

                        <div class="form-group col-6 mb-3 p-2">
                            <label for="name" class="label_custom_primary_product mb-2">Calle y Numero</label>
                            <div class="input-group ">
                                <span class="input-group-text span_custom_tab" >
                                    <img class="icon_span_form" src="{{ asset('assets/media/icons/mapa-de-la-ciudad.webp') }}" alt="" >
                                </span>
                                <input  name="calle_numero" type="text"  class="form-control input_custom_tab_dark"  value="{{$item->Direcion->calle_numero}}">
                            </div>
                        </div>

                     @endif



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

        $(".miFormularioClientesEdit").on("submit", function (event) {

            event.preventDefault();
            var formID = $(this).attr("id");

            $.ajax({
                url: $(this).attr("action"),
                type: "POST",
                data: new FormData(this),
                contentType: false,
                processData: false,
                success: async function(response) {
                    saveSuccessEditClient(response);
                },
                error: function (xhr, status, error) {
                    // Manejo de errores
                }
            });

        });

        async function saveSuccessEditClient(response) {
            const cliente_data = response.cliente_data;

            Swal.fire({
                title: "Cliente Actualizado <strong>¡Exitosamente!</strong>",
                icon: "success",
                html: "<div class='row'><div class='col-6 mt-3'><img class='icon_span_tab' src='{{ asset('assets/media/icons/fuente.webp') }}' ><p><strong>Nombre:</strong> <br>"+ cliente_data.nombre +"</p></div><div class='col-6 mt-3'><img class='icon_span_tab' src='{{ asset('assets/media/icons/en-stock.png.webp') }}' ><p><strong>Correo:</strong><br>"+ cliente_data.correo +" </p> </div><div class='col-6'><img class='icon_span_tab' src='{{ asset('assets/media/icons/monedas.webp') }}' ><p><strong>Telefono:</strong><br> "+ cliente_data.telefono +"</p></div></div>",
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
