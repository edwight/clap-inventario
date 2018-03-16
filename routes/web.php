<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::resource('/users', 'UsersController');
Route::resource('/productos', 'ProductosController');
Route::resource('/detalles', 'DetallesController');
Route::resource('/proveedores', 'ProveedorController');
Route::resource('/ubicaciones', 'UbicacionesController');
Route::get('/enviar','EnviosController@getEnviar');
Route::post('/enviar','EnviosController@store');
Route::get('/api/dropdown/localizacion','HomeController@getLocalizacion');
Route::get('/api/dropdown/users','HomeController@getUsers');
Route::get('/reporte','ReportesController@getReporte');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('add-to-log', 'HomeController@myTestAddToLog');
Route::get('logActivity', 'HomeController@logActivity');