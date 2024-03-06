@extends('layouts.app_shop')

@section('css_custom')

<link rel="stylesheet" href="{{ asset('assets/css/shop.css') }}">

@endsection

@section('shop')

<section class="continar_grid">

<div class="row">
    <div class="col-12">

        <div class="container_herder_shop p-3">
            <div class="d-flex justify-content-around">
                <a href="" class="icons_rs_header"><img class="img_shop_icon_rs" src="{{ asset('assets/media/icons/whatsapp.webp') }}" alt="">Instagram</a>
                <a href="" class="icons_rs_header"><img class="img_shop_icon_rs" src="{{ asset('assets/media/icons/whatsapp.webp') }}" alt="">Tiktok</a>
                <a href="" class="icons_rs_header"><img class="img_shop_icon_rs" src="{{ asset('assets/media/icons/whatsapp.webp') }}" alt="">Facebook</a>
                <a href="" class="icons_rs_header"><img class="img_shop_icon_rs" src="{{ asset('assets/media/icons/whatsapp.webp') }}" alt="">Atencion via WhatsApp</a>
            </div>
        </div>
    </div>

    <div class="col-12">
            <div class="container_banner">
                <img class="img_banner_shop" src="{{ asset('assets/media/img/backgrounds/banner.jpg') }}" alt="">
            </div>
    </div>

</div>

<div class="row mt-3">
    <div class="col-3">
        <h2 class="text-center">Categorias</h2>
        <a href="" class="ms-5 li_categoria">Cascos Hax</a>
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
                    <img class="img_logo_shop" src="{{ asset('assets/media/img/logos/LogosinF.png ') }}" alt="">
                </div>
            </div>

            <div class="row">
                <div class="col-12 col-sm-6 col-md-4 col-lg-4 mb-4">

                    <div class="container_product_shop">

                        <div class="img_container_shop">
                            <img class="img_prodcut_shop" src="{{ asset('assets/media/img/ilustraciones/img_product.jpg ') }}" alt="">
                        </div>

                        <div class="information_shop_card">

                        <h4 class="product_title__11Ti1">Maletero NOSS SOLID plata 45 L </h4>

                        <div class="d-flex justify-content-between">
                                <p class="product_category_shop">Accesorios</p>
                                <p class="product_category_shop">Sku: 3214328123</p>
                        </div>

                        <h3 class="precio_rpduct_shop"><strong>$3,500.00</strong></h3>

                        <p class="prodct_description">-Materiales de ABS-Capacidad de 45 litros </p>

                        </div>

                    </div>

                </div>

                <div class="col-12 col-sm-6 col-md-4 col-lg-4 mb-4">

                    <div class="container_product_shop">

                        <div class="img_container_shop">
                            <img class="img_prodcut_shop" src="{{ asset('assets/media/img/ilustraciones/img_product.jpg ') }}" alt="">
                        </div>

                        <div class="information_shop_card">

                        <h4 class="product_title__11Ti1">Maletero NOSS SOLID plata 45 L </h4>

                        <div class="d-flex justify-content-between">
                                <p class="product_category_shop">Accesorios</p>
                                <p class="product_category_shop">Sku: 3214328123</p>
                        </div>

                        <h3 class="precio_rpduct_shop"><strong>$3,500.00</strong></h3>

                        <p class="prodct_description">-Materiales de ABS-Capacidad de 45 litros </p>

                        </div>

                    </div>

                </div>

                <div class="col-12 col-sm-6 col-md-4 col-lg-4 mb-4">

                    <div class="container_product_shop">

                        <div class="img_container_shop">
                            <img class="img_prodcut_shop" src="{{ asset('assets/media/img/ilustraciones/img_product.jpg ') }}" alt="">
                        </div>

                        <div class="information_shop_card">

                        <h4 class="product_title__11Ti1">Maletero NOSS SOLID plata 45 L </h4>

                        <div class="d-flex justify-content-between">
                                <p class="product_category_shop">Accesorios</p>
                                <p class="product_category_shop">Sku: 3214328123</p>
                        </div>

                        <h3 class="precio_rpduct_shop"><strong>$3,500.00</strong></h3>

                        <p class="prodct_description">-Materiales de ABS-Capacidad de 45 litros </p>

                        </div>

                    </div>

                </div>

                <div class="col-12 col-sm-6 col-md-4 col-lg-4 mb-4">

                    <div class="container_product_shop">

                        <div class="img_container_shop">
                            <img class="img_prodcut_shop" src="{{ asset('assets/media/img/ilustraciones/img_product.jpg ') }}" alt="">
                        </div>

                        <div class="information_shop_card">

                        <h4 class="product_title__11Ti1">Maletero NOSS SOLID plata 45 L </h4>

                        <div class="d-flex justify-content-between">
                                <p class="product_category_shop">Accesorios</p>
                                <p class="product_category_shop">Sku: 3214328123</p>
                        </div>

                        <h3 class="precio_rpduct_shop"><strong>$3,500.00</strong></h3>

                        <p class="prodct_description">-Materiales de ABS-Capacidad de 45 litros </p>

                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

</section>


@endsection
