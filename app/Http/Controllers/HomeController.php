<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BazaDostepnychModeli;
use App\BazaModeli;
use App\BazaKolorowLakieru;
use App\BazaOpcjiWyposazenia;
use App\Home;

class HomeController extends Controller
{

    public function index(Request $filters)
    {
        $home = new Home();
        $rows = $home->itemsList($filters);
        $models = $home->modelsList();
        $colors = $home->colorsList();
        $total = $rows->total();
        
        return view('main', compact('rows', 'total', 'models','colors', 'filters'));
    }
    
    public function details($id = 1) {
        
        $home = new Home();

        $item = $home->details($id);

        $selectedOptions = $home->selectedOptions($item->model_code);

        $otherOptions = $home->otherOptions($item->model_code);

        return view('details', compact('item', 'selectedOptions', 'otherOptions'));
        
    }

    public function detailsOld($id = 1) {

        $home = new Home();
        $item = $home->detailsOld($id);

        $wyposazenie = $item->opcje;
        $wyposazenie = explode(' ', $wyposazenie);

        $wyposazenieArray = array();

        foreach($wyposazenie as $row) {

            $whereStatment = ['model_code3' => $item['model_code3'], 'opcja_wyposazenia_code' => $row];
            $it = BazaOpcjiWyposazenia::where($whereStatment)->first();
            if($it['opcja_wyposazenia_decoded'] !== NULL) array_push($wyposazenieArray, $it['opcja_wyposazenia_decoded']);
        }

        return view('detailsOld', compact('item', 'wyposazenieArray'));
    }
}
