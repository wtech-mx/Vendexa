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


        return view('scanner.index');
    }
}
