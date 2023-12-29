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

                <form method="POST" action="{{ route('bulk_promocion.product') }}" class="z-1"  id="miFormularioBulk" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group col-12 " style="z-index: 10">

                        <div class="d-flex justify-content-center">
                            <label for="name" class="label_custom_primary_product mb-2">Agregar Promocion </label>
                        </div>

                        <div class="d-flex justify-content-center">
                            <div class="input-group mt-3" style="display: contents;">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="radioPromoBulk" id="radioSiBulkpromo" value="Si">
                                    <label class="form-check-label" for="">Si</label>
                                </div>

                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="radioPromoBulk" id="radioNoBulkpromo" value="No" checked>
                                    <label class="form-check-label" for="">No</label>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="row" id="precioPromoBulkContainer" style="display: none">
                        <div class="form-group col-6 px-4 py-3">
                            <label for="name" class="label_custom_primary_product mb-2">Tipo</label>
                            <div class="input-group ">
                                <span class="input-group-text span_custom_tab" >
                                    <img class="icon_span_tab" src="{{ asset('assets/media/icons/descuento.webp') }}" alt="" >
                                </span>
                                <select name="tipo_bulk" id="tipo_bulk" class="form-select d-inline-block input_custom_tab">
                                    <option value="">Selecionar </option>
                                    <option value="Porcentaje">Porcentaje</option>
                                    <option value="Fijo">Fijo</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group col-6 px-4 py-3">
                            <label for="name" class="label_custom_primary_sm mb-2">Monto</label>
                            <div class="input-group ">
                                <span class="input-group-text span_custom_tab" >
                                    <img class="icon_span_tab" src="{{ asset('assets/media/icons/coins.webp') }}" alt="" >
                                </span>
                                <input id="monto_bulk" name="monto_bulk" type="text"  class="form-control input_custom_tab">
                            </div>
                        </div>

                        <div class="form-group col-6 px-4 py-3">
                            <label for="name" class="label_custom_primary_product mb-2">Fecha de inicio</label>
                            <div class="input-group ">
                                <span class="input-group-text span_custom_tab" >
                                    <img class="icon_span_tab" src="{{ asset('assets/media/icons/calendar-dar.webp') }}" alt="" >
                                </span>
                                <input id="fecha_inicio_desc_bulk" name="fecha_inicio_desc_bulk" type="date"  class="form-control input_custom_tab">
                            </div>
                        </div>

                        <div class="form-group col-6 px-4 py-3">
                            <label for="name" class="label_custom_primary_product mb-2">Fecha de Fin</label>
                            <div class="input-group ">
                                <span class="input-group-text span_custom_tab" >
                                    <img class="icon_span_tab" src="{{ asset('assets/media/icons/calendar-dar.webp') }}" alt="" >
                                </span>
                                <input id="fecha_fin_desc_bulk" name="fecha_fin_desc_bulk" type="date"  class="form-control input_custom_tab">
                            </div>
                        </div>

                        <div class="form-group col-12 px-4 py-3">
                            <p class="text-center ">
                                <button type="submit" class="btn btn-sm btn-success btn_save_custom">Promocionar</button>
                            </p>
                        </div>


                    </div>

                </form>

            </div>
        </div>

      </div>
    </div>
  </div>

