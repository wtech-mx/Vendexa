<?php

namespace App\Http\Controllers;

use App\Models\Categorias;
use App\Models\Configuraciones;
use App\Models\Marcas;
use App\Models\Proveedores;
use App\Models\SubCategorias;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = auth()->user();
        $proveedores = Proveedores::where('id_empresa', $user->id_empresa)->get();
        $marcas = Marcas::where('id_empresa', $user->id_empresa)->get();
        $categorias = Categorias::where('id_empresa', $user->id_empresa)->get();
        $subcategorias = SubCategorias::where('id_empresa', $user->id_empresa)->get();
        $configuracion = Configuraciones::where('id_empresa', $user->id_empresa)->first();

        return view('home', compact('proveedores', 'marcas', 'categorias', 'subcategorias', 'configuracion', 'user'));
    }
}
