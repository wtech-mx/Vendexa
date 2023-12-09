<?php

namespace App\Http\Controllers;

use App\Models\Categorias;
use App\Models\Marcas;
use App\Models\Proveedores;
use App\Models\SubCategorias;
use Illuminate\Http\Request;



class ScannerController extends Controller
{
    public function index(){

        $user = auth()->user()->id_empresa;
        $proveedores = Proveedores::where('id_empresa', $user)->get();
        $marcas = Marcas::where('id_empresa', $user)->get();
        $categorias = Categorias::where('id_empresa', $user)->get();
        $subcategorias = SubCategorias::where('id_empresa', $user)->get();

        return view('scanner.index', compact('proveedores', 'marcas', 'categorias', 'subcategorias'));
    }
}
