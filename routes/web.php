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

Route::get('/tarjeta_digital/{code}', [App\Http\Controllers\ConfiguracionController::class, 'tarjeta_presentacion'])->name('tarjeta_digital.index');
Route::get('/tienda_online/{code}', [App\Http\Controllers\TiendaController::class, 'index'])->name('tienda_online.index');
Route::get('/tienda_online/producto/{slug}', [App\Http\Controllers\TiendaController::class, 'single_product'])->name('tienda_single.index');



// ============================================= A D M I N I S T R A D O R =====================================================

Route::group(['prefix' => 'wtech', 'middleware' => 'web', 'namespace' => 'App\Http\Controllers'], function ()  {

    // ============================================= G E N E R A L E S =====================================================
    Route::get('/home_admin/{id}', 'HomeController@index_admin')->name('home_admin');

    // ============================================= M O D U L O   E M P R E S A S =====================================================

    Route::get('/configuracion/admin', 'Admin\ConfiguracionController@index')->name('configuracion_admin.index');
    Route::patch('/configuracion/admin/update/{id}', 'Admin\ConfiguracionController@update_ajustes_admin')->name('configuracion_admin.update');

   // Route::post('/configuracion/update/{id}', 'ConfiguracionContoller@store')->name('configuracion.store');

    // ============================================= M O D U L O   E M P R E S A S =====================================================

    Route::get('/empresas', 'Admin\EmpresasContoller@index')->name('empresas.index');
    Route::post('/empresas/crear', 'Admin\EmpresasContoller@store')->name('empresas.store');


    // ============================================= M O D U L O   L I C E N C I A S =====================================================

    Route::get('/licencias', 'Admin\LicenciasController@index')->name('licencias.index');
    Route::post('/licencias/crear', 'Admin\LicenciasController@store')->name('licencias.store');
    Route::patch('/licencias/update/{id}', 'Admin\LicenciasController@update')->name('licencias.update');

});

// ============================================= C L I E N T E S =====================================================
Route::group(['middleware' => ['auth'], 'namespace' => 'App\Http\Controllers'], function () {


    // Route::get('/tarjeta_uno', function () {
    //     return view('tarjetas_presentacion.diseno1');
    // });




    // ============================================= G E N E R A L E S =====================================================

    Route::get('/home/{code}', 'HomeController@index')->name('home');

    Route::get('/scanner', 'ScannerController@index')->name('scanner.index');

    Route::get('/scanner/palabra', 'ScannerController@index_palabra')->name('scanner.index_palabra');

    Route::patch('/key/update/{id}', 'LicenciasController@update_key')->name('key.update');

    // ============================================= M O D U L O   C O N F I G U R A C I O N ===============================

    Route::patch('/configuracion/inicial/update/{id}', 'ConfiguracionController@inicial')->name('configuracion.inicial');

    Route::get('/configuracion/{code}', 'ConfiguracionController@index')->name('configuracion.index');
    Route::patch('/configuracion/empresa/update/{code}', 'ConfiguracionController@configuracion_empresa')->name('configuracion_empresa.update');
    Route::patch('/configuracion/caja/update/{id}', 'ConfiguracionController@configuracion_caja')->name('configuracion_caja.update');
    Route::patch('/configuracion/tienda/update/{id}', 'ConfiguracionController@configuracion_tienda')->name('configuracion_tienda.update');

    Route::post('/actualizar-orden', 'ConfiguracionController@actualizarOrden');

    // ============================================= M O D U L O   C L I E N T E S =========================================

    Route::get('/clientes/{code}', 'ClienteController@index')->name('clientes.index');
    Route::get('/clientes/filtro/{code}', 'ClienteController@filtro')->name('clientes.filtro');
    Route::get('/clientes/show/{id}', 'ClienteController@show')->name('clientes.show');
    Route::post('/clientes/store', 'ClienteController@store')->name('clientes.store');
    Route::patch('/clientes/update/{id}', 'ClienteController@update')->name('clientes.update');


    // ============================================= M O D U L O   P R O D U C T O S =======================================

    Route::get('/productos/{code}', 'ProductosController@index')->name('productos.index');
    Route::post('/productos/store', 'ProductosController@store')->name('productos.store');
    Route::patch('/productos/update/{id}', 'ProductosController@update')->name('productos.update');
    Route::get('/productos/filtro/{code}', 'ProductosController@filtro')->name('productos.filtro');
    Route::get('/imprimir/etiqueta/{sku}', 'ImpresionController@imprimir_etiqueta')->name('imprimir_etiqueta.product');
    Route::POST('/pdf/productos', 'ImpresionController@pdf_productos')->name('pdf.product');
    Route::POST('bulk/productos/pausar', 'ProductosController@bukaction_pausar')->name('bulk_pausar.product');
    Route::POST('bulk/productos/publicar', 'ProductosController@bukaction_publicar')->name('bulk_publicar.product');
    Route::POST('bulk/productos/promocion', 'ProductosController@bukaction_promocion')->name('bulk_promocion.product');

    // ============================================= M O D U L O   C A J A =================================================

    Route::get('/caja/{code}', 'CajaController@index')->name('caja_sincodigo.index');
    Route::get('/caja/{code}/{id}', 'CajaController@index')->name('caja.index');
    Route::get('/agregar-al-carrito', 'CajaController@agregarAlCarrito')->name('agregar.al.carrito');
    Route::post('/caja/store', 'CajaController@store')->name('caja.store');
    Route::post('/caja/pass', 'CajaController@validation_pass')->name('caja_pass.store');
    Route::get('/obtener-registros-cliente/{id}', 'CajaController@obtenerRegistrosCliente');

    // ============================================= M O D U L O   O R D E N E S ===========================================

    Route::get('/orders/{code}', 'OrdersController@index')->name('orders.index');
    Route::get('/orders/ticket/{id}/{code}', 'OrdersController@show')->name('orders.show');

    // ============================================= M O D U L O  T R A B A J A D O R E S ==================================

    Route::get('/trabajadores/{code}', 'TrabajadoresController@index')->name('trabajadores.index');
    Route::post('/trabajadores/store', 'TrabajadoresController@store')->name('trabajadores.store');
    Route::get('/trabajadores/show/{id}', 'TrabajadoresController@show')->name('trabajadores.show');
    Route::patch('/empleados/update/{id}', 'TrabajadoresController@update')->name('empleados.update');

    // ============================================= M O D U L O  R O L E S  Y  P E R M I S O S ============================

    Route::get('/roles/permisos', 'RoleController@index')->name('roles.index');
    Route::post('/roles/permisos/store', 'RoleController@store')->name('roles.store');

    // ============================================= M O D U L O  C O T I Z A C I O N E S ==================================

    Route::get('/cotizaciones/{code}', 'CotizacionesController@index')->name('cotizaciones.index');
    Route::post('/cotizaciones/store', 'CotizacionesController@store')->name('cotizaciones.store');
    Route::patch('/cotizaciones/update/{id}', 'CotizacionesController@update')->name('cotizaciones.update');
    Route::get('/cotizaciones/filtro/{code}', 'CotizacionesController@filtro')->name('cotizaciones.filtro');
    Route::get('/cotizaciones/pdf/{id}/{code}', 'CotizacionesController@pdf')->name('cotizaciones.pdf');

    // ============================================= M O D U L O  R E P O R T E S ==================================

    Route::get('/reportes/{code}', 'ReportesController@index')->name('reportes.index');
    Route::get('/reportes/filtro/caja', 'ReportesController@filtro_caja')->name('reportes.filtro_caja');
    Route::get('/reportes/filtro/producto', 'ReportesController@filtro_productos')->name('reportes.filtro_producto');
    Route::get('/reportes/filtro/order', 'ReportesController@filtro_orders')->name('reportes.filtro_order');
    Route::get('/reportes/filtro/factura', 'ReportesController@filtro_facturas')->name('reportes.filtro_factura');
    Route::get('/reportes/filtro/cotizacion', 'ReportesController@filtro_cotizaciones')->name('reportes.filtro_cotizacion');
    Route::get('/reportes/filtro/empleados', 'ReportesController@filtro_empleados')->name('reportes.filtro_empleados');
    Route::get('/reportes/filtro/clientes', 'ReportesController@filtro_clientes')->name('reportes.filtro_clientes');

    Route::get('/reportes/caja/pdf/{fechaInicio}/{fechaFin}', 'ReportesController@pdf_caja')->name('reportes_caja.pdf');

    // ============================================= M O D U L O  C O R T E =====================================================

    Route::get('/corte/caja/{code}', 'CajaCorteController@index')->name('caja_corte.index');
    Route::post('/corte/caja/store', 'CajaCorteController@store')->name('caja_corte.store');
    Route::get('/corte/caja/pdf', 'CajaCorteController@pdf')->name('caja_corte.pdf');
    Route::post('/corte/caja/cerrar', 'CajaCorteController@cerrar')->name('caja_corte.cerrar');

});


