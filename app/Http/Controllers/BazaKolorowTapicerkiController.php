<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BazaKolorowTapicerki;
use App\Http\Requests\KoloryTapicerki;
use App\ImportModel;
use Excel;

class BazaKolorowTapicerkiController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function show() {
        
        $rows = BazaKolorowTapicerki::paginate(10);

        return view('admin.baza-kolorow-tapicerki', compact('rows'));
    }

    public function upload(Request $request) {
        
        $file = $request->file('importFile')->getPathName();
        $destinationPath = 'files/';
        $tmp_name = 'import.xls';
        $moved = move_uploaded_file($file, $destinationPath.$tmp_name);

        $importModel = new ImportModel();

        $importModel->importUpholsteryColors('files/'.$tmp_name);
        
        return redirect()->route("import.showUpholsteringColors");
    }
    
    public function edit(BazaKolorowTapicerki $item) {
        return view('admin.edit-kolor-tapicerki', compact('item'));
    }

    public function insert(KoloryTapicerki $request) {

        BazaKolorowTapicerki::insert($request->except('_method','_token'));
        return redirect()->route("import.showUpholsteringColors");
    }
    
    public function newItem() {
        return view('admin.insert-kolor-tapicerki');
    }
    
    public function update(KoloryTapicerki $request, BazaKolorowTapicerki $item) {

        $item->update($request->all());
        
        return redirect()->route("import.showUpholsteringColors");
    }
    
    public function delete(BazaKolorowTapicerki $item) {
        
        $item->delete();
        
        return redirect()->route("import.showUpholsteringColors");
    }
    
    public function save(Request $request, BazaKolorowTapicerki $item) {

        //$item->insert($request->except('_method','_token'));
        //$item->update($request->except('_method','_token'));
        return redirect()->route("import.showUpholsteringColors");
    }
}
