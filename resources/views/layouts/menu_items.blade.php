<a href="{{ route('home') }}" class="enlace_sidebar">
        <p class="text-left mb-0">
            <img class="logo_empresa" src="{{ asset('logo/empresa'.auth()->user()->id_empresa.'/'.$configuracion->logo) }}" alt="">
        </p>
</a>

<a href="{{ route('home', auth()->user()->Empresa->code) }}" class="enlace_sidebar">
    <li class="li_navbar d-flex justify-content-around">
        Panel <img class="icon_navbar" src="{{ asset('assets/media/icons/home.webp') }}" alt="">
    </li>
</a>

@if ($configuracion->codigo_caja == 1)
    <a type="button" class="enlace_sidebar d-block" data-bs-toggle="modal" data-bs-target="#ModalPassCaja">
        <li class="li_navbar d-flex justify-content-around">
            Caja <img class="icon_navbar" src="{{ asset('assets/media/icons/puntoventa.webp') }}" alt="">
        </li>
    </a>
@else
    <a href="{{ route('caja_sincodigo.index', auth()->user()->Empresa->code) }}" class="enlace_sidebar">
        <li class="li_navbar d-flex justify-content-around">
            Caja <img class="icon_navbar" src="{{ asset('assets/media/icons/puntoventa.webp') }}" alt="">
        </li>
    </a>
@endif

<a href="{{ route('caja_corte.index', auth()->user()->Empresa->code) }}" class="enlace_sidebar">
    <li class="li_navbar d-flex justify-content-around">
        Corte <img class="icon_navbar" src="{{ asset('assets/media/icons/corte.webp') }}" alt="">
    </li>
</a>


{{-- <a type="button" class="enlace_sidebar d-block" data-bs-toggle="modal" data-bs-target="#show_Scanner">
    <li class="li_navbar d-flex justify-content-around">
        Scanner <img class="icon_navbar" src="{{ asset('assets/media/icons/scanner.webp') }}" alt="">
    </li>
 </a> --}}

<a href="{{ route('productos.index', auth()->user()->Empresa->code) }}" class="enlace_sidebar">
    <li class="li_navbar d-flex justify-content-around">
        Productos  <img class="icon_navbar" src="{{ asset('assets/media/icons/carrito.webp') }}" alt="">
    </li>
</a>

<a href="{{ route('orders.index', auth()->user()->Empresa->code) }}" class="enlace_sidebar">
    <li class="li_navbar d-flex justify-content-around">
        Ordenes  <img class="icon_navbar" src="{{ asset('assets/media/icons/validando-billete.webp') }}" alt="">
    </li>
</a>

<a href="{{ route('cotizaciones.index', auth()->user()->Empresa->code) }}" class="enlace_sidebar">
    <li class="li_navbar d-flex justify-content-around">
        Cotizaciones  <img class="icon_navbar" src="{{ asset('assets/media/icons/quotes.webp') }}" alt="">
    </li>
</a>

<a href="{{ route('clientes.index', auth()->user()->Empresa->code) }}" class="enlace_sidebar">
    <li class="li_navbar d-flex justify-content-around">
        Clientes <img class="icon_navbar" src="{{ asset('assets/media/icons/clientes.webp') }}" alt="">
    </li>
 </a>

 <a href="{{ route('trabajadores.index', auth()->user()->Empresa->code) }}" class="enlace_sidebar">
    <li class="li_navbar d-flex justify-content-around">
        Empleados <img class="icon_navbar" src="{{ asset('assets/media/icons/empleados.webp') }}" alt="">
    </li>
 </a>

 <a href="{{ route('reportes.index', auth()->user()->Empresa->code) }}" class="enlace_sidebar">
    <li class="li_navbar d-flex justify-content-around">
        Reportes <img class="icon_navbar" src="{{ asset('assets/media/icons/charts-imageonline.co-6846928.webp') }}" alt="">
    </li>
</a>

 <a href="{{ route('configuracion.index', auth()->user()->Empresa->code) }}" class="enlace_sidebar">
    <li class="li_navbar d-flex justify-content-around">
        Ajustes <img class="icon_navbar" src="{{ asset('assets/media/icons/gear.webp') }}" alt="">
    </li>
 </a>

 <a href="{{ route('signout') }}" class="enlace_sidebar">
    <li class="li_navbar d-flex justify-content-around">
        Salir <img class="icon_navbar" src="{{ asset('assets/media/icons/salida.webp') }}" alt="">
    </li>
 </a>

<!--
<a href="" class="enlace_sidebar">
    <li class="li_navbar d-flex justify-content-around">
        Reportes <img class="icon_navbar" src="{{ asset('assets/media/icons/resultado.webp') }}" alt="">
    </li>
    </a>

<a href="" class="enlace_sidebar">
    <li class="li_navbar d-flex justify-content-around">
        Comisiones <img class="icon_navbar" src="{{ asset('assets/media/icons/comisiones.webp') }}" alt="">
    </li>
</a>
-->
