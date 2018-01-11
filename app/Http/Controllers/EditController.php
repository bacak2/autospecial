<?php

namespace App\Http\Controllers;

use App\User;
use App\ImportModel;
use App\BazaDostepnosci;
use App\BazaKolorowLakieru;



use Illuminate\Http\Request;

class EditController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }
    
    public function VarnishColors(BazaKolorowLakieru $item) {
        return view('admin.edit-kolor-lakieru', compact('item'));
    }
    
}
