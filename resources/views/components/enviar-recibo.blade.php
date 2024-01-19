@php
    $SubTotal = 0;
    foreach ($orden->Productos as $producto){
        $SubTotal += $producto->subtotal;
    }
    $fecha = $orden->fecha;
    $fecha_timestamp = strtotime($fecha);
    $fecha_formateada = date('d \d\e F \d\e\l Y', $fecha_timestamp);
@endphp
<a style="color: #6baf2e;" target="_blank" href="https://api.whatsapp.com/send?phone={{$orden->Cliente->telefono}}&text=Compra%20{{$orden->Empresa->nombre}}%0A--------------------------------%0A%0AFecha%20%20%20%20%20%20%20%20%20%20%20%20%3A%20%20{{ $fecha_formateada }}%0A%0ADetalles%20de%20la%20Compra%3A%0A
    @php
    $total = 0;
    $ahorro = 0;

    foreach ($orden->Productos as $productos) {
        $nombre = $productos->Productos->nombre;
        $precio = $productos->precio;
        $precio_descuento = $productos->precio_descuento;

        // Construir el detalle del producto
        $detalle_producto = $nombre . " ";

        if ($precio_descuento > 0) {
            // Si hay descuento, tacha el precio normal y muestra solo el precio con descuento
            $detalle_producto .= "~$" . number_format($precio, 2, '.', ',') . "~ a $" . number_format($precio_descuento, 2, '.', ',') . " x " . $productos->cantidad;
            $ahorro += ($precio - $precio_descuento) * $productos->cantidad;
        } else {
            // Si no hay descuento, solo muestra el precio normal
            $detalle_producto .= "$" . number_format($precio, 2, '.', ',') . " x " . $productos->cantidad;
        }

        echo $detalle_producto . "%0A";
    }

    if ($ahorro > 0) {
        // Muestra el mensaje de ahorro solo si hay descuentos
        echo "%0A" . "--------------------------------" . "%0A";
        echo "En esta compra te ahorraste: $" . number_format($ahorro, 2, '.', ',') . "%0A";
    }

    @endphp
    Detalles%3A%20%0ASubtotal%3A%20${{ $total_formateado = number_format($SubTotal, 2, '.', ',') }}{{ $orden->descuento > 0 ? '%0A Descuento: '. $orden->descuento .'%' : '' }}{{ $orden->factura == 'Si' ? '%0A Factura: Si' : '' }}%0ATotal%3A%20${{ $total_formateado = number_format($orden->total, 2, '.', ',') }}%0A">
    <img class="icon_tikcet" src="{{ asset('assets/media/icons/whatsapp.webp') }}" >
    Enviar recibo por WhatsApp
</a>
