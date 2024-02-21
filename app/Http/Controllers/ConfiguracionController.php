<?php

namespace App\Http\Controllers;

use App\Models\Configuraciones;
use App\Models\Direcciones;
use App\Models\Admin\Empresas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ConfiguracionController extends Controller
{
    public function index($code){
        $user = auth()->user();
        $empresa = Empresas::where('code', $code)->first();
        $configuracion = Configuraciones::where('id_empresa', $user->id_empresa)->first();

        return view('settings.index', compact('configuracion', 'empresa'));
    }

    public function inicial($id, Request $request){
        $user = auth()->user();

        $validator = Validator::make($request->all(), [
            'stock_alto' => 'required',
            'stock_medio' => 'required',
            'stock_bajo' => 'required',
            'nombre_empresa' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $empresa = Empresas::where('id', '=', $user->id_empresa)->first();
        $empresa->nombre = $request->get('nombre_empresa');
        $empresa->update();

        $configuracion = Configuraciones::find($id);
        $configuracion->estatus_config = 1;
        $configuracion->tarjeta = $request->get('tarjeta');
        $configuracion->efectivo = $request->get('efectivo');
        $configuracion->transferencia = $request->get('transferencia');
        $configuracion->mercado_pago = $request->get('mercado_pago');
        $configuracion->stock_alto = $request->get('stock_alto');
        $configuracion->stock_medio = $request->get('stock_medio');
        $configuracion->stock_bajo = $request->get('stock_bajo');
        $configuracion->opcion_factura = $request->get('opcion_factura');
        $configuracion->porcentaje_factura = $request->get('porcentaje_factura');
        $configuracion->sat_productos = $request->get('sat_productos');
        $configuracion->codigo_caja = $request->get('codigo_caja');
        $configuracion->precio_mayorista = $request->get('precio_mayorista');
        $configuracion->encriptar_mayo = $request->get('encriptar_mayo');
        $configuracion->palabra_encriptada = $request->get('palabra_encriptada');

        if ($request->hasFile("logo")) {
            $file = $request->file('logo');
            $path = public_path() . '/logo/empresa'.auth()->user()->id_empresa;
            $fileName = uniqid() . $file->getClientOriginalName();
            $file->move($path, $fileName);
            $configuracion->logo = $fileName;
        }
        $configuracion->update();

        $config_data = [
            "nombre" => $empresa->nombre,
            "stock_alto" => $configuracion->stock_alto,
            "stock_medio" => $configuracion->stock_medio,
            "stock_bajo" => $configuracion->stock_bajo,
        ];

        return response()->json(['success' => true, 'config_data' => $config_data]);

    }

    public function configuracion_empresa($code, Request $request){
        $user = auth()->user();

        $empresa = Empresas::where('code', '=', $code)->first();
        $empresa->nombre = $request->get('nombre_empresa');
        $empresa->logo = $request->get('logo');
        $empresa->telefono = $request->get('telefono_empresa');
        $empresa->correo = $request->get('correo_empresa');
        $empresa->update();

        $direccion = Direcciones::find($empresa->id_direccion);
        $direccion->codigo_postal = $request->get('codigo_postal');
        $direccion->estado = $request->get('estado');
        $direccion->alcaldia = $request->get('alcaldia');
        $direccion->pais = $request->get('pais');
        $direccion->colonia = $request->get('colonia');
        $direccion->calle_numero = $request->get('calle_numero');
        $direccion->update();

        $config_data = [
            "nombre" => $empresa->nombre,
            "codigo_postal" => $direccion->codigo_postal,
            "estado" => $direccion->estado,
            "alcaldia" => $direccion->alcaldia,
        ];

        return response()->json(['success' => true, 'config_data' => $config_data]);

    }

    public function configuracion_caja($id, Request $request){

        $configuracion = Configuraciones::where('id', '=', $id)->first();
        $configuracion->codigo_caja = $request->get('codigo_caja');
        $configuracion->tarjeta = $request->get('tarjeta');
        $configuracion->efectivo = $request->get('efectivo');
        $configuracion->transferencia = $request->get('transferencia');
        $configuracion->tipo_factura = $request->get('tipo_factura');
        $configuracion->mercado_pago = $request->get('mercado_pago');
        $configuracion->stock_bajo = $request->get('stock_bajo');
        $configuracion->stock_medio = $request->get('stock_medio');
        $configuracion->stock_alto = $request->get('stock_alto');
        $configuracion->precio_mayorista = $request->get('precio_mayorista');
        $configuracion->encriptar_mayo = $request->get('encriptar_mayo');
        $configuracion->palabra_encriptada = $request->get('palabra_encriptada');
        $configuracion->opcion_factura = $request->get('opcion_factura');
        $configuracion->porcentaje_factura = $request->get('porcentaje_factura');
        $configuracion->update();

        return response()->json(['success' => true]);

    }

    public function tarjeta_presentacion($code){

        $empresa = Empresas::where('code', $code)->first();

        return view('tarjetas_presentacion.diseno1',compact( 'empresa'));

    }
}
