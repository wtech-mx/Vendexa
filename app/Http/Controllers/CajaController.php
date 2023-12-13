<?php

namespace App\Http\Controllers;

use App\Models\Clientes;
use App\Models\Ordenes;
use App\Models\OrdenesPagos;
use App\Models\OrdenesProductos;
use App\Models\Productos;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CajaController extends Controller
{
    public function index(){
        $user = auth()->user()->id_empresa;

        $productos = Productos::where('id_empresa', $user)->get();
        $clientes = Clientes::where('id_empresa', $user)->get();

        return view('caja.index', compact('productos', 'clientes', 'user'));
    }

    public function agregarAlCarrito(Request $request)
    {
        $codigo = $request->input('codigo');
        $producto = Productos::find($codigo);

        if ($producto) {
            $datosProducto = $producto->toArray();

            return response()->json($datosProducto);
        } else {
            return response()->json(['nombre' => 'Producto no encontrado']);
        }
    }

    public function store(Request $request){

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

        // G U A R D A R  O R D E N  P R I N C I P A L
            $orden = new Ordenes;
            $orden->id_cliente = $cliente;
            $orden->fecha = $fechaActual;
            $orden->total = $request->get('sumaSubtotales');
            $orden->restante = $request->get('restante');
            $orden->tipo_desc = $request->get('tipoDescuento');
            $orden->descuento = $request->get('montoDescuento');
            $orden->id_user = auth()->user()->id;
            $orden->id_empresa = auth()->user()->id_empresa;
            $orden->factura = $request->get('inlineRadioOptions');
            $orden->save();

        // G U A R D A R  O R D E N  P A G O
            $orden_pagos = new OrdenesPagos;
            $orden_pagos->id_orden = $orden->id;
            if($request->get('cambio') > 0){
                $monto = $request->get('dineroRecibido') - $request->get('cambio');
                $orden_pagos->monto = $monto;
            }else{
                $orden_pagos->monto = $request->get('dineroRecibido');
            }
            $orden_pagos->dinero_recibido = $request->get('dineroRecibido');
            $orden_pagos->cambio = $request->get('cambio');
            $orden_pagos->metodo_pago = $request->get('metodo_pago');
            if ($request->hasFile("comprobante")) {
                $file = $request->file('comprobante');
                $path = public_path() . '/comprobante/empresa'.auth()->user()->id_empresa;
                $fileName = uniqid() . $file->getClientOriginalName();
                $file->move($path, $fileName);
                $orden_pagos->comprobante = $fileName;
            }
            $orden_pagos->fecha = $fechaActual;
            $orden_pagos->save();

        // G U A R D A R  O R D E N  P R O D U C T O S
            $productos = $request->get('id');
            $cantidad = $request->get('cantidad');
            $subtotal = $request->get('subtotal');
            $precio = $request->get('precio');

            for ($count = 0; $count < count($productos); $count++) {
                $data = array(
                    'id_orden' => $orden->id,
                    'id_producto' => $productos[$count],
                    'cantidad' => $cantidad[$count],
                    'precio' => $precio[$count],
                    'subtotal' => $subtotal[$count],
                    'fecha' => $fechaActual,
                );
                $insert_data[] = $data;
            }

            OrdenesProductos::insert($insert_data);

        return redirect()->back()
        ->with('success', 'Caja Creado.');
    }
}
