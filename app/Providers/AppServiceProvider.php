<?php

namespace App\Providers;

use App\Models\Categorias;
use App\Models\Marcas;
use App\Models\Proveedores;
use App\Models\SubCategorias;
use Illuminate\Support\ServiceProvider;

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
    public function boot(): void
    {
        view()->composer('*', function ($view) {
            $user = auth()->user()->id_empresa;
            $proveedores = Proveedores::where('id_empresa', $user)->get();
            $marcas = Marcas::where('id_empresa', $user)->get();
            $categorias = Categorias::where('id_empresa', $user)->get();
            $subcategorias = SubCategorias::where('id_empresa', $user)->get();


            $view->with(['proveedores' => $proveedores,'marcas' => $marcas,'categorias' => $categorias, 'subcategorias' => $subcategorias]);
        });
    }
}
