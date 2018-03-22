<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BazaModeli;
use App\Http\Requests\Modele;
use App\ImportModel;
use App\Wyposazenie_standardowe;

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

        // już wybrane kody
        $selected = Wyposazenie_standardowe::select('wyposazenie_standardowes.id_opcja_wyposazenia', 'wyposazenie_standardowes.model_code', 'baza_opcji_wyposazenias.opcja_wyposazenia_decoded')
            ->leftJoin('baza_opcji_wyposazenias', 'id_opcja_wyposazenia', '=', 'baza_opcji_wyposazenias.id')
            ->where('wyposazenie_standardowes.model_code', $item->model_code)
            ->limit(10)
            ->get();
        $selected = json_encode($selected);
//echo($selected);
        // wszystkie, oprócz już wybranych
        $rows = BazaModeli::select('baza_opcji_wyposazenias.id', 'baza_opcji_wyposazenias.opcja_wyposazenia_code', 'baza_opcji_wyposazenias.opcja_wyposazenia_decoded')
            ->leftJoin('baza_opcji_wyposazenias', 'baza_opcji_wyposazenias.model_code3', '=', 'baza_modelis.model_code3')
            ->where('baza_modelis.model_code', $item->model_code)
            //->where()
            ->limit(10)
            ->get();
        $rows = json_encode($rows);
//echo($rows);

//exit();

        return view('admin.edit-model', compact('item', 'rows'));

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

        $standardOptions = json_decode($request->standardOptions);

        /*zapis kodu z formularza
        $model_code3 = substr($request->model_code, 0, 3);
        $request->query->add(['model_code3' => $model_code3]);
        $item->update($request->all());
        */
        foreach($standardOptions as $option){
            $dataSet[] = [
                'id_opcja_wyposazenia' => $option->id,
                'model_code' => $request->model_code,
            ];
        }
        Wyposazenie_standardowe::insert($dataSet);
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
