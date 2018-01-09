<?php

namespace App\Http\Controllers;
use App\User;
use App\ImportModel;

use Illuminate\Http\Request;

class ImportController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }
    
    public function index() {
        
        $importModel = new ImportModel();
        $importModel->importToDB('baza_dostepnosci_wzor.xls');
        
        $user = "test";
        return view('import.index', compact('user'));
    }
    
}
