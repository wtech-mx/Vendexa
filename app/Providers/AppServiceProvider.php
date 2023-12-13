<?php

namespace App\Providers;

use App\Models\Categorias;
use App\Models\Marcas;
use App\Models\Proveedores;
use App\Models\SubCategorias;
use Illuminate\Support\Facades\Auth;
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
    public function boot()
    {
        //
    }
}
