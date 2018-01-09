<?php

namespace App\Http\Controllers;

use App\User;
use App\ImportModel;
use App\BazaDostepnosci;

use Illuminate\Http\Request;

class ImportController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }
    
    public function index() {
        
        $importModel = new ImportModel();
        if($importModel->importToDB('baza_dostepnosci_wzor.xls')) return redirect('/admin/baza_dostepnosci');   
        //else return view('bladImportu');
        
    }
    
    public function show() {
        
        $rows = BazaDostepnosci::all();

        return view('admin.bazaDostepnosci', compact('rows'));
    }
    
    public function showModels() {
        
        $rows = BazaDostepnosci::all();

        return view('admin.bazaModeli', compact('rows'));
    }
    
    public function showVarnishColors() {
        
        $rows = BazaDostepnosci::all();

        return view('admin.bazaKolorówLakieru', compact('rows'));
    }
    
    public function showUpholsteringColors() {
        
        $rows = BazaDostepnosci::all();

        return view('admin.bazaKolorówTapicerki', compact('rows'));
    }

    public function showEquipmentOptions() {
        
        $rows = BazaDostepnosci::all();

        return view('admin.bazaOpcjiWyposazenia', compact('rows'));
    }    
    
    
}
