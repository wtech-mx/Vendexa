<!DOCTYPE html>
<html lang="es">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Catalogo </title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        header, footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px;
            background-color: #577590;
            color: #ffffff;
        }

        header table, footer table {
            width: 50%;
        }

        header table td, footer table td {
            padding: 0;
            border: none;
            vertical-align: middle;
        }

        header img, footer img {
            width: 100px;
            padding: 0 10px;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            text-align: center;
            padding: 10px;
            border: 1px solid #577590;
        }

        img {
            width: 140px;
            border-radius: 16px;
            margin-top: 40px;
        }
    </style>
</head>
<body>
    <header>
        <table>
            <tr>
                <td>
                    @if ($configuracion->logo)
                        <img src="{{ asset('assets/media/img/logos/not-found.webp') }}" alt="Logo">
                    @else
                        <img src="{{ asset('logo/empresa'.auth()->user()->id_empresa.'/'.$configuracion->logo) }}" alt="Logo">
                    @endif

                </td>
                <td>
                    <p style="color: #577590">---------------------------------------</p>
                </td>
                <td style="width: 350px">
                    <h1>- {{ $empresa->nombre }}</h1>
                    <ul style="list-style: none;text-align:left">
                        <li><strong>Telefono:</strong> {{ $configuracion->whatsapp }}</li>
                        <li><strong>Dirección:</strong>{{ $configuracion->Direccion->calle_numero }}, {{ $configuracion->Direccion->colonia }}, {{ $configuracion->Direccion->codigo_postal }}, {{ $configuracion->Direccion->pais }}</li>
                        {{-- <li><strong>Horario: </strong> L a V  10:00 AM a 6:00 PM, Sabado :10:00 AM a 3:00 PM</li> --}}
                    </ul>
                </td>
            </tr>
        </table>
    </header>
    <table>
        <thead>
            <tr>
                <th>Img</th>
                <th>SKU</th>
                <th>Nombre</th>
                <th>Precio</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($productos as $producto)
            <tr>
                <td>
                    <a href='' target="_blank">
                        <img src='{{ asset('imagen_principal/empresa'.auth()->user()->id_empresa.'/'.$producto->imagen_principal) }}'>
                    </a>
                </td>
                <td>{{explode('_', $producto->sku)[0]}}</td>
                <td>{{$producto->nombre}}</td>
                <td>${{number_format($producto->precio_normal, 2, '.', ',');}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <footer>
        <table>
            <tr>
                <td>
                    @if ($configuracion->logo)
                        <img src="{{ asset('assets/media/img/logos/not-found.webp') }}" alt="Logo">
                    @else
                        <img src="{{ asset('logo/empresa'.auth()->user()->id_empresa.'/'.$configuracion->logo) }}" alt="Logo">
                    @endif
                </td>
                <td>
                    <p style="color: #577590">---------------------------------------</p>
                </td>
                <td style="width: 350px">
                    <ul style="list-style: none;text-align:left">
                        <li>
                            <strong>Nota:</strong><br>
                            <p>Precio de productos hasta agotar existencia.
                                Si quieres mas informacion y/o ver el STOCK disponible ingresa a :
                                <a href="https://www.maniabikes.com.mx/inicio/">https://www.maniabikes.com.mx/inicio/</a> <br> e ingresa el SKU deseado.
                            </p>
                        </li>
                    </ul>
                </td>
            </tr>
        </table>
    </footer>
</body>
</html>
