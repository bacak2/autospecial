<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BazaDostepnychModeli;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rows = BazaDostepnychModeli::leftJoin('baza_modelis', 'baza_dostepnych_modelis.model', '=', 'baza_modelis.model_code')
                ->leftJoin('baza_kolorow_lakierus', 'baza_dostepnych_modelis.kolor', '=', 'baza_kolorow_lakierus.kolor_lakieru_code')
                ->leftJoin('baza_kolorow_tapicerkis', 'baza_dostepnych_modelis.tapicerka', '=', 'baza_kolorow_tapicerkis.kolor_tapicerki_code')
                ->leftJoin('baza_opcji_wyposazenias', 'baza_dostepnych_modelis.opcje', '=', 'baza_opcji_wyposazenias.opcja_wyposazenia_code')
                ->paginate(5);

        return view('main', compact('rows'));
    }
    
    public function details(BazaDostepnychModeli $item) {
        return view('details', compact('item'));
    }
}
