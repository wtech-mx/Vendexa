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

// ============================================= L O G I N =====================================================
Auth::routes();

Route::get('/', function () {
    return view('auth.login');
});

Route::post('custom-login', [App\Http\Controllers\CustomAuthController::class, 'customLogin'])->name('login.custom');
Route::get('signout', [App\Http\Controllers\CustomAuthController::class, 'signOut'])->name('signout');

// ============================================= G E N E R A L E S =====================================================

Route::group(['middleware' => ['auth'], 'namespace' => 'App\Http\Controllers'], function () {


    Route::get('/tarjeta_uno', function () {
        return view('tarjetas_presentacion.diseno1');
    });

    // ============================================= G E N E R A L E S =====================================================

    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/scanner', 'ScannerController@index')->name('scanner.index');

    // ============================================= M O D U L O   C O N F I G U R A C I O N ===============================

    Route::patch('/configuracion/inicial/update/{id}', 'ConfiguracionController@inicial')->name('configuracion.inicial');

    Route::get('/configuracion/{code}', 'ConfiguracionController@index')->name('configuracion.index');
    Route::patch('/configuracion/empresa/update/{code}', 'ConfiguracionController@configuracion_empresa')->name('configuracion_empresa.update');
    Route::patch('/configuracion/caja/update/{id}', 'ConfiguracionController@configuracion_caja')->name('configuracion_caja.update');

    // ============================================= M O D U L O   C L I E N T E S =========================================

    Route::get('/clientes', 'ClienteController@index')->name('clientes.index');
    Route::get('/clientes/filtro', 'ClienteController@filtro')->name('clientes.filtro');
    Route::get('/clientes/show/{id}', 'ClienteController@show')->name('clientes.show');
    Route::post('/clientes/store', 'ClienteController@store')->name('clientes.store');
    Route::patch('/clientes/update/{id}', 'ClienteController@update')->name('clientes.update');


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

    Route::get('/caja', 'CajaController@index')->name('caja_sincodigo.index');
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
    Route::patch('/empleados/update/{id}', 'TrabajadoresController@update')->name('empleados.update');

    // ============================================= M O D U L O  R O L E S  Y  P E R M I S O S ============================

    Route::get('/roles/permisos', 'RoleController@index')->name('roles.index');
    Route::post('/roles/permisos/store', 'RoleController@store')->name('roles.store');

    // ============================================= M O D U L O  C O T I Z A C I O N E S ==================================

    Route::get('/cotizaciones', 'CotizacionesController@index')->name('cotizaciones.index');
    Route::post('/cotizaciones/store', 'CotizacionesController@store')->name('cotizaciones.store');
    Route::patch('/cotizaciones/update/{id}', 'CotizacionesController@update')->name('cotizaciones.update');
    Route::get('/cotizaciones/filtro', 'CotizacionesController@filtro')->name('cotizaciones.filtro');
    Route::get('/cotizaciones/pdf/{id}', 'CotizacionesController@pdf')->name('cotizaciones.pdf');

    // ============================================= M O D U L O  R E P O R T E S ==================================

    Route::get('/reportes', 'ReportesController@index')->name('reportes.index');
    Route::get('/reportes/filtro/caja', 'ReportesController@filtro_caja')->name('reportes.filtro_caja');
    Route::get('/reportes/filtro/producto', 'ReportesController@filtro_productos')->name('reportes.filtro_producto');
    Route::get('/reportes/caja/pdf/{fechaInicio}/{fechaFin}', 'ReportesController@pdf_caja')->name('reportes_caja.pdf');

    // ============================================= M O D U L O  C O R T E =====================================================

    Route::get('/corte/caja', 'CajaCorteController@index')->name('caja_corte.index');
    Route::post('/corte/caja/store', 'CajaCorteController@store')->name('caja_corte.store');
    Route::get('/corte/caja/pdf', 'CajaCorteController@pdf')->name('caja_corte.pdf');
    Route::post('/corte/caja/cerrar', 'CajaCorteController@cerrar')->name('caja_corte.cerrar');

});





