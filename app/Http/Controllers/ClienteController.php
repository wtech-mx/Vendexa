<?php

namespace App\Http\Controllers;

use App\Models\Clientes;
use App\Models\Categorias;
use App\Models\Direcciones;
use App\Models\Marcas;
use App\Models\Ordenes;
use App\Models\Productos;
use App\Models\Proveedores;
use App\Models\SubCategorias;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class ClienteController extends Controller
{

    public function index(){

        $user = auth()->user()->id_empresa;

        $clientes = Clientes::where('id_empresa', $user)->get();

        $proveedores = Proveedores::where('id_empresa', $user)->get();
        $marcas = Marcas::where('id_empresa', $user)->get();
        $categorias = Categorias::where('id_empresa', $user)->get();
        $subcategorias = SubCategorias::where('id_empresa', $user)->get();

        return view('clientes.index', compact('clientes','marcas','categorias','subcategorias','proveedores'));
    }

    public function show($id){

        $cliente = Clientes::where('id', $id)->first();
        $compras = Ordenes::where('id_cliente', $id)->where('cotizacion', '=', 'No')->get();
        $adeudos = Ordenes::where('id_cliente', $id)->where('restante', '>', 0)->where('cotizacion', '=', 'No')->get();
        $cotizaciones = Ordenes::where('id_cliente', $id)->where('cotizacion', '=', 'Si')->get();

        return view('clientes.show', compact('cliente','compras','cotizaciones', 'adeudos'));
    }

    public function store(Request $request){

        // Agregamos un dump para verificar los datos recibidos
        $validator = Validator::make($request->all(), [
            'nombre_cliente' => 'required',
            'apellido_cliente' => 'required',
            'whats_cliente' => 'required',
            'email_cliente' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        if($request->get('codigo_postal') != NULL){
            $direccion = new Direcciones;
            $direccion->pais = $request->get('ciudad');
            $direccion->estado = $request->get('estado');
            $direccion->colonia = $request->get('colonia');
            $direccion->codigo_postal = $request->get('codigo_postal');
            $direccion->alcaldia = $request->get('alcaldia');
            $direccion->calle_numero = $request->get('calle_numero');
            $direccion->save();
        }

        $user = auth()->user();

        $client = new Clientes;
        $client->nombre = $request->get('nombre_cliente') . ' ' . $request->get('apellido_cliente');
        $client->telefono = $request->get('whats_cliente');
        $client->correo = $request->get('email_cliente');
        if($request->get('codigo_postal') != NULL){
            $client->id_direccion = $direccion->id;
        }
        $client->id_user = auth()->user()->id;
        $client->id_empresa = auth()->user()->id_empresa;
        $client->save();

        if ($request->hasFile("img_perfil")) {
            $file = $request->file('img_perfil');
            $path = public_path() . '/imagen_cliente/empresa'.auth()->user()->id_empresa;
            $fileName = uniqid() . $file->getClientOriginalName();
            $file->move($path, $fileName);
            $client->imagen_principal = $fileName;
        }

        $client->id_empresa = $user->id_empresa;
        $client->id_user = $user->id;
        $client->save();

        $cliente_data = [
            "nombre" => $client->nombre,
            "telefono" => $client->telefono,
            "correo" => $client->correo,
        ];

        return response()->json(['success' => true, 'cliente_data' => $cliente_data]);

    }

    public function update($id, Request $request){

        $validator = Validator::make($request->all(), [
            'nombre' => 'required',
            'telefono' => 'required',
            'correo' => 'required',

        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $client = Clientes::find($id);
        $client->nombre = $request->get('nombre');
        $client->telefono = $request->get('telefono');
        $client->correo = $request->get('correo');
        $client->tipo = $request->get('tipo');
        $client->save();

        $direccion = Direcciones::find($client->id_direccion);
        $direccion->pais = $request->get('pais');
        $direccion->estado = $request->get('estado');
        $direccion->colonia = $request->get('colonia');
        $direccion->codigo_postal = $request->get('codigo_postal');
        $direccion->alcaldia = $request->get('alcaldia');
        $direccion->calle_numero = $request->get('calle_numero');
        $direccion->save();

        $cliente_data = [
            "nombre" => $client->nombre,
            "telefono" => $client->telefono,
            "correo" => $client->correo,
        ];

        return response()->json(['success' => true, 'cliente_data' => $cliente_data]);

    }

}
