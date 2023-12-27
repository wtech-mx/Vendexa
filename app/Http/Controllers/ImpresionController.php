<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Productos;
use RealRashid\SweetAlert\Facades\Alert;
use \Milon\Barcode\DNS1D;
use \Milon\Barcode\DNS2D;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;

class ImpresionController extends Controller
{
    public function imprimir_etiqueta($sku, Request $request){

        $producto = Productos::where('sku', '=', $sku)->first();

        $pdf = PDF::loadView('pdf.eticketa_productos',compact('producto'));

        // Para cambiar la medida se deben pasar milimetros a putnos
        $pdf->setPaper([0, 0,141.732,70.8661], 'portrair');
        return $pdf->download('etiqueta_'.$sku.'.pdf');

    }

    public function pdf_productos(Request $request){
        dd($request);
    }
}
