
<a href="{{ route('home') }}" class="enlace_sidebar">
    <li class="li_navbar">
        Panel <img class="icon_navbar" src="{{ asset('assets/media/icons/home.webp') }}" alt="">
    </li>
</a>

@if ($configuracion->codigo_caja == 1)
    <a type="button" class="enlace_sidebar d-block" data-bs-toggle="modal" data-bs-target="#ModalPassCaja">
        <li class="li_navbar">
            Caja <img class="icon_navbar" src="{{ asset('assets/media/icons/puntoventa.webp') }}" alt="">
        </li>
    </a>
@else
    <a href="{{ route('caja_sincodigo.index') }}" class="enlace_sidebar">
        <li class="li_navbar">
            Caja <img class="icon_navbar" src="{{ asset('assets/media/icons/puntoventa.webp') }}" alt="">
        </li>
    </a>
@endif



<a type="button" class="enlace_sidebar d-block" data-bs-toggle="modal" data-bs-target="#show_Scanner">
    <li class="li_navbar">
        Scanner <img class="icon_navbar" src="{{ asset('assets/media/icons/scanner.webp') }}" alt="">
    </li>
 </a>

<a href="{{ route('productos.index') }}" class="enlace_sidebar">
    <li class="li_navbar">
        Productos  <img class="icon_navbar" src="{{ asset('assets/media/icons/carrito.webp') }}" alt="">
    </li>
</a>

<a href="{{ route('orders.index') }}" class="enlace_sidebar">
    <li class="li_navbar">
        Ordenes  <img class="icon_navbar" src="{{ asset('assets/media/icons/validando-billete.webp') }}" alt="">
    </li>
</a>

<a href="{{ route('cotizaciones.index') }}" class="enlace_sidebar">
    <li class="li_navbar">
        Cotizaciones  <img class="icon_navbar" src="{{ asset('assets/media/icons/cotizaciones.webp') }}" alt="">
    </li>
</a>

<a href="{{ route('clientes.index') }}" class="enlace_sidebar">
    <li class="li_navbar">
        Clientes <img class="icon_navbar" src="{{ asset('assets/media/icons/clientes.webp') }}" alt="">
    </li>
 </a>

 <a href="{{ route('trabajadores.index') }}" class="enlace_sidebar">
    <li class="li_navbar">
        Empleados <img class="icon_navbar" src="{{ asset('assets/media/icons/empleados.webp') }}" alt="">
    </li>
 </a>

 <a href="{{ route('configuracion.index', auth()->user()->Empresa->code) }}" class="enlace_sidebar">
    <li class="li_navbar">
        Ajustes <img class="icon_navbar" src="{{ asset('assets/media/icons/gear.webp') }}" alt="">
    </li>
 </a>

 <a href="{{ route('signout') }}" class="enlace_sidebar">
    <li class="li_navbar">
        Salir <img class="icon_navbar" src="{{ asset('assets/media/icons/salida.webp') }}" alt="">
    </li>
 </a>

<!--
<a href="" class="enlace_sidebar">
    <li class="li_navbar">
        Reportes <img class="icon_navbar" src="{{ asset('assets/media/icons/resultado.webp') }}" alt="">
    </li>
    </a>

<a href="" class="enlace_sidebar">
    <li class="li_navbar">
        Comisiones <img class="icon_navbar" src="{{ asset('assets/media/icons/comisiones.webp') }}" alt="">
    </li>
</a>
-->
