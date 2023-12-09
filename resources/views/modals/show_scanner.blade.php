

<!-- Modal -->
<div class="modal fade" id="show_Scanner" tabindex="-1" aria-labelledby="show_ScannerLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

          <div class="modal-body modal_bg row">

              <form method="POST" action="" class="z-1"  id="" enctype="multipart/form-data">
                  @csrf
                  <div class="row">
                      <div class="col-10">
                          <h2 class="tiitle_modal_dark text-center mt-3">Scanner</h2>
                      </div>

                      <div class="col-2">
                          <a class="input-group-text span_custom_primary_dark mt-3" data-bs-dismiss="modal" style="margin-right: 0rem!important;">
                              <img class="icon_span_form" src="{{ asset('assets/media/icons/close_white.webp') }}" alt="" >
                          </a>
                      </div>

                      <div class="col-12">
                        <div class="accordion accoirdion_scanner px-4" id="accordionScanner">
                            <div class="accordion-item acoriden_items mb-2">
                              <h2 class="accordion-header accordeon_scanner_header">
                                <button class="accordion-button accordion_scanner d-block" type="button" data-bs-toggle="collapse" data-bs-target="#collapseProducts" aria-expanded="true" aria-controls="collapseProducts">
                                    <div class="d-flex justify-content-between">
                                        <p style="margin-bottom: 0;">Scanner</p>
                                        <p style="margin-bottom: 0;">
                                            <img class="img_scanner_dropdown" src="{{ asset('assets/media/icons/scanner.webp') }}" alt="">
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
                                        <p style="margin-bottom: 0;">Busqueda avanzada</p>
                                        <p style="margin-bottom: 0;">
                                            <img class="img_scanner_dropdown" src="{{ asset('assets/media/icons/filtrar.webp') }}" alt="">
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

                        </div>
                      </div>

                  </div>
              </form>

          </div>

        </div>
      </div>
  </div>
