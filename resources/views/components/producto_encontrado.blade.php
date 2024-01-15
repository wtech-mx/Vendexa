<div class="row">

    <div class="form-group col-12 px-4 py-1">
        <h2 class="tiitle_modal_white text-left ms-2">Detalles Generales</h2>
    </div>

    <div class="form-group col-12 px-4 py-3">
        <label for="name" class="label_custom_primary_product_white mb-2">Nombre :</label>
        <div class="input-group ">
            <span class="input-group-text span_custom_tab" >
                <img class="icon_span_tab" src="{{ asset('assets/media/icons/camion.webp') }}" alt="" >
            </span>
            <input id="nombre" name="nombre" type="text"  class="form-control input_custom_tab_dark @error('nombre') is-invalid @enderror"  value="{{old('nombre', $datosProducto->nombre)}}" autocomplete="" autofocus>
        </div>
    </div>

    <div class="form-group col-12 px-4 py-3">
        <label for="name" class="label_custom_primary_product_white mb-2">Descripcion :</label>
        <div class="input-group ">
            <textarea class="form-control textarea_custom_primary_dark @error('descripcion') is-invalid @enderror" id="descripcion" name="descripcion">{{$producto->descripcion}}</textarea>
        </div>
    </div>

    <div class="form-groupcol-6 col-xs-6 col-sm-6 col-md-6 col-xl-6 px-4 py-3">
        <label for="name" class="label_custom_primary_product_white mb-2">Sku :*</label>
        <div class="input-group ">
            <span class="input-group-text span_custom_tab" >
                <img class="icon_span_tab" src="{{ asset('assets/media/icons/sku.webp') }}" alt="" >
            </span>
            <input id="sku" name="sku" type="text"  class="form-control input_custom_tab_dark @error('sku') is-invalid @enderror"  value="{{old('sku', explode('_', $producto->sku)[0])}}" autocomplete="" autofocus>
        </div>
    </div>


</div>
