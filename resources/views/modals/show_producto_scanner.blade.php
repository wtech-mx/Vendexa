<div class="mb-3">
    <h5 class="d-inline">{{count($productos)}} Productos Encontrados</h5>
</div>
@foreach ($productos as $producto)
    <div class="comtainer_products_width row mb-3">
        <div class="col-6 col-sm-6 col-md-6 col-lg-9 my-auto">
            <img class="img_prodcut_reportes d-inline" src="{{ asset('imagen_principal/empresa'.auth()->user()->id_empresa.'/'.$producto->imagen_principal) }}" alt="" >
            <h5 class="d-inline text_titlle_tab_reporte">{{$producto->nombre}}</h5>
        </div>

        <div class="col-6 col-sm-6 col-md-6 col-lg-3">
            <h6 class="text_subtitlle_tab_reporte">SKU : {{explode('_', $producto->sku)[0]}}</h6>
            <h5 class="text_titlle_tab_reporte">Precio: {{$producto->precio_normal}}</h5>
            <h6 class="text_subtitlle_tab_reporte">STOCK : {{$producto->stock}}</h6>
        </div>
    </div>
@endforeach
