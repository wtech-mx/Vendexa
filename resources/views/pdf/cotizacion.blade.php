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

        </style>

        <body style="background-color: #ebf5ff ;">

            <div class="container">
                <div class="row" style="padding: 20px 0px 0px 0px;">
                    <div style="width: 50%; float:left; margin-left: 30px;">
                        <img alt="Bootstrap Image Preview" src="{{ asset('logo/empresa'.auth()->user()->id_empresa.'/'.$cotizacion->Empresa->logo) }}" style="width:100px;">
                    </div>
                </div>

                <div class="padre">
                    <div class="hijo_uno">
                        <h3 style="color: #577590;font-size: 40px;">Cotización </h3>
                    </div>
                </div>

                <div class="row" >
                    <div style="width: 50%; float:left">
                        <blockquote class="blockquote">
                            <p class="display-4 from" style="color: #577590;font-size: 25px;">
                                <strong>Datos de la empresa </strong>
                            </p>

                            <p class="text-right  text-white" style="color: #000;font-size: 18px;">
                                <img class="img_icon_pdf" alt="" src="{{ asset('assets/media/icons/edificios_ciudad.webp') }}" style="">
                                Empresa: {{$cotizacion->Empresa->nombre}}
                            </p>

                            <p class="text-right  text-white" style="color: #000;font-size: 18px;">
                                <img class="img_icon_pdf" alt="" src="{{ asset('assets/media/icons/telefono.png.webp') }}" style="">
                                Telefeono: {{$cotizacion->Empresa->telefono}}
                            </p>

                            <p class="text-right  text-white" style="color: #000;font-size: 18px;">
                                <img class="img_icon_pdf" alt="" src="{{ asset('assets/media/icons/gps.webp') }}" style="">
                                Direccion: {{$configuracion->Direccion->calle_numero}}, {{$configuracion->Direccion->codigo_postal}}
                            </p>

                            <p class="text-right  text-white" style="color: #000;font-size: 18px;">
                                <img class="img_icon_pdf" alt="" src="{{ asset('assets/media/icons/sobre.png.webp') }}" style="">
                                Correo: {{$cotizacion->Empresa->correo}}
                            </p>
                        </blockquote>
                    </div>

                    <div style="width: 50%; float:right">
                        <blockquote class="blockquote">
                            <p class="display-4 from" style="color: #577590;font-size: 25px;">
                                <strong>Datos del cliente </strong>
                            </p>
                            <p class="blockquote-footer text-white para" style="color: #000;font-size: 18px;">
                                <img class="img_icon_pdf" alt="" src="{{ asset('assets/media/icons/fuente.webp') }}" style="">
                                Nombre: {{$cotizacion->Cliente->nombre}}
                            </p>
                            <p class="blockquote-footer text-white para" style="color: #000;font-size: 18px;">
                                <img class="img_icon_pdf" alt="" src="{{ asset('assets/media/icons/telefono.png.webp') }}" style="">
                                Telefono: {{$cotizacion->Cliente->telefono}}
                            </p>
                            <p class="blockquote-footer text-white para" style="color: #000;font-size: 18px;">
                                <img class="img_icon_pdf" alt="" src="{{ asset('assets/media/icons/sobre.png.webp') }}" style="">
                                Correo: {{$cotizacion->Cliente->correo}}
                            </p>
                            <p class="blockquote-footer text-white para" style="color: #000;font-size: 18px;">
                                -
                            </p>
                        </blockquote>
                    </div>

                </div>

                <div class="row mt-5" style="position: relative;">
                    <div class="col-md-12">
                        <p style="color: #000;font-size: 25px; padding-left: 35px;">
                            <strong style="color: #577590"><img class="img_icon_pdf" alt="" src="{{ asset('assets/media/icons/calendar-dar.webp') }}" style="">
                                Fecha: {{$cotizacion->fecha}}</strong>
                        </p>

                        <table id="ejemplo" class="table text-white tabla-completa" style="color: #000;width: 100%;padding: 30px;">
                            <thead class="tabla-azul" style="padding: 100px;">
                                <tr class="tr" style="background-color: #577590;height: 40px; color: #ffffff;">
                                    <th >
                                        Sku
                                    </th>

                                    <th>
                                        Producto - <img class="img_icon_pdf_table" alt="" src="{{ asset('assets/media/icons/megafono.webp') }}" style="">
                                    </th>

                                    <th>
                                        Precio - <img class="img_icon_pdf_table" alt="" src="{{ asset('assets/media/icons/etiqueta-del-precio.webp') }}" style="">
                                    </th>

                                    <th>
                                        Cantidad - <img class="img_icon_pdf_table" alt="" src="{{ asset('assets/media/icons/retail.webp') }}" style="">
                                    </th>

                                    <th>
                                        Subototal - <img class="img_icon_pdf_table" alt="" src="{{ asset('assets/media/icons/efectivo.webp') }}" style="">
                                    </th>
                                </tr>
                            </thead>


                            <tbody style="text-align: left;font-size: 120%;">
                                @foreach ($productos as $producto)
                                    <tr>
                                        <td style="text-align: left">
                                            {{explode('_', $producto->Productos->sku)[0]}}
                                        </td>

                                        <td style="text-align: center">{{$producto->Productos->nombre}}</td>
                                        <td style="text-align: center">
                                            ${{number_format($producto->precio, 2, '.', ',');}}
                                        </td>

                                        <td style="text-align: center">{{$producto->cantidad}}</td>

                                        <td style="text-align: center">
                                            ${{number_format($producto->subtotal, 2, '.', ',');}}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>


                        </table>

                        <div class="row" style="padding: 0px 0px 20px 0px;position: relative;">
                            <div class="col-8">
                            </div>
                            <div class="col-4 mb-5">
                                <p style="color: #000;font-size: 25px; padding-left: 35px;margin-bottom: 3rem;">
                                    <strong style="color: #577590">Total</strong>
                                </p>
                                @if ($cotizacion->tipo_desc != 'Ninguno')
                                    <p style="color: #000;font-size: 18px; padding-left: 35px;">
                                        <strong style="color: #577590">
                                            <img class="img_icon_pdf" alt="" src="{{ asset('assets/media/icons/gear.webp') }}" style="">
                                            Tipo Descuento</strong> {{$cotizacion->tipo_desc}}
                                    </p>
                                    <p style="color: #000;font-size: 18px; padding-left: 35px;">
                                        <strong style="color: #577590">
                                            <img class="img_icon_pdf" alt="" src="{{ asset('assets/media/icons/descuento.webp') }}" style="">
                                            Descuento </strong> @if ($cotizacion->tipo_desc == 'Porcentaje') {{$cotizacion->descuento}}% @else ${{$cotizacion->descuento}} @endif
                                    </p>
                                @endif

                                <p style="color: #000;font-size: 18px; padding-left: 35px;">
                                    <strong style="color: #577590">
                                        <img class="img_icon_pdf" alt="" src="{{ asset('assets/media/icons/bolsa-de-dinero.webp') }}" style="">
                                        Total </strong>${{$cotizacion->total}}
                                </p>
                                <p style="color: #000;font-size: 18px; padding-left: 35px;">
                                    <strong style="color: #577590">
                                        <img class="img_icon_pdf" alt="" src="{{ asset('assets/media/icons/validando-billete.webp') }}" style="">
                                        Factura  </strong> {{$cotizacion->factura}}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="contenedor-azul"style="background-color:#577590;position: absolute;width: 60%;height:1%;left: 20%;right: 20%;">
                </div>

                <div class="row footer">
                    <div class="col-md-12">
                        <h3 class="text-center text-white " style="color: #000">
                            <a  class="text-center text-white pag" href="#" target="blank" title="pagina eago" style="position: absolute;text-decoration: none;color: #fff;left: 40%;display:block;">
                               -
                            </a>
                        </h3>
                    </div>
                </div>

            </div>
        </body>
    </html>
