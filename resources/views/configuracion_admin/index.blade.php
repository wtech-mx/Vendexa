@extends('layouts.app')

@section('template_title')
    Ajustes
@endsection

@section('css_custom')

    <link rel="stylesheet" href="{{ asset('assets/css/products.css') }}">
    <style>
        .modal-backdrop.show {
            opacity: 0 !important;
        }
        .modal-backdrop {
            --bs-backdrop-zindex: 0 !important;
            z-index: 0 !important;
        }
    </style>

@endsection

@section('content')

<section class="products bg_product ">

    <div class="row z-1 position-relative">

        <div class="col-12">
            <div class="d-flex justify-content-center ">
                <h5 class="tittle_dash text-center mt-2 mb-3 animation_card_header">
                    Ajustes
                </h5>
            </div>
        </div>

        <div class="row mb-5" style="margin: 0 10px 0 0px;">

            <div class="col-12 section_tab_bg">

                <div class="tab-content" id="pills-tabContent">
                    <form method="POST" action="{{ route('configuracion_admin.update', $configuracion->id) }}" enctype="multipart/form-data" class="z-1 px-4 dropzone" id="update_js_update_img_portada">
                        @csrf
                        <input type="hidden" name="_method" value="PATCH">
                        <div class="row">
                            <div class="form-group text-left col-12 mt-4 p-2">
                                <h6 class="subtittle_clientes">Portadas del mes</h6>
                                </div>

                            <div class="form-group col-6 col-xs-6 col-sm-6 col-md-6 col-xl-3 px-4 py-3">
                                <label for="name" class="label_custom_primary_sm mb-2">Enero: *</label>
                                <div class="input-group ">
                                    <span class="input-group-text span_custom_tab" >
                                        <img class="icon_span_tab" src="{{ asset('assets/media/icons/imagen.webp') }}" alt="" >
                                    </span>
                                    <input id="img_enero" name="img_enero" type="file"  class="form-control input_custom_tab @error('img_enero') is-invalid @enderror"  value="{{ $configuracion->img_enero }}"  autocomplete="" autofocus>
                                </div>
                            </div>

                            <div class="form-group col-6 col-xs-6 col-sm-6 col-md-6 col-xl-3 px-4 py-3">
                                <label for="name" class="label_custom_primary_sm mb-2">Febrero: *</label>
                                <div class="input-group ">
                                    <span class="input-group-text span_custom_tab" >
                                        <img class="icon_span_tab" src="{{ asset('assets/media/icons/imagen.webp') }}" alt="" >
                                    </span>
                                    <input id="img_febrero" name="img_febrero" type="file"  class="form-control input_custom_tab @error('img_febrero') is-invalid @enderror"  value="{{ $configuracion->img_febrero }}"  autocomplete="" autofocus>
                                </div>
                            </div>

                            <div class="form-group col-6 col-xs-6 col-sm-6 col-md-6 col-xl-3 px-4 py-3">
                                <label for="name" class="label_custom_primary_sm mb-2">Marzo: *</label>
                                <div class="input-group ">
                                    <span class="input-group-text span_custom_tab" >
                                        <img class="icon_span_tab" src="{{ asset('assets/media/icons/imagen.webp') }}" alt="" >
                                    </span>
                                    <input id="img_marzo" name="img_marzo" type="file"  class="form-control input_custom_tab @error('img_marzo') is-invalid @enderror"  value="{{ $configuracion->img_marzo }}"  autocomplete="" autofocus>
                                </div>
                            </div>

                            <div class="form-group col-6 col-xs-6 col-sm-6 col-md-6 col-xl-3 px-4 py-3">
                                <label for="name" class="label_custom_primary_sm mb-2">Abril: *</label>
                                <div class="input-group ">
                                    <span class="input-group-text span_custom_tab" >
                                        <img class="icon_span_tab" src="{{ asset('assets/media/icons/imagen.webp') }}" alt="" >
                                    </span>
                                    <input id="img_abril" name="img_abril" type="file"  class="form-control input_custom_tab @error('img_abril') is-invalid @enderror"  value="{{ $configuracion->img_abril }}"  autocomplete="" autofocus>
                                </div>
                            </div>

                            <div class="form-group col-3 px-5 py-3">
                                <p class="text-center mb-0">
                                    <img class="" src="{{ asset('assets/media/img/login/'.$configuracion->img_enero) }}" style="width: 200px;">
                                </p>
                            </div>

                            <div class="form-group col-3 px-5 py-3">
                                <p class="text-center mb-0">
                                    <img class="" src="{{ asset('assets/media/img/login/'.$configuracion->img_febrero) }}" style="width: 200px;">
                                </p>
                            </div>

                            <div class="form-group col-3 px-5 py-3">
                                <p class="text-center mb-0">
                                    <img class="" src="{{ asset('assets/media/img/login/'.$configuracion->img_marzo) }}" style="width: 200px;">
                                </p>
                            </div>

                            <div class="form-group col-3 px-5 py-3">
                                <p class="text-center mb-0">
                                    <img class="" src="{{ asset('assets/media/img/login/'.$configuracion->img_abril) }}" style="width: 200px;">
                                </p>
                            </div>

                            <div class="form-group col-6 col-xs-6 col-sm-6 col-md-6 col-xl-3 px-4 py-3">
                                <label for="name" class="label_custom_primary_sm mb-2">Mayo: *</label>
                                <div class="input-group ">
                                    <span class="input-group-text span_custom_tab" >
                                        <img class="icon_span_tab" src="{{ asset('assets/media/icons/imagen.webp') }}" alt="" >
                                    </span>
                                    <input id="img_mayo" name="img_mayo" type="file"  class="form-control input_custom_tab @error('img_mayo') is-invalid @enderror"  value="{{ $configuracion->img_mayo }}"  autocomplete="" autofocus>
                                </div>
                            </div>

                            <div class="form-group col-6 col-xs-6 col-sm-6 col-md-6 col-xl-3 px-4 py-3">
                                <label for="name" class="label_custom_primary_sm mb-2">Junio: *</label>
                                <div class="input-group ">
                                    <span class="input-group-text span_custom_tab" >
                                        <img class="icon_span_tab" src="{{ asset('assets/media/icons/imagen.webp') }}" alt="" >
                                    </span>
                                    <input id="img_junio" name="img_junio" type="file"  class="form-control input_custom_tab @error('img_junio') is-invalid @enderror"  value="{{ $configuracion->img_junio }}"  autocomplete="" autofocus>
                                </div>
                            </div>

                            <div class="form-group col-6 col-xs-6 col-sm-6 col-md-6 col-xl-3 px-4 py-3">
                                <label for="name" class="label_custom_primary_sm mb-2">Julio: *</label>
                                <div class="input-group ">
                                    <span class="input-group-text span_custom_tab" >
                                        <img class="icon_span_tab" src="{{ asset('assets/media/icons/imagen.webp') }}" alt="" >
                                    </span>
                                    <input id="img_julio" name="img_julio" type="file"  class="form-control input_custom_tab @error('img_julio') is-invalid @enderror"  value="{{ $configuracion->img_julio }}"  autocomplete="" autofocus>
                                </div>
                            </div>

                            <div class="form-group col-6 col-xs-6 col-sm-6 col-md-6 col-xl-3 px-4 py-3">
                                <label for="name" class="label_custom_primary_sm mb-2">Agosto: *</label>
                                <div class="input-group ">
                                    <span class="input-group-text span_custom_tab" >
                                        <img class="icon_span_tab" src="{{ asset('assets/media/icons/imagen.webp') }}" alt="" >
                                    </span>
                                    <input id="img_agosto" name="img_agosto" type="file"  class="form-control input_custom_tab @error('img_agosto') is-invalid @enderror"  value="{{ $configuracion->img_agosto }}"  autocomplete="" autofocus>
                                </div>
                            </div>

                            <div class="form-group col-3 px-5 py-3">
                                <p class="text-center mb-0">
                                    <img class="" src="{{ asset('assets/media/img/login/'.$configuracion->img_mayo) }}" style="width: 200px;">
                                </p>
                            </div>

                            <div class="form-group col-3 px-5 py-3">
                                <p class="text-center mb-0">
                                    <img class="" src="{{ asset('assets/media/img/login/'.$configuracion->img_junio) }}" style="width: 200px;">
                                </p>
                            </div>

                            <div class="form-group col-3 px-5 py-3">
                                <p class="text-center mb-0">
                                    <img class="" src="{{ asset('assets/media/img/login/'.$configuracion->img_julio) }}" style="width: 200px;">
                                </p>
                            </div>

                            <div class="form-group col-3 px-5 py-3">
                                <p class="text-center mb-0">
                                    <img class="" src="{{ asset('assets/media/img/login/'.$configuracion->img_agosto) }}" style="width: 200px;">
                                </p>
                            </div>

                            <div class="form-group col-6 col-xs-6 col-sm-6 col-md-6 col-xl-3 px-4 py-3">
                                <label for="name" class="label_custom_primary_sm mb-2">Septiembre: *</label>
                                <div class="input-group ">
                                    <span class="input-group-text span_custom_tab" >
                                        <img class="icon_span_tab" src="{{ asset('assets/media/icons/imagen.webp') }}" alt="" >
                                    </span>
                                    <input id="img_septiembre" name="img_septiembre" type="file"  class="form-control input_custom_tab @error('img_septiembre') is-invalid @enderror"  value="{{ $configuracion->img_septiembre }}"  autocomplete="" autofocus>
                                </div>
                            </div>

                            <div class="form-group col-6 col-xs-6 col-sm-6 col-md-6 col-xl-3 px-4 py-3">
                                <label for="name" class="label_custom_primary_sm mb-2">Octubre: *</label>
                                <div class="input-group ">
                                    <span class="input-group-text span_custom_tab" >
                                        <img class="icon_span_tab" src="{{ asset('assets/media/icons/imagen.webp') }}" alt="" >
                                    </span>
                                    <input id="img_octubre" name="img_octubre" type="file"  class="form-control input_custom_tab @error('img_octubre') is-invalid @enderror"  value="{{ $configuracion->img_octubre }}"  autocomplete="" autofocus>
                                </div>
                            </div>

                            <div class="form-group col-6 col-xs-6 col-sm-6 col-md-6 col-xl-3 px-4 py-3">
                                <label for="name" class="label_custom_primary_sm mb-2">Noviembre: *</label>
                                <div class="input-group ">
                                    <span class="input-group-text span_custom_tab" >
                                        <img class="icon_span_tab" src="{{ asset('assets/media/icons/imagen.webp') }}" alt="" >
                                    </span>
                                    <input id="img_noviembre" name="img_noviembre" type="file"  class="form-control input_custom_tab @error('img_noviembre') is-invalid @enderror"  value="{{ $configuracion->img_noviembre }}"  autocomplete="" autofocus>
                                </div>
                            </div>

                            <div class="form-group col-6 col-xs-6 col-sm-6 col-md-6 col-xl-3 px-4 py-3">
                                <label for="name" class="label_custom_primary_sm mb-2">Diciembre: *</label>
                                <div class="input-group ">
                                    <span class="input-group-text span_custom_tab" >
                                        <img class="icon_span_tab" src="{{ asset('assets/media/icons/imagen.webp') }}" alt="" >
                                    </span>
                                    <input id="img_diciembre" name="img_diciembre" type="file"  class="form-control input_custom_tab @error('img_diciembre') is-invalid @enderror"  value="{{ $configuracion->img_diciembre }}"  autocomplete="" autofocus>
                                </div>
                            </div>

                            <div class="form-group col-3 px-5 py-3">
                                <p class="text-center mb-0">
                                    <img class="" src="{{ asset('assets/media/img/login/'.$configuracion->img_septiembre) }}" style="width: 200px;">
                                </p>
                            </div>

                            <div class="form-group col-3 px-5 py-3">
                                <p class="text-center mb-0">
                                    <img class="" src="{{ asset('assets/media/img/login/'.$configuracion->img_octubre) }}" style="width: 200px;">
                                </p>
                            </div>

                            <div class="form-group col-3 px-5 py-3">
                                <p class="text-center mb-0">
                                    <img class="" src="{{ asset('assets/media/img/login/'.$configuracion->img_noviembre) }}" style="width: 200px;">
                                </p>
                            </div>

                            <div class="form-group col-3 px-5 py-3">
                                <p class="text-center mb-0">
                                    <img class="" src="{{ asset('assets/media/img/login/'.$configuracion->img_diciembre) }}" style="width: 200px;">
                                </p>
                            </div>
                            <div class="form-group col-12 mt-4 mb-4 ">
                                <p class="text-center ">
                                    <button type="submit" id="guardarEmpresa" class="btn btn-success btn_save_custom">Guardar</button>
                                </p>
                            </div>

                        </div>
                    </form>
                </div>

            </div>

        </div>


    </div>

</section>

@endsection

@section('js_update_img_portada')

<script>
    $(document).ready(function() {

        $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $("#update_js_update_img_portada").on("submit", function (event) {

            event.preventDefault();
            var formID = $(this).attr("id");

            $.ajax({
                url: $(this).attr("action"),
                type: "POST",
                data: new FormData(this),
                contentType: false,
                processData: false,
                success: async function(response) {
                    UpdateimgPortada(response);
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

        async function UpdateimgPortada(response) {
        Swal.fire({
            title: "Configuracio Actualizado <br><strong>¡Exitosamente!</strong>",
            icon: "success",
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
