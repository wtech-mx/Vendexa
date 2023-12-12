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

Route::get('/caja_old', function () {
    return view('caja.index_old');
});



Route::group(['middleware' => ['auth'], 'namespace' => 'App\Http\Controllers'], function () {

    Route::get('/home', 'HomeController@index')->name('home');

    Route::get('/scanner', 'ScannerController@index')->name('scanner.index');
    Route::get('/orders', 'OrdersController@index')->name('orders.index');
    Route::get('/orders/ticket', 'OrdersController@show')->name('orders.show');


    // =============== M O D U L O   P R O D U C T O S ===============================
    Route::get('/productos', 'ProductosController@index')->name('productos.index');
    Route::post('/productos/store', 'ProductosController@store')->name('productos.store');
    Route::patch('/productos/update/{id}', 'ProductosController@update')->name('productos.update');

    // =============== M O D U L O   C A J A ===============================
    Route::get('/caja', 'CajaController@index')->name('caja.index');
    Route::get('/agregar-al-carrito', 'CajaController@agregarAlCarrito')->name('agregar.al.carrito');
    Route::post('/caja/store', 'CajaController@store')->name('caja.store');
 });





