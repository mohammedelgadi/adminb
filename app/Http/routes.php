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

Route::get('/devis/update/{id}', 'DevisController@update');

Route::get('/devis/edit/{id}', 'DevisController@edit');

Route::post('/devis/add','DevisController@store');

Route::get('/devis/add/{id}','DevisController@devisAdd');

Route::get('/devis/remove/{id}','DevisController@remove');

Route::get('devis','DevisController@devis');

Route::get('/devis/validate/{id}','DevisController@valider');


Route::get('/interpreteur/add', 'InterpreteurController@show');

Route::post('/interpreteur/add', 'InterpreteurController@store');

Route::get('/demande/add', 'DemandeController@add');

Route::get('/demande/edit/{id}','DemandeController@edit' );

Route::post('/demande/add','DemandeController@store' );

Route::post('/demande/update','DemandeController@update');

Route::get('/demande/remove/{id}','DemandeController@remove');

Route::get('/demandes', 'DemandeController@showAll');

Route::post('/demandes', 'DemandeController@getByDate');

Route::post('/client/add','ClientController@store');

Route::get('/client/add', 'ClientController@add');

Route::get('/clients', function () {
    return view('clients');
});

// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');

Route::post('auth/login', 'Auth\AuthController@postLogin');

Route::get('auth/logout', 'Auth\AuthController@logout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');

Route::post('auth/register', 'Auth\AuthController@postRegister');

Route::get('facture/edit/{id}','FactureController@show');

Route::get('/test', function () {
    return view('test');
});