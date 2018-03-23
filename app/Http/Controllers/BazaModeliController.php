<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BazaModeli;
use App\Http\Requests\Modele;
use App\ImportModel;
use App\Wyposazenie_standardowe;
use App\BazaOpcjiWyposazenia;

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
        $selected = Wyposazenie_standardowe::select('wyposazenie_standardowes.id_opcja_wyposazenia', 'baza_opcji_wyposazenias.opcja_wyposazenia_code', 'baza_opcji_wyposazenias.opcja_wyposazenia_decoded')
            ->leftJoin('baza_opcji_wyposazenias', 'id_opcja_wyposazenia', '=', 'baza_opcji_wyposazenias.id')
            ->where('wyposazenie_standardowes.model_code', $item->model_code)
            ->get();
        $selected = json_encode($selected);

        // wszystkie, oprócz już wybranych
        $allOptions = BazaOpcjiWyposazenia::select('baza_opcji_wyposazenias.id', 'baza_opcji_wyposazenias.opcja_wyposazenia_code', 'baza_opcji_wyposazenias.opcja_wyposazenia_decoded')
            ->leftJoin('baza_modelis', 'baza_opcji_wyposazenias.model_code3', '=', 'baza_modelis.model_code3')
            ->where('baza_modelis.model_code', $item->model_code)
            ->whereNotIn('baza_opcji_wyposazenias.id', function($query) use ($item) {
                $query->select('wyposazenie_standardowes.id_opcja_wyposazenia')
                    ->from('wyposazenie_standardowes')->where('wyposazenie_standardowes.model_code', $item->model_code);
            })
            ->get();

        $allOptions = json_encode($allOptions);

        return view('admin.edit-model', compact('item', 'allOptions', 'selected'));

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
    
    public function updateCodes(Request $request){

        Wyposazenie_standardowe::where('model_code', $request->model_code)->delete();

        $standardOptions = $request->selected;
        if($standardOptions != 0) {
            foreach ($standardOptions as $standardOption) {
                $dataSet[] = [
                    'id_opcja_wyposazenia' => $standardOption['id_opcja_wyposazenia'] ?? $standardOption['id'],
                    'model_code' => $request->model_code,
                ];
            }
            Wyposazenie_standardowe::insert($dataSet);
        }

        return response()->json([
            'res' => 'true',
        ]);
    }
    
    public function delete(BazaModeli $item) {
        
        $item->delete();
        
        return redirect()->route("import.showModels");
    }
    
    public function save(Request $request, BazaModeli $item) {
        return redirect()->route("import.showModels");
    }
}
