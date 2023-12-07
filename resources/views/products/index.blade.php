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

        <div class="col-12">
            <h2 class="tiitle_modal_dark text-center mt-3 mb-3">Productos</h2>
        </div>

        <div class="col-12 mb-5">
            <div class="d-flex justify-content-center">

                <form class="d-flex" role="search">
                    <input class="form-control input_search" type="search" placeholder="Buscar productos" aria-label="Search">
                     <a class="btn btn_search me-5" type="submit">
                        <img class="icon_search" src="{{ asset('assets/media/icons/buscar.webp') }}" alt="">
                    </a>
                  </form>

                  <a class="btn btn_filter" data-bs-toggle="collapse" href="#collapseFilter" role="button" aria-expanded="false" aria-controls="collapseFilter">
                    <img class="icon_search" src="{{ asset('assets/media/icons/filtrar.webp') }}" alt="">
                  </a>
            </div>
            @include('modals.create_product')
              <div class="collapse" id="collapseFilter">
                dfsdf
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
        @foreach ($productos as $producto)
            @include('modals.edit_product')
            <div class="col-12 col-xs-6 col-sm-6 col-md-4 col-xl-3 d-flex justify-content-center px-3 py-3">
                <div class="card card_prodcut p-3">

                    <div class="card_prodcuto" style="border: solid 3px red;border-radius: 12px;">
                        <div class="card_container_img">
                            <p class="text-center mb-0">
                                <img class="img_portada_product" src="{{ asset('imagen_principal/'.$producto->imagen_principal) }}" alt="">
                            </p>
                        </div>

                        <div class="row mt-4 px-3">

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
                                    <img class="icon_product" src="{{ asset('assets/media/icons/code_barras.webp') }}" alt="">
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
    </div>

</section>

@endsection
