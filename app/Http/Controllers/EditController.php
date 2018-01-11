<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\User;
use App\ImportModel;
use App\BazaDostepnosci;
use App\BazaKolorowLakieru;
use App\Http\Requests\KoloryLakieru;


use Illuminate\Http\Request;

class EditController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }
    
    public function VarnishColors(BazaKolorowLakieru $item) {
        return view('admin.edit-kolor-lakieru', compact('item'));
    }

    
    public function VarnishColorsUpdate(KoloryLakieru $request, BazaKolorowLakieru $item) {

        $item->update($request->all());
        
        return redirect()->route("import.showVarnishColors");
    }
    
}
