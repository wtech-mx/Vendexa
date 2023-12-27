@section('css_custom')


@endsection

<!-- Modal -->
<div class="modal fade" id="creatRoles" tabindex="-1" aria-labelledby="creatRolesLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">

        <div class="modal-body modal_bg row">

            <form method="POST" action="{{ route('roles.store') }}" class="z-1"  id="miFormularioTrabajadores" enctype="multipart/form-data">
                @csrf

                <div class="row">
                    <div class="col-10">
                        <h2 class="tiitle_modal_dark text-center mt-3">Crear Rol</h2>
                    </div>

                    <div class="col-2">
                        <a class="input-group-text span_custom_primary_dark mt-3" data-bs-dismiss="modal" style="margin-right: 0rem!important;">
                            <img class="icon_span_form" src="{{ asset('assets/media/icons/close_white.webp') }}" alt="" >
                        </a>
                    </div>
                </div>

                <div class="row px-3">

                    <div class="form-group col-6 mb-3 p-2">
                        <label for="name" class="label_custom_primary_product mb-2">Nombre : *</label>
                        <div class="input-group ">
                            <span class="input-group-text span_custom_tab" >
                                <img class="icon_span_form" src="{{ asset('assets/media/icons/fuente.webp') }}" alt="" >
                            </span>
                            <input  name="name" id="name" type="text"  class="form-control input_custom_tab_dark @error('name') is-invalid @enderror"  value="{{ old('name') }}"  autocomplete="" autofocus>
                        </div>
                    </div>

                    @foreach($permission as $value)
                    <div class="form-group col-12 px-4 py-3">
                        <label for="name" class="label_custom_primary_product mb-2">{{ $value->name }}</label>
                        <div class="input-group mb-3">
                            <div class="form-check">
                                <input class="form-check-input" name="permission[]" type="checkbox" value="{{$value->id}}">
                            </div>
                        </div>
                    </div>
                    @endforeach


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

@section('js_custom2_clientes')

<script>

</script>

@endsection
