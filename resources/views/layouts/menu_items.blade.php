
<a href="{{ route('home') }}" class="enlace_sidebar">
    <li class="li_navbar">
        Panel <img class="icon_navbar" src="{{ asset('assets/media/icons/home.webp') }}" alt="">
    </li>
</a>

<a type="button" class="enlace_sidebar d-block" data-bs-toggle="modal" data-bs-target="#ModalPassCaja">
    <li class="li_navbar">
        Caja <img class="icon_navbar" src="{{ asset('assets/media/icons/puntoventa.webp') }}" alt="">
    </li>
</a>

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

<a href="{{ route('clientes.index') }}" class="enlace_sidebar">
    <li class="li_navbar">
        Clientes <img class="icon_navbar" src="{{ asset('assets/media/icons/clientes.webp') }}" alt="">
    </li>
 </a>

 <a href="{{ route('trabajadores.index') }}" class="enlace_sidebar">
    <li class="li_navbar">
        Trabajadores <img class="icon_navbar" src="{{ asset('assets/media/icons/distribuidor-imageonline.co-1952752.webp') }}" alt="">
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
