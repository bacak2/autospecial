<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BazaDostepnychModeli;
use App\BazaModeli;
use App\BazaKolorowLakieru;
use App\BazaOpcjiWyposazenia;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $filters)
    {

        $rows = BazaDostepnychModeli::select('baza_dostepnych_modelis.id','komisja', 'model', 'rok_modelowy', 'kolor', 'tapicerka', 'opcje', 'cena_dla_klienta', 'model_code', 'model_decoded', 'model_code3', 'kolor_lakieru_code', 'kolor_lakieru_decoded', 'kolor_tapicerki_code', 'kolor_tapicerki_decoded')
                ->leftJoin('baza_modelis', 'baza_dostepnych_modelis.model', '=', 'baza_modelis.model_code')
                ->leftJoin('baza_kolorow_lakierus', 'baza_dostepnych_modelis.kolor', '=', 'baza_kolorow_lakierus.kolor_lakieru_code')
                ->leftJoin('baza_kolorow_tapicerkis', 'baza_dostepnych_modelis.tapicerka', '=', 'baza_kolorow_tapicerkis.kolor_tapicerki_code');
        if ($filters->has('color') && $filters->color !== "0") $rows->where('kolor', '=', $filters->get('color')) ;
        if ($filters->has('model') && $filters->model !== "0") $rows->where('model', 'LIKE', $filters->get('model')."%");

        $rows = $rows->paginate(5);

        $models = BazaModeli::pluck('model_decoded', 'model_code3');

        foreach ($models as $key=>$value) {

            if ($key != "122" && $key != "3G2" && $key != "3G5") $models->prepend(substr($value, 0, strpos($value, ' ')), $key);
        }
        
        $models->prepend("move up!","122")
                ->prepend("Passat Highline","3G2")
                ->prepend("Passat Variant Highline","3G5");
      
        $models->prepend('-- Wybierz --', 0);
        $colors = BazaKolorowLakieru::pluck('kolor_lakieru_decoded', 'kolor_lakieru_code');
        $colors->prepend('-- Wybierz --', NULL);

        $total = $rows->total();

        return view('main', compact('rows', 'total', 'models','colors', 'filters'));
    }
    
    public function details($id) {
        
            $item = BazaDostepnychModeli::select('baza_dostepnych_modelis.id','komisja', 'model', 'rok_modelowy', 'kolor', 'tapicerka', 'opcje', 'cena_dla_klienta', 'model_code', 'model_decoded', 'model_code3', 'kolor_lakieru_code', 'kolor_lakieru_decoded', 'kolor_tapicerki_code', 'kolor_tapicerki_decoded')
                ->where('baza_dostepnych_modelis.id', $id)
                ->leftJoin('baza_modelis', 'baza_dostepnych_modelis.model', '=', 'baza_modelis.model_code')
                ->leftJoin('baza_kolorow_lakierus', 'baza_dostepnych_modelis.kolor', '=', 'baza_kolorow_lakierus.kolor_lakieru_code')
                ->leftJoin('baza_kolorow_tapicerkis', 'baza_dostepnych_modelis.tapicerka', '=', 'baza_kolorow_tapicerkis.kolor_tapicerki_code')
                ->first(); 
            $wyposazenie = $item->opcje;
            $wyposazenie = explode(' ', $wyposazenie);
           
            $wyposazenieArray = array();  
           
            foreach($wyposazenie as $row) {
                
                $whereStatment = ['model_code3' => $item['model_code3'], 'opcja_wyposazenia_code' => $row];
                $it = BazaOpcjiWyposazenia::where($whereStatment)->first();
                if($it['opcja_wyposazenia_decoded'] !== NULL) array_push($wyposazenieArray, $it['opcja_wyposazenia_decoded']);
            }
            
        return view('details', compact('item', 'wyposazenieArray'));
    }
}
