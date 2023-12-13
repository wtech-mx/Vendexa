@extends('layouts.app_ticket')

@section('tiket')

@php
    use \Milon\Barcode\DNS1D;
@endphp

<div class="receipt">

    <div class="details">
        <div class="item">
            <img class="logo_ticket" src="{{ asset('assets/media/img/logos/LogosinF.png') }}" alt="">
        </div>

        <div class="item">
           <span>No #</span>
           <h3>{{$orden->id}}</h3>
        </div>
    </div>

     {{-- Datos de tienda --}}

    <p>
        <img class="icon_tikcet" src="{{ asset('assets/media/icons/gps.webp') }}" alt="">

        <strong>Direccion:</strong>
         Cto. Interior 888, Insurgentes Mixcoac, Benito Juárez, 03920, CDMX
    </p>

    <p>
        <img class="icon_tikcet" src="{{ asset('assets/media/icons/telefono.png.webp') }}" alt="">

        <strong>Telefono:</strong>
         <a  target="_blank"  href="https://api.whatsapp.com/send?phone=521{{$orden->Cliente->telefono}}&text=¡Hola!">{{$orden->Cliente->telefono}}</a>

    </p>

    <div class="details row">

         {{-- Datos de venta --}}

       <div class="col-6 mb-3">
        <div class="item">
            <p  style="margin-bottom: 0;">
                <img class="icon_tikcet" src="{{ asset('assets/media/icons/user_predeterminado.webp') }}" alt="">
                <strong>Cajero</strong>
            </p>
            <span>{{$orden->User->name}}</span>
        </div>
       </div>

       <div class="col-6 mb-3">
        <div class="item">
            <p  style="margin-bottom: 0;">
                <img class="icon_tikcet" src="{{ asset('assets/media/icons/distribuidor-imageonline.co-1952752.webp') }}" alt="">
                <strong>Cliente</strong>
            </p>
            <span>{{$orden->Cliente->nombre}}</span>
        </div>
       </div>

       {{-- productos --}}
       @foreach ($orden->Productos as $producto)
       <div class="col-2">
            <div class="item">
                <span>Cantidad</span>
                <p><strong>{{$producto->cantidad}}</strong></p>
            </div>
        </div>

        <div class="col-7">
            <div class="item">
                <span>Producto</span>
                <p><strong>{{$producto->Productos->nombre}}</strong></p>
            </div>
        </div>

        <div class="col-3">
            <div class="item">
                <span>Subtotal</span>
                <p><strong>${{$producto->subtotal}}.00</strong></p>
            </div>
        </div>
       @endforeach
        {{-- Metodos de pago --}}

        <div class="col-12 col-md-8 col-lg-8 ">

            <div class="row">

                <div class="col-12">
                    <img class="icon_tikcet" src="{{ asset('assets/media/icons/metodo-de-pago.webp') }}" alt="">
                    <span>Metodo Pago</span>
                    @foreach ($orden->Pagos as $pago)
                     <p><strong>
                            {{ $pago->metodo_pago }}
                     </strong></p>
                     @endforeach
                </div>

                <div class="col-6">
                    <img class="icon_tikcet" src="{{ asset('assets/media/icons/efectivo.webp') }}" alt="">
                    <span>Descuento</span>
                    <p><strong>
                        {{$orden->descuento}}
                    </strong></p>
                </div>

                <div class="col-6">
                    <img class="icon_tikcet" src="{{ asset('assets/media/icons/descuento.webp') }}" alt="">
                    <span>Subtotal</span>
                    <p><strong>$500.0</strong></p>
                </div>

                <div class="col-6">
                    <img class="icon_tikcet" src="{{ asset('assets/media/icons/bolsa-de-dinero.webp') }}" alt="">
                    <span>Total</span>
                    <p><strong>$500.0</strong></p>
                </div>



                {{-- Datos de Facturacion --}}

                @if($orden->factura == 'Si')

                    <div class="col-6">
                        <img class="icon_tikcet" src="{{ asset('assets/media/icons/validando-billete.webp') }}" alt="">
                        <span>Factura</span>
                        <p><strong>Si</strong></p>
                    </div>

                    <div class="col-12">
                        <img class="icon_tikcet" src="{{ asset('assets/media/icons/edificios_ciudad.webp') }}" alt="">
                        <span>Nombre / Razon social</span>
                        <p><strong> WebTech</strong></p>
                    </div>

                    <div class="col-6">
                        <img class="icon_tikcet" src="{{ asset('assets/media/icons/fuente.webp') }}" alt="">
                        <span>RFC</span>
                        <p><strong>RAHJEEA02</strong></p>
                    </div>

                    <div class="col-6">
                        <img class="icon_tikcet" src="{{ asset('assets/media/icons/gear.webp') }}" alt="">
                        <span>CFDI</span>
                        <p><strong>Gastos en General</strong></p>
                    </div>

                    <div class="col-12">
                        <img class="icon_tikcet" src="{{ asset('assets/media/icons/sobre.png.webp') }}" alt="">
                        <span>Correo</span>
                        <p><strong>adrianwebtech@gmail.com</strong></p>
                    </div>

                    <div class="col-6">
                        <img class="icon_tikcet" src="{{ asset('assets/media/icons/telefono.png.webp') }}" alt="">
                        <span>Telefono</span>
                        <p><strong>5529291962</strong></p>
                    </div>

                    <div class="col-12">
                        <img class="icon_tikcet" src="{{ asset('assets/media/icons/mapa-de-la-ciudad.webp') }}" alt="">
                        <span>Direciion de Facturacion</span>
                        <p><strong>av poestas 85</strong></p>
                    </div>
                @endif



            </div>

        </div>

        <div class="col-12 col-md-4 col-lg-4"></div>


    </div>
 </div>

 <div class="receipt qr-code">

    {{-- qr dinamico --}}

    {!! DNS2D::getBarcodeHTML(strval($orden->id), 'QRCODE',3,3) !!}

    <div class="description">
       <h2 style="font-size: 21px;">¡Gracias por su Compra! </h2>
       <p>Mostrar código QR</p>
       <a style="color: #6baf2e;" target="_blank" href="https://api.whatsapp.com/send?phone=521{{$orden->Cliente->telefono}}&text=¡Hola! Adjunto el recibo de tu compra. ¿Podrías confirmar la recepción?">
        <img class="icon_tikcet" src="{{ asset('assets/media/icons/whatsapp.webp') }}" >
            Enviar recibo por WhatsApp
        </a>
    </div>
 </div>

 @endsection
