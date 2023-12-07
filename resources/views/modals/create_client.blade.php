@section('css_custom')


@endsection

<!-- Modal -->
<div class="modal fade" id="creatClient" tabindex="-1" aria-labelledby="creatClientLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">

        <div class="modal-body modal_bg row">

            <form method="POST" action="{{ route('productos.store') }}" class="z-1 dropzone"  id="miFormulario" enctype="multipart/form-data">
                @csrf

                <div class="row">
                    <div class="col-10">
                        <h2 class="tiitle_modal_dark text-center mt-3">Crear Cliente</h2>
                    </div>

                    <div class="col-2">
                        <a class="input-group-text span_custom_primary_dark mt-3" data-bs-dismiss="modal" style="margin-right: 0rem!important;">
                            <img class="icon_span_form" src="{{ asset('assets/media/icons/close_white.webp') }}" alt="" >
                        </a>
                    </div>
                </div>

                <div class="row px-3">

                    <div class="form-group text-left col-12 mt-4 p-2">
                       <h6 class="subtittle_clientes">Datos Generales</h6>
                    </div>

                    <div class="form-group col-12 mb-3 p-2">
                        <label for="name" class="label_custom_primary_product mb-2">Nombre : *</label>
                        <div class="input-group ">
                            <span class="input-group-text span_custom_tab" >
                                <img class="icon_span_form" src="{{ asset('assets/media/icons/fuente.webp') }}" alt="" >
                            </span>
                            <input id="" name="" type="text"  class="form-control input_custom_tab_dark @error('') is-invalid @enderror"  value="{{ old('') }}"  autocomplete="" autofocus>
                        </div>
                    </div>

                    <div class="form-group col-12 mb-3 p-2">
                        <label for="name" class="label_custom_primary_product mb-2">Apellido(s) *</label>
                        <div class="input-group ">
                            <span class="input-group-text span_custom_tab" >
                                <img class="icon_span_form" src="{{ asset('assets/media/icons/fuente.webp') }}" alt="" >
                            </span>
                            <input id="" name="" type="text"  class="form-control input_custom_tab_dark @error('') is-invalid @enderror"  value="{{ old('') }}"  autocomplete="" autofocus>
                        </div>
                    </div>

                    <div class="form-group col-6 mb-3 p-2">
                        <label for="name" class="label_custom_primary_product mb-2">WhatsApp *</label>
                        <div class="input-group ">
                            <span class="input-group-text span_custom_tab" >
                                <img class="icon_span_form" src="{{ asset('assets/media/icons/whatsapp.webp') }}" alt="" >
                            </span>
                            <input id="" name="" type="text"  class="form-control input_custom_tab_dark @error('') is-invalid @enderror"  value="{{ old('') }}"  autocomplete="" autofocus>
                        </div>
                    </div>

                    <div class="form-group col-6 mb-3 p-2">
                        <label for="name" class="label_custom_primary_product mb-2">Correo Electronico *</label>
                        <div class="input-group ">
                            <span class="input-group-text span_custom_tab" >
                                <img class="icon_span_form" src="{{ asset('assets/media/icons/sobre.png.webp') }}" alt="" >
                            </span>
                            <input id="" name="" type="text"  class="form-control input_custom_tab_dark @error('') is-invalid @enderror"  value="{{ old('') }}"  autocomplete="" autofocus>
                        </div>
                    </div>

                    <div class="form-group col-6 mb-3 p-2">
                        <label for="name" class="label_custom_primary_product mb-2">Imagen de perfil</label>
                        <div class="input-group ">
                            <span class="input-group-text span_custom_tab" >
                                <img class="icon_span_form" src="{{ asset('assets/media/icons/user_predeterminado.webp') }}" alt="" >
                            </span>
                            <input id="" name="" type="file"  class="form-control input_custom_tab_dark @error('') is-invalid @enderror"  value="{{ old('') }}"  autocomplete="" autofocus>
                        </div>
                    </div>

                    <div class="form-group col-6 mb-3 p-2">
                        <label for="name" class="label_custom_primary_product mb-2">_</label>

                    </div>

                    <div class="form-group col-6 mb-3 p-2">
                        <label for="name" class="label_custom_primary_product mb-2">Fecha de Nacimiento</label>
                        <div class="input-group ">
                            <span class="input-group-text span_custom_tab" >
                                <img class="icon_span_form" src="{{ asset('assets/media/icons/calendar-dar.webp') }}" alt="" >
                            </span>
                            <input id="" name="" type="date"  class="form-control input_custom_tab_dark @error('') is-invalid @enderror"  value="{{ old('') }}"  autocomplete="" autofocus>
                        </div>
                    </div>

                    <div class="form-group col-6 mb-3 p-2">
                        <label for="name" class="label_custom_primary_product mb-2">Recomendacion de:</label>
                        <div class="input-group ">
                            <span class="input-group-text span_custom_tab" >
                                <img class="icon_span_form" src="{{ asset('assets/media/icons/referencia.webp') }}" alt="" >
                            </span>
                            <input id="" name="" type="text"  class="form-control input_custom_tab_dark @error('') is-invalid @enderror"  value="{{ old('') }}"  autocomplete="" autofocus>
                        </div>
                    </div>


                    <div class="form-group text-left col-12 mt-4 p-2">
                        <h6 class="subtittle_clientes">Datos de Direccion</h6>
                     </div>

                     <div class="form-group col-6 mb-3 p-2">
                        <label for="name" class="label_custom_primary_product mb-2">Codigo Postal</label>
                        <div class="input-group ">
                            <span class="input-group-text span_custom_tab" >
                                <img class="icon_span_form" src="{{ asset('assets/media/icons/cero.webp') }}" alt="" >
                            </span>
                            <input id="" name="" type="text"  class="form-control input_custom_tab_dark @error('') is-invalid @enderror"  value="{{ old('') }}"  autocomplete="" autofocus>
                        </div>
                    </div>

                    <div class="form-group col-6 mb-3 p-2">
                        <label for="name" class="label_custom_primary_product mb-2">Estado</label>
                        <div class="input-group ">
                            <span class="input-group-text span_custom_tab" >
                                <img class="icon_span_form" src="{{ asset('assets/media/icons/independencia.webp') }}" alt="" >
                            </span>
                            <input id="" name="" type="text"  class="form-control input_custom_tab_dark @error('') is-invalid @enderror"  value="{{ old('') }}"  autocomplete="" autofocus>
                        </div>
                    </div>

                    <div class="form-group col-6 mb-3 p-2">
                        <label for="name" class="label_custom_primary_product mb-2">Alcaldia  / Municipio</label>
                        <div class="input-group ">
                            <span class="input-group-text span_custom_tab" >
                                <img class="icon_span_form" src="{{ asset('assets/media/icons/alcaldia.webp') }}" alt="" >
                            </span>
                            <input id="" name="" type="text"  class="form-control input_custom_tab_dark @error('') is-invalid @enderror"  value="{{ old('') }}"  autocomplete="" autofocus>
                        </div>
                    </div>

                    <div class="form-group col-6 mb-3 p-2">
                        <label for="name" class="label_custom_primary_product mb-2">Ciudad</label>
                        <div class="input-group ">
                            <span class="input-group-text span_custom_tab" >
                                <img class="icon_span_form" src="{{ asset('assets/media/icons/edificios_ciudad.webp') }}" alt="" >
                            </span>
                            <input id="" name="" type="text"  class="form-control input_custom_tab_dark @error('') is-invalid @enderror"  value="{{ old('') }}"  autocomplete="" autofocus>
                        </div>
                    </div>

                    <div class="form-group col-6 mb-3 p-2">
                        <label for="name" class="label_custom_primary_product mb-2">Colonia</label>
                        <div class="input-group ">
                            <span class="input-group-text span_custom_tab" >
                                <img class="icon_span_form" src="{{ asset('assets/media/icons/poste_luz.webp') }}" alt="" >
                            </span>
                            <input id="" name="" type="text"  class="form-control input_custom_tab_dark @error('') is-invalid @enderror"  value="{{ old('') }}"  autocomplete="" autofocus>
                        </div>
                    </div>

                    <div class="form-group col-6 mb-3 p-2">
                        <label for="name" class="label_custom_primary_product mb-2">Calle</label>
                        <div class="input-group ">
                            <span class="input-group-text span_custom_tab" >
                                <img class="icon_span_form" src="{{ asset('assets/media/icons/mapa-de-la-ciudad.webp') }}" alt="" >
                            </span>
                            <input id="" name="" type="text"  class="form-control input_custom_tab_dark @error('') is-invalid @enderror"  value="{{ old('') }}"  autocomplete="" autofocus>
                        </div>
                    </div>

                    <div class="form-group col-12 mt-4 mb-4 ">
                        <p class="text-center ">
                            <button type="submit" class="btn btn-success btn_save_custom">Guardar</button>
                        </p>
                    </div>

                </div>



            </form>

        </div>

      </div>
    </div>
  </div>

@section('js_custom')


@endsection
