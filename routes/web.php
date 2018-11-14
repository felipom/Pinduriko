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
Route::get('/notas', 'NotasController@index');

Route::group(['middleware' => 'auth'], function(){
	Route::get('/notas/create', 'NotasController@create');
	Route::post('/notas', 'NotasController@store');
	Route::get('/notas/{id}', 'NotasController@show');
	Route::get('/notas/{id}/edit', 'NotasController@edit');
	Route::put('/notas/{id}', 'NotasController@update');
	Route::get('/notas/{id}/delete', 'NotasController@delete');
	Route::delete('/notas/{id}', 'NotasController@destroy');
});

