
    <div class="col-6 col-md-4 col-lg-4 py-3">
        <label class="form-label tiitle_products">Rango Stock de</label>
        <div class="input-group">
            <span class="input-group-text span_custom_tab" >
                <img class="icon_span_tab" src="{{ asset('assets/media/icons/cero.webp') }}" alt="" >
            </span>
            <input id="stock_de" name="stock_de" type="number"  class="form-control input_custom_tab @error('stock_de') is-invalid @enderror"  value="{{ old('stock_de') }}" autocomplete="" autofocus>
        </div>
    </div>

    <div class="col-6 col-md-4 col-lg-4 py-3">
        <label class="form-label tiitle_products">hasta </label>
        <div class="input-group">
            <span class="input-group-text span_custom_tab" >
                <img class="icon_span_tab" src="{{ asset('assets/media/icons/9.webp') }}" alt="" >
            </span>
            <input id="stock_a" name="stock_a" type="number"  class="form-control input_custom_tab @error('stock_a') is-invalid @enderror"  value="{{ old('stock_a') }}" autocomplete="" autofocus>
        </div>
    </div>

    <div class="col-6 col-md-4 col-lg-4 py-3">
        <label class="form-label tiitle_products">Rango Precio de</label>
        <div class="input-group">
            <span class="input-group-text span_custom_tab" >
                <img class="icon_span_tab" src="{{ asset('assets/media/icons/cero.webp') }}" alt="" >
            </span>
            <input id="precio_normal_de" name="precio_normal_de" type="number"  class="form-control input_custom_tab @error('precio_normal_de') is-invalid @enderror"  value="{{ old('precio_normal_de') }}" autocomplete="" autofocus>
        </div>
    </div>

    <div class="col-6 col-md-4 col-lg-4 py-3">
        <label class="form-label tiitle_products">hasta </label>
        <div class="input-group">
            <span class="input-group-text span_custom_tab" >
                <img class="icon_span_tab" src="{{ asset('assets/media/icons/9.webp') }}" alt="" >
            </span>
            <input id="precio_normal_a" name="precio_normal_a" type="number"  class="form-control input_custom_tab @error('precio_normal_a') is-invalid @enderror"  value="{{ old('precio_normal_a') }}" autocomplete="" autofocus>
        </div>
    </div>

    <div class="col-6 col-md-4 col-lg-4 py-3">
        <label class="form-label tiitle_products">Marca</label>
        <div class="input-group">
            <span class="input-group-text span_custom_tab" >
                <img class="icon_span_tab" src="{{ asset('assets/media/icons/marca.webp') }}" alt="" >
            </span>
            <select name="id_marca" id="id_marca" class="form-select d-inline-block input_custom_tab">
                <option value="" {{ old('') == '' ? 'selected' : '' }}>Selecionar </option>
                @foreach ($marcas as $marca)
                    <option value="{{ $marca->id }}" @if(old('id_marca') == $marca->id) selected @endif>{{ $marca->nombre }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="col-6 col-md-4 col-lg-4 py-3">
        <label class="form-label tiitle_products">Categoria</label>
        <div class="input-group">
            <span class="input-group-text span_custom_tab" >
                <img class="icon_span_tab" src="{{ asset('assets/media/icons/categorias.webp') }}" alt="" >
            </span>
            <select name="id_categoria" id="id_categoria" class="form-select d-inline-block input_custom_tab">
                <option value="" {{ old('') == '' ? 'selected' : '' }}>Selecionar</option>
                @foreach ($categorias as $categoria)
                    <option value="{{ $categoria->id }}" @if(old('id_categoria') == $categoria->id) selected @endif>{{ $categoria->nombre }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="col-6 col-md-4 col-lg-4 py-3">
        <label class="form-label tiitle_products">Subcategoria</label>
        <div class="input-group">
            <span class="input-group-text span_custom_tab" >
                <img class="icon_span_tab" src="{{ asset('assets/media/icons/paquete.webp') }}" alt="" >
            </span>
            <select name="id_subcategoria" id="id_subcategoria" class="form-select d-inline-block input_custom_tab">
                <option value="" {{ old('') == '' ? 'selected' : '' }}>Selecionar </option>
                @foreach ($subcategorias as $subcategoria)
                    <option value="{{ $subcategoria->id }}" @if(old('id_subcategoria') == $subcategoria->id) selected @endif>{{ $subcategoria->nombre }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="col-6 col-md-4 col-lg-4 py-3">
        <label class="form-label tiitle_products">Proveedor</label>
        <div class="input-group">
            <span class="input-group-text span_custom_tab" >
                <img class="icon_span_tab" src="{{ asset('assets/media/icons/camion.webp') }}" alt="" >
            </span>
            <select name="id_proveedor" id="id_proveedor" class="form-select d-inline-block input_custom_tab"  value="{{old('')}}">
                <option value="" {{ old('') == '' ? 'selected' : '' }}>Selecionar </option>
                @foreach ($proveedores as $proveedor)
                    <option value="{{ $proveedor->id }}" @if(old('id_proveedor') == $proveedor->id) selected @endif>{{ $proveedor->nombre }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="col-6 col-md-4 col-lg-4 py-3">
        <label class="form-label tiitle_products">Estatus </label>
        <div class="input-group">
            <span class="input-group-text span_custom_tab" >
                <img class="icon_span_tab" src="{{ asset('assets/media/icons/semaforos.webp') }}" alt="" >
            </span>
            <select name="visibilidad_estatus" id="visibilidad_estatus" class="form-select d-inline-block input_custom_tab">
                <option value="" {{ old('') == '' ? 'selected' : '' }}>Selecionar </option>
                    <option value="Si" @if(old('visibilidad_estatus') == 'Si') selected @endif>Publicado</option>
                    <option value="No" @if(old('visibilidad_estatus') == 'No') selected @endif>Desactivado</option>
            </select>
        </div>
    </div>

    <div class="col-6 col-md-4 col-lg-4 py-3">
        <label class="form-label tiitle_products">Descuento </label>
        <div class="input-group">
            <span class="input-group-text span_custom_tab" >
                <img class="icon_span_tab" src="{{ asset('assets/media/icons/descuento.webp') }}" alt="" >
            </span>
            <select name="descuento" id="descuento" class="form-select d-inline-block input_custom_tab">
                <option value="" {{ old('') == '' ? 'selected' : '' }}>Selecionar </option>
                    <option value="Si" @if(old('descuento') == 'Si') selected @endif>Sin Descuento</option>
                    <option value="No" @if(old('descuento') == 'No') selected @endif>Con Descuento</option>
            </select>
        </div>
    </div>

    <div class="col-6 col-md-4 col-lg-4 py-3">
        <label class="form-label tiitle_products">-</label>
        <div class="input-group">
            <button class="btn btn_filter text-white" type="submit" style="">Buscar
                <img class="icon_span_tab" src="{{ asset('assets/media/icons/buscar.webp') }}" alt="" >

            </button>
        </div>

    </div>

