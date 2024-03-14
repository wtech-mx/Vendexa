<?php

namespace App\Http\Controllers;

use App\Models\Direcciones;
use App\Models\Proveedores;
use App\Models\ProveedorFacturas;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProveedorController extends Controller
{
    public function index($code){
        $user = auth()->user()->id_empresa;

        $proveedores = Proveedores::where('id_empresa', $user)->Orderby('id','DESC')->take(100)->get();

        return view('proveedores.index', compact('proveedores'));
    }

    public function show($id, $code){

        $proveedor = Proveedores::where('id', $code)->first();
        $facturas = ProveedorFacturas::where('id_proveedor', $code)->get();

        return view('proveedores.show', compact('facturas', 'proveedor'));
    }

    public function store(Request $request){

        // Agregamos un dump para verificar los datos recibidos
        $validator = Validator::make($request->all(), [
            'nombre' => 'required',
            'telefono' => 'required',
            'calle_numero' => 'required',
            'codigo_postal' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $direccion = new Direcciones;
        $direccion->pais = $request->get('ciudad');
        $direccion->estado = $request->get('estado');
        $direccion->colonia = $request->get('colonia');
        $direccion->codigo_postal = $request->get('codigo_postal');
        $direccion->alcaldia = $request->get('alcaldia');
        $direccion->calle_numero = $request->get('calle_numero');
        $direccion->save();

        $proveedor = new Proveedores;
        $proveedor->nombre = $request->get('nombre');
        $proveedor->telefono = $request->get('telefono');
        $proveedor->correo = $request->get('correo');
        $proveedor->id_empresa = auth()->user()->id_empresa;
        $proveedor->id_direccion = $direccion->id;
        $proveedor->save();

        $proveedor_data = [
            "nombre" => $proveedor->nombre,
            "telefono" => $proveedor->telefono,
            "correo" => $proveedor->correo,
        ];

        return response()->json(['success' => true, 'proveedor_data' => $proveedor_data]);
    }

    public function update($id, Request $request){

        // Agregamos un dump para verificar los datos recibidos
        $validator = Validator::make($request->all(), [
            'nombre' => 'required',
            'telefono' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $proveedor = Proveedores::find($id);
        $proveedor->nombre = $request->get('nombre');
        $proveedor->telefono = $request->get('telefono');
        $proveedor->correo = $request->get('correo');
        $proveedor->correo = $request->get('correo');
        $proveedor->update();

        $proveedor_data = [
            "nombre" => $proveedor->nombre,
            "telefono" => $proveedor->telefono,
            "correo" => $proveedor->correo,
        ];

        return response()->json(['success' => true, 'proveedor_data' => $proveedor_data]);

    }

    public function store_fact(Request $request){

        $fechaActual = Carbon::now();
        $nuevosCampos = $request->file('factura');

        foreach ($nuevosCampos as $file) {
            $proveedor = new ProveedorFacturas;
            $proveedor->fecha = $fechaActual;
            $proveedor->id_proveedor = $request->get('id_proveedor');
            $proveedor->id_empresa = auth()->user()->id_empresa;

            if ($file) {
                $path = public_path() . '/facturas/empresa' . auth()->user()->id_empresa;
                $fileName = uniqid() . $file->getClientOriginalName();
                $file->move($path, $fileName);
                $proveedor->file = $fileName;
            }

            $proveedor->save();
        }


        return response()->json(['success' => true]);
    }
}
