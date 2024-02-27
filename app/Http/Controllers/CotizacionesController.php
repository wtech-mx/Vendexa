<?php

namespace App\Http\Controllers;

use App\Models\Clientes;
use App\Models\Configuraciones;
use App\Models\Ordenes;
use App\Models\OrdenesProductos;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use League\Config\Configuration;

class CotizacionesController extends Controller
{
    public function index($code){
        $user = auth()->user()->id_empresa;

        $cotizaciones = Ordenes::where('id_empresa', $user)->where('cotizacion', '=', 'Si')->Orderby('id','DESC')->take(100)->get();
        $clientes = Clientes::where('id_empresa', $user)->get();
        $trabajadores = User::where('id_empresa', $user)->get();

        return view('cotizaciones.index', compact('cotizaciones', 'clientes', 'trabajadores'));
    }

    public function filtro(Request $request, $code){

        $user = auth()->user()->id_empresa;

        $clientes = Clientes::where('id_empresa', $user)->get();
        $trabajadores = User::where('id_empresa', $user)->get();

        $cotizaciones = Ordenes::where('id_empresa', $user)->where('cotizacion', '=', 'Si');
        if( $request->id_cliente){
            $cotizaciones = $cotizaciones->where('id_cliente', 'LIKE', "%" . $request->id_cliente . "%");
        }
        if( $request->fecha_de && $request->fecha_a ){
            $cotizaciones = $cotizaciones->where('fecha', '>=', $request->fecha_de)
                                     ->where('fecha', '<=', $request->fecha_a);
        }
        if( $request->id_trabajador){
            $cotizaciones = $cotizaciones->where('id_user', 'LIKE', "%" . $request->id_trabajador . "%");
        }
        if( $request->estatus_cotizacion){
            $cotizaciones = $cotizaciones->where('estatus_cotizacion', 'LIKE', "%" . $request->estatus_cotizacion . "%");
        }
        $cotizaciones = $cotizaciones->get();
        return view('cotizaciones.index', compact('cotizaciones','clientes','trabajadores'));
    }

    public function pdf($id){
        $now = Carbon::now();
        $user = auth()->user()->id_empresa;
        $configuracion = Configuraciones::where('id_empresa', $user)->first();
        $productos = OrdenesProductos::where('id_orden', $id)->get();
        $cotizacion = Ordenes::where('id', $id)->first();

        $pdf = \PDF::loadView('pdf.cotizacion',compact('cotizacion', 'configuracion', 'productos'));
         return $pdf->stream();
        //return $pdf->download('Cotizacion '.$cotizacion->Cliente->nombre.'-'.$now.'.pdf');

    }
}
