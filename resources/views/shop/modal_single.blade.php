<!-- Modal -->
<div class="modal fade" id="exampleModal_{{$producto->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">

        <div class="modal-body">
            <div class="row">

                <div class="col-12">
                    <div class="d-flex justify-content-end">
                        <button type="button" class="btn-close mt-2 mb-2" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                </div>

                <div class="col-6">
                    <div class="container_img_open_product">
                        @if ($producto->imagen_principal == NULL)
                            <img class="img_open_product" src="{{ asset('assets/media/icons/image_no_found.webp') }}" alt="Imagen de producto">
                        @else
                            <img class="img_open_product" src="{{ asset('imagen_principal/empresa'.$empresa->id.'/'.$producto->imagen_principal) }}" alt="{{ $producto->imagen_principal }}">
                        @endif
                    </div>
                </div>

                <div class="col-6 my-auto">

                    <div class="information_shop_card">

                        <h4 class="product_title__11Ti1 mt-3">{{$producto->nombre}}</h4>

                        <div class="d-flex justify-content-between">
                                <p class="product_category_shop">{{$producto->Categoria->nombre}}</p>
                                <p class="product_category_shop">Sku: {{$producto->sku}}</p>
                        </div>

                        <h3 class="precio_rpduct_shop">
                            @if ($fechaActual_global >= $producto->fecha_inicio_desc && $fechaActual_global <= $producto->fecha_fin_desc)
                                <strong>${{number_format($producto->precio_descuento, 2, '.', ',')}} MXN</strong> <br> <del class="precio_tachado">${{number_format($producto->precio_normal, 2, '.', ',')}}  MXN</del>
                            @else
                                <strong><br>${{number_format($producto->precio_normal, 2, '.', ',')}} MXN</strong>
                            @endif
                        </h3>

                        <p class="prodct_description">{{$producto->descripcion}}</p>

                        <a type="button" class="btn_primary_verde_dash" data-bs-toggle="modal" data-bs-target="#exampleModal_{{$producto->id}}"style="height: 35px;">
                            <img class="img_plus_dash" src="{{ asset('assets/media/icons/whatsapp_w.webp') }}" alt=""> Pedir por WhatsApp
                        </a>

                    </div>

                </div>

            </div>
        </div>

      </div>
    </div>
  </div>
