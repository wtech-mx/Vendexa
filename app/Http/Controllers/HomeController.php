<?php

namespace App\Http\Controllers;

use App\Models\Categorias;
use App\Models\Configuraciones;
use App\Models\Marcas;
use App\Models\Ordenes;
use App\Models\OrdenesPagos;
use App\Models\Proveedores;
use App\Models\SubCategorias;
use Illuminate\Http\Request;
use Carbon\Carbon;

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
        $fechaActual = Carbon::now();
        $mesActual = $fechaActual->month;
        $anioActual = $fechaActual->year;

        $conteoCompras = Ordenes::where('id_empresa', $user->id_empresa)->where('cotizacion', '=', 'No')->whereMonth('fecha', $mesActual)->whereYear('fecha', $anioActual)->count();

        $sumaEfectivo = OrdenesPagos::whereHas('ordenes', function ($query) use ($user, $mesActual, $anioActual) {
            $query->where('id_empresa', $user->id_empresa)
                ->where('cotizacion', '=', 'No')
                ->whereMonth('fecha', $mesActual)
                ->whereYear('fecha', $anioActual);
        })
        ->where('metodo_pago', 'Efectivo')
        ->sum('monto');

        $conteoCotizaciones = Ordenes::where('id_empresa', $user->id_empresa)->where('cotizacion', '=', 'Si')->whereMonth('fecha', $mesActual)->whereYear('fecha', $anioActual)->count();

        return view('home', compact('user', 'conteoCompras', 'conteoCotizaciones', 'sumaEfectivo'));
    }
}
