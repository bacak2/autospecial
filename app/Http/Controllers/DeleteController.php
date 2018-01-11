<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BazaKolorowLakieru;

class DeleteController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }
    
    public function VarnishColors(BazaKolorowLakieru $item) {
        
        $item->delete();
        
        return redirect()->route("import.showVarnishColors");
    }
}
