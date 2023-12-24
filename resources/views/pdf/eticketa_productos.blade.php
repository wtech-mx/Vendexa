<!DOCTYPE html>

<html lang="es">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title>Document</title>
    </head>
    <body>
        <div class="" style="position: absolute;padding:0;">
            <div style="position: relative;top:-35px;left:-37px;">
                {!! DNS1D::getBarcodeHTML($producto->sku, 'C128',2,25) !!}
                <p style="font-size: 9px;padding:1px;margin:0px;">{{ Str::limit($producto->nombre, 75) }}</p>
                <p style="font-size: 9px;padding:1px;margin:0px;">{{ explode('_', $producto->sku)[0] }}</p>
                <p style="font-size: 9px;padding:1px;margin:0px;">$ {{ $producto->precio_normal }}</p>
            </div>
        </div>

    </body>
</html>
