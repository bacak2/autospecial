<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BazaDostepnychModeli;
use App\BazaModeli;
use App\BazaKolorowLakieru;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $filters)
    {

        $rows = BazaDostepnychModeli::leftJoin('baza_modelis', 'baza_dostepnych_modelis.model', '=', 'baza_modelis.model_code')
                ->leftJoin('baza_kolorow_lakierus', 'baza_dostepnych_modelis.kolor', '=', 'baza_kolorow_lakierus.kolor_lakieru_code')
                ->leftJoin('baza_kolorow_tapicerkis', 'baza_dostepnych_modelis.tapicerka', '=', 'baza_kolorow_tapicerkis.kolor_tapicerki_code')
                ->leftJoin('baza_opcji_wyposazenias', 'baza_dostepnych_modelis.opcje', '=', 'baza_opcji_wyposazenias.opcja_wyposazenia_code');
        
        if($filters->has('model')) $rows->where('model', '=', $filters->get('model')) ;
        if($filters->has('color')) $rows->where('kolor', '=', $filters->get('color')) ;
        
        $rows = $rows->paginate(5);

        $models = BazaModeli::pluck('model_decoded', 'model_code');

        $colors = BazaKolorowLakieru::pluck('kolor_lakieru_decoded', 'kolor_lakieru_code');
        
        $total = $rows->total();
        
        return view('main', compact('rows', 'total', 'models','colors'));
    }
    
    public function details(BazaDostepnychModeli $item) {
        return view('details', compact('item'));
    }
}
