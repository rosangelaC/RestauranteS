<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);


Route::resource('clientes', 'ClienteController');

Route::get('clientes/{id}/delete', [
    'as' => 'clientes.delete',
    'uses' => 'ClienteController@destroy',
]);


Route::resource('categorias', 'CategoriaController');

Route::get('categorias/{id}/delete', [
    'as' => 'categorias.delete',
    'uses' => 'CategoriaController@destroy',
]);


Route::resource('mesas', 'MesaController');

Route::get('mesas/{id}/delete', [
    'as' => 'mesas.delete',
    'uses' => 'MesaController@destroy',
]);


Route::resource('productos', 'ProductoController');

Route::get('productos/{id}/delete', [
    'as' => 'productos.delete',
    'uses' => 'ProductoController@destroy',
]);


Route::resource('pedidos', 'PedidoController');

Route::get('pedidos/{id}/delete', [
    'as' => 'pedidos.delete',
    'uses' => 'PedidoController@destroy',
]);


Route::resource('personals', 'PersonalController');

Route::get('personals/{id}/delete', [
    'as' => 'personals.delete',
    'uses' => 'PersonalController@destroy',
]);


Route::resource('tipoUsuarios', 'TipoUsuarioController');

Route::get('tipoUsuarios/{id}/delete', [
    'as' => 'tipoUsuarios.delete',
    'uses' => 'TipoUsuarioController@destroy',
]);


Route::resource('privilegios', 'PrivilegiosController');

Route::get('privilegios/{id}/delete', [
    'as' => 'privilegios.delete',
    'uses' => 'PrivilegiosController@destroy',
]);
