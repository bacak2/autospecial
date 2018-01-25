<?php

namespace App\Http\Controllers;

use App\ImportModel;
use App\BazaDostepnosci;
use App\BazaKolorowLakieru;


use Illuminate\Http\Request;

class ImportController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }
    
    public function index() {
        
        $importModel = new ImportModel();
        if($importModel->importToDB('baza_dostepnosci_wzor.xls')) return redirect('/admin/baza-dostepnosci');   
        //else return view('bladImportu');
 
    }
    
    public function show() {
        
        $rows = BazaDostepnosci::leftJoin('baza_kolorow_lakierus', 'baza_dostepnych_modelis.kolor', '=', 'baza_kolorow_lakierus.kolor_lakieru_code')
                ->leftJoin('baza_modelis', 'baza_dostepnych_modelis.model', '=', 'baza_modelis.model_code')
                ->paginate(10);

        return view('admin.baza-dostepnosci', compact('rows'));
    }
    
    public function showModels() {
        
        $rows = BazaDostepnosci::paginate(10);

        return view('admin.baza-modeli', compact('rows'));
    }
    
    public function showVarnishColors() {
        
        $rows = BazaKolorowLakieru::paginate(10);

        return view('admin.baza-kolorow-lakieru', compact('rows'));
    }

    public function importVarnishColors() {

        $importModel = new ImportModel();

        $importModel->importVarnishColors('Baza_kolorow.xls');

        $rows = BazaKolorowLakieru::paginate(10);

        return view('admin.baza-kolorow-lakieru', compact('rows'));
    }    
    
    
    public function showUpholsteringColors() {
        
        $rows = BazaDostepnosci::all();

        return view('admin.baza-kolorow-tapicerki', compact('rows'));
    }

    public function showEquipmentOptions() {
        
        $rows = BazaDostepnosci::all();

        return view('admin.baza-opcji-wyposazenia', compact('rows'));
    }

    public function showPictrues() {
        
        return view('admin.zdjęcia-modeli');
        
    }
    
    public function uploadPictrue(Request $request) {
        $file = $request->file('importFile')->getPathName();
        $destinationPath = 'files/image/';
        $tmp_name = $request->file('importFile')->getClientOriginalName();
        //if (file_exists($destinationPath.$tmp_name)) exit();
        $moved = move_uploaded_file($file, $destinationPath.$tmp_name);
        
        return redirect()->route("import.showPictrues")->with('status', 'Zdjęcie dodano pomyślnie');
    }    
    
}
