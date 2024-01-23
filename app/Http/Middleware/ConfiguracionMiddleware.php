<?php

namespace App\Http\Middleware;

use App\Models\CajaCorte;
use App\Models\Configuraciones;
use App\Models\Proveedores;
use App\Models\SubCategorias;
use App\Models\Marcas;
use App\Models\Categorias;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ConfiguracionMiddleware
{
    public function handle($request, Closure $next)
    {
        if(auth()->check()) {
            // Obtener la configuración y hacerla disponible en todas las vistas
            $configuracion = Configuraciones::where('id_empresa', auth()->user()->id_empresa)->first();
            $proveedores = Proveedores::where('id_empresa', auth()->user()->id_empresa)->get();
            $marcas = Marcas::where('id_empresa', auth()->user()->id_empresa)->get();
            $categorias = Categorias::where('id_empresa', auth()->user()->id_empresa)->get();
            $subcategorias = SubCategorias::where('id_empresa', auth()->user()->id_empresa)->get();


            // Compartir la configuración con todas las vistas
            view()->share('configuracion', $configuracion);
            view()->share('proveedores', $proveedores);
            view()->share('marcas', $marcas);
            view()->share('categorias', $categorias);
            view()->share('subcategorias', $subcategorias);
        }
        
        return $next($request);
    }
}
