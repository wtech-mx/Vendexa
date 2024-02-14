<?php

namespace App\Http\Controllers;

use App\Models\Configuraciones;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Empresas;
use App\Models\Licencias;
use App\Models\User;
use Illuminate\Support\Str;
use Hash;

class EmpresasContoller extends Controller
{
    public function index(){
        $user = auth()->user()->id_empresa;

        $empresas = Empresas::orderBy('id', 'DESC')->take(50)->get();
        $licencias = Licencias::where('estatus', '=', 'Activado')->take(50)->get();

        return view('empresas.index', compact('empresas', 'licencias'));
    }

    public function store(Request $request){

        // Agregamos un dump para verificar los datos recibidos
        $validator = Validator::make($request->all(), [
            'nombre_empresa' => 'required',
            'telefono_empresa' => 'required',
            'nombre_usuario' => 'required',
            'apellido_usuario' => 'required',
            'email_usuario' => 'required',
            'telefono_usuario' => 'required',
            'membrecia' => 'required',
            'codigo' => 'required',
            'estatus' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $empresa = new Empresas;
        $empresa->nombre = $request->get('nombre_empresa');
        $empresa->telefono = $request->get('telefono_empresa');
        $empresa->correo = $request->get('email_empresa');
        $empresa->code = Str::random(6);
        $empresa->save();

        $user = new User;
        $user->name = $request->get('nombre_usuario') . ' ' . $request->get('apellido_usuario');
        $user->email = $request->get('email_usuario');
        $user->telefono = $request->get('telefono_usuario');
        $user->password_caja = $request->get('nombre_usuario');
        $user->password = Hash::make($request->get('password'));
        $user->id_empresa = $empresa->id;
        $user->save();

        $configuracion = new Configuraciones;
        $configuracion->estatus_config = 0;
        $configuracion->stock_alto = 0;
        $configuracion->stock_medio = 0;
        $configuracion->stock_bajo = 0;
        $configuracion->id_empresa = $empresa->id;
        $configuracion->save();

        $licencia = new Licencias;
        $licencia->id_empresa = $empresa->id;
        $licencia->codigo = $request->get('codigo');
        $licencia->estatus = $request->get('estatus');
        $licencia->vendedor = auth()->user()->nombre;
        $licencia->membrecia = $request->get('membrecia');
        $licencia->caducidad = $request->get('caducidad');
        $licencia->save();

        $empresa_data = [
            "nombre" => $empresa->nombre,
            "telefono" => $empresa->telefono,
            "user" => $user->name,
        ];

        return response()->json(['success' => true, 'empresa_data' => $empresa_data]);

        return redirect()->back()->with('success', 'Creado exitosamente.');

    }

}
