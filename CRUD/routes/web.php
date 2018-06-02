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
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'HomeController@index');


Route::get('list', 'UsuarioController@list');
Route::post('list', 'UsuarioController@search')->name('list.search');


Route::get('list/{user}/details', 'UsuarioController@details');
Route::patch('list/{user}/details', 'UsuarioController@update');

Auth::routes();


