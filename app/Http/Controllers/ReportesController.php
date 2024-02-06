<?php

namespace App\Http\Controllers;

use App\Models\CajaCorte;
use App\Models\CajaEgresos;
use App\Models\CajaIngresos;
use App\Models\OrdenesPagos;
use App\Models\Productos;
use DB;
use App\Models\User;
use Illuminate\Http\Request;

class ReportesController extends Controller
{
    public function index($code){
        return view('reportes.index');
    }

    public function filtro_caja(Request $request){
        $fechaActual = date('Y-m-d');
        $user = auth()->user()->id_empresa;
        $fechaInicio = $request->fecha_inicio_caja;
        $fechaFin = $request->fecha_fin_caja;

        if($request->fecha_inicio_caja  &&  $request->fecha_fin_caja){
            $sumaEfectivo = OrdenesPagos::whereBetween('fecha', [$fechaInicio, $fechaFin])
            ->whereHas('ordenes', function ($query) use ($user) {
                $query->where('id_empresa', $user)
                    ->where('cotizacion', '=', 'No');
            })
            ->selectRaw('SUM(COALESCE(CASE WHEN metodo_pago = "Efectivo" THEN dinero_recibido ELSE 0 END, 0) + COALESCE(CASE WHEN metodo_pago2 = "Efectivo" THEN dinero_recibido2 ELSE 0 END, 0)) as suma_efectivo')
            ->pluck('suma_efectivo')
            ->first();

            $sumaTransferencia = OrdenesPagos::whereBetween('fecha', [$fechaInicio, $fechaFin])
            ->whereHas('ordenes', function ($query) use ($user) {
                $query->where('id_empresa', $user)
                    ->where('cotizacion', '=', 'No');
            })
            ->selectRaw('SUM(COALESCE(CASE WHEN metodo_pago = "Transferencia" THEN dinero_recibido ELSE 0 END, 0) + COALESCE(CASE WHEN metodo_pago2 = "Transferencia" THEN dinero_recibido2 ELSE 0 END, 0)) as suma_transferencia')
            ->pluck('suma_transferencia')
            ->first();

            $sumaTarjeta = OrdenesPagos::whereBetween('fecha', [$fechaInicio, $fechaFin])
            ->whereHas('ordenes', function ($query) use ($user) {
                $query->where('id_empresa', $user)
                    ->where('cotizacion', '=', 'No');
            })
            ->selectRaw('SUM(COALESCE(CASE WHEN metodo_pago = "Tarjeta Credito/Debito" THEN dinero_recibido ELSE 0 END, 0) + COALESCE(CASE WHEN metodo_pago2 = "Tarjeta Credito/Debito" THEN dinero_recibido2 ELSE 0 END, 0)) as suma_tarjeta')
            ->pluck('suma_tarjeta')
            ->first();

            $sumaMercadoPago = OrdenesPagos::whereBetween('fecha', [$fechaInicio, $fechaFin])
            ->whereHas('ordenes', function ($query) use ($user) {
                $query->where('id_empresa', $user)
                    ->where('cotizacion', '=', 'No');
            })
            ->selectRaw('SUM(COALESCE(CASE WHEN metodo_pago = "Mercado Pago" THEN dinero_recibido ELSE 0 END, 0) + COALESCE(CASE WHEN metodo_pago2 = "Mercado Pago" THEN dinero_recibido2 ELSE 0 END, 0)) as suma_mercado')
            ->pluck('suma_mercado')
            ->first();

            $registrosIngresos = CajaIngresos::whereBetween('fecha', [$fechaInicio, $fechaFin])->where('id_empresa', $user)->get();
            $registrosEgresos = CajaEgresos::whereBetween('fecha', [$fechaInicio, $fechaFin])->where('id_empresa', $user)->get();

            $sumaTotal = $sumaEfectivo + $sumaTransferencia + $sumaTarjeta + $sumaMercadoPago;
        }

        return view('reportes.index', compact('fechaInicio','fechaFin','sumaEfectivo', 'sumaTransferencia', 'sumaTarjeta', 'sumaMercadoPago', 'sumaTotal', 'registrosEgresos', 'registrosIngresos'));
    }

    public function pdf_caja($fechaInicio, $fechaFin){
        $user = auth()->user()->id_empresa;
        $fechaActual = date('Y-m-d');

        if($fechaInicio  &&  $fechaFin){
            $caja_corte = CajaCorte::where('id_empresa', $user)->whereBetween('fecha', [$fechaInicio, $fechaFin])->first();

            $sumaEfectivo = OrdenesPagos::where('fecha', $fechaActual)->whereHas('ordenes', function ($query) use ($user) {
                $query->where('id_empresa', $user)
                    ->where('cotizacion', '=', 'No');
            })
            ->selectRaw('SUM(COALESCE(CASE WHEN metodo_pago = "Efectivo" THEN dinero_recibido ELSE 0 END, 0) + COALESCE(CASE WHEN metodo_pago2 = "Efectivo" THEN dinero_recibido2 ELSE 0 END, 0)) as suma_efectivo')
            ->pluck('suma_efectivo')
            ->first();

            $registrosEgresos = CajaEgresos::whereBetween('fecha', [$fechaInicio, $fechaFin])->where('id_empresa', $user)->get();
            $sumaIngresos = CajaIngresos::whereBetween('fecha', [$fechaInicio, $fechaFin])->where('id_empresa', $user)->sum('monto');
            $registrosIngresos = CajaIngresos::whereBetween('fecha', [$fechaInicio, $fechaFin])->where('id_empresa', $user)->get();

            $sumaTransferencia = OrdenesPagos::whereBetween('fecha', [$fechaInicio, $fechaFin])->whereHas('ordenes', function ($query) use ($user, $fechaActual) {
                $query->where('id_empresa',  $user)
                    ->where('cotizacion', '=', 'No');
            })
            ->selectRaw('SUM(COALESCE(CASE WHEN metodo_pago = "Transferencia" THEN dinero_recibido ELSE 0 END, 0) + COALESCE(CASE WHEN metodo_pago2 = "Transferencia" THEN dinero_recibido2 ELSE 0 END, 0)) as suma_transferencia')
            ->pluck('suma_transferencia')
            ->first();

            $sumaTarjeta = OrdenesPagos::whereBetween('fecha', [$fechaInicio, $fechaFin])->whereHas('ordenes', function ($query) use ($user, $fechaActual) {
                $query->where('id_empresa',  $user)
                    ->where('cotizacion', '=', 'No');
            })
            ->selectRaw('SUM(COALESCE(CASE WHEN metodo_pago = "Tarjeta Credito/Debito" THEN dinero_recibido ELSE 0 END, 0) + COALESCE(CASE WHEN metodo_pago2 = "Tarjeta Credito/Debito" THEN dinero_recibido2 ELSE 0 END, 0)) as suma_tarjeta')
            ->pluck('suma_tarjeta')
            ->first();

            $sumaMercadoPago = OrdenesPagos::whereBetween('fecha', [$fechaInicio, $fechaFin])->whereHas('ordenes', function ($query) use ($user, $fechaActual) {
                $query->where('id_empresa',  $user)
                    ->where('cotizacion', '=', 'No');
            })
            ->selectRaw('SUM(COALESCE(CASE WHEN metodo_pago = "Mercado Pago" THEN dinero_recibido ELSE 0 END, 0) + COALESCE(CASE WHEN metodo_pago2 = "Mercado Pago" THEN dinero_recibido2 ELSE 0 END, 0)) as suma_mercado')
            ->pluck('suma_mercado')
            ->first();

            $registros = OrdenesPagos::whereBetween('fecha', [$fechaInicio, $fechaFin])->whereHas('ordenes', function ($query) use ($user) {
                $query->where('id_empresa', $user)
                    ->where('cotizacion', '=', 'No');
            })
            ->get();
        }
        $pdf = \PDF::loadView('pdf.corte_caja', compact('registros', 'sumaEfectivo', 'registrosEgresos','registrosIngresos','sumaEfectivo','sumaTransferencia', 'sumaTarjeta', 'sumaMercadoPago', 'caja_corte', 'sumaIngresos'));
        return $pdf->stream();
        // return $pdf->download('Corte '.$fechaActual.'.pdf');
    }

    public function filtro_productos(Request $request){
        $user = auth()->user()->id_empresa;

        if($request->fecha_inicio_productos  &&  $request->fecha_fin_productos){
            $productosVendidos = DB::table('ordenes_productos')
            ->join('productos', 'ordenes_productos.id_producto', '=', 'productos.id')
            ->join('ordenes', 'ordenes_productos.id_orden', '=', 'ordenes.id')
            ->where('ordenes.id_empresa', $user)
            ->whereBetween('ordenes_productos.fecha', [$request->fecha_inicio_productos, $request->fecha_fin_productos])
            ->select(
                'productos.id',
                'productos.nombre',
                'productos.sku',
                'productos.stock',
                DB::raw('SUM(ordenes_productos.cantidad) as total_vendido')
            )
            ->groupBy('productos.id', 'productos.nombre')
            ->orderByDesc('total_vendido')
            ->get();

            $mitadResultados = ceil(count($productosVendidos) / 2);
            $productosMasVendidos = array_slice($productosVendidos->toArray(), 0, $mitadResultados);
            $productosMenosVendidos = array_slice($productosVendidos->reverse()->toArray(), 0, $mitadResultados);
            return view('reportes.index', compact('productosMasVendidos', 'productosMenosVendidos', 'productosVendidos'));
        }

        if($request->producto_id){
            $producto_filtro = DB::table('ordenes_productos')
            ->join('productos', 'ordenes_productos.id_producto', '=', 'productos.id')
            ->join('ordenes', 'ordenes_productos.id_orden', '=', 'ordenes.id')
            ->where('ordenes.id_empresa', $user)
            ->where('productos.id', $request->producto_id)
            ->select(
                'productos.id',
                'productos.nombre',
                'productos.sku',
                'productos.stock',
                DB::raw('SUM(ordenes_productos.cantidad) as total_vendido')
            )
            ->groupBy('productos.id', 'productos.nombre')
            ->orderByDesc('total_vendido')
            ->first();

            return view('reportes.index', compact('producto_filtro'));
        }

    }
}
