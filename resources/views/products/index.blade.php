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

            <div class="collapse" id="collapseFilter" style="background: #ffffff;">
                <form action="{{ route('productos.filtro') }}" method="GET" >
                    <h6>Filtros</h6>
                    <div class="row">

                        <div class="col-3">
                            <label class="form-label">Rango Stock</label>
                            <div class="input-group">
                                <label class="form-label">De:</label>
                                <span class="input-group-text span_custom_tab" >
                                    <img class="icon_span_tab" src="{{ asset('assets/media/icons/camion.webp') }}" alt="" >
                                </span>
                                <input id="stock_de" name="stock_de" type="number"  class="form-control input_custom_tab @error('stock_de') is-invalid @enderror"  value="{{ old('stock_de') }}" autocomplete="" autofocus>
                            </div>

                            <div class="input-group">
                                <label class="form-label">A :</label>
                                <span class="input-group-text span_custom_tab" >
                                    <img class="icon_span_tab" src="{{ asset('assets/media/icons/camion.webp') }}" alt="" >
                                </span>
                                <input id="stock_a" name="stock_a" type="number"  class="form-control input_custom_tab @error('stock_a') is-invalid @enderror"  value="{{ old('stock_a') }}" autocomplete="" autofocus>
                            </div>
                        </div>

                        <div class="col-3">
                            <label class="form-label">Marca</label>
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

                        <div class="col-3">
                            <label class="form-label">Categoria</label>
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

                        <div class="col-3">
                            <label class="form-label">Subcategoria</label>
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

                        <div class="col-3">
                            <label class="form-label">Proveedor</label>
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

                        <div class="col-3">
                            <label class="form-label">Estatus </label>
                            <div class="input-group">
                                <span class="input-group-text span_custom_tab" >
                                    <img class="icon_span_tab" src="{{ asset('assets/media/icons/camion.webp') }}" alt="" >
                                </span>
                                <select name="visibilidad_estatus" id="visibilidad_estatus" class="form-select d-inline-block input_custom_tab">
                                    <option value="" {{ old('') == '' ? 'selected' : '' }}>Selecionar </option>
                                        <option value="Si" @if(old('visibilidad_estatus') == 'Si') selected @endif>Publicado</option>
                                        <option value="No" @if(old('visibilidad_estatus') == 'No') selected @endif>Desactivado</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-3">
                            <label class="form-label">Descuento </label>
                            <div class="input-group">
                                <span class="input-group-text span_custom_tab" >
                                    <img class="icon_span_tab" src="{{ asset('assets/media/icons/camion.webp') }}" alt="" >
                                </span>
                                <select name="descuento" id="descuento" class="form-select d-inline-block input_custom_tab">
                                    <option value="" {{ old('') == '' ? 'selected' : '' }}>Selecionar </option>
                                        <option value="Si" @if(old('descuento') == 'Si') selected @endif>Sin Descuento</option>
                                        <option value="No" @if(old('descuento') == 'No') selected @endif>Con Descuento</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-3">
                            <label class="form-label">-</label>
                            <div class="input-group">
                                <button class="btn btn-sm bg-success mb-0 mt-sm-0 mt-1" type="submit" style="color: #ffffff;">Buscar</button>
                            </div>

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
        @if(Route::currentRouteName() == 'productos.filtro')
            @foreach ($productos as $producto)
                @include('modals.edit_product')
                <div class="col-12 col-xs-6 col-sm-6 col-md-4 col-xl-3 d-flex justify-content-center px-3 py-3">
                    <div class="card card_prodcut p-3">

                        <div class="card_prodcuto" style="border: solid 3px red;border-radius: 12px;">
                            <div class="card_container_img">
                                <p class="text-center mb-0">
                                    <img class="img_portada_product" src="{{ asset('imagen_principal/empresa'.auth()->user()->id_empresa.'/'.$producto->imagen_principal) }}" alt="">
                                </p>
                            </div>

                            <div class="row mt-4 px-3">

                                <div class="col-12">
                                    <p class="text-center">
                                        <img src="data:image/png;base64, {{DNS1D::getBarcodePNG(explode('_', $producto->sku)[0], 'C128', 1.6, 35, array(0, 0, 0), true)}}" >
                                    </p>
                                </div>

                                <div class="col-12 mb-3">
                                    <h5 class="tiitle_products">Nombre</h5>
                                    <p class="subtitle_products">{{$producto->nombre}}</p>
                                </div>

                                <div class="col-6 mb-3">
                                    <h5 class="tiitle_products">
                                        <img class="icon_product" src="{{ asset('assets/media/icons/etiqueta-del-precio.webp') }}" alt="">
                                        Precio
                                    </h5>
                                    <p class="subtitle_products">${{number_format($producto->precio_normal, 2, '.', ',');}}</p>
                                </div>

                                <div class="col-6 mb-3">
                                    <h5 class="tiitle_products">
                                        <img class="icon_product" src="{{ asset('assets/media/icons/coins.webp') }}" alt="">
                                        Mayoreo
                                    </h5>
                                    @if ($producto->precio_mayo == NULL)
                                        <p class="subtitle_products"></p>
                                    @else
                                        <p class="subtitle_products">${{number_format($producto->precio_mayo, 2, '.', ',');}}</p>
                                    @endif

                                </div>

                                <div class="col-6 mb-3">
                                    <h5 class="tiitle_products">
                                        <img class="icon_product" src="{{ asset('assets/media/icons/sku.webp') }}" alt="">
                                        Sku
                                    </h5>
                                    <p class="subtitle_products">{{$producto->sku}}</p>
                                </div>

                                <div class="col-6 mb-3">
                                    <h5 class="tiitle_products">
                                        <img class="icon_product" src="{{ asset('assets/media/icons/en-stock.png.webp') }}" alt="">
                                        Stock
                                    </h5>
                                    <p class="subtitle_products">{{$producto->stock}}</p>
                                </div>

                                <div class="col-12 mb-4">

                                    <a type="button"  class="btn btn_edit_prodcut w-100" data-bs-toggle="modal" data-bs-target="#editProduct-{{$producto->id}}">
                                        Ver/Editar <img class="icon_edit_btn" src="{{ asset('assets/media/icons/editar.webp') }}" alt="">
                                    </a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
        @if(Route::currentRouteName() == 'productos.index')
            @foreach ($productos as $producto)
                @include('modals.edit_product')
                <div class="col-12 col-xs-6 col-sm-6 col-md-4 col-xl-3 d-flex justify-content-center px-3 py-3">
                    <div class="card card_prodcut p-3">

                        <div class="card_prodcuto" style="border: solid 3px red;border-radius: 12px;">
                            <div class="card_container_img">
                                <p class="text-center mb-0">
                                    <img class="img_portada_product" src="{{ asset('imagen_principal/empresa'.auth()->user()->id_empresa.'/'.$producto->imagen_principal) }}" alt="">
                                </p>
                            </div>

                            <div class="row mt-4 px-3">

                                <div class="col-12">
                                    <p class="text-center">
                                        <img src="data:image/png;base64, {{DNS1D::getBarcodePNG(explode('_', $producto->sku)[0], 'C128', 1.6, 35, array(0, 0, 0), true)}}" >
                                    </p>
                                </div>

                                <div class="col-12 mb-3">
                                    <h5 class="tiitle_products">Nombre</h5>
                                    <p class="subtitle_products">{{$producto->nombre}}</p>
                                </div>

                                <div class="col-6 mb-3">
                                    <h5 class="tiitle_products">
                                        <img class="icon_product" src="{{ asset('assets/media/icons/etiqueta-del-precio.webp') }}" alt="">
                                        Precio
                                    </h5>
                                    <p class="subtitle_products">${{number_format($producto->precio_normal, 2, '.', ',');}}</p>
                                </div>

                                <div class="col-6 mb-3">
                                    <h5 class="tiitle_products">
                                        <img class="icon_product" src="{{ asset('assets/media/icons/coins.webp') }}" alt="">
                                        Mayoreo
                                    </h5>
                                    @if ($producto->precio_mayo == NULL)
                                        <p class="subtitle_products"></p>
                                    @else
                                        <p class="subtitle_products">${{number_format($producto->precio_mayo, 2, '.', ',');}}</p>
                                    @endif

                                </div>

                                <div class="col-6 mb-3">
                                    <h5 class="tiitle_products">
                                        <img class="icon_product" src="{{ asset('assets/media/icons/sku.webp') }}" alt="">
                                        Sku
                                    </h5>
                                    <p class="subtitle_products">{{$producto->sku}}</p>
                                </div>

                                <div class="col-6 mb-3">
                                    <h5 class="tiitle_products">
                                        <img class="icon_product" src="{{ asset('assets/media/icons/en-stock.png.webp') }}" alt="">
                                        Stock
                                    </h5>
                                    <p class="subtitle_products">{{$producto->stock}}</p>
                                </div>

                                <div class="col-12 mb-4">

                                    <a type="button"  class="btn btn_edit_prodcut w-100" data-bs-toggle="modal" data-bs-target="#editProduct-{{$producto->id}}">
                                        Ver/Editar <img class="icon_edit_btn" src="{{ asset('assets/media/icons/editar.webp') }}" alt="">
                                    </a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
       @endif
    </div>

</section>

@endsection
