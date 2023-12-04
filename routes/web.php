<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('dashboard', function () {
    return view('dashboard');
});

Route::get('products', function () {
    return view('products.index');
});

// =============== M O D U L O   P R O D U C T O S ===============================
Route::get('/productos/index', [App\Http\Controllers\ProductosController::class, 'index'])->name('productos.index');
Route::post('/productos/store', [App\Http\Controllers\ProductosController::class, 'store'])->name('productos.store');
Route::patch('/productos/update/{id}', [App\Http\Controllers\ProductosController::class, 'update'])->name('productos.update');

Route::get('caja', function () {
    return view('caja.index');
});


Route::get('/', function () {
    return view('auth.login');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
