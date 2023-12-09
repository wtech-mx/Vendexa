@extends('layouts.app')

@section('css_custom')

    <link rel="stylesheet" href="{{ asset('assets/css/scanner.css') }}">

@endsection


@section('content')

<section class="dashboard bg_dash row">

    <div class="col-12 my-auto">
        <div class="border_card_header">
            <div class="d-flex justify-content-center">
                <h5 class="tittle_dash text-center mt-2 mb-3">
                    ¡BIENVENIDO!
                </h5>
            </div>

            <div class="accordion accoirdion_scanner px-4" id="accordionScanner">
                <div class="accordion-item acoriden_items mb-2">
                  <h2 class="accordion-header accordeon_scanner_header">
                    <button class="accordion-button accordion_scanner d-block" type="button" data-bs-toggle="collapse" data-bs-target="#collapseProducts" aria-expanded="true" aria-controls="collapseProducts">
                        <div class="d-flex justify-content-between">
                            <p style="margin-bottom: 0;">Poductos</p>
                            <p style="margin-bottom: 0;">
                                <img class="img_scanner_dropdown" src="{{ asset('assets/media/icons/carrito.webp') }}" alt="">
                            </p>
                        </div>
                    </button>
                  </h2>
                  <div id="collapseProducts" class="accordion-collapse collapse show" data-bs-parent="#accordionScanner">
                    <div class="accordion-body">
                      <strong>This is the first item's accordion body.</strong> It is shown by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                    </div>
                  </div>
                </div>
                <div class="accordion-item acoriden_items mb-2">
                  <h2 class="accordion-header accordeon_scanner_header">
                    <button class="accordion-button accordion_scanner d-block collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseServices" aria-expanded="false" aria-controls="collapseServices">
                        <div class="d-flex justify-content-between">
                            <p style="margin-bottom: 0;">Servicios</p>
                            <p style="margin-bottom: 0;">
                                <img class="img_scanner_dropdown" src="{{ asset('assets/media/icons/bien.webp') }}" alt="">
                            </p>
                        </div>
                    </button>
                  </h2>
                  <div id="collapseServices" class="accordion-collapse collapse" data-bs-parent="#accordionScanner">
                    <div class="accordion-body">
                      <strong>This is the second item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                    </div>
                  </div>
                </div>
                <div class="accordion-item acoriden_items mb-2">
                  <h2 class="accordion-header accordeon_scanner_header">
                    <button class="accordion-button accordion_scanner d-block collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOrders" aria-expanded="false" aria-controls="collapseOrders">
                        <div class="d-flex justify-content-between">
                            <p style="margin-bottom: 0;">Ordenes</p>
                            <p style="margin-bottom: 0;">
                                <img class="img_scanner_dropdown" src="{{ asset('assets/media/icons/validando-billete.webp') }}" alt="">
                            </p>
                        </div>
                    </button>
                  </h2>
                  <div id="collapseOrders" class="accordion-collapse collapse" data-bs-parent="#accordionScanner">
                    <div class="accordion-body">
                      <strong>This is the third item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                    </div>
                  </div>
                </div>
            </div>

        </div>
    </div>




</section>

@endsection
