<?php

namespace App\Http\Middleware;

use App\Models\CajaCorte;
use App\Models\Configuraciones;
use App\Models\Proveedores;
use App\Models\SubCategorias;
use App\Models\Marcas;
use App\Models\Categorias;
use App\Models\Admin\Empresas;
use App\Models\Admin\Licencias;
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
            $fechaActual_global = date('Y-m-d');
            // Obtener la configuración y hacerla disponible en todas las vistas
            $configuracion = Configuraciones::where('id_empresa', auth()->user()->id_empresa)->first();
            $proveedores = Proveedores::where('id_empresa', auth()->user()->id_empresa)->get();
            $marcas = Marcas::where('id_empresa', auth()->user()->id_empresa)->get();
            $categorias = Categorias::where('id_empresa', auth()->user()->id_empresa)->get();
            $subcategorias = SubCategorias::where('id_empresa', auth()->user()->id_empresa)->get();
            $empresa = Empresas::where('id', auth()->user()->id_empresa)->first();
            $empleados = User::where('id_empresa', auth()->user()->id_empresa)->get();
            $productos_global = Productos::where('id_empresa', auth()->user()->id_empresa)->get();
            $caja_corte_global = CajaCorte::where('fecha', '=', $fechaActual_global)->where('id_empresa', auth()->user()->id_empresa)->first();
            $licencia_global = Licencias::where('id_empresa', auth()->user()->id_empresa)->orderby('id','DESC')->first();

            if(auth()->user()->estatus_rol == 'Superadmin_root'){
                $code_global = auth()->user()->id;
            }else{
                $code_global = $empresa->code;
            }

            // Compartir la configuración con todas las vistas
            view()->share('fechaActual_global', $fechaActual_global);
            view()->share('licencia_global', $licencia_global);
            view()->share('code_global', $code_global);
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
