<!DOCTYPE html>

<html lang="es">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title>Document</title>
    </head>
    <body>
        <div class="" style="position: absolute;padding:0;">
            <div style="position: relative;top:-35px;left:-37px;">
                {!! DNS1D::getBarcodeHTML(explode('_', $producto->sku)[0], 'C128',2,25) !!}
                <p style="font-size: 9px;padding:1px;margin:0px;">{{ Str::limit($producto->nombre, 75) }}</p>
                <p style="font-size: 9px;padding:1px;margin:0px;">{{ explode('_', $producto->sku)[0] }}</p>

                    @if($producto->precio_descuento == NULL)
                        <p style="font-size: 9px;padding:1px;margin:0px;"> ${{number_format($producto->precio_normal, 2, '.', ',');}} </p>

                        @else

                        @if(strtotime($producto->fecha_fin_desc) >= strtotime(date('Y-m-d')))
                            <p class="" style="font-size: 9px;padding:1px;margin:0px;"><a style="text-decoration: line-through;">de: ${{number_format($producto->precio_normal, 2, '.', ',')}}</a>

                            <strong>a : ${{number_format($producto->precio_descuento, 2, '.', ',');}} </strong></p>
                        @else

                            <p style="font-size: 9px;padding:1px;margin:0px;">
                                    ${{number_format($producto->precio_normal, 2, '.', ',');}}
                            </p>

                        @endif
                    @endif

                    @if ($producto->precio_mayo == NULL)

                    @else
                        <p style="font-size: 9px;padding:1px;margin:0px;">Mayorista ${{number_format($producto->precio_mayo, 2, '.', ',');}} </p>
                    @endif
            </div>
        </div>

    </body>
</html>
