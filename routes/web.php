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
    return view('index');
});

Route::prefix('producto')->group(function () {
    Route::get('/', 'ProductoController@index')->name('producto.index');
    Route::get('/create', 'ProductoController@create')->name('producto.create');
    Route::post('/', 'ProductoController@store')->name('producto.store');
    Route::get('/{id}/edit', 'ProductoController@edit')->name('producto.edit');
    Route::put('/{id}', 'ProductoController@update')->name('producto.update');
    Route::delete('/{id}', 'ProductoController@destroy')->name('producto.destroy');
});

Route::prefix('marca')->group(function () {
    Route::get('/', 'MarcaController@index')->name('marca.index');
    Route::get('/create', 'MarcaController@create')->name('marca.create');
    Route::post('/', 'MarcaController@store')->name('marca.store');
    Route::get('/{id}/edit', 'MarcaController@edit')->name('marca.edit');
    Route::put('/{id}', 'MarcaController@update')->name('marca.update');
    Route::delete('/{id}', 'MarcaController@destroy')->name('marca.destroy');
    Route::get('search/{keywords}', 'MarcaController@search')->name('marca.search');
});

Route::prefix('categoria')->group(function () {
    Route::get('/', 'CategoriaController@index')->name('categoria.index');
    Route::get('/create', 'CategoriaController@create')->name('categoria.create');
    Route::post('/', 'CategoriaController@store')->name('categoria.store');
    Route::get('/{id}/edit', 'CategoriaController@edit')->name('categoria.edit');
    Route::put('/{id}', 'CategoriaController@update')->name('categoria.update');
    Route::delete('/{id}', 'CategoriaController@destroy')->name('categoria.destroy');
    Route::get('search/{keywords}', 'CategoriaController@search')->name('categoria.search');
});

Route::prefix('unidadmedida')->group(function () {
    Route::get('/', 'UnidadMedidaController@index')->name('unidadmedida.index');
    Route::get('/create', 'UnidadMedidaController@create')->name('unidadmedida.create');
    Route::post('/', 'UnidadMedidaController@store')->name('unidadmedida.store');
    Route::get('/{id}/edit', 'UnidadMedidaController@edit')->name('unidadmedida.edit');
    Route::put('/{id}', 'UnidadMedidaController@update')->name('unidadmedida.update');
    Route::delete('/{id}', 'UnidadMedidaController@destroy')->name('unidadmedida.destroy');
    Route::get('search/{keywords}', 'UnidadMedidaController@search')->name('unidadmedida.search');
});
