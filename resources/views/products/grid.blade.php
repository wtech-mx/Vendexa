<div class="col-12 col-xs-6 col-sm-6 col-md-4 col-xl-3 d-flex justify-content-center px-3 py-3 px-md-2">
    <div class="card card_prodcut p-3" onclick="seleccionarProducto({{ $producto->id }})" data-producto="{{ $producto->id }}">

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
