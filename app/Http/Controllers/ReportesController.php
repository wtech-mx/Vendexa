<?php

namespace App\Http\Controllers;

use App\Models\OrdenesPagos;
use App\Models\User;
use Illuminate\Http\Request;

class ReportesController extends Controller
{
    public function index(){
        return view('reportes.index');
    }

    public function filtro(Request $request){
        $user = auth()->user()->id_empresa;

        $caja = OrdenesPagos::whereHas('ordenes', function ($query) use ($user) {
            $query->where('id_empresa', $user)
                ->where('cotizacion', '=', 'No');
        });
        if( $request->fecha_inicio_caja && $request->fecha_fin_caja ){
            $caja = $caja->where('fecha', '>=', $request->fecha_inicio_caja)
                                        ->where('fecha', '<=', $request->fecha_fin_caja);
        }
        $caja = $caja->get();

        return view('reportes.index', compact('caja'));
    }
}
