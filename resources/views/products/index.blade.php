@extends('layouts.app')
@section('css_custom')

<link rel="stylesheet" href="{{ asset('assets/css/products.css') }}">
<style>
    .modal-backdrop.show {
        opacity: 0 !important;
    }
    .modal-backdrop {
        --bs-backdrop-zindex: 0 !important;
        z-index: 0 !important;
    }
</style>

@endsection


@section('content')

<section class="products bg_product ">

    <div class="row z-1 position-relative px-3 px-md-4 px-xl-5">

        <div class="col-12 mt-2 mb-3">
            <div class="d-flex justify-content-center ">
                <h5 class="tittle_dash text-center mt-2 mb-3 animation_card_header">
                    PRODUCTOS
                </h5>
            </div>
        </div>

        <div class="col-12 mt-2 mb-3">
            <div class="d-flex justify-content-center">

                <form class="d-flex" role="search" action="{{ route('productos.filtro') }}" method="GET">
                    <input class="form-control input_search" type="search" placeholder="Buscar producto" aria-label="Search" name="nombre_producto">
                     <a class="btn btn_search me-5" type="submit">
                        <img class="icon_search" src="{{ asset('assets/media/icons/buscar.webp') }}" alt="">
                    </a>
                  </form>

                  <a class="btn btn_filter" data-bs-toggle="collapse" href="#collapseFilter" role="button" aria-expanded="false" aria-controls="collapseFilter">
                    <img class="icon_search" src="{{ asset('assets/media/icons/filtrar.webp') }}" alt="">
                  </a>

                  @if(Route::currentRouteName() == 'productos.filtro')
                  <a class="btn btn_filter" href="{{ route('productos.index') }}" role="button">
                      <img class="icon_search" src="{{ asset('assets/media/icons/eraser.webp') }}" alt="">
                  </a>
                  @endif
            </div>

            <div class="collapse container_filter p-2 mt-3" id="collapseFilter" style="background: #ffffff;">
                <form class="row mt-3 mb-3" action="{{ route('productos.filtro') }}" method="GET" >
                    <div class="col-12">
                        <h6>Filtros</h6>
                    </div>

                    @include('components.producto_filtro')
                </form>
            </div>

        </div>

        <div class="col-12 mb-5">
            <div class="d-flex justify-content-center row ">

                <a class="card_box_colores me-5 stock">
                    <p class="text_estatus_product">Stock</p>
                </a>

                <a class="card_box_colores me-5 ms-5 lowStock">
                    <p class="text_estatus_product">BajoStock</p>
                </a>

                <a class="card_box_colores me-5 ms-5 outStock">
                    <p class="text_estatus_product">Sin Stock</p>
                </a>
            </div>
        </div>

        <div class="col-12 ">

            <div class="d-flex justify-content-start">

                <button class="btn btn-sm btn_generar_pdf_All" onclick="seleccionarTodos()">
                    Seleccionar Todos
                    <img class="icon_span_tab" src="{{ asset('assets/media/icons/catalogo.webp') }}" alt="" >
                </button>

                <a type="button" class="btn btn-sm btn_generar_pdf ms-3"  id="btnGenerarReporte" style="display: none;" data-bs-toggle="modal" data-bs-target="#bulkaction">
                    Acciones
                    <img class="icon_span_tab" src="{{ asset('assets/media/icons/catalogo.webp') }}" alt="">
                </a>

            </div>

        </div>


        @if(Route::currentRouteName() == 'productos.filtro')
            @foreach ($productos as $producto)
                @include('modals.edit_product')
                @include('products.grid')
            @endforeach
        @endif


        @if(Route::currentRouteName() == 'productos.index')
            @foreach ($productos as $producto)
                        {{-- {{ dd($productos);}} --}}

                @include('modals.edit_product')

                @include('products.grid')
            @endforeach
       @endif
    </div>

</section>

@include('modals.bulk_action')

@endsection

@section('js_custom_pdf')

<script>

// Obtén los elementos por su ID
const radioSi = document.getElementById('radioSiBulkpromo');
const radioNo = document.getElementById('radioNoBulkpromo');

const precioPromoBulkContainer = document.getElementById('precioPromoBulkContainer');

// Agrega un listener para el cambio de los radios
radioSi.addEventListener('change', function() {
    if (this.checked) {
        precioPromoBulkContainer.style.display = 'flex'; // Muestra el contenedor
    }
});

radioNo.addEventListener('change', function() {
    if (this.checked) {
        precioPromoBulkContainer.style.display = 'none'; // Oculta el contenedor
    }
});

let productosSeleccionados = [];

function seleccionarProducto(id) {
    console.log('seleccionado');
    const index = productosSeleccionados.indexOf(id);
    if (index === -1) {
        productosSeleccionados.push(id);
        // Agregar la clase 'seleccionado' a la tarjeta seleccionada
        $(`div[data-producto="${id}"]`).addClass('seleccionado_gridPdfProduct');
    } else {
        productosSeleccionados.splice(index, 1);
        // Quitar la clase 'seleccionado' de la tarjeta deseleccionada
        $(`div[data-producto="${id}"]`).removeClass('seleccionado_gridPdfProduct');
    }

    // Mostrar el botón para generar el reporte si hay al menos un card seleccionado
    const btnGenerarReporte = document.getElementById('btnGenerarReporte');
    if (productosSeleccionados.length > 0) {
        btnGenerarReporte.style.display = 'inline';
    } else {
        btnGenerarReporte.style.display = 'none';
    }

}

function seleccionarTodos() {
    const cards = document.querySelectorAll('.card_prodcut');

    // Verificar si hay productos seleccionados
    if (productosSeleccionados.length > 0) {
        // Limpiar la lista de productos seleccionados
        productosSeleccionados = [];

        // Desmarcar todas las tarjetas
        cards.forEach(card => {
            card.classList.remove('seleccionado_gridPdfProduct');
        });
    } else {
        // Si no hay productos seleccionados, seleccionar todos los cards
        cards.forEach(card => {
            const id = card.getAttribute('data-producto');
            if (!productosSeleccionados.includes(id)) {
                productosSeleccionados.push(id);
                card.classList.add('seleccionado_gridPdfProduct');
            }
        });
    }

    const btnGenerarReporte = document.getElementById('btnGenerarReporte');
    if (productosSeleccionados.length > 0) {
        btnGenerarReporte.style.display = 'inline';
    } else {
        btnGenerarReporte.style.display = 'none';
    }

}

function generarReporte() {
    $.ajax({
            url: '{{ route('pdf.product') }}',
            type: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}' // Agregar el token CSRF a la solicitud
            },
            data: {
                productos: productosSeleccionados
            },
            success: function(response) {
                console.log('URL del PDF:', response.url);
                window.open(response.url, '_blank'); // Abre el PDF en una nueva ventana
            },

            error: function(error) {
                console.error('Error al generar informe:', error);
                // Manejar errores
            }
        });
}

function pusarProductos() {
    $.ajax({
            url: '{{ route('bulk_pausar.product') }}',
            type: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}' // Agregar el token CSRF a la solicitud
            },
            data: {
                productos: productosSeleccionados
            },
            success: function(response) {

                Swal.fire({
                        title: "Producto(s) Pusados <strong>¡Exitosamente!</strong>",
                        icon: "success",
                        html: "",
                        showCloseButton: true,
                        showCancelButton: true,
                        focusConfirm: false,
                        confirmButtonText: '<a class="btn_swalater_confirm"  style="text-decoration: none;color: #fff;" href="{{ route('productos.index') }}" >Ver Productos</a>',
                        cancelButtonText: `<a  class="btn_swalater_cancel" style="text-decoration: none;color: #fff;" href="#" >Cerrar</a>`,
                    });

            },

            error: function(error) {
                console.error('Error al generar informe:', error);
                // Manejar errores
            }
        });
}

function publicarProductos() {
    $.ajax({
            url: '{{ route('bulk_publicar.product') }}',
            type: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}' // Agregar el token CSRF a la solicitud
            },
            data: {
                productos: productosSeleccionados
            },
            success: function(response) {

                Swal.fire({
                        title: "Producto(s) Publicado <strong>¡Exitosamente!</strong>",
                        icon: "success",
                        html: "",
                        showCloseButton: true,
                        showCancelButton: true,
                        focusConfirm: false,
                        confirmButtonText: '<a class="btn_swalater_confirm"  style="text-decoration: none;color: #fff;" href="{{ route('productos.index') }}" >Ver Productos</a>',
                        cancelButtonText: `<a  class="btn_swalater_cancel" style="text-decoration: none;color: #fff;" href="#" >Cerrar</a>`,
                    });
            },

            error: function(error) {
                console.error('Error al generar informe:', error);
                // Manejar errores
            }
        });
}

            $("#miFormularioBulk").on("submit", function (event) {
                event.preventDefault(); // Evita el envío predeterminado del formulario

                // Obtenemos los datos del formulario
                const formData = new FormData(this);

                // Agregamos los productos seleccionados al objeto de datos
                formData.append('productosSeleccionados', productosSeleccionados);

                // Realiza la solicitud POST usando AJAX
                $.ajax({
                    url: $(this).attr("action"),
                    type: "POST",
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        Swal.fire({
                                title: "Producto(s) Actualizados <strong>¡Exitosamente!</strong>",
                                icon: "success",
                                html: "",
                                showCloseButton: true,
                                showCancelButton: true,
                                focusConfirm: false,
                                confirmButtonText: '<a class="btn_swalater_confirm"  style="text-decoration: none;color: #fff;" href="{{ route('productos.index') }}" >Ver Productos</a>',
                                cancelButtonText: `<a  class="btn_swalater_cancel" style="text-decoration: none;color: #fff;" href="#" >Cerrar</a>`,
                            });
                        },
                    error: function (xhr, status, error) {
                        console.log(errorMessage);
                    }
                });

            });


</script>

@endsection
