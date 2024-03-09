@extends('layouts.app_shop')

@section('template_title')

{{$empresa->nombre}}

@endsection

@section('css_custom')

<link rel="stylesheet" href="{{ asset('assets/css/shop.css') }}">

@if ($empresa->logo == NULL)
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/media/img/logos/LogosinF.png ') }}">
    @else

    <link rel="icon" type="image/x-icon" href="{{ asset('assets/media/img/logos/'. $empresa->logo) }}">
@endif

@endsection

@section('shop')

<section class="continar_grid">

<div class="row">
    <div class="col-12">

        <div class="container_herder_shop p-3">
            <div class="d-flex justify-content-around">
                <a href="{{$configuracion->instagram}}" class="icons_rs_header"><img class="img_shop_icon_rs" src="{{ asset('assets/media/icons/instagram.webp') }}" alt="">Instagram</a>
                <a href="{{$configuracion->tiktok}}" class="icons_rs_header"><img class="img_shop_icon_rs" src="{{ asset('assets/media/icons/tik-tok.webp') }}" alt="">Tiktok</a>
                <a href="{{$configuracion->facebook}}" class="icons_rs_header"><img class="img_shop_icon_rs" src="{{ asset('assets/media/icons/facebook.webp') }}" alt="">Facebook</a>
                <a href="{{$configuracion->whatsapp}}" class="icons_rs_header"><img class="img_shop_icon_rs" src="{{ asset('assets/media/icons/whatsapp.webp') }}" alt="">Atencion via WhatsApp</a>
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
    <div class="col-3">
        <h2 class="text-center">Categorias</h2>
        <a href="" class="ms-5 li_categoria">{{$empresa->nombre}}</a>
    </div>

    <div class="col-9">
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
                    <div class="col-12 col-sm-6 col-md-4 col-lg-4 mb-4">

                        <div class="container_product_shop">

                            <div class="img_container_shop">
                                    @if ($producto->imagen_principal == NULL)
                                        <img class="img_prodcut_shop" src="{{ asset('assets/media/icons/image_no_found.webp') }}" alt="Imagen de producto">
                                    @else
                                        <img class="img_prodcut_shop" src="{{ asset('imagen_principal/empresa'.$empresa->id.'/'.$producto->imagen_principal) }}" alt="{{ $producto->imagen_principal }}">
                                    @endif
                            </div>

                            <div class="information_shop_card">

                            <h4 class="product_title__11Ti1 mt-3">{{$producto->nombre}}</h4>

                            <div class="d-flex justify-content-between">
                                    <p class="product_category_shop">{{$producto->Categoria->nombre}}</p>
                                    <p class="product_category_shop">Sku: {{$producto->sku}}</p>
                            </div>

                            <h3 class="precio_rpduct_shop">
                                @if ($fechaActual_global >= $producto->fecha_inicio_desc && $fechaActual_global <= $producto->fecha_fin_desc)
                                    <strong>${{$producto->precio_descuento}}</strong> <del>${{ $producto->precio_normal }}</del>
                                @else
                                    <strong>${{$producto->precio_normal}}</strong>
                                @endif
                            </h3>

                            <p class="prodct_description">{{$producto->descripcion}}</p>

                            </div>

                        </div>

                    </div>
                @endforeach

            </div>
        </div>
    </div>
</div>

</section>


@endsection
