<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Empresas;
use App\Models\Licencias;


class EmpresasContoller extends Controller
{
    public function index(){
        $user = auth()->user()->id_empresa;

        $empresas = Empresas::orderBy('id', 'DESC')->take(100)->get();


        return view('empresas.index', compact('empresas'));
    }
}
