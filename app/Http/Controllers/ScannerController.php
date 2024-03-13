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
use App\Models\Ordenes;
use App\Models\OrdenesProductos;
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

            $modoficaciones_productos = ModificacionesProductos::whereMonth('fecha', $mesActual)->get();
            $compras = Ordenes::where('id_empresa', $user)->where('cotizacion', '=', 'No')->get();
            $ordesprodcutos = OrdenesProductos::get();

            $output = "";
            $producto = Productos::where('sku', $codigo)->first();

            $proveedores = Proveedores::get();
            $marcas = Marcas::get();
            $categorias = Categorias::get();
            $subcategorias = SubCategorias::get();

                // Build the HTML response for each product
                $output .= view('layouts.app', compact(
                    'producto',
                    'user',
                    'proveedores',
                    'marcas',
                    'categorias',
                    'subcategorias',
                    'modoficaciones_productos',
                    'compras',
                ));

                return view('components.producto_info', ['ordesprodcutos' => $ordesprodcutos,'producto' => $producto,'modoficaciones_productos' => $modoficaciones_productos,'compras' => $compras]);
        }
    }

    public function index_palabra(Request $request){
        $user = auth()->user()->id_empresa;
        if ($request->ajax()) {
            $productos = Productos::where('id_empresa', '=', $user);
            $nombre = $request->input('search');

            if ($nombre) {
                $palabras = explode(" ", $nombre);
                foreach($palabras as $palabra) {
                    $productos->where('nombre', 'LIKE', "%$palabra%");
                }
            }
            $productos = $productos->get();

            return view('modals.show_producto_scanner', ['productos' => $productos]);
        }
    }

    public function filtro(Request $request){
        $now = Carbon::now();
        $mesActual = $now->month;
        $user = auth()->user()->id_empresa;
        $compras = Ordenes::where('id_empresa', $user)->where('cotizacion', '=', 'No')->get();
        $modoficaciones_productos = ModificacionesProductos::whereMonth('fecha', $mesActual)->get();

        $productos = Productos::where('id_empresa', $user);
        if( $request->nombre_producto){
            $productos = $productos->where('nombre', 'LIKE', "%" . $request->nombre_producto . "%");
        }
        if( $request->stock_de && $request->stock_a ){
            $productos = $productos->where('stock', '>=', $request->stock_de)
                                     ->where('stock', '<=', $request->stock_a);
        }
        if( $request->id_marca){
            $productos = $productos->where('id_marca', 'LIKE', "%" . $request->id_marca . "%");
        }
        if( $request->id_categoria){
            $productos = $productos->where('id_categoria', 'LIKE', "%" . $request->id_categoria . "%");
        }
        if( $request->id_subcategoria){
            $productos = $productos->where('id_subcategoria', 'LIKE', "%" . $request->id_subcategoria . "%");
        }
        if( $request->id_proveedor){
            $productos = $productos->where('id_proveedor', 'LIKE', "%" . $request->id_proveedor . "%");
        }
        if( $request->visibilidad_estatus){
            $productos = $productos->where('visibilidad_estatus', 'LIKE', "%" . $request->visibilidad_estatus . "%");
        }
        if( $request->descuento){
            $productos = $productos->where('descuento', 'LIKE', "%" . $request->descuento . "%");
        }
        $productos = $productos->first();
        if ($productos) {
            $datosProducto = $productos->toArray();

            return response()->json($datosProducto);
        } else {
            return response()->json(['nombre' => 'Producto no encontrado']);
        }
    }
}
