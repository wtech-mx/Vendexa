<!DOCTYPE html>
    <html>
        <style type="text/css" media="screen">
            body{

            }
            .img-log{
                padding: 20px;
                width:50%;
            }

            .cotizacion{
                position: absolute;
                right: 3%;
                top: 0%;
                padding: 30px;
                font-size: 80px;
            }
            .fecha{
                position: absolute;
                right: 3%;
                padding: 30px;
                font-size: 30px;
            }
            .mensaje{
                padding: 20px 0px 0px 0px;
            }
            .from{
                font-size: 40px;
            }
            .para{
                font-size: 20px;
            }
            .tabla-completa{
                width: 100%;
                padding: 30px;
            }
            .tabla-azul{
                padding: 100px;
            }
            .tr{
                background-color: #577590;
                height: 40px;
            }
            td{
                height: 40px;
            }
            tbody{
                text-align: center;
                font-size: 120%;
            }
            .costos{
                position: absolute;
                right: 5%;
                padding: 30px;
                font-size: 20px;
            }
            .totalsub{
                padding: 30px;
            }
            .sub{
                padding: 30px;
            }
            .tota{
                padding: 30px;
            }
            .datos-contacto{
                font-size: 20px;
                text-decoration: none;
            }
            .gracias{
                position: absolute;
                right: 5%;
                padding: 30px;
                font-size: 30px;
            }
            .footer{

            }
            .pag{
                position: absolute;
                text-decoration: none;
                color: #fff;
                left: 40%;
                display:block;
            }
            .container{
                z-index: 1000;
            }
            .padre {
                padding: 0 1rem;
            }
            .hijo_uno {
            /* IMPORTANTE */
            width: 200px;
            margin-left: auto;
            margin-right: auto;
            }

            .img_icon_pdf{
                width: 25px;
                padding: 0px 0px 0px 0px;
                position: relative;
                top: 3px;
            }

            .img_icon_pdf_table{
                width: 15px;
                padding: 0px 0px 0px 0px;
            }

            .page-break {
                page-break-before: always;
            }
        </style>

        <body style="background-color: #ebf5ff ;">

            <div class="container">
                <div class="row" style="padding: 20px 0px 0px 0px;">
                    <div style="width: 50%; float:left; margin-left: 30px;">
                        <img alt="Bootstrap Image Preview" src="{{ asset('logo/empresa'.auth()->user()->id_empresa.'/'.$configuracion->Empresa->logo) }}" style="width:100px;">
                    </div>
                </div>

                <div class="padre">
                    <div class="hijo_uno">
                        <h3 style="color: #577590;font-size: 40px;">Corte caja</h3>
                    </div>
                </div>

                <div class="row" >
                    <div style="width: 50%; float:left">
                        <blockquote class="blockquote">
                            <p class="text-right  text-white" style="color: #000;font-size: 18px;">
                                <img class="img_icon_pdf" alt="" src="{{ asset('assets/media/icons/telefono.png.webp') }}" style="">
                                Telefeono: {{$configuracion->Empresa->telefono}}
                            </p>
                            <p class="text-right  text-white" style="color: #000;font-size: 18px;">
                                <img class="img_icon_pdf" alt="" src="{{ asset('assets/media/icons/sobre.png.webp') }}" style="">
                                Correo: {{$configuracion->Empresa->correo}}
                            </p>
                            <p class="blockquote-footer text-white para" style="color: #000;font-size: 18px;">
                                <img class="img_icon_pdf" alt="" src="{{ asset('assets/media/icons/coins.webp') }}" style="">
                                Inicio en caja: ${{number_format($caja_corte->inicio, 2, '.', ',')}}
                            </p>
                            <p class="blockquote-footer text-white para" style="color: #000;font-size: 18px;">
                                <img class="img_icon_pdf" alt="" src="{{ asset('assets/media/icons/efectivo.webp') }}" style="">
                                Cobros en efectivo: ${{number_format($sumaEfectivo, 2, '.', ',')}}
                            </p>
                        </blockquote>
                    </div>

                    <div style="width: 50%; float:right">
                        <blockquote class="blockquote">
                            <p class="blockquote-footer text-white para" style="color: #000;font-size: 18px;">
                                <img class="img_icon_pdf" alt="" src="{{ asset('assets/media/icons/gastos.png.webp') }}" style="">
                                Ingreso: ${{number_format($sumaIngresos, 2, '.', ',')}}
                            </p>
                            <p class="blockquote-footer text-white para" style="color: #000;font-size: 18px;">
                                <img class="img_icon_pdf" alt="" src="{{ asset('assets/media/icons/gastos.png.webp') }}" style="">
                                Total: ${{number_format($caja_corte->ingresos, 2, '.', ',')}}
                            </p>
                            <p class="blockquote-footer text-white para" style="color: #000;font-size: 18px;">
                                <img class="img_icon_pdf" alt="" src="{{ asset('assets/media/icons/gasto.webp') }}" style="">
                                Retiros: ${{number_format($caja_corte->egresos, 2, '.', ',')}}
                            </p>
                            <p class="blockquote-footer text-white para" style="color: #000;font-size: 18px;">
                                <img class="img_icon_pdf" alt="" src="{{ asset('assets/media/icons/bolsa-de-dinero.webp') }}" style="">
                                Efectivo en caja: ${{number_format($caja_corte->total, 2, '.', ',')}}
                            </p>
                        </blockquote>
                    </div>
                </div>

                <div class="row">

                        <p class="hijo_uno" style="color: #577590;font-size: 25px;">
                            <strong>Totales</strong>
                        </p>
                        @if ($configuracion->tarjeta == 1)
                            <div class="col-3">
                                    <a class="text-center mt-3">
                                        <img src="{{ asset('assets/media/icons/t debito.webp') }}" alt="" class="img_icon_pdf">
                                    </a>
                                    <a class="text_minicards text-center">Tarjeta : <strong> ${{number_format($sumaTarjeta, 2, '.', ',')}} </strong></a>
                            </div>
                        @endif
                        @if ($configuracion->efectivo == 1)
                            <div class="col-3">
                                    <a class="text-center mt-3">
                                        <img src="{{ asset('assets/media/icons/efectivo.webp') }}" alt="" class="img_icon_pdf">
                                    </a>
                                    <a class="text_minicards text-center">Efectivo : <strong> ${{number_format($sumaEfectivo, 2, '.', ',')}} </strong></a>
                            </div>
                        @endif
                        @if ($configuracion->transferencia == 1)
                            <div class="col-3">
                                    <a class="text-center mt-3">
                                        <img src="{{ asset('assets/media/icons/pago-movil.webp') }}" alt="" class="img_icon_pdf">
                                    </a>
                                    <a class="text_minicards text-center">Transferencias : <strong> ${{number_format($sumaTransferencia, 2, '.', ',')}} </strong></a>
                            </div>
                        @endif
                        @if ($configuracion->mercado_pago == 1)
                            <div class="col-3">
                                    <a class="text-center mt-3">
                                        <img src="{{ asset('assets/media/icons/t credito.png.webp') }}" alt="" class="img_icon_pdf">
                                    </a>
                                    <a class="text_minicards text-center">Mercado Pago : <strong> ${{number_format($sumaMercadoPago, 2, '.', ',')}} </strong> </a>
                            </div>
                        @endif

                        <p class="hijo_uno" style="color: #577590;font-size: 25px;">
                            <strong>Ingresos</strong>
                        </p>
                        @foreach ($registrosIngresos as $registroIngreso)
                            <div class="col-12">
                                <p style="color: #000;font-size: 18px;">
                                    <img class="img_icon_pdf" alt="" src="{{ asset('assets/media/icons/ingresos.webp') }}" style="">
                                    Concepto: {{$registroIngreso->concepto}}
                                </p>
                                <p style="color: #000;font-size: 18px;">
                                    <img class="img_icon_pdf" alt="" src="{{ asset('assets/media/icons/efectivo.webp') }}" style="">
                                    Monto:${{number_format($registroIngreso->monto, 2, '.', ',')}}
                                </p>
                            </div>
                        @endforeach


                        <p class="hijo_uno" style="color: #577590;font-size: 25px;">
                            <strong>Retiros</strong>
                        </p>
                        @foreach ($registrosEgresos as $registroEgreso)
                            <div class="col-12">
                                <p style="color: #000;font-size: 18px;">
                                    <img class="img_icon_pdf" alt="" src="{{ asset('assets/media/icons/gasto.webp') }}" style="">
                                    Concepto: {{$registroEgreso->concepto}}
                                </p>
                                <p style="color: #000;font-size: 18px;">
                                    <img class="img_icon_pdf" alt="" src="{{ asset('assets/media/icons/efectivo.webp') }}" style="">
                                    Monto:${{number_format($registroEgreso->monto, 2, '.', ',')}}
                                </p>
                            </div>
                        @endforeach


                        <p class="hijo_uno" style="color: #577590;font-size: 25px;">
                            <strong>Ventas</strong>
                        </p>
                        @foreach ($registros as $registro)
                            <div class="col-12">
                                <a style="color: #000;font-size: 18px;">
                                    <img class="img_icon_pdf" alt="" src="{{ asset('assets/media/icons/gasto.webp') }}" style="">
                                    No. nota: {{$registro->id_orden}}
                                </a>
                                <a style="color: #000;font-size: 18px;">
                                    <img class="img_icon_pdf" alt="" src="{{ asset('assets/media/icons/efectivo.webp') }}" style="">
                                    Metodo de pago:{{$registro->metodo_pago}} @if ($registro->metodo_pago2 != NULL) <br> {{$registro->metodo_pago2}} @endif
                                </a>
                                <a style="color: #000;font-size: 18px;">
                                    <img class="img_icon_pdf" alt="" src="{{ asset('assets/media/icons/efectivo.webp') }}" style="">
                                    Monto:${{number_format($registro->dinero_recibido, 2, '.', ',')}} @if ($registro->dinero_recibido2 != NULL) <br> ${{number_format($registro->dinero_recibido2, 2, '.', ',')}} @endif
                                </a>
                                @if ($registro->cambio > 0)
                                    <a style="color: #000;font-size: 18px;">
                                        <img class="img_icon_pdf" alt="" src="{{ asset('assets/media/icons/efectivo.webp') }}" style="">
                                        Cambio:${{number_format($registro->cambio, 2, '.', ',')}} <br> ${{number_format($registro->dinero_recibido2, 2, '.', ',')}}
                                    </a>
                                @endif

                            </div>
                        @endforeach

                </div>

            </div>
        </body>
    </html>
