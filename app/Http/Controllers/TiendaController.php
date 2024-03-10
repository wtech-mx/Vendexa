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
use App\Models\Categorias;
use App\Models\SubCategorias;

class TiendaController extends Controller
{
    public function index($code){

        $empresa = Empresas::where('code', $code)->first();
        $configuracion = Configuraciones::where('id_empresa', $empresa->id)->first();

        $productos = Productos::where('id_empresa', $empresa->id)->orderBy('created_at', 'desc')->take(100)->get();
        $baner = BannersTienda::where('id_empresa', $empresa->id)->orderBy('orden', 'asc')->get();

        $categorias = Categorias::where('id_empresa', $empresa->id)->with('subcategorias')->get();


        return view('shop.home', compact('productos', 'empresa', 'configuracion','baner','categorias'));

    }

    public function single_product($slug){

        // Dividir el slug por guiones "-"
        $parts = explode("-", $slug);

        // Tomar el último elemento del array resultante
        $ultimoElemento = end($parts);

        // Verificar si el último elemento es un número
        if (is_numeric($ultimoElemento)) {
            $producto_id = $ultimoElemento;
        }

        $producto_sigle = Productos::where('id', $producto_id)->first();
        $id_empresa = $producto_sigle->id_empresa;

        $empresa = Empresas::where('id', $id_empresa)->first();
        $configuracion = Configuraciones::where('id_empresa', $empresa->id)->first();

        $productos = Productos::where('id_empresa', $empresa->id)->orderBy('created_at', 'desc')->take(100)->get();
        $baner = BannersTienda::where('id_empresa', $empresa->id)->orderBy('orden', 'asc')->get();

        $categorias = Categorias::where('id_empresa', $empresa->id)->with('subcategorias')->get();


        return view('shop.single_product', compact('productos', 'empresa', 'configuracion','baner','categorias','producto_sigle'));
    }

}
