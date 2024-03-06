<?php

namespace App\Http\Controllers;

use App\Models\CajaEgresos;
use App\Models\Clientes;
use App\Models\Configuraciones;
use App\Models\DatosFacturas;
use App\Models\Ordenes;
use App\Models\OrdenesPagos;
use App\Models\OrdenesProductos;
use App\Models\Productos;
use App\Models\User;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CajaController extends Controller
{
    public function index($code){
        $user = auth()->user()->id_empresa;

        $productos = Productos::where('id_empresa', $user)->where('visibilidad_estatus', '=', 'Si')->get();
        $clientes = Clientes::where('id_empresa', $user)->get();

        return view('caja.index', compact('productos', 'clientes', 'user'));
    }

    public function agregarAlCarrito(Request $request)
    {
        $codigo = $request->input('codigo');
        if (strpos($codigo, '_auth()->user()->id_empresa') === false) {
            $codigo .= '_'.auth()->user()->id_empresa;
        }

        $producto = Productos::where('sku', $codigo)->first();

        if ($producto) {
            $datosProducto = $producto->toArray();

            return response()->json($datosProducto);
        } else {
            return response()->json(['nombre' => 'Producto no encontrado']);
        }
    }

    public function validation_pass(Request $request){


        $validator = Validator::make($request->all(), [
            'password_caja' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        // Verificar si existe un registro con el valor proporcionado en password_caja
        $passwordCaja = $request->input('password_caja');

        $user = User::where('password_caja', $passwordCaja)->first();

        if ($user) {
            // El valor de password_caja existe en la tabla users
            // Haz lo que necesites hacer aquí

            $key =  $user->id.'_'.$request->get('password_caja');

            $pass_data = [
                "clave" => $key,
            ];

            return response()->json(['success' => true, 'pass' => $pass_data]);

        } else {
            // No se encontró el valor de password_caja en la tabla users
            // return response()->json(['errors' => 'Clave no encontrada'], 422);
            return response()->json(['errors' => ['password_caja' => ['Clave no encontrada']]], 422);
        }
    }

    public function obtenerRegistrosCliente($id){
        // Obtén los registros relacionados con el cliente
        $facturas = DatosFacturas::where('id_cliente', $id)->get();

        // Devuelve los datos en formato JSON
        return response()->json($facturas);
    }

    public function store(Request $request){

        $validator = Validator::make($request->all(), [
            'nombre_cliente' => 'required_if:id_client,null',
            'apellido_cliente' => 'required_if:id_client,null',
            'whats_cliente' => 'required_if:id_client,null',
            'id_cajero' => 'required',
            'dineroRecibido'=> 'required_if:inlineCorizacion,No',
        ]);

        $dominio = $request->getHost();
        if($dominio == 'wtech.com.mx'){
            $fotos_comprobante = base_path('../public_html/vendexa/comprobantes/empresa'.auth()->user()->id_empresa);
        }else{
            $fotos_comprobante = public_path() . '/comprobantes/empresa'.auth()->user()->id_empresa;
        }

        $configuracion = Configuraciones::where('id_empresa', auth()->user()->id_empresa)->first();
        if($configuracion->codigo_caja == 1){
            $key = $request->get('id_cajero'); // Aquí tendrías tu última parte de la URL

            // Dividir la cadena usando el guion bajo como delimitador
            $parts_key = explode('_', $key);

            // Obtener los elementos individuales
            $firstKey = $parts_key[0]; // El número antes del guion
            $secondKey = $parts_key[1]; // El número después del guion

            $userkey = User::where('id', $firstKey)->where('password_caja', $secondKey)->first();
        }

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $fechaActual = Carbon::now();
        // C R E A R  C L I E N T E
            if($request->get('nombre_cliente') != NULL){
                $client = new Clientes;
                $client->nombre = $request->get('nombre_cliente') . ' ' . $request->get('apellido_cliente');
                $client->telefono = $request->get('whats_cliente');
                $client->correo = $request->get('email_cliente');
                $client->id_user = auth()->user()->id;
                $client->id_empresa = auth()->user()->id_empresa;
                $client->save();
                $cliente = $client->id;
            }else{
                $cliente = $request->get('id_client');
            }

        // C R E A R  F A C T U R A
            if($request->get('inlineFact') == 'Si'){
                if($request->get('id_factura') != NULL){
                    $factura = $request->get('id_factura');
                }else{
                    $factura = new DatosFacturas;
                    $factura->id_cliente = $cliente;
                    $factura->razon_social = $request->get('razon_cliente');
                    $factura->rfc = $request->get('rfc_cliente');
                    $factura->cfdi = $request->get('cfdi_cliente');
                    $factura->direccion_factura = $request->get('direccion_cliente');
                    $factura->save();

                    $factura = $factura->id;
                }
            }

        // G U A R D A R  O R D E N  P R I N C I P A L
            $orden = new Ordenes;
            $orden->id_cliente = $cliente;
            $orden->fecha = $fechaActual;
            $orden->total = $request->get('sumaSubtotales');
            $orden->cotizacion = $request->get('inlineCorizacion');
            $orden->restante = $request->get('restante');
            $orden->tipo_desc = $request->get('tipoDescuento');
            $orden->descuento = $request->get('montoDescuento');
            if($request->get('inlineFact') == 'Si'){
                $orden->id_factura = $factura;
            }
            $orden->factura = $request->get('inlineFact');

            if($configuracion->codigo_caja == 1){
                $orden->id_cajero = $userkey->id;
            }else{
                $orden->id_cajero = auth()->user()->id;
            }
            $orden->id_user = auth()->user()->id;

            $orden->id_empresa = auth()->user()->id_empresa;

            $orden->save();

        // G U A R D A R  O R D E N  P A G O
        if($request->get('inlineCorizacion') == 'No'){
            $orden_pagos = new OrdenesPagos;
            $orden_pagos->id_orden = $orden->id;
            if($request->get('dineroRecibido2') == NULL){
                $dineroRecibido2 = 0;
            }else{
                $dineroRecibido2 = $request->get('dineroRecibido2');
            }

            if($request->get('cambio') > 0){
                $suma = $request->get('dineroRecibido') + $request->get('dineroRecibido2');
                $monto = $suma - $request->get('cambio');
                $orden_pagos->monto = $monto;

                $cambio = new CajaEgresos;
                $cambio->id_user = auth()->user()->id;
                $cambio->id_empresa = auth()->user()->id_empresa;
                $cambio->concepto = 'Cambio nota: #'.$orden->id;
                $cambio->monto = $request->get('cambio');
                $cambio->fecha = $fechaActual;
                $cambio->save();

            }else{
                $orden_pagos->monto = $request->get('dineroRecibido') + $dineroRecibido2;
            }

            $orden_pagos->dinero_recibido = $request->get('dineroRecibido');
            $orden_pagos->dinero_recibido2 = $request->get('dineroRecibido2');
            $orden_pagos->cambio = $request->get('cambio');
            $orden_pagos->metodo_pago = $request->get('metodo_pago');
            $orden_pagos->metodo_pago2 = $request->get('metodo_pago2');

            if ($request->hasFile("comprobante")) {
                $file = $request->file('comprobante');
                $path = $fotos_comprobante;
                $fileName = uniqid() . $file->getClientOriginalName();
                $file->move($path, $fileName);
                $orden_pagos->comprobante = $fileName;
            }

            $orden_pagos->fecha = $fechaActual;
            $orden_pagos->save();
        }

        // G U A R D A R  O R D E N  P R O D U C T O S
        $productos = $request->get('id');
        $cantidad = $request->get('cantidad');
        $subtotal = $request->get('subtotal');
        $precio = $request->get('precio');

        $fechaActual = date('Y-m-d');

        for ($count = 0; $count < count($productos); $count++) {
            $producto = Productos::find($productos[$count]);
            if($request->get('inlineCorizacion') == 'No'){
                $resta_stock = $producto->stock - $cantidad[$count];
                $producto->stock = $resta_stock;
                $producto->update();
            }
            if ($fechaActual >= $producto->fecha_inicio_desc && $fechaActual <= $producto->fecha_fin_desc) {
                $precioDescuento = $producto->precio_descuento;
                $precioPrecio = $producto->precio_normal;
            }else{
                $precioDescuento = 0;
                $precioPrecio = $precio[$count];
            }

            $data = array(
                'id_orden' => $orden->id,
                'id_producto' => $productos[$count],
                'cantidad' => $cantidad[$count],
                'precio' => $precioPrecio,
                'precio_descuento' => $precioDescuento,
                'subtotal' => $subtotal[$count],
                'fecha' => $fechaActual,
            );

            $insert_data[] = $data;
        }


            OrdenesProductos::insert($insert_data);

            if($request->get('inlineCorizacion') == 'No'){
                $ticket_data = [
                    "id" => $orden->id,
                    "cotizacion" => $orden->cotizacion,
                    "tipo_desc" => $orden->tipo_desc,
                    "total" => $orden->total,
                    "restante" => $orden->restante,
                    "cambio" =>  $orden_pagos->cambio,
                    "recibido" => $orden_pagos->dinero_recibido,
                    "metodo_pago" => $orden_pagos->metodo_pago,
                ];
            }else{
                $ticket_data = [
                    "id" => $orden->id,
                    "cotizacion" => $orden->cotizacion,
                    "tipo_desc" => $orden->tipo_desc,
                    "total" => $orden->total,
                ];
            }

        return response()->json(['success' => true, 'ticket_data' => $ticket_data]);


    }
}
