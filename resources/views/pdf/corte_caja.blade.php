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
                            <p class="display-4 from" style="color: #577590;font-size: 25px;">
                                <strong>Datos de la empresa </strong>
                            </p>

                            <p class="text-right  text-white" style="color: #000;font-size: 18px;">
                                <img class="img_icon_pdf" alt="" src="{{ asset('assets/media/icons/coins.webp') }}" style="">
                                Empresa: {{$configuracion->Empresa->nombre}}
                            </p>

                            <p class="text-right  text-white" style="color: #000;font-size: 18px;">
                                <img class="img_icon_pdf" alt="" src="{{ asset('assets/media/icons/efectivo.webp') }}" style="">
                                Telefeono: {{$configuracion->Empresa->telefono}}
                            </p>

                            <p class="text-right  text-white" style="color: #000;font-size: 18px;">
                                <img class="img_icon_pdf" alt="" src="{{ asset('assets/media/icons/gastos.png.webp') }}" style="">
                                Direccion: {{$configuracion->Direccion->calle_numero}}, {{$configuracion->Direccion->codigo_postal}}
                            </p>

                            <p class="text-right  text-white" style="color: #000;font-size: 18px;">
                                <img class="img_icon_pdf" alt="" src="{{ asset('assets/media/icons/bolsa-de-dinero.webp') }}" style="">
                                Correo: {{$configuracion->Empresa->correo}}
                            </p>
                        </blockquote>
                    </div>

                    <div style="width: 50%; float:right">
                        <blockquote class="blockquote">
                            <p class="display-4 from" style="color: #577590;font-size: 25px;">
                                <strong>Corte caja </strong>
                            </p>
                            <p class="blockquote-footer text-white para" style="color: #000;font-size: 18px;">
                                <img class="img_icon_pdf" alt="" src="{{ asset('assets/media/icons/fuente.webp') }}" style="">
                                Inicio en caja: {{$caja_corte->inicio}}
                            </p>
                            <p class="blockquote-footer text-white para" style="color: #000;font-size: 18px;">
                                <img class="img_icon_pdf" alt="" src="{{ asset('assets/media/icons/telefono.png.webp') }}" style="">
                                Cobros en efectivo: {{$caja_corte->ingresos}}
                            </p>
                            <p class="blockquote-footer text-white para" style="color: #000;font-size: 18px;">
                                <img class="img_icon_pdf" alt="" src="{{ asset('assets/media/icons/sobre.png.webp') }}" style="">
                                Retiros: {{$caja_corte->egresos}}
                            </p>
                            <p class="blockquote-footer text-white para" style="color: #000;font-size: 18px;">
                                <img class="img_icon_pdf" alt="" src="{{ asset('assets/media/icons/sobre.png.webp') }}" style="">
                                Efectivo en caja: {{$caja_corte->total}}
                            </p>
                        </blockquote>
                    </div>

                </div>

            </div>
        </body>
    </html>
