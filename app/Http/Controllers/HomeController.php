<?php

namespace App\Http\Controllers;

use App\Models\CajaCorte;
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

        $sumaEfectivo = OrdenesPagos::where('fecha', $fechaActual)->whereHas('ordenes', function ($query) use ($user, $fechaActual) {
            $query->where('id_empresa', $user->id_empresa)
                ->where('cotizacion', '=', 'No');
        })
        ->selectRaw('SUM(COALESCE(CASE WHEN metodo_pago = "Efectivo" THEN dinero_recibido ELSE 0 END, 0) + COALESCE(CASE WHEN metodo_pago2 = "Efectivo" THEN dinero_recibido2 ELSE 0 END, 0)) as suma_efectivo')
        ->pluck('suma_efectivo')
        ->first();

        $sumaTransferencia = OrdenesPagos::where('fecha', $fechaActual)->whereHas('ordenes', function ($query) use ($user, $fechaActual) {
            $query->where('id_empresa', $user->id_empresa)
                ->where('cotizacion', '=', 'No');
        })
        ->selectRaw('SUM(COALESCE(CASE WHEN metodo_pago = "Transferencia" THEN dinero_recibido ELSE 0 END, 0) + COALESCE(CASE WHEN metodo_pago2 = "Transferencia" THEN dinero_recibido2 ELSE 0 END, 0)) as suma_transferencia')
        ->pluck('suma_transferencia')
        ->first();

        $sumaTarjeta = OrdenesPagos::where('fecha', $fechaActual)->whereHas('ordenes', function ($query) use ($user, $fechaActual) {
            $query->where('id_empresa', $user->id_empresa)
                ->where('cotizacion', '=', 'No');
        })
        ->selectRaw('SUM(COALESCE(CASE WHEN metodo_pago = "Tarjeta Credito/Debito" THEN dinero_recibido ELSE 0 END, 0) + COALESCE(CASE WHEN metodo_pago2 = "Tarjeta Credito/Debito" THEN dinero_recibido2 ELSE 0 END, 0)) as suma_tarjeta')
        ->pluck('suma_tarjeta')
        ->first();

        $sumaMercadoPago = OrdenesPagos::where('fecha', $fechaActual)->whereHas('ordenes', function ($query) use ($user, $fechaActual) {
            $query->where('id_empresa', $user->id_empresa)
                ->where('cotizacion', '=', 'No');
        })
        ->selectRaw('SUM(COALESCE(CASE WHEN metodo_pago = "Mercado Pago" THEN dinero_recibido ELSE 0 END, 0) + COALESCE(CASE WHEN metodo_pago2 = "Mercado Pago" THEN dinero_recibido2 ELSE 0 END, 0)) as suma_mercado')
        ->pluck('suma_mercado')
        ->first();

        $sumaIngresos = OrdenesPagos::where('fecha', $fechaActual)->whereHas('ordenes', function ($query) use ($user, $fechaActual) {
            $query->where('id_empresa', $user->id_empresa)
                ->where('cotizacion', '=', 'No');
        })
        ->sum('monto');

        $conteoCotizaciones = Ordenes::where('id_empresa', $user->id_empresa)->where('cotizacion', '=', 'Si')->where('fecha', $fechaActual)->count();
        $configuracion = Configuraciones::where('id_empresa', auth()->user()->id_empresa)->first();

        $registroHoy = CajaCorte::where('id_empresa', auth()->user()->id_empresa)->whereDate('fecha', now()->toDateString())->exists();
        if($configuracion->caja_avanzada == 1){
             //Configuracion si acepta egresos
            if($configuracion->fondo_fijo == 1){
                //Configuracion si sera un fondo de caja fijo
                if($registroHoy){

                }else{
                    $totalDiaAnterior = CajaCorte::where('id_empresa', auth()->user()->id_empresa)->orderBy('fecha', 'desc')->value('total');

                    CajaCorte::create([
                        'fecha' => now(),
                        'inicio' => $configuracion->fondo_caja,
                        'id_empresa' => auth()->user()->id_empresa,
                    ]);
                }
            }else{
                //Configuracion si sera el fondo del dia anterior
                if($registroHoy){

                }else{
                    $totalDiaAnterior = CajaCorte::where('id_empresa', auth()->user()->id_empresa)->orderBy('fecha', 'desc')->value('total');

                    CajaCorte::create([
                        'fecha' => now(),
                        'inicio' => $totalDiaAnterior,
                        'id_empresa' => auth()->user()->id_empresa,
                    ]);
                }
            }
        }else{
            //Configuracion no acepta egresos
            if($registroHoy){

            }else{
                $totalDiaAnterior = CajaCorte::where('id_empresa', auth()->user()->id_empresa)->orderBy('fecha', 'desc')->value('total');

                CajaCorte::create([
                    'fecha' => now(),
                    'inicio' => 0,
                    'ingresos' => 0,
                    'id_empresa' => auth()->user()->id_empresa,
                ]);
            }
        }

        return view('home', compact('user', 'conteoCompras', 'conteoCotizaciones', 'sumaEfectivo', 'sumaIngresos', 'sumaTransferencia', 'sumaTarjeta', 'sumaMercadoPago'));
    }
}
