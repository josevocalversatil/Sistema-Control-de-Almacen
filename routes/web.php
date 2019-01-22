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
    return view('auth/login');
});

Route::resource('almacen/categoria','CategoriaController');

Route::resource('almacen/articulo','ArticuloController');
Route::resource('almacen/proveedor','ProveedorController');
Route::resource('almacen/ingreso','IngresoController');

Route::resource('almacen/salida','SalidaController');
Route::resource('almacen/memo','MemoController');
Route::resource('almacen/personal','PersonalController');
Route::resource('almacen/departamento','DepartamentoController');
Route::resource('almacen/usuario','UsuarioController');
Route::resource('almacen/stminimo','StminimoController');


Route::resource('almacen/stmaximo','StmaximoController');
Route::get('/logout', 'Auth\LoginController@logout');
//Route::resource('layouts/index1');
Auth::routes();
Route::auth('layouts/index1');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('descargarPdfArticulos','ArticuloController@pdf');



//Route::get('/{slug?}','HomeController@index');

//en name va 'home'

//RUTAS PDF



Route::get('descargarPdfArticulos','ArticuloController@pdf');

Route::get('categoriapdf','CategoriaController@pdf');

Route::get('personalpdf','PersonalController@pdf');


Route::get('departamentopdf','DepartamentoController@pdf');

Route::get('proveedorpdf','ProveedorController@pdf');

Route::get('usuariospdf','UsuarioController@pdf');

Route::get('stmaximopdf','StmaximoController@pdf');

Route::get('stminimopdf','StminimoController@pdf');

Route::get('salidapdf/{id}','SalidaController@pdf');


Route::get('ingresopdf/{id}','IngresoController@pdf');

Route::get('memopdf/{id}','MemoController@pdf');


Route::post('/descargarSalidaFecha','SalidaController@pdfFechas');

Route::post('/descargarSalidaMemo','SalidaController@pdfMemos');

Route::post('/descargarIngresoFecha','IngresoController@pdfFechas');

Route::post('/descargarIngresoFactura','IngresoController@pdfFactura');

Route::post('/descargarIngresoMemo','IngresoController@pdfMemo');

Route::post('/descargarIngresoTotal','IngresoController@pdfTotal');


Route::get('acerca_de','ArticuloController@acerca_de');

Route::post('/descargarMemoFecha','MemoController@pdfFecha');

Route::post('/descargarMemoFoliome','MemoController@pdfFoliome');

Route::post('/descargarMemoNumerome','MemoController@pdfNumerome');
