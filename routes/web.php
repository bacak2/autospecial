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

Route::get('/', 'HomeController@index')->name('home');

Route::get('/details/{item}', [
    'uses' => 'HomeController@details',
    'as' => 'home.details'    
]);

Auth::routes();

Route::get('/admin/import', [
    'uses' => 'ImportController@index',
    'as' => 'import.index'    
]);

Route::get('/admin', function () {
    return view('admin');
});

Route::get('/admin/baza-opcji-wyposazenia', [
    'uses' => 'ImportController@showEquipmentOptions',
    'as' => 'import.showEquipmentOptions'    
]);

Route::get('/admin/edit', function () {
    return view('helpers.edit');
});

/////        Routing for baza-dostepnych-modeli        //////

Route::get('/admin/baza-dostepnych-modeli', [
    'uses' => 'BazaDostepnychModeliController@show',
    'as' => 'import.show'    
]);

Route::POST('/admin/baza-dostepnych-modeli/upload', [
    'uses' => 'BazaDostepnychModeliController@upload',
    'as' => 'dostepneModele.upload'    
]);

Route::get('/admin/baza-dostepnych-modeli/import', [
    'uses' => 'BazaDostepnychModeliController@import',
    'as' => 'dostepneModele.import'    
]);

Route::get('/admin/baza-dostepnych-modeli/new', [
    'uses' => 'BazaDostepnychModeliController@newItem',
    'as' => 'dostepneModele.new'    
]);

Route::get('/admin/baza-dostepnych-modeli/insert', [
    'uses' => 'BazaDostepnychModeliController@insert',
    'as' => 'dostepneModele.insert'    
]);

Route::PUT('/admin/baza-dostepnych-modeli/{item}', [
    'uses' => 'BazaDostepnychModeliController@update',
    'as' => 'dostepneModele.update'    
]);

Route::PUT('/admin/baza-dostepnych-modeli/save/{item}', [
    'uses' => 'BazaDostepnychModeliController@save',
    'as' => 'dostepneModele.save'    
]);

Route::get('/admin/baza-dostepnych-modeli/edit/{item}', [
    'uses' => 'BazaDostepnychModeliController@edit',
    'as' => 'dostepneModele.edit'    
]);

Route::delete('/admin/baza-dostepnych-modeli/delete/{item}', [
    'uses' => 'BazaDostepnychModeliController@delete',
    'as' => 'dostepneModele.delete'    
]);

/////        Routing for baza-modeli        //////

Route::get('/admin/baza-modeli', [
    'uses' => 'BazaModeliController@show',
    'as' => 'import.showModels'    
]);

Route::get('/admin/baza-modeli/import', [
    'uses' => 'BazaModeliController@import',
    'as' => 'modele.import'    
]);

Route::get('/admin/baza-modeli/new', [
    'uses' => 'BazaModeliController@newItem',
    'as' => 'modele.new'    
]);

Route::get('/admin/baza-modeli/insert', [
    'uses' => 'BazaModeliController@insert',
    'as' => 'modele.insert'    
]);

Route::PUT('/admin/baza-modeli/{item}', [
    'uses' => 'BazaModeliController@update',
    'as' => 'modele.update'    
]);

Route::PUT('/admin/baza-modeli/save/{item}', [
    'uses' => 'BazaModeliController@save',
    'as' => 'modele.save'    
]);

Route::get('/admin/baza-modeli/edit/{item}', [
    'uses' => 'BazaModeliController@edit',
    'as' => 'modele.edit'    
]);

Route::delete('/admin/baza-modeli/delete/{item}', [
    'uses' => 'BazaModeliController@delete',
    'as' => 'modele.delete'    
]);

/////        Routing for baza-kolorow-lakieru         //////
/*
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
 * 
 */

Route::get('/admin/baza-kolorow-lakieru', [
    'uses' => 'BazaKolorowLakieruController@show',
    'as' => 'import.showVarnishColors'    
]);

Route::POST('/admin/baza-kolorow-lakieru/upload', [
    'uses' => 'BazaKolorowLakieruController@upload',
    'as' => 'koloryLakieru.upload'    
]);

Route::get('/admin/baza-kolorow-lakieru/new', [
    'uses' => 'BazaKolorowLakieruController@newItem',
    'as' => 'koloryLakieru.new'    
]);

Route::get('/admin/baza-kolorow-lakieru/insert', [
    'uses' => 'BazaKolorowLakieruController@insert',
    'as' => 'koloryLakieru.insert'    
]);

Route::PUT('/admin/baza-kolorow-lakieru/{item}', [
    'uses' => 'BazaKolorowLakieruController@update',
    'as' => 'koloryLakieru.update'    
]);

Route::PUT('/admin/baza-kolorow-lakieru/save/{item}', [
    'uses' => 'BazaKolorowLakieruController@save',
    'as' => 'koloryLakieru.save'    
]);

Route::get('/admin/baza-kolorow-lakieru/edit/{item}', [
    'uses' => 'BazaKolorowLakieruController@edit',
    'as' => 'koloryLakieru.edit'    
]);

Route::delete('/admin/baza-kolorow-lakieru/delete/{item}', [
    'uses' => 'BazaKolorowLakieruController@delete',
    'as' => 'koloryLakieru.delete'    
]);

/////        Routing for baza-kolorow-tapicerki         //////

Route::get('/admin/baza-kolorow-tapicerki', [
    'uses' => 'BazaKolorowTapicerkiController@show',
    'as' => 'import.showUpholsteringColors'    
]);

Route::POST('/admin/baza-kolorow-tapicerki/upload', [
    'uses' => 'BazaKolorowTapicerkiController@upload',
    'as' => 'koloryTapicerki.upload'    
]);

Route::get('/admin/baza-kolorow-tapicerki/new', [
    'uses' => 'BazaKolorowTapicerkiController@newItem',
    'as' => 'koloryTapicerki.new'    
]);

Route::get('/admin/baza-kolorow-tapicerki/insert', [
    'uses' => 'BazaKolorowTapicerkiController@insert',
    'as' => 'koloryTapicerki.insert'    
]);

Route::PUT('/admin/baza-kolorow-tapicerki/{item}', [
    'uses' => 'BazaKolorowTapicerkiController@update',
    'as' => 'koloryTapicerki.update'    
]);

Route::PUT('/admin/baza-kolorow-tapicerki/save/{item}', [
    'uses' => 'BazaKolorowTapicerkiController@save',
    'as' => 'koloryTapicerki.save'    
]);

Route::get('/admin/baza-kolorow-tapicerki/edit/{item}', [
    'uses' => 'BazaKolorowTapicerkiController@edit',
    'as' => 'koloryTapicerki.edit'    
]);

Route::delete('/admin/baza-kolorow-tapicerki/delete/{item}', [
    'uses' => 'BazaKolorowTapicerkiController@delete',
    'as' => 'koloryTapicerki.delete'    
]);

/////        Routing for baza-opcji-wyposazenia         //////

Route::get('/admin/baza-opcji-wyposazenia', [
    'uses' => 'BazaOpcjiWyposazeniaController@show',
    'as' => 'import.showEquipmentOptions'    
]);

Route::get('/admin/baza-opcji-wyposazenia/import', [
    'uses' => 'BazaOpcjiWyposazeniaController@import',
    'as' => 'opcjeWyposazenia.import'    
]);

Route::get('/admin/baza-opcji-wyposazenia/new', [
    'uses' => 'BazaOpcjiWyposazeniaController@newItem',
    'as' => 'opcjeWyposazenia.new'    
]);

Route::get('/admin/baza-opcji-wyposazenia/insert', [
    'uses' => 'BazaOpcjiWyposazeniaController@insert',
    'as' => 'opcjeWyposazenia.insert'    
]);

Route::PUT('/admin/baza-opcji-wyposazenia/{item}', [
    'uses' => 'BazaOpcjiWyposazeniaController@update',
    'as' => 'opcjeWyposazenia.update'    
]);

Route::PUT('/admin/baza-opcji-wyposazenia/save/{item}', [
    'uses' => 'BazaOpcjiWyposazeniaController@save',
    'as' => 'opcjeWyposazenia.save'    
]);

Route::get('/admin/baza-opcji-wyposazenia/edit/{item}', [
    'uses' => 'BazaOpcjiWyposazeniaController@edit',
    'as' => 'opcjeWyposazenia.edit'    
]);

Route::delete('/admin/baza-opcji-wyposazenia/delete/{item}', [
    'uses' => 'BazaOpcjiWyposazeniaController@delete',
    'as' => 'opcjeWyposazenia.delete'    
]);