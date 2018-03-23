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

Route::GET('/', 'HomeController@index')->name('home');

Route::GET('/details/{item?}', [
    'uses' => 'HomeController@details',
    'as' => 'home.details'    
])->where('item', '[0-9]+');

Auth::routes();

Route::GET('/admin/import', [
    'uses' => 'ImportController@index',
    'as' => 'import.index'    
]);

Route::GET('/admin', function () {
    return redirect()->route("import.show");
});

Route::GET('/admin/baza-opcji-wyposazenia', [
    'uses' => 'ImportController@showEquipmentOptions',
    'as' => 'import.showEquipmentOptions'    
]);

Route::GET('/admin/zdjęcia-modeli', [
    'uses' => 'ImportController@showPictrues',
    'as' => 'import.showPictrues'    
]);

Route::POST('/admin/bzdjęcia-modeli/upload', [
    'uses' => 'ImportController@uploadPictrue',
    'as' => 'import.uploadPictrue'    
]);

/////        Routing for baza-dostepnych-modeli        //////

Route::prefix('admin')->group(function () {

    Route::GET('/baza-dostepnych-modeli', [
        'uses' => 'BazaDostepnychModeliController@show',
        'as' => 'import.show'    
    ]);

    Route::POST('/baza-dostepnych-modeli/upload', [
        'uses' => 'BazaDostepnychModeliController@upload',
        'as' => 'dostepneModele.upload'    
    ]);

    Route::GET('/baza-dostepnych-modeli/import', [
        'uses' => 'BazaDostepnychModeliController@import',
        'as' => 'dostepneModele.import'    
    ]);

    Route::GET('/baza-dostepnych-modeli/new', [
        'uses' => 'BazaDostepnychModeliController@newItem',
        'as' => 'dostepneModele.new'    
    ]);

    Route::GET('/baza-dostepnych-modeli/insert', [
        'uses' => 'BazaDostepnychModeliController@insert',
        'as' => 'dostepneModele.insert'    
    ]);

    Route::PUT('/baza-dostepnych-modeli/{item}', [
        'uses' => 'BazaDostepnychModeliController@update',
        'as' => 'dostepneModele.update'    
    ]);

    Route::PUT('/baza-dostepnych-modeli/save/{item}', [
        'uses' => 'BazaDostepnychModeliController@save',
        'as' => 'dostepneModele.save'    
    ]);

    Route::GET('/baza-dostepnych-modeli/details/{item}', [
        'uses' => 'BazaDostepnychModeliController@details',
        'as' => 'dostepneModele.details'    
    ]);

    Route::DELETE('/baza-dostepnych-modeli/delete/{item}', [
        'uses' => 'BazaDostepnychModeliController@delete',
        'as' => 'dostepneModele.delete'
    ]);

    /////        Routing for baza-modeli        //////

    Route::GET('/baza-modeli', [
        'uses' => 'BazaModeliController@show',
        'as' => 'import.showModels'
    ]);

    Route::POST('/baza-modeli/upload', [
        'uses' => 'BazaModeliController@upload',
        'as' => 'modele.upload'
    ]);

    Route::GET('/baza-modeli/import', [
        'uses' => 'BazaModeliController@import',
        'as' => 'modele.import'
    ]);

    Route::GET('/baza-modeli/new', [
        'uses' => 'BazaModeliController@newItem',
        'as' => 'modele.new'
    ]);

    Route::GET('/baza-modeli/insert', [
        'uses' => 'BazaModeliController@insert',
        'as' => 'modele.insert'
    ]);

    Route::PUT('/baza-modeli/{item}', [
        'uses' => 'BazaModeliController@update',
        'as' => 'modele.update'
    ]);

    Route::GET('/baza-modeli/updateCodes', [
        'uses' => 'BazaModeliController@updateCodes',
        'as' => 'modele.updateCodes'
    ]);
    
    Route::PUT('/baza-modeli/save/{item}', [
        'uses' => 'BazaModeliController@save',
        'as' => 'modele.save'
    ]);

    Route::GET('/baza-modeli/edit/{item}', [
        'uses' => 'BazaModeliController@edit',
        'as' => 'modele.edit'
    ]);

    Route::delete('/baza-modeli/delete/{item}', [
        'uses' => 'BazaModeliController@delete',
        'as' => 'modele.delete'
    ]);

    /////        Routing for baza-kolorow-lakieru         //////

    Route::GET('/baza-kolorow-lakieru', [
        'uses' => 'BazaKolorowLakieruController@show',
        'as' => 'import.showVarnishColors'
    ]);

    Route::POST('/baza-kolorow-lakieru/upload', [
        'uses' => 'BazaKolorowLakieruController@upload',
        'as' => 'koloryLakieru.upload'
    ]);

    Route::GET('/baza-kolorow-lakieru/new', [
        'uses' => 'BazaKolorowLakieruController@newItem',
        'as' => 'koloryLakieru.new'
    ]);

    Route::GET('/baza-kolorow-lakieru/insert', [
        'uses' => 'BazaKolorowLakieruController@insert',
        'as' => 'koloryLakieru.insert'
    ]);

    Route::PUT('/baza-kolorow-lakieru/{item}', [
        'uses' => 'BazaKolorowLakieruController@update',
        'as' => 'koloryLakieru.update'
    ]);

    Route::PUT('/baza-kolorow-lakieru/save/{item}', [
        'uses' => 'BazaKolorowLakieruController@save',
        'as' => 'koloryLakieru.save'
    ]);

    Route::GET('/baza-kolorow-lakieru/edit/{item}', [
        'uses' => 'BazaKolorowLakieruController@edit',
        'as' => 'koloryLakieru.edit'
    ]);

    Route::delete('/baza-kolorow-lakieru/delete/{item}', [
        'uses' => 'BazaKolorowLakieruController@delete',
        'as' => 'koloryLakieru.delete'
    ]);

    /////        Routing for baza-kolorow-tapicerki         //////

    Route::GET('/baza-kolorow-tapicerki', [
        'uses' => 'BazaKolorowTapicerkiController@show',
        'as' => 'import.showUpholsteringColors'
    ]);

    Route::POST('/baza-kolorow-tapicerki/upload', [
        'uses' => 'BazaKolorowTapicerkiController@upload',
        'as' => 'koloryTapicerki.upload'
    ]);

    Route::GET('/baza-kolorow-tapicerki/new', [
        'uses' => 'BazaKolorowTapicerkiController@newItem',
        'as' => 'koloryTapicerki.new'
    ]);

    Route::GET('/baza-kolorow-tapicerki/insert', [
        'uses' => 'BazaKolorowTapicerkiController@insert',
        'as' => 'koloryTapicerki.insert'
    ]);

    Route::PUT('/baza-kolorow-tapicerki/{item}', [
        'uses' => 'BazaKolorowTapicerkiController@update',
        'as' => 'koloryTapicerki.update'
    ]);

    Route::PUT('/baza-kolorow-tapicerki/save/{item}', [
        'uses' => 'BazaKolorowTapicerkiController@save',
        'as' => 'koloryTapicerki.save'
    ]);

    Route::GET('/baza-kolorow-tapicerki/edit/{item}', [
        'uses' => 'BazaKolorowTapicerkiController@edit',
        'as' => 'koloryTapicerki.edit'
    ]);

    Route::delete('/baza-kolorow-tapicerki/delete/{item}', [
        'uses' => 'BazaKolorowTapicerkiController@delete',
        'as' => 'koloryTapicerki.delete'
    ]);

    /////        Routing for baza-opcji-wyposazenia         //////

    Route::GET('/baza-opcji-wyposazenia', [
        'uses' => 'BazaOpcjiWyposazeniaController@show',
        'as' => 'import.showEquipmentOptions'
    ]);

    Route::POST('/baza-opcji-wyposazenia/upload', [
        'uses' => 'BazaOpcjiWyposazeniaController@upload',
        'as' => 'opcjeWyposazenia.upload'
    ]);

    Route::GET('/baza-opcji-wyposazenia/import', [
        'uses' => 'BazaOpcjiWyposazeniaController@import',
        'as' => 'opcjeWyposazenia.import'
    ]);

    Route::GET('/baza-opcji-wyposazenia/new/{item}', [
        'uses' => 'BazaOpcjiWyposazeniaController@newItem',
        'as' => 'opcjeWyposazenia.new'
    ]);

    Route::GET('/baza-opcji-wyposazenia/insert', [
        'uses' => 'BazaOpcjiWyposazeniaController@insert',
        'as' => 'opcjeWyposazenia.insert'
    ]);

    Route::PUT('/baza-opcji-wyposazenia/{item}', [
        'uses' => 'BazaOpcjiWyposazeniaController@update',
        'as' => 'opcjeWyposazenia.update'
    ]);

    Route::PUT('/baza-opcji-wyposazenia/save/{item}', [
        'uses' => 'BazaOpcjiWyposazeniaController@save',
        'as' => 'opcjeWyposazenia.save'
    ]);

    Route::GET('/baza-opcji-wyposazenia/details/{item}', [
        'uses' => 'BazaOpcjiWyposazeniaController@details',
        'as' => 'opcjeWyposazenia.details'
    ]);

    Route::delete('/baza-opcji-wyposazenia/delete/{item}', [
        'uses' => 'BazaOpcjiWyposazeniaController@delete',
        'as' => 'opcjeWyposazenia.delete'
    ]);

    Route::GET('/baza-opcji-wyposazenia/edit/{item}', [
        'uses' => 'BazaOpcjiWyposazeniaController@edit',
        'as' => 'opcjeWyposazenia.edit'    
    ]);
});