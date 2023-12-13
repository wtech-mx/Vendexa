<?php

namespace App\Http\Controllers;

use App\Models\Clientes;
use App\Models\Categorias;
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

        $user = auth()->user();

        $client = new Clientes;
        $client->nombre = $request->get('nombre_cliente') . ' ' . $request->get('apellido_cliente');
        $client->telefono = $request->get('whats_cliente');
        $client->correo = $request->get('email_cliente');
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



}
