@extends('layouts.app')

@section('template_title')
    Corte caja
@endsection

@section('css_custom')

<link rel="stylesheet" href="{{ asset('assets/css/orders.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/products.css') }}">

@endsection


@section('content')

<section class="products bg_product ">

    <div class="row z-1 position-relative px-3 px-md-4 px-xl-5">

        <div class="col-12 d-flex justify-content-center">
            <h5 class="tittle_orders text-center mt-2 mb-3">
                ¡ Corte Caja !
            </h5>

            @if ($caja_corte_global->total == NULL)
            <form class="d-flex" role="search" action="{{ route('caja_corte.cerrar') }}" method="GET" id="miFormularioCorte">
                <button type="submit" class="btn btn_save_custom">Cerrar caja</button>
            </form>
            @endif

            @if ($caja_corte_global->total != NULL)
                <a href="{{ route('caja_corte.pdf') }}" class="btn btn_save_custom">Imprimir reporte</a>
            @endif

        </div>

        <div class="col-12 mt-3">


            <div class="row justify-content-center">
                <div class="col-3 d-flex justify-content-center animation_card_header">
                    <div class="card_header_dash mb-3">
                        <p class="text-center mt-3">
                            <img src="{{ asset('assets/media/icons/ingresos.webp') }}" alt="" class="img_card_head_dash">
                        </p>
                        <p class="text_minicards text-center">Ingresos <br> <strong> ${{number_format($sumaCaja, 2, '.', ',')}} </strong>

                        </p>
                    </div>
                </div>

                <div class="col-3 d-flex justify-content-center animation_card_header">
                    <div class="card_header_dash mb-3">
                        <p class="text-center mt-3">
                            <img src="{{ asset('assets/media/icons/gasto.webp') }}" alt="" class="img_card_head_dash">
                        </p>
                        <p class="text_minicards text-center">Retiros <br> <strong> ${{number_format($sumaEgresos, 2, '.', ',')}} </strong>
                        </p>
                    </div>
                </div>

                <div class="col-3 d-flex justify-content-center animation_card_header">
                    <div class="card_header_dash mb-3">
                        <p class="text-center mt-3">
                            <img src="{{ asset('assets/media/icons/bolsa-de-dinero.webp') }}" alt="" class="img_card_head_dash">
                        </p>
                        <p class="text_minicards text-center">Total <br> <strong> ${{number_format($restaCaja, 2, '.', ',')}} </strong>

                        </p>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center mt-3 mb-3">
                <h3 for="name" class="label_custom_primary_product text-white text-center mb-4 ">Ingresos</h3>
            </div>

            <div class="row justify-content-center">
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

        <div class="row">
            <div class="col-6 ">
                <h3 for="name" class="label_custom_primary_product text-white mb-4 ">Ingresos</h3>

                <div class="row comtainer_products_width  mb-2 mt-2" style="margin: 0px;">

                    @foreach ($registrosIngresos as $registroIngreso)
                        <div class="col-6 col-sm-6 col-md-6 col-lg-9 my-auto">
                            <img class="img_prodcut_reportes d-inline" src="{{ asset('assets/media/icons/ingresos.webp') }}" alt="" >
                            <h5 class="d-inline text_titlle_tab_reporte">{{$registroIngreso->concepto}}</h5>
                        </div>

                        <div class="col-6 col-sm-6 col-md-6 col-lg-3">
                            <h6 class="text_subtitlle_tab_reporte">ID : {{$registroIngreso->id}}</h6>
                            <h5 class="text_titlle_tab_reporte">${{number_format($registroIngreso->monto, 2, '.', ',')}}</h5>
                            <h6 class="text_subtitlle_tab_reporte">Comprobante </h6>
                        </div>
                    @endforeach

                </div>
            </div>

            <div class="col-6">
                <h3 for="name" class="label_custom_primary_product text-white mb-4 ">Egresos</h3>

                <div class="row comtainer_products_width  mb-2 mt-2" style="margin: 0px;">

                    @foreach ($registrosEgresos as $registroEgreso)
                        <div class="col-6 col-sm-6 col-md-6 col-lg-9 my-auto">
                            <img class="img_prodcut_reportes d-inline" src="{{ asset('assets/media/icons/gasto.webp') }}" alt="" >
                            <h5 class="d-inline text_titlle_tab_reporte">{{$registroEgreso->concepto}}</h5>
                        </div>

                        <div class="col-6 col-sm-6 col-md-6 col-lg-3">
                            <h6 class="text_subtitlle_tab_reporte">ID : {{$registroEgreso->id}}</h6>
                            <h5 class="text_titlle_tab_reporte">${{number_format($registroEgreso->monto, 2, '.', ',')}}</h5>
                            <h6 class="text_subtitlle_tab_reporte">Comprobante </h6>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>

    </div>

</section>

@endsection
@section('js_custom_cliente')
<script>

    $(document).ready(function() {

        $("#miFormularioCorte").on("submit", function (event) {

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
                    title: "Corte realizado <strong>¡Exitosamente!</strong>",
                    icon: "success",
                    showCloseButton: true,
                    showCancelButton: true,
                    focusConfirm: false,
                    confirmButtonText: '<a class="btn_swalater_confirm"  style="text-decoration: none;color: #fff;" >Descargar reporte</a>',
                    cancelButtonText: `<a  class="btn_swalater_cancel" style="text-decoration: none;color: #fff;" href="" >Cerrar</a>`,
                }).then(() => {
                    // Recarga la página
                    window.open(`/corte/caja/pdf`, '_blank');
                    location.reload();
                });

        }

    });


</script>
@endsection
