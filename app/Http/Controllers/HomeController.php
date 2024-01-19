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
use DB;

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
        $fechaActual = date('Y-m-d');

        $conteoCompras = Ordenes::where('id_empresa', $user->id_empresa)->where('cotizacion', '=', 'No')->where('fecha', $fechaActual)->count();

        $sumaEfectivo = OrdenesPagos::whereHas('ordenes', function ($query) use ($user, $fechaActual) {
            $query->where('id_empresa', $user->id_empresa)
                ->where('cotizacion', '=', 'No')
                ->where('fecha', $fechaActual);
        })
        ->selectRaw('SUM(COALESCE(CASE WHEN metodo_pago = "Efectivo" THEN dinero_recibido ELSE 0 END, 0) + COALESCE(CASE WHEN metodo_pago2 = "Efectivo" THEN dinero_recibido2 ELSE 0 END, 0)) as suma_efectivo')
        ->pluck('suma_efectivo')
        ->first();

        $sumaTransferencia = OrdenesPagos::whereHas('ordenes', function ($query) use ($user, $fechaActual) {
            $query->where('id_empresa', $user->id_empresa)
                ->where('cotizacion', '=', 'No')
                ->where('fecha', $fechaActual);
        })
        ->selectRaw('SUM(COALESCE(CASE WHEN metodo_pago = "Transferencia" THEN dinero_recibido ELSE 0 END, 0) + COALESCE(CASE WHEN metodo_pago2 = "Transferencia" THEN dinero_recibido2 ELSE 0 END, 0)) as suma_transferencia')
        ->pluck('suma_transferencia')
        ->first();

        $sumaTarjeta = OrdenesPagos::whereHas('ordenes', function ($query) use ($user, $fechaActual) {
            $query->where('id_empresa', $user->id_empresa)
                ->where('cotizacion', '=', 'No')
                ->where('fecha', $fechaActual);
        })
        ->selectRaw('SUM(COALESCE(CASE WHEN metodo_pago = "Tarjeta Credito/Debito" THEN dinero_recibido ELSE 0 END, 0) + COALESCE(CASE WHEN metodo_pago2 = "Tarjeta Credito/Debito" THEN dinero_recibido2 ELSE 0 END, 0)) as suma_tarjeta')
        ->pluck('suma_tarjeta')
        ->first();

        $sumaMercadoPago = OrdenesPagos::whereHas('ordenes', function ($query) use ($user, $fechaActual) {
            $query->where('id_empresa', $user->id_empresa)
                ->where('cotizacion', '=', 'No')
                ->where('fecha', $fechaActual);
        })
        ->selectRaw('SUM(COALESCE(CASE WHEN metodo_pago = "Mercado Pago" THEN dinero_recibido ELSE 0 END, 0) + COALESCE(CASE WHEN metodo_pago2 = "Mercado Pago" THEN dinero_recibido2 ELSE 0 END, 0)) as suma_mercado')
        ->pluck('suma_mercado')
        ->first();

        $sumaIngresos = OrdenesPagos::whereHas('ordenes', function ($query) use ($user, $fechaActual) {
            $query->where('id_empresa', $user->id_empresa)
                ->where('cotizacion', '=', 'No')
                ->where('fecha', $fechaActual);
        })
        ->sum('monto');

        $conteoCotizaciones = Ordenes::where('id_empresa', $user->id_empresa)->where('cotizacion', '=', 'Si')->where('fecha', $fechaActual)->count();

        return view('home', compact('user', 'conteoCompras', 'conteoCotizaciones', 'sumaEfectivo', 'sumaIngresos', 'sumaTransferencia', 'sumaTarjeta', 'sumaMercadoPago'));
    }
}
