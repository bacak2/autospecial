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
        $user = User::all();
        
        $importModel = new ImportModel();
        $importModel->importToArray();
        
        return view('import.index', compact('user'));
    }
    
}
