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

Route::get('/', 'UserController@index')->name('inicio');

Route::post('/agregar', 'UserController@store')->name('store');/**Agregar usuarios */

Route::get('/editar/{id}', 'UserController@edit')->name('editar');/**Leer usuarios */

Route::put('/update/{id}', 'UserController@update')->name('update');/**Actualizar usuarios*/

Route::delete('/eliminar/{id}' , 'UserController@destroy')->name('eliminar');/**Eliminar usuarios */


