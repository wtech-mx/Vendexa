<!-- Modal -->
<div class="modal fade" id="bulkaction" tabindex="-1" aria-labelledby="bulkactionLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">

        <div class="modal-body modal_bg ">

            <div class="row" style="">

                <div class="col-10" style="z-index: 10">
                    <h2 class="tiitle_modal_dark text-center mt-3">Acciones</h2>
                </div>

                <div class="col-2"style="z-index: 10">
                    <a class="input-group-text span_custom_primary_dark mt-3" data-bs-dismiss="modal" style="margin-right: 0rem!important;">
                        <img class="icon_span_form" src="{{ asset('assets/media/icons/close_white.webp') }}" alt="" >
                    </a>
                </div>

                <div class="col-12 d-flex justify-content-center" style="z-index: 10">
                    <button class="btn btn-sm btn_generar_pdf_w80 mb-4"  onclick="generarReporte()">
                        Generar Catalogo
                        <img class="icon_span_tab" src="{{ asset('assets/media/icons/catalogo.webp') }}" alt="">
                    </button>
                </div>

                <div class="col-12 d-flex justify-content-center" style="z-index: 10">
                    <button class="btn btn-sm btn_generar_pdf_w80 mb-4"  onclick="publicarProductos()">
                        Publicar productos
                        <img class="icon_span_tab" src="{{ asset('assets/media/icons/megafono.webp') }}" alt="">
                    </button>
                </div>

                <div class="col-12 d-flex justify-content-center" style="z-index: 10">
                    <button class="btn btn-sm btn_generar_pdf_w80 mb-4"  onclick="pusarProductos()">
                        Pusar productos
                        <img class="icon_span_tab" src="{{ asset('assets/media/icons/boton-de-pausa.webp') }}" alt="">
                    </button>
                </div>


            </div>
        </div>

      </div>
    </div>
  </div>

