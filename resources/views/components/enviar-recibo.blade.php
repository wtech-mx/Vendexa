@php
    $SubTotal = 0;
    foreach ($orden->Productos as $producto){
        $SubTotal += $producto->subtotal;
    }
    $fecha = $orden->fecha;
    $fecha_timestamp = strtotime($fecha);
    $fecha_formateada = date('d \d\e F \d\e\l Y', $fecha_timestamp);
@endphp
<a style="color: #6baf2e;" target="_blank" href="https://api.whatsapp.com/send?phone={{$orden->Cliente->telefono}}&text=Compra%20{{$orden->Empresa->nombre}}%0A--------------------------------%0A%0AFecha%20%20%20%20%20%20%20%20%20%20%20%20%3A%20%20{{ $fecha_formateada }}%0A%0ADetalles%20de%20la%20Compra%3A%0A@php $total = 0; foreach ($orden->Productos as $productos) { echo $productos->Productos->nombre . "%20$" . number_format($productos->Productos->precio_normal, 2, '.', ',') . "%20%20x%20" . $productos->cantidad . "%0A";} @endphp--------------------------------%0A%0ADetalles%3A%20%0ASubtotal%3A%20${{ $total_formateado = number_format($SubTotal, 2, '.', ',') }}{{ $orden->descuento > 0 ? '%0A Descuento: '. $orden->descuento .'%' : '' }}{{ $orden->factura == 'Si' ? '%0A Factura: Si' : '' }}%0ATotal%3A%20${{ $total_formateado = number_format($orden->total, 2, '.', ',') }}%0A">
    <img class="icon_tikcet" src="{{ asset('assets/media/icons/whatsapp.webp') }}" >
    Enviar recibo por WhatsApp
</a>
