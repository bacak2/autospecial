<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BazaDostepnosci;

class BazaDostepnosci extends Controller
{
    protected $fillable = ['id', 'komisja', 'model', 'rok_modelowy', 'kolor', 'tapicerka', 'opcje', 'cena_dla_klienta'];
    
    public function __construct() {
        $this->middleware('auth');
    }
    
    public function index() {
        
        $rows = BazaDostepnosci::paginate(10);

        return view('admin.bazaDostepnosci', compact('rows'));
    }
}
