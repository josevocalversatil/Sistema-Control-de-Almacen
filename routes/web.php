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


<<<<<<< HEAD
});

// PDF - DEPARTAMENTO 

Route::get('departamentopdf', function()
{
      
     $departamentos=sisAlmacen1\departamento::all();
	$pdf=PDF::loadView('almacen.departamento.invoice',['departamentos'=>$departamentos]);
	return $pdf->stream('Departamentos.pdf');

});

// PDF - PERSONAL


Route::get('personalpdf', function()
{
      
     $personales=sisAlmacen1\personal::all();

	$pdf=PDF::loadView('almacen.personal.invoice',['personales'=>$personales,]);
	return $pdf->stream('Personal.pdf');

});
=======
>>>>>>> 158051c0d4964ed6535ba338b94a4a023f11f667
