<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BazaKolorowLakieru;
use App\Http\Requests\KoloryLakieru;
use App\ImportModel;
use Excel;

class BazaKolorowLakieruController extends Controller
{

    public function __construct() {
        $this->middleware('auth');
    }

    public function show() {
        
        $rows = BazaKolorowLakieru::paginate(10);

        return view('admin.baza-kolorow-lakieru', compact('rows'));
    }

    public function upload(Request $request) {
        
        $file = $request->file('importFile')->getPathName();
        $destinationPath = 'files/';
        $tmp_name = 'import.xls';
        $moved = move_uploaded_file($file, $destinationPath.$tmp_name);

        $importModel = new ImportModel();

        $importModel->importVarnishColors('files/'.$tmp_name);
        
        return redirect()->route("import.showVarnishColors");
    }
    
    public function edit(BazaKolorowLakieru $item) {
        return view('admin.edit-kolor-lakieru', compact('item'));
    }

    public function insert(KoloryLakieru $request) {

        BazaKolorowLakieru::insert($request->except('_method','_token'));
        return redirect()->route("import.showVarnishColors");
    }
    
    public function newItem() {
        return view('admin.insert-kolor-lakieru');
    }
    
    public function update(KoloryLakieru $request, BazaKolorowLakieru $item) {

        $item->update($request->all());
        
        return redirect()->route("import.showVarnishColors");
    }
    
    public function delete(BazaKolorowLakieru $item) {
        
        $item->delete();
        
        return redirect()->route("import.showVarnishColors");
    }
    
    public function save(Request $request, BazaKolorowLakieru $item) {

        return redirect()->route("import.showVarnishColors");
    }
}
