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

                        <p class="product_title__11Ti1">Stock {{$producto->stock}}</p>


                        <h3 class="precio_rpduct_shop">
                            @if (date('Y-m-d') >= $producto->fecha_inicio_desc && date('Y-m-d') <= $producto->fecha_fin_desc)
                                <strong>${{number_format($producto->precio_descuento, 2, '.', ',')}} MXN</strong> <br> <del class="precio_tachado">${{number_format($producto->precio_normal, 2, '.', ',')}}  MXN</del>
                            @else
                                <strong><br>${{number_format($producto->precio_normal, 2, '.', ',')}} MXN</strong>
                            @endif
                        </h3>

                        <p class="prodct_description">{{$producto->descripcion}}</p>

                        @php
                                $valorid = $producto->id;
                                $producto_single = Str::of($producto->nombre)->slug("-")->limit(300 - mb_strlen($valorid) - 1, "")->trim("-")->append("-", $valorid);
                        @endphp

                        <a type="button" target="_blank" class="btn_primary_verde_dash" style="height: 35px;" href="https://wa.me/+52{{$configuracion->whatsapp}}?text=Hola%20quiero%20ordenar%20el%20producto:%0A%0A{{$producto->nombre}}%0AStock:%20{{$producto->stock}}%0APrecio:%20${{number_format($producto->precio_normal, 2, '.', ',')}}%20MXN%0A%0AMás%20detalles%20y%20compra%20aquí:%0A%0A{{ route('tienda_single.index',$producto_single) }}">
                            <img class="img_plus_dash" src="{{ asset('assets/media/icons/whatsapp_w.webp') }}" alt=""> Pedir por WhatsApp
                        </a>



                    </div>

                </div>

            </div>
        </div>

      </div>
    </div>
  </div>
