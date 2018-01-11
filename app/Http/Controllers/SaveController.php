<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BazaKolorowLakieru;

class SaveController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }
    
    public function VarnishColors(Request $request, BazaKolorowLakieru $item) {

        //$item->insert($request->except('_method','_token'));
        //$item->update($request->except('_method','_token'));
        return redirect()->route("import.showVarnishColors");
    }
}
