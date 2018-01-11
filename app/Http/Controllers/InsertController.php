<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BazaKolorowLakieru;
use App\Http\Requests\KoloryLakieru;

class InsertController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }
    
    public function VarnishColors(KoloryLakieru $request) {

        BazaKolorowLakieru::insert($request->except('_method','_token'));
        return redirect()->route("import.showVarnishColors");
    }
}
