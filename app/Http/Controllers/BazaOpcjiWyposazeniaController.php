<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BazaOpcjiWyposazenia;
use App\Http\Requests\OpcjeWyposazenia;
use App\ImportModel;
use App\BazaModeli;
use App\ModelToEquipment;
use Illuminate\Support\Facades\DB;

class BazaOpcjiWyposazeniaController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function show() {

        $rows = BazaOpcjiWyposazenia::select('model_code3')->distinct()->get();
        return view('admin.baza-opcji-wyposazenia', compact('rows'));
    }

    public function upload(Request $request) {
        
        $file = $request->file('importFile')->getPathName();
        $destinationPath = 'files/';
        $tmp_name = 'import.xls';
        $moved = move_uploaded_file($file, $destinationPath.$tmp_name);

        $importModel = new ImportModel();

        $importModel->importEquipmentOptions('files/'.$tmp_name);
        
        return redirect()->route("import.showEquipmentOptions");
    }
    
    public function import() {

        $importModel = new ImportModel();

        $importModel->importEquipmentOptions('Baza_kolorow.xls');

        $rows = BazaOpcjiWyposazenia::select('model_code3')->distinct()->paginate(10);

        return redirect()->route("import.showEquipmentOptions");
    }
    
    public function details($code3) {
        
        $item = BazaOpcjiWyposazenia::where('model_code3',$code3)->paginate(10);
        
        return view('admin.opcje-wyposazenia-details', compact('item'));
    }

    public function insert(OpcjeWyposazenia $request) {

        BazaOpcjiWyposazenia::insert($request->except('_method','_token'));
        return redirect()->route('opcjeWyposazenia.details', $request->model_code3);
    }
    
    public function newItem(BazaOpcjiWyposazenia $item) {

        return view('admin.insert-opcja-wyposazenia', compact('item'));
    }

    public function edit(BazaOpcjiWyposazenia $item) {
        return view('admin.edit-opcja-wyposazenia', compact('item'));
    }    
    
    public function update(OpcjeWyposazenia $request, BazaOpcjiWyposazenia $item) {

        DB::table('baza_opcji_wyposazenias')->where('model_code3', $request->model_code3)->where('opcja_wyposazenia_code', $request->opcja_wyposazenia_code)->update(array(
                                         'opcja_wyposazenia_decoded' => $request->opcja_wyposazenia_decoded,
        ));
        
        return redirect()->route('opcjeWyposazenia.details', $request->model_code3);
    }
    
    public function delete(BazaOpcjiWyposazenia $item) {
        
        $item->delete();
        
        return redirect()->back();
    }
    
    public function save(Request $request, BazaOpcjiWyposazenia $item) {

        return redirect()->route("import.showEquipmentOptions");
        
    }
}
