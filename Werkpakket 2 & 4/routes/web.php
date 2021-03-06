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

//Route::get('people','PersonController@getPersonAll')->name('welcome');
//
//Route::group(['prefix' => 'person'], function (){
//    Route::get('create', 'PersonController@getPersonAdd')->name('create');
//
//    Route::post('create', 'PersonController@postPersonAdd')->name('create');
//
//    Route::get('edit/{id}', 'PersonController@getPersonEdit')->name('edit');
//
//    Route::post('edit', 'PersonController@putPersonEdit')->name('put'); //put geeft 'MethodNotAllowed'
//
//    Route::get('delete/{id}', 'PersonController@getPersonDelete')->name('delete');
//});

Route::get('klanten','KlantController@getKlantAll')->name('welcomeKlanten')->middleware('auth');

Route::group(['prefix' => 'klant'], function (){
    Route::get('createKlanten', 'KlantController@getKlantAdd')->name('createKlanten')->middleware('auth');

    Route::post('createKlanten', 'KlantController@postKlantAdd')->name('createKlanten')->middleware('auth');

    Route::get('editKlanten/{id}', 'KlantController@getKlantEdit')->name('editKlanten')->middleware('auth');

    Route::post('editKlanten', 'KlantController@putKlantEdit')->name('putKlanten')->middleware('auth'); //put geeft 'MethodNotAllowed'

    Route::get('deleteKlanten/{id}', 'KlantController@getKlantDelete')->name('deleteKlanten')->middleware('auth');
});


Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
