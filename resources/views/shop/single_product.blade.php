@extends('layouts.app_shop')

@section('template_title')

{{$empresa->nombre}}

@endsection

@section('css_custom')

@endsection

@section('shop')

<section class="continar_grid">

<div class="row">
    <div class="col-12">

        <div class="container_herder_shop p-3">
            <div class="d-flex justify-content-around">
                <a href="{{$configuracion->instagram}}" class="icons_rs_header m"><img class="img_shop_icon_rs me-3" src="{{ asset('assets/media/icons/instagram.webp') }}" alt="">Instagram</a>
                <a href="{{$configuracion->tiktok}}" class="icons_rs_header m"><img class="img_shop_icon_rs me-3" src="{{ asset('assets/media/icons/tik-tok.webp') }}" alt="">Tiktok</a>
                <a href="{{$configuracion->facebook}}" class="icons_rs_header m"><img class="img_shop_icon_rs me-3" src="{{ asset('assets/media/icons/facebook.webp') }}" alt="">Facebook</a>
                <a href="{{$configuracion->whatsapp}}" class="icons_rs_header m"><img class="img_shop_icon_rs me-3" src="{{ asset('assets/media/icons/whatsapp.webp') }}" alt="">WhatsApp</a>
            </div>
        </div>
    </div>

    <div class="col-12">
            <div class="container_banner">

                <div id="carouselExample" class="carousel slide">
                    <div class="carousel-inner">

                        @foreach ($baner as $item)

                        <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                            <img src="{{ asset('banners/empresa'.$empresa->id.'/'.$item->imagen) }}" class="d-block w-100" alt="{{ $item->imagen }}">
                          </div>

                        @endforeach

                    </div>

                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">Previous</span>
                    </button>

                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">Next</span>
                    </button>

                  </div>
            </div>
    </div>

</div>


<div class="row mt-3">
    <div class="col-12 col-sm-3 col-md-3 col-lg-3">

        <div class="flex-shrink-0 p-3" style="width: 280px;">
            <a href="/" class="d-flex align-items-center pb-3 mb-3 link-body-emphasis text-decoration-none ">
              <span class="fs-5 fw-semibold">Categorias</span>
            </a>
            <ul class="list-unstyled ps-0">
                @foreach($categorias as $categoria)
                    <li class="mb-1">
                        <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed product_title__11Ti1 mt-3" data-bs-toggle="collapse" data-bs-target="#{{ str_replace(' ', '_', $categoria->nombre) }}-collapse" aria-expanded="false">
                            {{ $categoria->nombre }}
                        </button>
                        <div class="collapse" id="{{ str_replace(' ', '_', $categoria->nombre) }}-collapse">
                            <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                                @foreach($categoria->subcategorias as $subcategoria)
                                    <li><a href="#" class="link-body-emphasis d-inline-flex text-decoration-none rounded prodct_description">{{ $subcategoria->nombre }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </li>
                @endforeach
            </ul>

          </div>


    </div>

    <div class="col-12 col-sm-9 col-md-9 col-lg-9">


        <div class="row">

            <div class="col-6 col-md-4 col-lg-4">
                <div class="container_img_open_product">
                    @if ($producto_sigle->imagen_principal == NULL)
                        <img class="img_open_product" src="{{ asset('assets/media/icons/image_no_found.webp') }}" alt="Imagen de producto">
                    @else
                        <img class="img_open_product" src="{{ asset('imagen_principal/empresa'.$empresa->id.'/'.$producto_sigle->imagen_principal) }}" alt="{{ $producto_sigle->imagen_principal }}">
                    @endif
                </div>
            </div>

            <div class="col-6 col-md-4 col-lg-4 my-auto">

                <div class="information_shop_card">

                    <h4 class="product_title__11Ti1 mt-3">{{$producto_sigle->nombre}}</h4>

                    <div class="d-flex justify-content-between">
                            <p class="product_category_shop">{{$producto_sigle->Categoria->nombre}}</p>
                            <p class="product_category_shop">Sku: {{$producto_sigle->sku}}</p>
                    </div>

                    <p class="product_title__11Ti1">Stock {{$producto_sigle->stock}}</p>


                    <h3 class="precio_rpduct_shop">
                        @if (date('Y-m-d') >= $producto_sigle->fecha_inicio_desc && date('Y-m-d') <= $producto_sigle->fecha_fin_desc)
                            <strong>${{number_format($producto_sigle->precio_descuento, 2, '.', ',')}} MXN</strong> <br> <del class="precio_tachado">${{number_format($producto_sigle->precio_normal, 2, '.', ',')}}  MXN</del>
                        @else
                            <strong><br>${{number_format($producto_sigle->precio_normal, 2, '.', ',')}} MXN</strong>
                        @endif
                    </h3>

                    <p class="prodct_description">{{$producto_sigle->descripcion}}</p>

                    <a type="button" target="_blank" class="btn_primary_verde_dash" style="height: 35px;" href="https://wa.me/+525529291962?text=Hola%20quiero%20ordenar%20el%20producto:%0A{{$producto_sigle->nombre}}%0A%0AStock:%20{{$producto_sigle->stock}}%0APrecio:%20${{number_format($producto_sigle->precio_normal, 2, '.', ',')}}%20MXN%0A%0A%0A%Más%20detalles%20y%20compra%20aquí:%20https://tupagina.com/producto_sigles/{{$producto_sigle->id}}">
                        <img class="img_plus_dash" src="{{ asset('assets/media/icons/whatsapp_w.webp') }}" alt=""> Pedir por WhatsApp
                    </a>



                </div>

            </div>

            <div class="col-auto col-md-2 col-lg-2"></div>

        </div>

        <div class="container_grid_product p-3">

            <div class="row mb-4">
                <div class="col-9 mt-4">
                    <form class="d-flex" role="search">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>
                </div>

                <div class="col-3">
                    @if ($empresa->logo == NULL)
                        <img class="img_logo_shop" src="{{ asset('assets/media/img/logos/LogosinF.png ') }}" alt="">
                    @else
                        <img class="img_logo_shop" src="{{ asset('assets/media/img/logos/'. $empresa->logo) }}" alt="">
                    @endif
                </div>
            </div>

            <div class="row">

                @foreach ($productos as $producto)
                    <div class="col-6 col-sm-6 col-md-4 col-lg-4 mb-4">


                        <div class="container_product_shop">

                            {{-- <div class="img_container_shop" style=" background-image: url('{{ asset('imagen_principal/empresa'.$empresa->id.'/'.$producto->imagen_principal) }}');"> --}}
                            <div class="img_container_shop" style=" background-image: url('{{ asset('assets/media/img/backgrounds/fondo_shop_products.png') }}');">

                                <div class="img_prodcut_shop" style=" background-image: url('@if($producto->imagen_principal != NULL){{ asset('imagen_principal/empresa'.$empresa->id.'/'.$producto->imagen_principal) }}@else{{ asset('assets/media/icons/image_no_found.webp') }}@endif');">
                                </div>
                            </div>

                            <div class="information_shop_card">

                                <h4 class="product_title__11Ti1 mt-3">{{$producto->nombre}}</h4>

                                <div class="d-flex justify-content-between">
                                        <p class="product_category_shop">{{$producto->Categoria->nombre}}</p>
                                        <p class="product_category_shop">Sku: {{$producto->sku}}</p>
                                </div>

                                <div class="d-flex justify-content-between">
                                    <h3 class="precio_rpduct_shop">
                                        @if (date('Y-m-d') >= $producto->fecha_inicio_desc && date('Y-m-d') <= $producto->fecha_fin_desc)
                                            <strong>${{number_format($producto->precio_descuento, 2, '.', ',')}} MXN</strong> <br> <del class="precio_tachado">${{number_format($producto->precio_normal, 2, '.', ',')}}  MXN</del>
                                        @else
                                            <strong><br>${{number_format($producto->precio_normal, 2, '.', ',')}} MXN</strong>
                                        @endif
                                    </h3>

                                    @if (date('Y-m-d') >= $producto->fecha_inicio_desc && date('Y-m-d') <= $producto->fecha_fin_desc)
                                        <a type="button" class="btn_primary_blue_dash_shop" data-bs-toggle="modal" data-bs-target="#exampleModal_{{$producto->id}}">
                                            Acceder
                                        </a>
                                    @else
                                        <a type="button" class="btn_primary_blue_dash_shop" data-bs-toggle="modal" data-bs-target="#exampleModal_{{$producto->id}}">
                                            Comprar
                                        </a>
                                    @endif

                                </div>

                                <p class="prodct_description">{{$producto->descripcion}}</p>

                            </div>

                        </div>

                    </div>
                @include('shop.modal_single')
                @endforeach

            </div>
        </div>
    </div>
</div>

</section>


@endsection
