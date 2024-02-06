<?php

namespace App\Http\Controllers;

use App\Models\CajaCorte;
use App\Models\CajaEgresos;
use App\Models\CajaIngresos;
use App\Models\OrdenesPagos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CajaCorteController extends Controller
{
    public function index($code){
        $user = auth()->user()->id_empresa;
        $fechaActual = date('Y-m-d');

        $caja_corte = CajaCorte::where('id_empresa', $user)->where('fecha', '=', $fechaActual)->first();

        $sumaEfectivo = OrdenesPagos::where('fecha', $fechaActual)->whereHas('ordenes', function ($query) use ($user) {
            $query->where('id_empresa', $user)
                ->where('cotizacion', '=', 'No');
        })
        ->selectRaw('SUM(COALESCE(CASE WHEN metodo_pago = "Efectivo" THEN dinero_recibido ELSE 0 END, 0) + COALESCE(CASE WHEN metodo_pago2 = "Efectivo" THEN dinero_recibido2 ELSE 0 END, 0)) as suma_efectivo')
        ->pluck('suma_efectivo')
        ->first();

        $sumaIngresos = CajaIngresos::where('fecha', '=', $fechaActual)->where('id_empresa', $user)->sum('monto');

        $sumaCaja = $sumaEfectivo + $caja_corte->inicio + $sumaIngresos;

        $sumaEgresos = CajaEgresos::where('fecha', '=', $fechaActual)->where('id_empresa', $user)->sum('monto');
        $registrosEgresos = CajaEgresos::where('fecha', '=', $fechaActual)->where('id_empresa', $user)->get();
        $registrosIngresos = CajaIngresos::where('fecha', '=', $fechaActual)->where('id_empresa', $user)->get();

        $sumaTransferencia = OrdenesPagos::where('fecha', $fechaActual)->whereHas('ordenes', function ($query) use ($user, $fechaActual) {
            $query->where('id_empresa',  $user)
                ->where('cotizacion', '=', 'No');
        })
        ->selectRaw('SUM(COALESCE(CASE WHEN metodo_pago = "Transferencia" THEN dinero_recibido ELSE 0 END, 0) + COALESCE(CASE WHEN metodo_pago2 = "Transferencia" THEN dinero_recibido2 ELSE 0 END, 0)) as suma_transferencia')
        ->pluck('suma_transferencia')
        ->first();

        $sumaTarjeta = OrdenesPagos::where('fecha', $fechaActual)->whereHas('ordenes', function ($query) use ($user, $fechaActual) {
            $query->where('id_empresa',  $user)
                ->where('cotizacion', '=', 'No');
        })
        ->selectRaw('SUM(COALESCE(CASE WHEN metodo_pago = "Tarjeta Credito/Debito" THEN dinero_recibido ELSE 0 END, 0) + COALESCE(CASE WHEN metodo_pago2 = "Tarjeta Credito/Debito" THEN dinero_recibido2 ELSE 0 END, 0)) as suma_tarjeta')
        ->pluck('suma_tarjeta')
        ->first();

        $sumaMercadoPago = OrdenesPagos::where('fecha', $fechaActual)->whereHas('ordenes', function ($query) use ($user, $fechaActual) {
            $query->where('id_empresa',  $user)
                ->where('cotizacion', '=', 'No');
        })
        ->selectRaw('SUM(COALESCE(CASE WHEN metodo_pago = "Mercado Pago" THEN dinero_recibido ELSE 0 END, 0) + COALESCE(CASE WHEN metodo_pago2 = "Mercado Pago" THEN dinero_recibido2 ELSE 0 END, 0)) as suma_mercado')
        ->pluck('suma_mercado')
        ->first();

        $restaCaja = $sumaCaja - $sumaEgresos;

        return view('corte_caja.index', compact('sumaCaja', 'sumaEfectivo', 'sumaEgresos', 'restaCaja', 'registrosEgresos','registrosIngresos','sumaEfectivo','sumaTransferencia', 'sumaTarjeta', 'sumaMercadoPago'));
    }

    public function store(Request $request){

        // Agregamos un dump para verificar los datos recibidos
        $validator = Validator::make($request->all(), [
            'tipo' => 'required',
            'monto' => 'required',
            'concepto' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
        $fechaActual = date('Y-m-d');
        if($request->get('tipo') == 'Egreso'){
            $caja = new CajaEgresos;
            $caja->monto = $request->get('monto');
            $caja->concepto = $request->get('concepto');
            $caja->fecha = $fechaActual;

            if ($request->hasFile("foto")) {
                $file = $request->file('foto');
                $path = public_path() . '/foto_egreso/empresa'.auth()->user()->id_empresa;
                $fileName = uniqid() . $file->getClientOriginalName();
                $file->move($path, $fileName);
                $caja->foto = $fileName;
            }
            $caja->id_user = auth()->user()->id;
            $caja->id_empresa = auth()->user()->id_empresa;
            $caja->save();
        }else{
            $caja = new CajaIngresos;
            $caja->monto = $request->get('monto');
            $caja->concepto = $request->get('concepto');
            $caja->fecha = $fechaActual;

            if ($request->hasFile("foto")) {
                $file = $request->file('foto');
                $path = public_path() . '/foto_ingreso/empresa'.auth()->user()->id_empresa;
                $fileName = uniqid() . $file->getClientOriginalName();
                $file->move($path, $fileName);
                $caja->foto = $fileName;
            }
            $caja->id_user = auth()->user()->id;
            $caja->id_empresa = auth()->user()->id_empresa;
            $caja->save();
        }

        $caja_data = [
            "Tipo" => $request->get('tipo'),
            "Monto" => $caja->monto,
        ];

        return response()->json(['success' => true, 'caja_data' => $caja_data]);
    }
    public function pdf(){
        $user = auth()->user()->id_empresa;
        $fechaActual = date('Y-m-d');

        $caja_corte = CajaCorte::where('id_empresa', $user)->where('fecha', '=', $fechaActual)->first();

        $sumaEfectivo = OrdenesPagos::where('fecha', $fechaActual)->whereHas('ordenes', function ($query) use ($user) {
            $query->where('id_empresa', $user)
                ->where('cotizacion', '=', 'No');
        })
        ->selectRaw('SUM(COALESCE(CASE WHEN metodo_pago = "Efectivo" THEN dinero_recibido ELSE 0 END, 0) + COALESCE(CASE WHEN metodo_pago2 = "Efectivo" THEN dinero_recibido2 ELSE 0 END, 0)) as suma_efectivo')
        ->pluck('suma_efectivo')
        ->first();

        $registrosEgresos = CajaEgresos::where('fecha', '=', $fechaActual)->where('id_empresa', $user)->get();
        $sumaIngresos = CajaIngresos::where('fecha', '=', $fechaActual)->where('id_empresa', $user)->sum('monto');
        $registrosIngresos = CajaIngresos::where('fecha', '=', $fechaActual)->where('id_empresa', $user)->get();

        $sumaTransferencia = OrdenesPagos::where('fecha', $fechaActual)->whereHas('ordenes', function ($query) use ($user, $fechaActual) {
            $query->where('id_empresa',  $user)
                ->where('cotizacion', '=', 'No');
        })
        ->selectRaw('SUM(COALESCE(CASE WHEN metodo_pago = "Transferencia" THEN dinero_recibido ELSE 0 END, 0) + COALESCE(CASE WHEN metodo_pago2 = "Transferencia" THEN dinero_recibido2 ELSE 0 END, 0)) as suma_transferencia')
        ->pluck('suma_transferencia')
        ->first();

        $sumaTarjeta = OrdenesPagos::where('fecha', $fechaActual)->whereHas('ordenes', function ($query) use ($user, $fechaActual) {
            $query->where('id_empresa',  $user)
                ->where('cotizacion', '=', 'No');
        })
        ->selectRaw('SUM(COALESCE(CASE WHEN metodo_pago = "Tarjeta Credito/Debito" THEN dinero_recibido ELSE 0 END, 0) + COALESCE(CASE WHEN metodo_pago2 = "Tarjeta Credito/Debito" THEN dinero_recibido2 ELSE 0 END, 0)) as suma_tarjeta')
        ->pluck('suma_tarjeta')
        ->first();

        $sumaMercadoPago = OrdenesPagos::where('fecha', $fechaActual)->whereHas('ordenes', function ($query) use ($user, $fechaActual) {
            $query->where('id_empresa',  $user)
                ->where('cotizacion', '=', 'No');
        })
        ->selectRaw('SUM(COALESCE(CASE WHEN metodo_pago = "Mercado Pago" THEN dinero_recibido ELSE 0 END, 0) + COALESCE(CASE WHEN metodo_pago2 = "Mercado Pago" THEN dinero_recibido2 ELSE 0 END, 0)) as suma_mercado')
        ->pluck('suma_mercado')
        ->first();

        $registros = OrdenesPagos::where('fecha', $fechaActual)->whereHas('ordenes', function ($query) use ($user) {
            $query->where('id_empresa', $user)
                ->where('cotizacion', '=', 'No');
        })
        ->get();

        $pdf = \PDF::loadView('pdf.corte_caja', compact('registros', 'sumaEfectivo', 'registrosEgresos','registrosIngresos','sumaEfectivo','sumaTransferencia', 'sumaTarjeta', 'sumaMercadoPago', 'caja_corte', 'sumaIngresos'));
        // return $pdf->stream();
        return $pdf->download('Corte '.$fechaActual.'.pdf');
    }

    public function cerrar(){
        $user = auth()->user()->id_empresa;
        $fechaActual = date('Y-m-d');

        $caja_corte = CajaCorte::where('id_empresa', $user)->where('fecha', '=', $fechaActual)->first();

        $sumaEfectivo = OrdenesPagos::where('fecha', $fechaActual)->whereHas('ordenes', function ($query) use ($user) {
            $query->where('id_empresa', $user)
                ->where('cotizacion', '=', 'No');
        })
        ->selectRaw('SUM(COALESCE(CASE WHEN metodo_pago = "Efectivo" THEN dinero_recibido ELSE 0 END, 0) + COALESCE(CASE WHEN metodo_pago2 = "Efectivo" THEN dinero_recibido2 ELSE 0 END, 0)) as suma_efectivo')
        ->pluck('suma_efectivo')
        ->first();

        $sumaIngresos = CajaIngresos::where('fecha', '=', $fechaActual)->where('id_empresa', $user)->sum('monto');

        $sumaCaja = $sumaEfectivo + $caja_corte->inicio + $sumaIngresos;

        $sumaEgresos = CajaEgresos::where('fecha', '=', $fechaActual)->where('id_empresa', $user)->sum('monto');

        $restaCaja = $sumaCaja - $sumaEgresos;

        $caja_corte->ingresos = $sumaCaja;
        $caja_corte->egresos = $sumaEgresos;
        $caja_corte->total = $restaCaja;
        $caja_corte->update();

        $corte = [
            "ingresos" => $caja_corte->sumaCaja,
            "egresos" => $caja_corte->sumaEgresos,
            "total" => $caja_corte->restaCaja,
        ];

        return response()->json(['success' => true, 'corte' => $corte]);
    }
}
