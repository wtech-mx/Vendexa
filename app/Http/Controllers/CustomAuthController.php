<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Hash;
use Session;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use App\Mail\PlantillaNuevoUser;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

class CustomAuthController extends Controller
{
    public function customLogin(Request $request)
    {

        $input = $request->all();
        $request->validate([
            'telefono' => 'required',
            'password' => 'required',
        ]);
    
        $fieldType = filter_var($request->telefono, FILTER_VALIDATE_EMAIL) ? 'email' : 'telefono';

        if(auth()->attempt(array($fieldType => $input['telefono'], 'password' => $input['password']))){

                if(Auth::user()->estatus_rol == 'Superadmin_root'){

                    $id = Auth::user()->id;


                    dd( $id);

                    return redirect()->route('home_admin', $id)->withSuccess('Sesión iniciada');

                }else{

                    $code = auth()->user()->Empresa->code;

                    // Obtén el nombre de la empresa desde la solicitud
                    $empresaNombre = auth()->user()->Empresa->nombre;

                    // Elimina espacios y caracteres no permitidos en los subdominios
                    $subdomain = str_slug($empresaNombre);

                    // return redirect()->route('home', ['code' => $code])->withSuccess('Sesión iniciada');
                    return redirect()->route('subdomain.home', ['subdomain' => $subdomain, 'code' => $code])->withSuccess('Sesión iniciada');

                }

        }else{
            return redirect()->back()->with('warning', 'Telefono incorrecto.');
        }
    }

    public function signOut() {
        Session::flush();
        Auth::logout();

        return redirect("login")->withSuccess('Sesión terminada');
    }
}
