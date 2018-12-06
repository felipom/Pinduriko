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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/produtos', 'ProdutosController@index');

Route::group(['middleware' => 'auth'], function(){
	Route::get('/produtos/create', 'ProdutosController@create');
	Route::post('/produtos', 'ProdutosController@store');
	Route::get('/produtos/{id}', 'ProdutosController@show');
	Route::get('/produtos/{id}/edit', 'ProdutosController@edit');
	Route::put('/produtos/{id}', 'ProdutosController@update');
	Route::get('/produtos/{id}/delete', 'ProdutosController@delete');
	Route::delete('/produtos/{id}', 'ProdutosController@destroy');
});

