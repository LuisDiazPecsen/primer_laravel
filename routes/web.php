<?php

use Illuminate\Support\Facades\Auth;
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

/*Route::get('/', function () {
    return view('index');
});*/

Route::prefix('producto')->middleware('auth')->group(function () {
   Route::get('/', 'ProductoController@index')->name('producto.index');
   Route::get('/create', 'ProductoController@create')->name('producto.create');
   Route::post('/', 'ProductoController@store')->name('producto.store');
   Route::get('/{id}/edit', 'ProductoController@edit')->name('producto.edit');
   Route::put('/{id}', 'ProductoController@update')->name('producto.update');
   Route::delete('/{id}', 'ProductoController@destroy')->name('producto.destroy');
});

Route::prefix('marca')->middleware('auth')->group(function () {
   Route::get('/', 'MarcaController@index')->name('marca.index')->middleware('auth');
   Route::get('/create', 'MarcaController@create')->name('marca.create')->middleware('auth');
   Route::post('/', 'MarcaController@store')->name('marca.store')->middleware('auth');
   Route::get('/{id}/edit', 'MarcaController@edit')->name('marca.edit')->middleware('auth');
   Route::put('/{id}', 'MarcaController@update')->name('marca.update')->middleware('auth');
   Route::delete('/{id}', 'MarcaController@destroy')->name('marca.destroy')->middleware('auth');
   Route::get('search/{keywords}', 'MarcaController@search')->name('marca.search')->middleware('auth');
});

Route::prefix('categoria')->middleware('auth')->group(function () {
   Route::get('/', 'CategoriaController@index')->name('categoria.index');
   Route::get('/create', 'CategoriaController@create')->name('categoria.create');
   Route::post('/', 'CategoriaController@store')->name('categoria.store');
   Route::get('/{id}/edit', 'CategoriaController@edit')->name('categoria.edit');
   Route::put('/{id}', 'CategoriaController@update')->name('categoria.update');
   Route::delete('/{id}', 'CategoriaController@destroy')->name('categoria.destroy');
   Route::get('search/{keywords}', 'CategoriaController@search')->name('categoria.search');
});

Route::prefix('unidadmedida')->middleware('auth')->group(function () {
   Route::get('/', 'UnidadMedidaController@index')->name('unidadmedida.index');
   Route::get('/create', 'UnidadMedidaController@create')->name('unidadmedida.create');
   Route::post('/', 'UnidadMedidaController@store')->name('unidadmedida.store');
   Route::get('/{id}/edit', 'UnidadMedidaController@edit')->name('unidadmedida.edit');
   Route::put('/{id}', 'UnidadMedidaController@update')->name('unidadmedida.update');
   Route::delete('/{id}', 'UnidadMedidaController@destroy')->name('unidadmedida.destroy');
   Route::get('search/{keywords}', 'UnidadMedidaController@search')->name('unidadmedida.search');
});

Auth::routes();

Route::get('/', 'HomeController@index')->name('index');
Route::get('/about', 'HomeController@about')->name('about')->middleware('auth');
