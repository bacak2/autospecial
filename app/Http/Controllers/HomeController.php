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
}
