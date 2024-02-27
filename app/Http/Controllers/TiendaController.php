<?php

namespace App\Http\Controllers;

use App\Models\Configuraciones;
use App\Models\Direcciones;
use App\Models\Admin\Empresas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Productos;


class TiendaController extends Controller
{
    public function index($code){

        $user = auth()->user()->id_empresa;

        $productos = Productos::where('id_empresa', $user)->orderBy('created_at', 'desc')->take(100)->get();

        return view('shop.home', compact('productos'));

    }
}
