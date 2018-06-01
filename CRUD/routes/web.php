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


Route::get('usuarios', 'UsuarioController@index');
Route::post('usuarios', 'UsuarioController@search')->name('usuarios.search');
Route::get('usuarios/{usuario}/detalhes', 'UsuarioController@detalhes');
Route::get('usuarios/novo', 'UsuarioController@novo');
Route::post('usuarios/salvar', 'UsuarioController@salvar');

Route::get('/', 'HomeController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
