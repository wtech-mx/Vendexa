<?php

namespace App\Providers;

use App\Models\Admin\Configuracion;
use App\Models\Categorias;
use App\Models\Marcas;
use App\Models\Proveedores;
use App\Models\SubCategorias;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        view()->composer('*', function ($view) {
            $permission = Permission::get();

            $configuracion_app = Configuracion::first();
            $nombreMes = date('F');
            switch ($nombreMes) {
                case 'January':
                    $ImagenLogin = '/assets/media/img/login/'.$configuracion_app->img_enero;
                    break;
                case 'February':
                    $ImagenLogin = '/assets/media/img/login/'.$configuracion_app->img_febrero;
                    break;
                case 'March':
                    $ImagenLogin = '/assets/media/img/login/'.$configuracion_app->img_marzo;
                    break;
                case 'April':
                    $ImagenLogin = '/assets/media/img/login/'.$configuracion_app->img_abril;
                    break;
                case 'May':
                    $ImagenLogin = '/assets/media/img/login/'.$configuracion_app->img_mayo;
                    break;
                case 'June':
                    $ImagenLogin = '/assets/media/img/login/'.$configuracion_app->img_junio;
                    break;
                case 'July':
                    $ImagenLogin = '/assets/media/img/login/'.$configuracion_app->img_julio;
                    break;
                case 'August':
                    $ImagenLogin = '/assets/media/img/login/'.$configuracion_app->img_agosto;
                    break;
                case 'September':
                    $ImagenLogin = '/assets/media/img/login/'.$configuracion_app->img_septiembre;
                    break;
                case 'October':
                    $ImagenLogin = '/assets/media/img/login/'.$configuracion_app->img_octubre;
                    break;
                case 'November':
                    $ImagenLogin = '/assets/media/img/login/'.$configuracion_app->img_noviembre;
                    break;
                case 'December':
                    $ImagenLogin = '/assets/media/img/login/'.$configuracion_app->img_diciembre;
                    break;
            }

            $view->with(['permission' => $permission, 'ImagenLogin' => $ImagenLogin]);
        });
    }
}
