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

Route::get('/admin/baza-dostepnosci', [
    'uses' => 'ImportController@show',
    'as' => 'import.show'    
]);

Route::get('/admin/baza-modeli', [
    'uses' => 'ImportController@showModels',
    'as' => 'import.showModels'    
]);

Route::get('/admin/baza-opcji-wyposazenia', [
    'uses' => 'ImportController@showEquipmentOptions',
    'as' => 'import.showEquipmentOptions'    
]);

Route::get('/admin/edit', function () {
    return view('helpers.edit');
});

/////        Routing for baza-kolorow-lakieru         //////

Route::get('/admin/baza-kolorow-lakieru', [
    'uses' => 'ImportController@showVarnishColors',
    'as' => 'import.showVarnishColors'    
]);

Route::get('/admin/import/baza-kolorow-lakieru', [
    'uses' => 'ImportController@importVarnishColors',
    'as' => 'import.importVarnishColors'    
]);

Route::get('/admin/baza-kolorow-lakieru/new', [
    'uses' => 'NewController@VarnishColors',
    'as' => 'new.VarnishColors'    
]);

Route::get('/admin/baza-kolorow-lakieru/insert', [
    'uses' => 'InsertController@VarnishColors',
    'as' => 'insert.VarnishColors'    
]);

Route::PUT('/admin/baza-kolorow-lakieru/{item}', [
    'uses' => 'EditController@VarnishColorsUpdate',
    'as' => 'edit.VarnishColorsUpdate'    
]);

Route::PUT('/admin/baza-kolorow-lakieru/save/{item}', [
    'uses' => 'SaveController@VarnishColors',
    'as' => 'save.VarnishColors'    
]);

Route::get('/admin/baza-kolorow-lakieru/edit/{item}', [
    'uses' => 'EditController@VarnishColors',
    'as' => 'edit.VarnishColors'    
]);

Route::delete('/admin/baza-kolorow-lakieru/delete/{item}', [
    'uses' => 'DeleteController@VarnishColors',
    'as' => 'delete.VarnishColors'    
]);

/////        Routing for baza-kolorow-tapicerki         //////

Route::get('/admin/baza-kolorow-tapicerki', [
    'uses' => 'ImportController@showUpholsteringColors',
    'as' => 'import.showUpholsteringColors'    
]);

Route::get('/admin/import/baza-kolorow-lakieru', [
    'uses' => 'ImportController@importVarnishColors',
    'as' => 'import.importVarnishColors'    
]);

Route::get('/admin/baza-kolorow-lakieru/new', [
    'uses' => 'NewController@VarnishColors',
    'as' => 'new.VarnishColors'    
]);

Route::get('/admin/baza-kolorow-lakieru/insert', [
    'uses' => 'InsertController@VarnishColors',
    'as' => 'insert.VarnishColors'    
]);

Route::PUT('/admin/baza-kolorow-lakieru/{item}', [
    'uses' => 'EditController@VarnishColorsUpdate',
    'as' => 'edit.VarnishColorsUpdate'    
]);

Route::PUT('/admin/baza-kolorow-lakieru/save/{item}', [
    'uses' => 'SaveController@VarnishColors',
    'as' => 'save.VarnishColors'    
]);

Route::get('/admin/baza-kolorow-lakieru/edit/{item}', [
    'uses' => 'EditController@VarnishColors',
    'as' => 'edit.VarnishColors'    
]);

Route::delete('/admin/baza-kolorow-lakieru/delete/{item}', [
    'uses' => 'DeleteController@VarnishColors',
    'as' => 'delete.VarnishColors'    
]);