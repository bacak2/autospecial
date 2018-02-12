<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BazaModeli;
use App\Http\Requests\Modele;
use App\ImportModel;

class BazaModeliController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function show() {
        
        $rows = BazaModeli::paginate(10);

        return view('admin.baza-modeli', compact('rows'));
    }

    public function upload(Request $request) {
        
        $file = $request->file('importFile')->getPathName();
        $destinationPath = 'files/';
        $tmp_name = 'import.xls';
        $moved = move_uploaded_file($file, $destinationPath.$tmp_name);

        $importModel = new ImportModel();

        $importModel->importItems('files/'.$tmp_name);
        
        return redirect()->route("import.showModels");
    }
    
    public function import() {

        $importModel = new ImportModel();

        $importModel->importItems('Baza_kolorow.xls');

        $rows = BazaModeli::paginate(10);

        return redirect()->route("import.showModels");
    }
    
    public function edit(BazaModeli $item) {
        return view('admin.edit-model', compact('item'));
    }

    public function insert(Modele $request) {
        
        $model_code3 = substr($request->model_code, 0, 3);
        $request->query->add(['model_code3' => $model_code3]);
        BazaModeli::insert($request->except('_method','_token'));
        return redirect()->route("import.showModels");
    }
    
    public function newItem() {
        return view('admin.insert-model');
    }
    
    public function update(Modele $request, BazaModeli $item) {
        
        $model_code3 = substr($request->model_code, 0, 3);
        $request->query->add(['model_code3' => $model_code3]);
        $item->update($request->all());
        
        return redirect()->route("import.showModels");
    }
    
    public function delete(BazaModeli $item) {
        
        $item->delete();
        
        return redirect()->route("import.showModels");
    }
    
    public function save(Request $request, BazaModeli $item) {
        return redirect()->route("import.showModels");
    }
}
