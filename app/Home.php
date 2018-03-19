<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\BazaDostepnychModeli;
use App\BazaModeli;
use App\BazaKolorowLakieru;
use App\BazaOpcjiWyposazenia;

class Home extends Model
{
    public function itemsList($filters) {
        
       $rows = BazaDostepnychModeli::select('baza_dostepnych_modelis.id','komisja', 'model', 'rok_modelowy', 'kolor', 'tapicerka', 'opcje', 'cena_dla_klienta', 'model_code', 'model_decoded', 'model_code3', 'kolor_lakieru_code', 'kolor_lakieru_decoded', 'kolor_tapicerki_code', 'kolor_tapicerki_decoded')
                ->leftJoin('baza_modelis', 'baza_dostepnych_modelis.model', '=', 'baza_modelis.model_code')
                ->leftJoin('baza_kolorow_lakierus', 'baza_dostepnych_modelis.kolor', '=', 'baza_kolorow_lakierus.kolor_lakieru_code')
                ->leftJoin('baza_kolorow_tapicerkis', 'baza_dostepnych_modelis.tapicerka', '=', 'baza_kolorow_tapicerkis.kolor_tapicerki_code');
        
        if ($filters->has('color') && $filters->color !== "0") $rows->where('kolor', '=', $filters->get('color')) ;
        if ($filters->has('model') && $filters->model !== "0") $rows->where('model', 'LIKE', $filters->get('model')."%");
        
        $rows->whereNotNull('model_decoded');
        
        if ($filters->has('sortuj') && $filters->sortuj === "priceAsc") $rows->orderBy('cena_dla_klienta');
        else if ($filters->has('sortuj') && $filters->sortuj === "priceDesc") $rows->orderBy('cena_dla_klienta', 'desc');    
        else if ($filters->has('sortuj') && $filters->sortuj === "nameAsc") $rows->orderBy('model_decoded'); 
        else if ($filters->has('sortuj') && $filters->sortuj === "nameDesc") $rows->orderBy('model_decoded', 'desc'); 
        else $rows->orderBy('baza_dostepnych_modelis.id');
        
        $rows =$rows->distinct()->paginate(5);
        
        return $rows;
}

    public function modelsList() {
        
        $models = BazaModeli::pluck('model_decoded', 'model_code3');
        $models->prepend(substr($value, 0, strpos($value, ' ')), $key);
        $models->prepend('-- Wybierz --', 0);
        
        return $models;
    }
    
    public function colorsList() {
             
        $colors = BazaKolorowLakieru::pluck('kolor_lakieru_decoded', 'kolor_lakieru_code');
        $colors->prepend('-- Wybierz --', NULL);
        
        return $colors;
    }
    
    public function details($id) {
                $item = BazaDostepnychModeli::select('baza_dostepnych_modelis.id','komisja', 'model', 'rok_modelowy', 'kolor', 'tapicerka', 'opcje', 'cena_dla_klienta', 'model_code', 'model_decoded', 'model_code3', 'kolor_lakieru_code', 'kolor_lakieru_decoded', 'kolor_tapicerki_code', 'kolor_tapicerki_decoded')
                ->where('baza_dostepnych_modelis.id', $id)
                ->leftJoin('baza_modelis', 'baza_dostepnych_modelis.model', '=', 'baza_modelis.model_code')
                ->leftJoin('baza_kolorow_lakierus', 'baza_dostepnych_modelis.kolor', '=', 'baza_kolorow_lakierus.kolor_lakieru_code')
                ->leftJoin('baza_kolorow_tapicerkis', 'baza_dostepnych_modelis.tapicerka', '=', 'baza_kolorow_tapicerkis.kolor_tapicerki_code')
                ->first();
        return $item;            
    }
 
}
