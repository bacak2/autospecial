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

Route::get('/admin/import', [
    'uses' => 'ImportController@index',
    'as' => 'import.index'    
]);

Route::get('/admin', function () {
    return view('admin');
});

Route::get('/admin/baza_dostepnosci', [
    'uses' => 'ImportController@show',
    'as' => 'import.show'    
]);

Route::get('/admin/baza_modeli', [
    'uses' => 'ImportController@showModels',
    'as' => 'import.showModels'    
]);

Route::get('/admin/baza_modeli', [
    'uses' => 'ImportController@showVarnishColors',
    'as' => 'import.showModels'    
]);

Route::get('/admin/baza_modeli', [
    'uses' => 'ImportController@showUpholsteringColors',
    'as' => 'import.showModels'    
]);

Route::get('/admin/baza_modeli', [
    'uses' => 'ImportController@showEquipmentOptions',
    'as' => 'import.showModels'    
]);