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
//lo que aparecera en la url            controlador y metodo que recibira un id el cual se llamara destroyProduct
Route::DELETE('/eliminar-producto{id}','HomeController@destroyProduct')->name('destroyProduct');