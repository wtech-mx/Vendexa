@extends('layouts.app')

@section('content')

<section class="dashboard bg_dash row">

    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-6 my-auto">

        <div class="border_card_header ">

            <div class="d-flex justify-content-center ">
                <h5 class="tittle_dash text-center mt-2 mb-3 animation_card_header">
                    ¡BIENVENIDO!
                </h5>
            </div>

            <div class="d-flex justify-content-center ">
                <h6 class="ingresos_dash text-center mt-2 mb-3 animation_card_header">
                    Ingresos : ${{number_format($sumaIngresos, 2, '.', ',')}}
                </h6>
            </div>


            <div class="d-flex justify-content-center ">
                <a href="{{ route('tarjeta_digital.index', $user->Empresa->code) }}" class="ingresos_dash text-center mt-2 mb-3 animation_card_header" target="_black">
                    <img src="{{ asset('assets/media/icons/compartir.webp') }}" alt="" style="width:30px;">
                    Tarjeta de presentacion.
                </a>
            </div>

            <div class="d-flex justify-content-center ">
                <p class="text-center mt-2 mb-3 subtiitle_dash animation_card_header">
                    Ordenes<br># {{$conteoCompras}}
                </p>
                <p class="text-center mt-2 mb-3 subtiitle_dash animation_card_header">
                    Cotizaciones<br># {{$conteoCotizaciones}}
                </p>
            </div>

            <div class="row">
                @if ($configuracion->tarjeta == 1)
                    <div class="col-3 d-flex justify-content-center animation_card_header">
                        <div class="card_header_dash mb-3">
                            <p class="text-center mt-3">
                                <img src="{{ asset('assets/media/icons/t debito.webp') }}" alt="" class="img_card_head_dash">
                            </p>
                            <p class="text_minicards text-center">Tarjeta <br> <strong> ${{number_format($sumaTarjeta, 2, '.', ',')}} </strong>

                            </p>
                        </div>
                    </div>
                @endif
                @if ($configuracion->efectivo == 1)
                    <div class="col-3 d-flex justify-content-center animation_card_header">
                        <div class="card_header_dash mb-3">
                            <p class="text-center mt-3">
                                <img src="{{ asset('assets/media/icons/efectivo.webp') }}" alt="" class="img_card_head_dash">
                            </p>
                            <p class="text_minicards text-center">Efectivo <br> <strong> ${{number_format($sumaEfectivo, 2, '.', ',')}} </strong>

                            </p>
                        </div>
                    </div>
                @endif
                @if ($configuracion->transferencia == 1)
                    <div class="col-3 d-flex justify-content-center animation_card_header">
                        <div class="card_header_dash mb-3">
                            <p class="text-center mt-3">
                                <img src="{{ asset('assets/media/icons/pago-movil.webp') }}" alt="" class="img_card_head_dash">
                            </p>
                            <p class="text_minicards text-center">Transferencias <br> <strong> ${{number_format($sumaTransferencia, 2, '.', ',')}} </strong>

                            </p>
                        </div>
                    </div>
                @endif
                @if ($configuracion->mercado_pago == 1)
                    <div class="col-3 d-flex justify-content-center animation_card_header">
                        <div class="card_header_dash mb-3">
                            <p class="text-center mt-3">
                                <img src="{{ asset('assets/media/icons/t credito.png.webp') }}" alt="" class="img_card_head_dash">
                            </p>
                            <p class="text_minicards text-center">Mercado Pago <br> <strong> ${{number_format($sumaMercadoPago, 2, '.', ',')}} </strong>

                            </p>
                        </div>
                    </div>
                @endif
            </div>

        </div>

    </div>

    {{-- Cards del menu de opciones --}}

    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-6 my-auto">

        <div class="section cards_dash row">

            <div class="col-6 col-xs-6 col-sm-6 col-md-6-col-xl-4 mb-3 d-flex justify-content-center animation_card">

                <div class="card_dashboard p-2">

                    <div class="card_img">
                        <a href="">
                            <img class="img_icon_dash" src="{{ asset('assets/media/icons/puntoventa.webp') }}" alt="">
                        </a>
                    </div>


                    <h6 class="tittle_card_dash text-center mt-3 mb-3">Caja</h6>

                    <div class="d-flex justify-content-center">
                        @if ($configuracion->codigo_caja == 1)
                            <a type="button" class="btn_primary_blue_dash" data-bs-toggle="modal" data-bs-target="#ModalPassCaja">
                                Acceder
                            </a>
                        @else
                            <a href="{{ route('caja_sincodigo.index', $code_global) }}" class="btn_primary_blue_dash">
                                Acceder
                            </a>
                        @endif
                    </div>

                </div>
            </div>

            @if ($configuracion->caja_avanzada == 1)
                <div class="col-6 col-xs-6 col-sm-6 col-md-6-col-xl-4 mb-3 d-flex justify-content-center animation_card">
                    <div class="card_dashboard p-2">

                        <div class="card_img">
                            <a href="{{ route('productos.index', $code_global) }}">
                                <img class="img_icon_dash" src="{{ asset('assets/media/icons/corte.webp') }}" alt="">
                            </a>
                        </div>


                        <h6 class="tittle_card_dash text-center mt-3 mb-3">Corte</h6>

                        <a href="{{ route('caja_corte.index', $code_global) }}" class="btn_primary_blue_dash">Acceder </a>

                        <a type="button" class="btn_plus_dash" data-bs-toggle="modal" data-bs-target="#creatRegCaja">
                            <img class="img_plus_dash" src="{{ asset('assets/media/icons/anadir_white.webp') }}" alt="">
                        </a>
                    </div>
                </div>
            @endif

            <div class="col-6 col-xs-6 col-sm-6 col-md-6-col-xl-4 mb-3 d-flex justify-content-center animation_card">
                <div class="card_dashboard p-2">

                    <div class="card_img">
                        <a href="{{ route('productos.index', $code_global) }}">
                            <img class="img_icon_dash" src="{{ asset('assets/media/icons/carrito.webp') }}" alt="">
                        </a>
                    </div>


                    <h6 class="tittle_card_dash text-center mt-3 mb-3">Productos</h6>

                    <a href="{{ route('productos.index', $code_global) }}" class="btn_primary_blue_dash">Acceder </a>

                    <a type="button" class="btn_plus_dash" data-bs-toggle="modal" data-bs-target="#creatProduct">
                        <img class="img_plus_dash" src="{{ asset('assets/media/icons/anadir_white.webp') }}" alt="">
                    </a>
                </div>
            </div>

            <div class="col-6 col-xs-6 col-sm-6 col-md-6-col-xl-4 mb-3 d-flex justify-content-center animation_card">
                <div class="card_dashboard p-2">

                    <div class="card_img">
                        <a href="{{ route('orders.index', $code_global) }}">
                            <img class="img_icon_dash" src="{{ asset('assets/media/icons/validando-billete.webp') }}" alt="">
                        </a>
                    </div>

                    <h6 class="tittle_card_dash text-center mt-3 mb-3">Ordenes</h6>

                    <div class="d-flex justify-content-center">
                        <a href="{{ route('orders.index', $code_global) }}" class="btn_primary_blue_dash">Acceder </a>
                    </div>

                </div>
            </div>

            <div class="col-6 col-xs-6 col-sm-6 col-md-6-col-xl-4 mb-3 d-flex justify-content-center animation_card">
                <div class="card_dashboard p-2">

                    <div class="card_img">
                        <a href="{{ route('cotizaciones.index', $code_global) }}">
                            <img class="img_icon_dash" src="{{ asset('assets/media/icons/quotes.webp') }}" alt="">
                        </a>
                    </div>


                    <h6 class="tittle_card_dash text-center mt-3 mb-3">Cotizaciones</h6>

                    <div class="d-flex justify-content-center">
                        <a href="{{ route('cotizaciones.index', $code_global) }}" class="btn_primary_blue_dash">Acceder </a>
                    </div>

                </div>
            </div>

            <div class="col-6 col-xs-6 col-sm-6 col-md-6-col-xl-4 mb-3 d-flex justify-content-center animation_card">
                <div class="card_dashboard p-2">

                    <div class="card_img">
                        <a href="{{ route('clientes.index', $code_global) }}">
                            <img class="img_icon_dash" src="{{ asset('assets/media/icons/clientes.webp') }}" alt="">
                        </a>
                    </div>

                    <h6 class="tittle_card_dash text-center mt-3 mb-3">Clientes</h6>

                    <a href="{{ route('clientes.index', $code_global) }}" class="btn_primary_blue_dash">Acceder </a>

                    <a type="button" class="btn_plus_dash" data-bs-toggle="modal" data-bs-target="#creatClient">
                        <img class="img_plus_dash" src="{{ asset('assets/media/icons/anadir_white.webp') }}" alt="">
                    </a>

                </div>
            </div>

            <div class="col-6 col-xs-6 col-sm-6 col-md-6-col-xl-4 mb-3 d-flex justify-content-center animation_card">
                <div class="card_dashboard p-2">

                    <div class="card_img">
                        <a href="{{ route('trabajadores.index', $code_global) }}">
                            <img class="img_icon_dash" src="{{ asset('assets/media/icons/empleados.webp') }}" alt="">
                        </a>
                    </div>

                    <h6 class="tittle_card_dash text-center mt-3 mb-3">Empleados</h6>

                    <a href="{{ route('trabajadores.index', $code_global) }}" class="btn_primary_blue_dash">Acceder </a>

                    <a type="button" class="btn_plus_dash" data-bs-toggle="modal" data-bs-target="#creatTrabajador">
                        <img class="img_plus_dash" src="{{ asset('assets/media/icons/anadir_white.webp') }}" alt="">
                    </a>

                </div>
            </div>

            <div class="col-6 col-xs-6 col-sm-6 col-md-6-col-xl-4 mb-3 d-flex justify-content-center animation_card">
                <div class="card_dashboard p-2">

                    <div class="card_img">
                        <a href="{{ route('reportes.index', $code_global) }}">
                            <img class="img_icon_dash" src="{{ asset('assets/media/icons/charts-imageonline.co-6846928.webp') }}" alt="">
                        </a>
                    </div>


                    <h6 class="tittle_card_dash text-center mt-3 mb-3">Reportes</h6>

                    <div class="d-flex justify-content-center">
                        <a href="{{ route('reportes.index', $code_global) }}" class="btn_primary_blue_dash">Acceder </a>
                    </div>

                </div>
            </div>

            <div class="col-6 col-xs-6 col-sm-6 col-md-6-col-xl-4 mb-3 d-flex justify-content-center animation_card">
                <div class="card_dashboard p-2">

                    <div class="card_img">
                        <a href="{{ route('clientes.index', $code_global) }}">
                            <img class="img_icon_dash" src="{{ asset('assets/media/icons/roles_permisos.webp') }}" alt="">
                        </a>
                    </div>

                    <h6 class="tittle_card_dash text-center mt-3 mb-3">Roles</h6>

                    <a href="{{ route('trabajadores.index', $code_global) }}" class="btn_primary_blue_dash">Acceder </a>

                    <a type="button" class="btn_plus_dash" data-bs-toggle="modal" data-bs-target="#creatRoles">
                        <img class="img_plus_dash" src="{{ asset('assets/media/icons/anadir_white.webp') }}" alt="">
                    </a>

                </div>
            </div>

            <div class="col-6 col-xs-6 col-sm-6 col-md-6-col-xl-4 mb-3 d-flex justify-content-center animation_card">
                <div class="card_dashboard p-2">

                    <div class="card_img">
                        <a href="{{ route('configuracion.index', $user->Empresa->code) }}">
                            <img class="img_icon_dash" src="{{ asset('assets/media/icons/gear.webp') }}" alt="">
                        </a>
                    </div>

                    <h6 class="tittle_card_dash text-center mt-3 mb-3">Ajustes</h6>

                    <div class="d-flex justify-content-center">
                        <a href="{{ route('configuracion.index', $user->Empresa->code) }}" class="btn_primary_blue_dash">Acceder </a>
                    </div>
                </div>
            </div>

            {{-- <div class="col-6 col-xs-6 col-sm-6 col-md-6-col-xl-4 mb-3 d-flex justify-content-center animation_card">
                <div class="card_dashboard p-2">

                    <div class="card_img">
                        <a href="">
                            <img class="img_icon_dash" src="{{ asset('assets/media/icons/scanner.webp') }}" alt="">
                        </a>
                    </div>


                    <h6 class="tittle_card_dash text-center mt-3 mb-3">Scanner</h6>

                    <div class="d-flex justify-content-center">
                        <a type="button" class="btn_primary_blue_dash" data-bs-toggle="modal" data-bs-target="#show_Scanner">
                            Acceder
                        </a>
                    </div>

                    </p>
                </div>
            </div> --}}

        <!--<div class="col-6 col-xs-6 col-sm-6 col-md-6-col-xl-4 mb-3 d-flex justify-content-center animation_card">
                <div class="card_dashboard p-2">

                    <div class="card_img">
                        <a href="">
                            <img class="img_icon_dash" src="{{ asset('assets/media/icons/resultado.webp') }}" alt="">
                        </a>
                    </div>

                    <h6 class="tittle_card_dash text-center mt-3 mb-3">Reportes</h6>
                    <a href="" class="btn_primary_blue_dash">Acceder </a>
                    <a href="" class="btn_plus_dash">
                        <img class="img_plus_dash" src="{{ asset('assets/media/icons/anadir_white.webp') }}" alt="">
                    </a>

                </div>
            </div>

            <div class="col-6 col-xs-6 col-sm-6 col-md-6-col-xl-4 mb-3 d-flex justify-content-center">
                <div class="card_dashboard p-2">

                    <div class="card_img">
                        <a href="">
                            <img class="img_icon_dash" src="{{ asset('assets/media/icons/comisiones.webp') }}" alt="">
                        </a>
                    </div>

                    <h6 class="tittle_card_dash text-center mt-3 mb-3">Comisiones</h6>
                    <a href="" class="btn_primary_blue_dash">Acceder </a>
                    <a href="" class="btn_plus_dash">
                        <img class="img_plus_dash" src="{{ asset('assets/media/icons/anadir_white.webp') }}" alt="">
                    </a>

                </div>
            </div>-->

        </div>

    </div>

</section>
@include('modals.key_licencia')
@include('modals.create_product')
@include('modals.create_trabajador')
@include('modals.create_role')
@include('modals.setting')
@include('modals.create_client')
@include('modals.create_registro_caja')
@endsection

@if($configuracion->estatus_config == 0)
    @section('js_custom')
        {{-- mostrar modal configuracion inicial --}}
        <script>

            $(document).ready(function() {

            // Llama a la función para mostrar el modal
            mostrarModal();

            function mostrarModal() {
                // Muestra el modal
                $("#configuracionInicial").css("display", "block");
            }

                // Obtener el checkbox principal y el div a mostrar/ocultar
                var checkboxPrecioMayorista = document.getElementById('checkboxPrecioMayorista');
                var divEncriptarMayo = document.querySelector('.encriptar-mayo-div');

                // Obtener el segundo checkbox y los dos divs a mostrar/ocultar
                var checkboxEncriptarMayo = document.getElementById('checkboxEncriptarMayo');
                var divsEncriptacion = document.querySelectorAll('.div-encriptacion');

                // Función para mostrar u ocultar el div según el estado del checkbox
                function mostrarOcultarDiv(div, estado) {
                    div.style.display = estado ? 'block' : 'none';
                }

                // Agregar un event listener al checkbox principal
                checkboxPrecioMayorista.addEventListener('change', function () {
                    // Mostrar u ocultar el divEncriptarMayo según el estado del checkbox
                    mostrarOcultarDiv(divEncriptarMayo, checkboxPrecioMayorista.checked);

                    // Si no se marca el checkbox principal, ocultar todos los divsEncriptacion
                    if (!checkboxPrecioMayorista.checked) {
                        divsEncriptacion.forEach(function (div) {
                            mostrarOcultarDiv(div, false);
                        });
                    }
                });

                // Agregar un event listener al segundo checkbox
                checkboxEncriptarMayo.addEventListener('change', function () {
                    // Mostrar u ocultar los divsEncriptacion según el estado del checkbox
                    divsEncriptacion.forEach(function (div) {
                        mostrarOcultarDiv(div, checkboxEncriptarMayo.checked);
                    });
                });

                // Mostrar u ocultar el divEncriptarMayo al cargar la página según el estado inicial del checkbox principal
                mostrarOcultarDiv(divEncriptarMayo, checkboxPrecioMayorista.checked);

                // Mostrar u ocultar los divsEncriptacion al cargar la página según el estado inicial del checkbox de encriptación
                divsEncriptacion.forEach(function (div) {
                    mostrarOcultarDiv(div, checkboxEncriptarMayo.checked);
                });

            // {{-- Mensaje Guardado --}}

                $("#miFormularioConfiguracion").on("submit", function (event) {
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
                            saveSuccessFormConfig(response);

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

                async function saveSuccessFormConfig(response) {
                    const config_data = response.config_data;

                    Swal.fire({
                            title: "Configuracion Guardado <strong>¡Exitosamente!</strong>",
                            icon: "success",
                            html: "<div class='row'><div class='col-6 mt-3'><img class='icon_span_tab' src='{{ asset('assets/media/icons/fuente.webp') }}' ><p><strong>Nombre:</strong> <br>"+ config_data.nombre +"</p></div><div class='col-6 mt-3'><img class='icon_span_tab' src='{{ asset('assets/media/icons/en-stock.png.webp') }}' ><p><strong>Stock Alto:</strong><br>"+ config_data.stock_alto +" </p> </div><div class='col-6'><img class='icon_span_tab' src='{{ asset('assets/media/icons/monedas.webp') }}' ><p><strong>Stock Medio:</strong><br> "+ config_data.stock_medio +"</p></div><div class='col-6'><img class='icon_span_tab' src='{{ asset('assets/media/icons/sku.webp') }}'><p><strong>stock Bajo:</strong><br>"+ config_data.stock_bajo +" </p></div></div>",
                            showCloseButton: true,
                            showCancelButton: true,
                            focusConfirm: false,
                            confirmButtonText: '<a class="btn_swalater_confirm"  style="text-decoration: none;color: #fff;" href="{{ route('productos.index', $code_global) }}" >Ver Configuracion</a>',
                            cancelButtonText: `<a  class="btn_swalater_cancel" style="text-decoration: none;color: #fff;" href="" >Cerrar</a>`,
                        }).then(() => {
                            // Recarga la página
                        window.location.href = '/home/' + {{$code_global}};
                        });

                }
            });
        </script>

    @endsection
@endif


@section('js_alert_key')
    {{-- mostrar modal licencia vencida --}}
        <script>
            $(document).ready(function() {
                if("{{$fechaActual_global}}" > "{{$licencia_global->caducidad}}" || "{{$licencia_global->estatus}}" === 'Desactivado'){
                    // Llama a la función para mostrar el modal
                    mostrarModalKey();

                    function mostrarModalKey() {
                        // Muestra el modal
                        $("#key_licencia").css("display", "block");
                    }
                      // {{-- Mensaje Guardado --}}
                    $("#miFormularioKeylicencia").on("submit", function (event) {
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
                                saveSuccessFormConfig(response);

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
                                    title: 'Licencia Erronea',
                                    html: errorMessage, // Usa "html" para mostrar el mensaje con formato HTML
                                });
                            }
                        });
                    });

                    async function saveSuccessFormConfig(response) {
                        const licencia_data = response.licencia_data;

                        Swal.fire({
                            title: "Licencia Activada <strong>¡Exitosamente!</strong>",
                            icon: "success",
                            html: "<div class='row'><div class='col-6 mt-3'><img class='icon_span_tab' src='{{ asset('assets/media/icons/business-card-design.webp') }}' ><p><strong>Membrecia:</strong> <br>"+ licencia_data.membrecia +"</p></div><div class='col-6 mt-3'><img class='icon_span_tab' src='{{ asset('assets/media/icons/semaforos.webp') }}' ><p><strong>Estatus:</strong><br>"+ licencia_data.estatus +" </p> </div><div class='col-6'><img class='icon_span_tab' src='{{ asset('assets/media/icons/calendar-dar.webp') }}' ><p><strong>Caducidad:</strong><br> "+ licencia_data.caducidad +"</p></div></div>",
                            showCloseButton: true,
                            showCancelButton: true,
                            focusConfirm: false,
                            confirmButtonText: '<a class="btn_swalater_confirm"  style="text-decoration: none;color: #fff;" href="{{ route('home', $code_global) }}" >Ok</a>',
                            cancelButtonText: `<a  class="btn_swalater_cancel" style="text-decoration: none;color: #fff;" href="" >Cerrar</a>`,
                        }).then(() => {
                            // Recarga la página
                            window.location.href = '/home/' + {{$code_global}};
                        });

                    }
                 }
            });
        </script>
@endsection
