<?php

namespace App\Http\Controllers;

use App\Models\Categorias;
use App\Models\Marcas;
use App\Models\ModificacionesProductos;
use App\Models\Ordenes;
use App\Models\Productos;
use App\Models\Proveedores;
use App\Models\SubCategorias;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;



class OrdersController extends Controller
{
    public function index(){
        $user = auth()->user()->id_empresa;

        $ordenes = Ordenes::where('id_empresa', $user)->where('cotizacion', '=', 'No')->Orderby('id','DESC')->take(100)->get();

        return view('orders.index', compact('ordenes'));
    }

    public function show($id){
        $orden = Ordenes::find($id);

        return view('orders.show', compact('orden'));
    }

}
