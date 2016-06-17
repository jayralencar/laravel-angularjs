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

Route::get('/', function () {
    return view('index');
});

Route::group(['prefix' => 'api'], function()
{
	Route::get('pessoas', 'PessoaController@lista');
	Route::post('pessoas', 'PessoaController@novo');
	Route::put('pessoa/{id}', 'PessoaController@editar');
	Route::delete('pessoa/{id}', 'PessoaController@excluir');
});