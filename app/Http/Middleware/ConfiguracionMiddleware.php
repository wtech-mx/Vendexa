<?php

namespace App\Http\Middleware;

use App\Models\CajaCorte;
use App\Models\Configuraciones;
use App\Models\Proveedores;
use App\Models\SubCategorias;
use App\Models\Marcas;
use App\Models\Categorias;
use App\Models\Empresas;
use App\Models\Productos;
use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ConfiguracionMiddleware
{
    public function handle($request, Closure $next)
    {
        if(auth()->check()) {
            $fechaActual = date('Y-m-d');
            // Obtener la configuración y hacerla disponible en todas las vistas
            $configuracion = Configuraciones::where('id_empresa', auth()->user()->id_empresa)->first();
            $proveedores = Proveedores::where('id_empresa', auth()->user()->id_empresa)->get();
            $marcas = Marcas::where('id_empresa', auth()->user()->id_empresa)->get();
            $categorias = Categorias::where('id_empresa', auth()->user()->id_empresa)->get();
            $subcategorias = SubCategorias::where('id_empresa', auth()->user()->id_empresa)->get();
            $empresa = Empresas::where('id', auth()->user()->id_empresa)->first();
            $empleados = User::where('id_empresa', auth()->user()->id_empresa)->get();
            $productos_global = Productos::where('id_empresa', auth()->user()->id_empresa)->get();
            $caja_corte_global = CajaCorte::where('fecha', '=', $fechaActual)->where('id_empresa', auth()->user()->id_empresa)->first();

            // Compartir la configuración con todas las vistas
            view()->share('configuracion', $configuracion);
            view()->share('proveedores', $proveedores);
            view()->share('marcas', $marcas);
            view()->share('categorias', $categorias);
            view()->share('subcategorias', $subcategorias);
            view()->share('empresa', $empresa);
            view()->share('empleados', $empleados);
            view()->share('productos_global', $productos_global);
            view()->share('caja_corte_global', $caja_corte_global);
        }

        return $next($request);
    }
}
