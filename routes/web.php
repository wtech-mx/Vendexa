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

Auth::routes();


Route::get('/', function () {
    return view('auth.login');
});


Route::group(['middleware' => ['auth'], 'namespace' => 'App\Http\Controllers'], function () {

    Route::get('/home', 'HomeController@index')->name('home');

    Route::get('/scanner', 'ScannerController@index')->name('scanner.index');
    Route::get('/orders', 'OrdersController@index')->name('orders.index');


    // =============== M O D U L O   P R O D U C T O S ===============================
    Route::get('/productos', 'ProductosController@index')->name('productos.index');
    Route::post('/productos/store', 'ProductosController@store')->name('productos.store');
    Route::patch('/productos/update/{id}', 'ProductosController@update')->name('productos.update');

 });

Route::get('caja', function () {
    return view('caja.index');
});





