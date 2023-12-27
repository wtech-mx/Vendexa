<?php

namespace App\Providers;

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

            $view->with(['permission' => $permission]);
        });
    }
}
