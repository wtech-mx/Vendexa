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
}
