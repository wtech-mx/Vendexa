<?php

namespace App\Http\Controllers;

use App\Models\Categorias;
use App\Models\Marcas;
use App\Models\Productos;
use App\Models\SubCategorias;
use Illuminate\Http\Request;
use App\Models\Proveedores;
use Carbon\Carbon;
use App\Models\ModificacionesProductos;
use Illuminate\Support\Facades\Validator;


class ScannerController extends Controller
{
    public function index(Request $request){

        if ($request->ajax()) {

            $now = Carbon::now();
            $mesActual = $now->month;
            $user = auth()->user()->id_empresa;

            $codigo = $request->input('search');
            if (strpos($codigo, '_auth()->user()->id_empresa') === false) {
                $codigo .= '_'.$user;
            }

            $proveedores = Proveedores::where('id_empresa', $user)->get();
            $marcas = Marcas::where('id_empresa', $user)->get();
            $categorias = Categorias::where('id_empresa', $user)->get();
            $subcategorias = SubCategorias::where('id_empresa', $user)->get();

            $modoficaciones_productos = ModificacionesProductos::whereMonth('fecha', $mesActual)->get();

            $output = "";
            $producto = Productos::where('sku', $codigo)->first();

                // Build the HTML response for each product
                $output .= view('layouts.app', compact(
                    'producto',
                    'user',
                    'proveedores',
                    'marcas',
                    'categorias',
                    'subcategorias',
                    'modoficaciones_productos',
                ));

                return view('modals.producto_info', ['producto' => $producto,'proveedores' => $proveedores,'marcas' => $marcas,'categorias' => $categorias,'subcategorias' => $subcategorias,'modoficaciones_productos' => $modoficaciones_productos]);
        }
    }
}
