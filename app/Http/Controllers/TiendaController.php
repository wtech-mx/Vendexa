<?php

namespace App\Http\Controllers;

use App\Models\Admin\Configuracion;
use App\Models\Configuraciones;
use App\Models\Direcciones;
use App\Models\Admin\Empresas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Productos;
use App\Models\BannersTienda;


class TiendaController extends Controller
{
    public function index($code){

        $empresa = Empresas::where('code', $code)->first();
        $configuracion = Configuraciones::where('id_empresa', $empresa->id)->first();

        $productos = Productos::where('id_empresa', $empresa->id)->orderBy('created_at', 'desc')->take(100)->get();
        $baner = BannersTienda::where('id_empresa', $empresa->id)->orderBy('orden', 'asc')->get();

        return view('shop.home', compact('productos', 'empresa', 'configuracion','baner'));

    }
}
