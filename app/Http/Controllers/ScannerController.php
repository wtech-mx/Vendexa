<?php

namespace App\Http\Controllers;

use App\Models\Categorias;
use App\Models\Marcas;
use App\Models\Productos;
use App\Models\Proveedores;
use App\Models\SubCategorias;
use Illuminate\Http\Request;



class ScannerController extends Controller
{
    public function index(Request $request){

        $producto = Productos::where('sku', '=', $request->search)->first();

        $producto_data = [
            "nombre" => $producto->nombre,
            "stock" => $producto->stock,
            "precio" => $producto->precio_normal,
            "sku" => $producto->sku,
        ];

        return response()->json(['success' => true, 'producto_data' => $producto_data]);
    }
}
