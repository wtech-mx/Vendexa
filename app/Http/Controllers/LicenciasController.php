<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;

use Illuminate\Http\Request;
use App\Models\Licencias;
use Carbon\Carbon;

class LicenciasController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){

        $licencias = Licencias::orderBy('id', 'DESC')->take(100)->get();

        return view('licencias.index', compact('licencias'));

    }

    public function store(Request $request)
    {

        // Agregamos un dump para verificar los datos recibidos
        $validator = Validator::make($request->all(), [
            'id_empresa' => 'required',
            'membrecia' => 'required',
            'codigo' => 'required',
            'estatus' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $licencia = new Licencias;
        $licencia->id_empresa = $request->get('id_empresa');
        $licencia->codigo = $request->get('codigo');
        $licencia->estatus = $request->get('estatus');
        $licencia->vendedor = $request->get('vendedor');
        $licencia->comentario = $request->get('comentario');
        $licencia->membrecia = $request->get('membrecia');
        $licencia->caducidad = $request->get('caducidad');
        $licencia->save();

        return response()->json(['success' => true]);

    }

    public function update(Request $request,$id){

        $validator = Validator::make($request->all(), [
            'membrecia' => 'required',
            'codigo' => 'required',
            'estatus' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $licencia = Licencias::find($id);
        $licencia->codigo = $request->get('codigo');
        $licencia->estatus = $request->get('estatus');
        $licencia->vendedor = $request->get('vendedor');
        $licencia->comentario = $request->get('comentario');
        $licencia->membrecia = $request->get('membrecia');
        $licencia->caducidad = $request->get('caducidad');
        $licencia->update();

        return response()->json(['success' => true]);

    }

    public function update_key(Request $request, $id){

        $validator = Validator::make($request->all(), [
            'key' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $licencia_global = Licencias::where('id_empresa', auth()->user()->id_empresa)->orderby('id','DESC')->first();
        if($request->get('key') == $licencia_global->codigo){
            $licencia = Licencias::find($id);
            $licencia->estatus = 'Activado';
            $licencia->update();

            $licencia_data = [
                "membrecia" => $licencia->membrecia,
                "estatus" => $licencia->estatus,
                "caducidad" => $licencia->caducidad,
            ];
            return response()->json(['success' => true, 'licencia_data' => $licencia_data]);
        }else{

            return response()->json(['errors' => $validator->errors()], 422);
        }

    }

}
