<?php

namespace App\Http\Controllers;

use App\Models\Direcciones;
use App\Models\Ordenes;
use App\Models\User;
use App\Models\Proveedores;
use App\Models\Categorias;
use App\Models\Marcas;
use App\Models\SubCategorias;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
use Hash;
use Illuminate\Http\Request;

class TrabajadoresController extends Controller
{
    public function index(){
        $user = auth()->user()->id_empresa;

        $trabajadores = User::where('id_empresa', $user)->orderBy('id', 'DESC')->take(100)->get();


        return view('trabajadores.index', compact('trabajadores'));
    }

    public function show($id){

        $trabajador = User::where('id', $id)->first();
        $compras = Ordenes::where('id_user', $id)->where('cotizacion', '=', 'No')->get();
        $adeudos = Ordenes::where('id_user', $id)->where('restante', '>', 0)->where('cotizacion', '=', 'No')->get();
        $cotizaciones = Ordenes::where('id_user', $id)->where('cotizacion', '=', 'Si')->get();

        return view('trabajadores.show', compact('trabajador','compras','cotizaciones', 'adeudos'));
    }

    public function store(Request $request){
        // Agregamos un dump para verificar los datos recibidos
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'apellido' => 'required',
            'telefono' => 'required',
            'password' => 'required',
            'pin' => 'required',
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

        $trabajador = new User;
        dd($request);
        $trabajador->name = $request->get('name') . ' ' . $request->get('apellido');
        $trabajador->telefono = $request->get('telefono');
        $trabajador->email = $request->get('correo');
        $trabajador->password_caja = $request->get('pin');
        $trabajador->password = Hash::make($request->get('password'));

        $trabajador->correo = $request->get('correo');
        if($request->get('codigo_postal') != NULL){
            $trabajador->id_direccion = $direccion->id;
        }
        $trabajador->id_empresa = auth()->user()->id_empresa;

        if ($request->hasFile("foto")) {
            $file = $request->file('foto');
            $path = public_path() . '/foto_trabajador/empresa'.auth()->user()->id_empresa;
            $fileName = uniqid() . $file->getClientOriginalName();
            $file->move($path, $fileName);
            $trabajador->foto = $fileName;
        }
        $trabajador->save();

        $trabajador_data = [
            "name" => $trabajador->name,
            "telefono" => $trabajador->telefono,
            "correo" => $trabajador->correo,
        ];

        return response()->json(['success' => true, 'trabajador_data' => $trabajador_data]);

    }

    public function update($id, Request $request){


        $usuario = User::find($id);
        $usuario->name = $request->get('name');
        $usuario->telefono = $request->get('telefono');
        $usuario->correo = $request->get('correo');

        if($request->get('password') == NULL){

        }else{
            $usuario->password = Hash::make($request->get('password'));
        }

        $usuario->password_caja = $request->get('password_caja');
        $usuario->save();

        $direccion = Direcciones::find($usuario->id_direccion);
        $direccion->pais = $request->get('pais');
        $direccion->estado = $request->get('estado');
        $direccion->colonia = $request->get('colonia');
        $direccion->codigo_postal = $request->get('codigo_postal');
        $direccion->alcaldia = $request->get('alcaldia');
        $direccion->calle_numero = $request->get('calle_numero');
        $direccion->save();

        $user_data = [
            "nombre" => $usuario->name,
        ];

        return response()->json(['success' => true, 'user_data' => $user_data]);

    }
}
