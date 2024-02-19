<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Configuracion;
use Illuminate\Http\Request;

class ConfiguracionController extends Controller
{
    public function index(){

        $configuracion = Configuracion::first();

        return view('configuracion_admin.index', compact('configuracion'));
    }
}
