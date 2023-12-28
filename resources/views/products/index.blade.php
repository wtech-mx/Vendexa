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
            </div>

            <div class="collapse container_filter p-2 mt-3" id="collapseFilter" style="background: #ffffff;">

                <form class="row mt-3 mb-3" action="{{ route('productos.filtro') }}" method="GET" >

                        <div class="col-12">
                            <h6>Filtros</h6>
                        </div>

                        <div class="col-4 py-3">
                            <label class="form-label tiitle_products">Rango Stock de</label>
                            <div class="input-group">
                                <span class="input-group-text span_custom_tab" >
                                    <img class="icon_span_tab" src="{{ asset('assets/media/icons/cero.webp') }}" alt="" >
                                </span>
                                <input id="stock_de" name="stock_de" type="number"  class="form-control input_custom_tab @error('stock_de') is-invalid @enderror"  value="{{ old('stock_de') }}" autocomplete="" autofocus>
                            </div>
                        </div>

                        <div class="col-4 py-3">
                            <label class="form-label tiitle_products">hasta </label>
                            <div class="input-group">
                                <span class="input-group-text span_custom_tab" >
                                    <img class="icon_span_tab" src="{{ asset('assets/media/icons/9.webp') }}" alt="" >
                                </span>
                                <input id="stock_a" name="stock_a" type="number"  class="form-control input_custom_tab @error('stock_a') is-invalid @enderror"  value="{{ old('stock_a') }}" autocomplete="" autofocus>
                            </div>
                        </div>

                        <div class="col-4 py-3">
                            <label class="form-label tiitle_products">Marca</label>
                            <div class="input-group">
                                <span class="input-group-text span_custom_tab" >
                                    <img class="icon_span_tab" src="{{ asset('assets/media/icons/marca.webp') }}" alt="" >
                                </span>
                                <select name="id_marca" id="id_marca" class="form-select d-inline-block input_custom_tab">
                                    <option value="" {{ old('') == '' ? 'selected' : '' }}>Selecionar </option>
                                    @foreach ($marcas as $marca)
                                        <option value="{{ $marca->id }}" @if(old('id_marca') == $marca->id) selected @endif>{{ $marca->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-4 py-3">
                            <label class="form-label tiitle_products">Categoria</label>
                            <div class="input-group">
                                <span class="input-group-text span_custom_tab" >
                                    <img class="icon_span_tab" src="{{ asset('assets/media/icons/categorias.webp') }}" alt="" >
                                </span>
                                <select name="id_categoria" id="id_categoria" class="form-select d-inline-block input_custom_tab">
                                    <option value="" {{ old('') == '' ? 'selected' : '' }}>Selecionar</option>
                                    @foreach ($categorias as $categoria)
                                        <option value="{{ $categoria->id }}" @if(old('id_categoria') == $categoria->id) selected @endif>{{ $categoria->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-4 py-3">
                            <label class="form-label tiitle_products">Subcategoria</label>
                            <div class="input-group">
                                <span class="input-group-text span_custom_tab" >
                                    <img class="icon_span_tab" src="{{ asset('assets/media/icons/paquete.webp') }}" alt="" >
                                </span>
                                <select name="id_subcategoria" id="id_subcategoria" class="form-select d-inline-block input_custom_tab">
                                    <option value="" {{ old('') == '' ? 'selected' : '' }}>Selecionar </option>
                                    @foreach ($subcategorias as $subcategoria)
                                        <option value="{{ $subcategoria->id }}" @if(old('id_subcategoria') == $subcategoria->id) selected @endif>{{ $subcategoria->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-4 py-3">
                            <label class="form-label tiitle_products">Proveedor</label>
                            <div class="input-group">
                                <span class="input-group-text span_custom_tab" >
                                    <img class="icon_span_tab" src="{{ asset('assets/media/icons/camion.webp') }}" alt="" >
                                </span>
                                <select name="id_proveedor" id="id_proveedor" class="form-select d-inline-block input_custom_tab"  value="{{old('')}}">
                                    <option value="" {{ old('') == '' ? 'selected' : '' }}>Selecionar </option>
                                    @foreach ($proveedores as $proveedor)
                                        <option value="{{ $proveedor->id }}" @if(old('id_proveedor') == $proveedor->id) selected @endif>{{ $proveedor->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-4 py-3">
                            <label class="form-label tiitle_products">Estatus </label>
                            <div class="input-group">
                                <span class="input-group-text span_custom_tab" >
                                    <img class="icon_span_tab" src="{{ asset('assets/media/icons/semaforos.webp') }}" alt="" >
                                </span>
                                <select name="visibilidad_estatus" id="visibilidad_estatus" class="form-select d-inline-block input_custom_tab">
                                    <option value="" {{ old('') == '' ? 'selected' : '' }}>Selecionar </option>
                                        <option value="Si" @if(old('visibilidad_estatus') == 'Si') selected @endif>Publicado</option>
                                        <option value="No" @if(old('visibilidad_estatus') == 'No') selected @endif>Desactivado</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-4 py-3">
                            <label class="form-label tiitle_products">Descuento </label>
                            <div class="input-group">
                                <span class="input-group-text span_custom_tab" >
                                    <img class="icon_span_tab" src="{{ asset('assets/media/icons/descuento.webp') }}" alt="" >
                                </span>
                                <select name="descuento" id="descuento" class="form-select d-inline-block input_custom_tab">
                                    <option value="" {{ old('') == '' ? 'selected' : '' }}>Selecionar </option>
                                        <option value="Si" @if(old('descuento') == 'Si') selected @endif>Sin Descuento</option>
                                        <option value="No" @if(old('descuento') == 'No') selected @endif>Con Descuento</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-4 py-3">
                            <label class="form-label tiitle_products">-</label>
                            <div class="input-group">
                                <button class="btn btn_filter text-white" type="submit" style="">Buscar
                                    <img class="icon_span_tab" src="{{ asset('assets/media/icons/buscar.webp') }}" alt="" >

                                </button>
                            </div>

                        </div>
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

                <button class="btn btn-sm btn_generar_pdf ms-3" id="btnGenerarReporte" style="display: none;" onclick="generarReporte()">
                    Generar Reporte
                    <img class="icon_span_tab" src="{{ asset('assets/media/icons/catalogo.webp') }}" alt="">
                </button>

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
                @include('modals.edit_product')
                @include('products.grid')
            @endforeach
       @endif
    </div>

</section>

@endsection

@section('js_custom_pdf')

<script>

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

</script>

@endsection
