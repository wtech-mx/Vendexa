@extends('layouts.app')
@section('css_custom')

@endsection


@section('content')

<section class="products bg_product ">

    <div class="row z-1 position-relative px-3 px-md-4 px-lg-5 px-xl-5 " style="">

        <div class="col-12 mt-2 mb-3">
            <div class="d-flex justify-content-center ">
                <h5 class="tittle_dash text-center mt-2 mb-3 animation_card_header">
                    Reportes
                </h5>
            </div>
        </div>

        <div class="col-12 mb-5">

                <div class="accordion accoirdion_scanner px-4" id="accordionScanner">

                    <div class="accordion-item acoriden_items mb-2">
                        <h2 class="accordion-header accordeon_scanner_header">
                          <button class="accordion-button accordion_scanner d-block" type="button" data-bs-toggle="collapse" data-bs-target="#collapseCaja" aria-expanded="true" aria-controls="collapseCaja">
                              <div class="d-flex justify-content-between">
                                  <p style="margin-bottom: 0;">Caja</p>
                                  <p style="margin-bottom: 0;">
                                      <img class="img_scanner_dropdown" src="{{ asset('assets/media/icons/puntoventa.webp') }}" alt="">
                                  </p>
                              </div>
                          </button>
                        </h2>

                        <div id="collapseCaja" class="accordion-collapse collapse show" data-bs-parent="#accordionScanner">
                            @include('reportes.components.caja')
                        </div>
                    </div>

                    <div class="accordion-item acoriden_items mb-2">
                        <h2 class="accordion-header accordeon_scanner_header">
                          <button class="accordion-button accordion_scanner d-block collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseProducts" aria-expanded="false" aria-controls="collapseProducts">
                              <div class="d-flex justify-content-between">
                                  <p style="margin-bottom: 0;">Venta de Productos</p>
                                  <p style="margin-bottom: 0;">
                                      <img class="img_scanner_dropdown" src="{{ asset('assets/media/icons/de-venta.webp') }}" alt="">
                                  </p>
                              </div>
                          </button>
                        </h2>

                        <div id="collapseProducts" class="accordion-collapse collapse" data-bs-parent="#accordionScanner">
                            @include('reportes.components.ventas_productos')
                        </div>
                    </div>

                    <div class="accordion-item acoriden_items mb-2">
                        <h2 class="accordion-header accordeon_scanner_header">
                          <button class="accordion-button accordion_scanner d-block collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOrdener" aria-expanded="false" aria-controls="collapseOrdener">
                              <div class="d-flex justify-content-between">
                                  <p style="margin-bottom: 0;">Ordenes</p>
                                  <p style="margin-bottom: 0;">
                                      <img class="img_scanner_dropdown" src="{{ asset('assets/media/icons/validando-billete.webp') }}" alt="">
                                  </p>
                              </div>
                          </button>
                        </h2>

                        <div id="collapseOrdener" class="accordion-collapse collapse" data-bs-parent="#accordionScanner">
                            @include('reportes.components.ordenes')
                        </div>
                    </div>

                    <div class="accordion-item acoriden_items mb-2">
                        <h2 class="accordion-header accordeon_scanner_header">
                          <button class="accordion-button accordion_scanner d-block collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFact" aria-expanded="false" aria-controls="collapseFact">
                              <div class="d-flex justify-content-between">
                                  <p style="margin-bottom: 0;">Facturas</p>
                                  <p style="margin-bottom: 0;">
                                      <img class="img_scanner_dropdown" src="{{ asset('assets/media/icons/filtrar.webp') }}" alt="">
                                  </p>
                              </div>
                          </button>
                        </h2>

                        <div id="collapseFact" class="accordion-collapse collapse" data-bs-parent="#accordionScanner">
                            @include('reportes.components.facturas')
                        </div>
                    </div>

                    <div class="accordion-item acoriden_items mb-2">
                        <h2 class="accordion-header accordeon_scanner_header">
                          <button class="accordion-button accordion_scanner d-block collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseCoti" aria-expanded="false" aria-controls="collapseCoti">
                              <div class="d-flex justify-content-between">
                                  <p style="margin-bottom: 0;">Cotizaciones</p>
                                  <p style="margin-bottom: 0;">
                                      <img class="img_scanner_dropdown" src="{{ asset('assets/media/icons/quotes.webp') }}" alt="">
                                  </p>
                              </div>
                          </button>
                        </h2>

                        <div id="collapseCoti" class="accordion-collapse collapse" data-bs-parent="#accordionScanner">
                            @include('reportes.components.cotizaciones')
                        </div>
                    </div>

                    <div class="accordion-item acoriden_items mb-2">
                        <h2 class="accordion-header accordeon_scanner_header">
                          <button class="accordion-button accordion_scanner d-block collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseEmpleada" aria-expanded="false" aria-controls="collapseEmpleada">
                              <div class="d-flex justify-content-between">
                                  <p style="margin-bottom: 0;">Venta de Empleados</p>
                                  <p style="margin-bottom: 0;">
                                      <img class="img_scanner_dropdown" src="{{ asset('assets/media/icons/empleados.webp') }}" alt="">
                                  </p>
                              </div>
                          </button>
                        </h2>

                        <div id="collapseEmpleada" class="accordion-collapse collapse" data-bs-parent="#accordionScanner">
                            @include('reportes.components.ventas_empleados')
                        </div>
                    </div>

                    <div class="accordion-item acoriden_items mb-2">
                        <h2 class="accordion-header accordeon_scanner_header">
                          <button class="accordion-button accordion_scanner d-block collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseClientes" aria-expanded="false" aria-controls="collapseClientes">
                              <div class="d-flex justify-content-between">
                                  <p style="margin-bottom: 0;">Clientes</p>
                                  <p style="margin-bottom: 0;">
                                      <img class="img_scanner_dropdown" src="{{ asset('assets/media/icons/clientes.webp') }}" alt="">
                                  </p>
                              </div>
                          </button>
                        </h2>

                        <div id="collapseClientes" class="accordion-collapse collapse" data-bs-parent="#accordionScanner">
                            @include('reportes.components.clientes')
                        </div>
                    </div>

                </div>

        </div>


    </div>

</section>

@endsection

@section('js_custom')
<script>
    $(document).ready(function() {
        $('.empleados-multiple').select2();
    });
    $(document).ready(function() {
        $('.producto').select2();
    });
</script>
@endsection

