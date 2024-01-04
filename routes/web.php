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

    // ============================================= G E N E R A L E S =====================================================

    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/scanner', 'ScannerController@index')->name('scanner.index');

    // ============================================= M O D U L O   C O N F I G U R A C I O N ===============================

    Route::patch('/configuracion/inicial/update/{id}', 'ConfiguracionController@inicial')->name('configuracion.inicial');

    Route::get('/configuracion/{code}', 'ConfiguracionController@index')->name('configuracion.index');
    Route::patch('/configuracion/empresa/update/{code}', 'ConfiguracionController@update')->name('configuracion_empresa.update');



    // ============================================= M O D U L O   C L I E N T E S =========================================

    Route::get('/clientes', 'ClienteController@index')->name('clientes.index');
    Route::get('/clientes/show/{id}', 'ClienteController@show')->name('clientes.show');
    Route::post('/clientes/store', 'ClienteController@store')->name('clientes.store');


    // ============================================= M O D U L O   P R O D U C T O S =======================================

    Route::get('/productos', 'ProductosController@index')->name('productos.index');
    Route::post('/productos/store', 'ProductosController@store')->name('productos.store');
    Route::patch('/productos/update/{id}', 'ProductosController@update')->name('productos.update');
    Route::get('/productos/filtro', 'ProductosController@filtro')->name('productos.filtro');
    Route::get('/imprimir/etiqueta/{sku}', 'ImpresionController@imprimir_etiqueta')->name('imprimir_etiqueta.product');
    Route::POST('/pdf/productos', 'ImpresionController@pdf_productos')->name('pdf.product');
    Route::POST('bulk/productos/pausar', 'ProductosController@bukaction_pausar')->name('bulk_pausar.product');
    Route::POST('bulk/productos/publicar', 'ProductosController@bukaction_publicar')->name('bulk_publicar.product');
    Route::POST('bulk/productos/promocion', 'ProductosController@bukaction_promocion')->name('bulk_promocion.product');

    // ============================================= M O D U L O   C A J A =================================================

    //Route::get('/caja', 'CajaController@index')->name('caja.index');
    Route::get('/caja/{id}', 'CajaController@index')->name('caja.index');
    Route::get('/agregar-al-carrito', 'CajaController@agregarAlCarrito')->name('agregar.al.carrito');
    Route::post('/caja/store', 'CajaController@store')->name('caja.store');
    Route::post('/caja/pass', 'CajaController@validation_pass')->name('caja_pass.store');
    Route::get('/obtener-registros-cliente/{id}', 'CajaController@obtenerRegistrosCliente');

    // ============================================= M O D U L O   O R D E N E S ===========================================

    Route::get('/orders', 'OrdersController@index')->name('orders.index');
    Route::get('/orders/ticket/{id}', 'OrdersController@show')->name('orders.show');


    // ============================================= M O D U L O  T R A B A J A D O R E S ==================================

    Route::get('/trabajadores', 'TrabajadoresController@index')->name('trabajadores.index');
    Route::post('/trabajadores/store', 'TrabajadoresController@store')->name('trabajadores.store');
    Route::get('/trabajadores/show/{id}', 'TrabajadoresController@show')->name('trabajadores.show');


    // ============================================= M O D U L O  R O L E S  Y  P E R M I S O S ============================

    Route::get('/roles/permisos', 'RoleController@index')->name('roles.index');
    Route::post('/roles/permisos/store', 'RoleController@store')->name('roles.store');

    // ============================================= M O D U L O  C O T I Z A C I O N E S ==================================

    Route::get('/quotes', 'CotizacionesController@index')->name('quotes.index');
    Route::post('/quotes/store', 'CotizacionesController@store')->name('quotes.store');
    Route::patch('/quotes/update/{id}', 'CotizacionesController@update')->name('quotes.update');
    Route::get('/quotes/filtro', 'CotizacionesController@filtro')->name('quotes.filtro');

 });





