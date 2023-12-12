<?php

namespace App\Http\Controllers;

use App\Models\Categorias;
use App\Models\Marcas;
use App\Models\ModificacionesProductos;
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


        $proveedores = Proveedores::where('id_empresa', $user)->get();
        $user = auth()->user()->id_empresa;
        $proveedores = Proveedores::where('id_empresa', $user)->get();
        $marcas = Marcas::where('id_empresa', $user)->get();
        $categorias = Categorias::where('id_empresa', $user)->get();
        $subcategorias = SubCategorias::where('id_empresa', $user)->get();

        return view('orders.index', compact('proveedores', 'marcas', 'categorias', 'subcategorias'));

    }

    public function show(){

        return view('orders.show');

    }

}
