<?php

namespace App\Http\Controllers;

use App\User;
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
        
        $rows = BazaDostepnosci::leftJoin('baza_kolorow_lakierus', 'baza_dostepnoscis.kolor', '=', 'baza_kolorow_lakierus.code')
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
    
    
}
