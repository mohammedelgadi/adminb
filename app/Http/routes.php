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
    return view('welcome');
});


Route::get('/calandar', 'Controller@calandar');

Route::get('/devis', 'DevisController@edit');

Route::post('/devis/add','DevisController@store');


Route::get('/devis/add/{id}','DevisController@devis');

Route::get('/client/add', function () {
    return view('clientform');
});

Route::get('/interpreteur/add', 'InterpreteurController@show');

Route::post('/interpreteur/add', 'InterpreteurController@store');

Route::get('/clients', function () {
    return view('clients');
});

Route::get('/demande/add', 'DemandeController@add');

Route::get('/demande/edit/{id}','DemandeController@edit' );

Route::post('/demande/add','DemandeController@store' );

Route::post('/demande/update','DemandeController@update');

Route::get('/demandes', 'DemandeController@showAll');

Route::post('/demandes', 'DemandeController@getByDate');

Route::post('/client/add','ClientController@store');

// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');

Route::post('auth/login', 'Auth\AuthController@postLogin');

Route::get('auth/logout', 'Auth\AuthController@logout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');

Route::post('auth/register', 'Auth\AuthController@postRegister');