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

            return redirect('/home');

        }else{
            return redirect()->back()
            ->with('warning', 'Telefono incorrecto.');;
        }

    }

    public function signOut() {
        Session::flush();
        Auth::logout();

        return redirect("login")->withSuccess('Sesión terminada');
    }
}
