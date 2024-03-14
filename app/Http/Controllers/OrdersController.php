<?php

namespace App\Http\Controllers;

use App\Models\Categorias;
use App\Models\Marcas;
use App\Models\ModificacionesProductos;
use App\Models\Ordenes;
use App\Models\Productos;
use App\Models\Proveedores;
use App\Models\SubCategorias;
use App\Models\Clientes;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Contracts\Database\Eloquent\Builder;


class OrdersController extends Controller
{
    public function index($code){
        $user = auth()->user()->id_empresa;

        $ordenes = Ordenes::where('id_empresa', $user)->where('cotizacion', '=', 'No')->Orderby('id','DESC')->take(100)->get();

        return view('orders.index', compact('ordenes'));
    }

    public function show($id,$code){
        $user = auth()->user()->id_empresa;
        $orden = Ordenes::find($id);

        // Check if the order exists and belongs to the user's company
        if ($orden && $orden->id_empresa === $user) {
            return view('orders.show', compact('orden'));
        } else {
            abort(403, 'Acción no autorizada.');
        }

        return view('orders.show', compact('orden'));
    }

    public function filtro(Request $request, $code){
        $now = Carbon::now();
        $mesActual = $now->month;
        $user = auth()->user()->id_empresa;

        $ordenes = Ordenes::where('id_empresa', $user)->where('cotizacion', '=', 'No');

        if($request->id_client){
            $id_client = $request->id_client;
            $ordenes = Ordenes::whereHas('Cliente', function(Builder $query) use($id_client) {
                     $query->where('nombre', 'LIKE', "%" . $id_client . "%");
            });
        }
        if( $request->tipo){
            if( $request->tipo == 'Pagadas'){
                $ordenes = $ordenes->where('restante', '<=', 0);
            }else{
                $ordenes = $ordenes->where('restante', '>', 0);
            }
        }
        if( $request->fecha_de && $request->fecha_a ){
            $ordenes = $ordenes->where('fecha', '>=', $request->fecha_de)
                                     ->where('fecha', '<=', $request->fecha_a);
        }
        $ordenes = $ordenes->get();
        
        return view('orders.index', compact('ordenes'));
    }

}
