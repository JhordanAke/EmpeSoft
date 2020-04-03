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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::view('/','index');
Route::view('mas','master.master');
Route::view('empe','Empeños.empeño');
Route::view('empe2','Empeños.empeños2');
Route::view('mutu','Mutuarios.mutuarios');
Route::view('mutu2','Mutuarios.mutuarios2');
Route::view('cate','Categoria.categoria');
Route::view('cate2','Categoria.categoria2');
Route::view('pues','Puestos.puestos');
Route::view('admin','Administrador.adminis');
Route::view('perso','Administrador.personal');
Route::view('ad','Administrador.administrador');
Route::view('abo','Abonos.abono');

//zona apis
Route::apiResource('apiempe','ApiEmpeñoController');
Route::apiResource('apimutu','ApiMutuarioController');
Route::apiResource('apipues','ApiPuestoController');
Route::apiResource('apiperso','ApiPersonalController');
Route::apiResource('apicate','ApiCategoriaController');


//validar
Route::post('validar','AccesoController@validar'); 
Route::get('salir','AccesoController@salir');