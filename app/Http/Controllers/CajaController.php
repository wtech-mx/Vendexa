<?php

namespace App\Http\Controllers;

use App\Models\Clientes;
use App\Models\Productos;
use Illuminate\Http\Request;

class CajaController extends Controller
{
    public function index(){
        $user = auth()->user()->id_empresa;

        $productos = Productos::where('id_empresa', $user)->get();
        $clientes = Clientes::where('id_empresa', $user)->get();

        return view('caja.index', compact('productos', 'clientes'));
    }

    public function agregarAlCarrito(Request $request)
    {
        $producto = Productos::find($request->get('producto_id'));

        return response()->json(['producto' => $producto, 'mensaje' => 'Producto añadido al carrito']);
    }

    public function obtenerDatosProducto($id)
    {
        $producto = Productos::find($id);

        return response()->json(['producto' => $producto]);
    }
}
