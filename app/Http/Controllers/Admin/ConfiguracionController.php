<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Configuracion;
use Illuminate\Http\Request;

class ConfiguracionController extends Controller
{
    public function index(){

        $configuracion = Configuracion::first();

        return view('configuracion_admin.index', compact('configuracion'));
    }


    public function update_ajustes_admin($id, Request $request){

        $admin_configuracion = Configuracion::find($id);

        if ($request->hasFile("img_enero")) {
            $file = $request->file('img_enero');
            $path = public_path() . '/assets/media/img/login/';
            $fileName = uniqid() . $file->getClientOriginalName();
            $file->move($path, $fileName);
            $admin_configuracion->img_enero = $fileName;
        }

        if ($request->hasFile("img_febrero")) {
            $file = $request->file('img_febrero');
            $path = public_path() . '/assets/media/img/login/';
            $fileName = uniqid() . $file->getClientOriginalName();
            $file->move($path, $fileName);
            $admin_configuracion->img_febrero = $fileName;
        }


        if ($request->hasFile("img_marzo")) {
            $file = $request->file('img_marzo');
            $path = public_path() . '/assets/media/img/login/';
            $fileName = uniqid() . $file->getClientOriginalName();
            $file->move($path, $fileName);
            $admin_configuracion->img_marzo = $fileName;
        }


        if ($request->hasFile("img_abril")) {
            $file = $request->file('img_abril');
            $path = public_path() . '/assets/media/img/login/';
            $fileName = uniqid() . $file->getClientOriginalName();
            $file->move($path, $fileName);
            $admin_configuracion->img_abril = $fileName;
        }

        if ($request->hasFile("img_mayo")) {
            $file = $request->file('img_mayo');
            $path = public_path() . '/assets/media/img/login/';
            $fileName = uniqid() . $file->getClientOriginalName();
            $file->move($path, $fileName);
            $admin_configuracion->img_mayo = $fileName;
        }

        if ($request->hasFile("img_junio")) {
            $file = $request->file('img_junio');
            $path = public_path() . '/assets/media/img/login/';
            $fileName = uniqid() . $file->getClientOriginalName();
            $file->move($path, $fileName);
            $admin_configuracion->img_junio = $fileName;
        }

        if ($request->hasFile("img_julio")) {
            $file = $request->file('img_julio');
            $path = public_path() . '/assets/media/img/login/';
            $fileName = uniqid() . $file->getClientOriginalName();
            $file->move($path, $fileName);
            $admin_configuracion->img_julio = $fileName;
        }

        if ($request->hasFile("img_agosto")) {
            $file = $request->file('img_agosto');
            $path = public_path() . '/assets/media/img/login/';
            $fileName = uniqid() . $file->getClientOriginalName();
            $file->move($path, $fileName);
            $admin_configuracion->img_agosto = $fileName;
        }

        if ($request->hasFile("img_septiembre")) {
            $file = $request->file('img_septiembre');
            $path = public_path() . '/assets/media/img/login/';
            $fileName = uniqid() . $file->getClientOriginalName();
            $file->move($path, $fileName);
            $admin_configuracion->img_septiembre = $fileName;
        }

        if ($request->hasFile("img_octubre")) {
            $file = $request->file('img_octubre');
            $path = public_path() . '/assets/media/img/login/';
            $fileName = uniqid() . $file->getClientOriginalName();
            $file->move($path, $fileName);
            $admin_configuracion->img_octubre = $fileName;
        }

        if ($request->hasFile("img_noviembre")) {
            $file = $request->file('img_noviembre');
            $path = public_path() . '/assets/media/img/login/';
            $fileName = uniqid() . $file->getClientOriginalName();
            $file->move($path, $fileName);
            $admin_configuracion->img_noviembre = $fileName;
        }

        if ($request->hasFile("img_diciembre")) {
            $file = $request->file('img_diciembre');
            $path = public_path() . '/assets/media/img/login/';
            $fileName = uniqid() . $file->getClientOriginalName();
            $file->move($path, $fileName);
            $admin_configuracion->img_diciembre = $fileName;
        }

        $admin_configuracion->update();
        return response()->json(['success' => true]);

    }
}
