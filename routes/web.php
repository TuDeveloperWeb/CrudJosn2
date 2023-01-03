<?php

use Illuminate\Support\Facades\Route;

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





Route::get('/articulo','App\Http\Controllers\ControllerArticulo@index');


Route::get('/articulo/crear','App\Http\Controllers\ControllerArticulo@create');

Route::get('/prueba/{id}/','App\Http\Controllers\ControllerArticulo@user');


/* Mostrando la lista de los productos */
Route::get('articulo/list','App\Http\Controllers\ControllerArticulo@getArticulo');
Route::put('articulo/aprobar','App\Http\Controllers\ControllerArticulo@procesarVenta');
Route::put('articulo/rechazar','App\Http\Controllers\ControllerArticulo@rechazarVenta');

Route::post('articulo/guardar','App\Http\Controllers\ControllerArticulo@store')->name('articulo.guardar');


Route::get('articulo/detalleArticulo/{id}/','App\Http\Controllers\ControllerArticulo@detalleVenta');


