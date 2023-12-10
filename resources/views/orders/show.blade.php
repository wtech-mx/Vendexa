@extends('layouts.app_ticket')

@section('tiket')

<div class="receipt">

    <div class="details">
        <div class="item">
            <img class="logo_ticket" src="{{ asset('assets/media/img/logos/LogosinF.png') }}" alt="">
        </div>

        <div class="item">
           <span>No #</span>
           <h3>15323</h3>
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
         <a href="tel:+525529291962" style="text-decoration: none;color:#577590">5529291962</a>
    </p>

    <div class="details row">

         {{-- Datos de venta --}}

       <div class="col-6 mb-3">
        <div class="item">
            <p  style="margin-bottom: 0;">
                <img class="icon_tikcet" src="{{ asset('assets/media/icons/user_predeterminado.webp') }}" alt="">
                <strong>Cajero</strong>
            </p>
            <span>josue adrian ramirez hernadnez</span>
        </div>
       </div>

       <div class="col-6 mb-3">
        <div class="item">
            <p  style="margin-bottom: 0;">
                <img class="icon_tikcet" src="{{ asset('assets/media/icons/distribuidor-imageonline.co-1952752.webp') }}" alt="">
                <strong>Cliente</strong>
            </p>
            <span>Pablo sandobal barros </span>
        </div>
       </div>

       {{-- productos --}}

       <div class="col-8">
        <div class="item">
            <span>Producto</span>
            <p><strong>Palanca de cambios</strong></p>
         </div>
       </div>

       <div class="col-4">
        <div class="item">
            <span>Precio</span>
            <p><strong>$500.0</strong></p>
         </div>
       </div>

        {{-- Metodos de pago --}}

        <div class="col-12 col-md-8 col-lg-8 ">

            <div class="row">

                <div class="col-12">
                    <img class="icon_tikcet" src="{{ asset('assets/media/icons/metodo-de-pago.webp') }}" alt="">
                    <span>Metodo Pago</span>
                    <p><strong>Tarjeta</strong></p>
                </div>

                <div class="col-6">
                    <img class="icon_tikcet" src="{{ asset('assets/media/icons/efectivo.webp') }}" alt="">
                    <span>Descuento</span>
                    <p><strong>10 %</strong></p>
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

                <div class="col-6">
                    <img class="icon_tikcet" src="{{ asset('assets/media/icons/validando-billete.webp') }}" alt="">
                    <span>Factura</span>
                    <p><strong>Si</strong></p>
                </div>

                {{-- Datos de Facturacion --}}

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

            </div>

        </div>

        <div class="col-12 col-md-4 col-lg-4"></div>


    </div>
 </div>

 <div class="receipt qr-code">

    {{-- qr dinamico --}}
    <svg class="qr" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 29.938 29.938">
       <path d="M7.129 15.683h1.427v1.427h1.426v1.426H2.853V17.11h1.426v-2.853h2.853v1.426h-.003zm18.535 12.83h1.424v-1.426h-1.424v1.426zM8.555 15.683h1.426v-1.426H8.555v1.426zm19.957 12.83h1.427v-1.426h-1.427v1.426zm-17.104 1.425h2.85v-1.426h-2.85v1.426zm12.829 0v-1.426H22.81v1.426h1.427zm-5.702 0h1.426v-2.852h-1.426v2.852zM7.129 11.406v1.426h4.277v-1.426H7.129zm-1.424 1.425v-1.426H2.852v2.852h1.426v-1.426h1.427zm4.276-2.852H.002V.001h9.979v9.978zM8.555 1.427H1.426v7.127h7.129V1.427zm-5.703 25.66h4.276V22.81H2.852v4.277zm14.256-1.427v1.427h1.428V25.66h-1.428zM7.129 2.853H2.853v4.275h4.276V2.853zM29.938.001V9.98h-9.979V.001h9.979zm-1.426 1.426h-7.127v7.127h7.127V1.427zM0 19.957h9.98v9.979H0v-9.979zm1.427 8.556h7.129v-7.129H1.427v7.129zm0-17.107H0v7.129h1.427v-7.129zm18.532 7.127v1.424h1.426v-1.424h-1.426zm-4.277 5.703V22.81h-1.425v1.427h-2.85v2.853h2.85v1.426h1.425v-2.853h1.427v-1.426h-1.427v-.001zM11.408 5.704h2.85V4.276h-2.85v1.428zm11.403 11.405h2.854v1.426h1.425v-4.276h-1.425v-2.853h-1.428v4.277h-4.274v1.427h1.426v1.426h1.426V17.11h-.004zm1.426 4.275H22.81v-1.427h-1.426v2.853h-4.276v1.427h2.854v2.853h1.426v1.426h1.426v-2.853h5.701v-1.426h-4.276v-2.853h-.002zm0 0h1.428v-2.851h-1.428v2.851zm-11.405 0v-1.427h1.424v-1.424h1.425v-1.426h1.427v-2.853h4.276v-2.853h-1.426v1.426h-1.426V7.125h-1.426V4.272h1.426V0h-1.426v2.852H15.68V0h-4.276v2.852h1.426V1.426h1.424v2.85h1.426v4.277h1.426v1.426H15.68v2.852h-1.426V9.979H12.83V8.554h-1.426v2.852h1.426v1.426h-1.426v4.278h1.426v-2.853h1.424v2.853H12.83v1.426h-1.426v4.274h2.85v-1.426h-1.422zm15.68 1.426v-1.426h-2.85v1.426h2.85zM27.086 2.853h-4.275v4.275h4.275V2.853zM15.682 21.384h2.854v-1.427h-1.428v-1.424h-1.427v2.851zm2.853-2.851v-1.426h-1.428v1.426h1.428zm8.551-5.702h2.853v-1.426h-2.853v1.426zm1.426 11.405h1.427V22.81h-1.427v1.426zm0-8.553h1.427v-1.426h-1.427v1.426zm-12.83-7.129h-1.425V9.98h1.425V8.554z"/>
    </svg>

    <div class="description">
       <h2 style="font-size: 21px;">¡Gracias por su Compra! </h2>
       <p>Mostrar código QR</p>
    </div>
 </div>

 @endsection
