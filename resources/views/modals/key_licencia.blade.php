
<div class="modal " id="key_licencia" tabindex="-1" aria-labelledby="key_licenciaLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">

      <div class="modal-content">

        <div class="modal-body modal_bg_dark row">

                <div class="row">
                    <div class="col-12">
                        <h2 class="tiitle_modal_dark text-center mt-3" style="color: #ffffff !important;">Licencia Vencida</h2>
                    </div>
                </div>

                <div class="row px-3">

                    <div class="col-12">

                        <div class="carousel-item active mt-2 mb-3">
                            <p class="text-center d-flex justify-content-center">
                                <img src="{{ asset('assets/media/icons/encerrar.webp') }}" class="img_slide_config" alt="...">
                                <div class="row ">
                                    <div class="form-group text-left col-12">
                                        <h4 class="subtittle_clientes text-center text-white">Tu Licencia {{$licencia_global->membrecia}} se vencio</h4>
                                        </div>

                                        <form method="POST" action="{{ route('key.update', $licencia_global->id) }}" class="z-1"  id="miFormularioKeylicencia" enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" name="_method" value="PATCH">

                                            <div class="form-group col-12 mb-3">
                                                <label for="name" class="label_custom_primary_product text-white mb-2">Ingresar Key</label>
                                                <div class="input-group mb-3">
                                                <span class="input-group-text span_custom_tab" >
                                                    <img class="icon_span_form" src="{{ asset('assets/media/icons/keys.webp') }}" alt="" >
                                                </span>
                                                <input  name="key" id="key" type="text"  class="form-control input_custom_tab_dark @error('key') is-invalid @enderror"  value="{{ old('key') }}" autocomplete="" autofocus>
                                                </div>
                                            </div>

                                            <div class="form-group col-12 mt-2 mb-2 ">
                                                <p class="text-center ">
                                                    <button type="submit" class="btn btn-success btn_save_custom">Activar</button>
                                                </p>
                                            </div>
                                        </form>

                                </div>
                            </p>
                        </div>

                    </div>

                </div>

        </div>

    </div>

  </div>
</div>
