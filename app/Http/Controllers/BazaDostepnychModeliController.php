<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BazaDostepnychModeli;
use App\Http\Requests\DostepneModele;
use App\ImportModel;
use App\BazaModeli;
use App\BazaKolorowTapicerki;
use App\BazaKolorowLakieru;
use App\BazaOpcjiWyposazenia;

class BazaDostepnychModeliController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function show() {
        
        $rows = BazaDostepnychModeli::leftJoin('baza_modelis', 'baza_dostepnych_modelis.model', '=', 'baza_modelis.model_code')
                ->leftJoin('baza_kolorow_lakierus', 'baza_dostepnych_modelis.kolor', '=', 'baza_kolorow_lakierus.kolor_lakieru_code')
                ->leftJoin('baza_kolorow_tapicerkis', 'baza_dostepnych_modelis.tapicerka', '=', 'baza_kolorow_tapicerkis.kolor_tapicerki_code')
                ->leftJoin('baza_opcji_wyposazenias', 'baza_dostepnych_modelis.opcje', '=', 'baza_opcji_wyposazenias.opcja_wyposazenia_code')
                ->orderBy('baza_dostepnych_modelis.id')
                ->addSelect('*','baza_dostepnych_modelis.id')
                ->paginate(10);
        return view('admin.baza-dostepnych-modeli', compact('rows'));
    }
    
    public function upload(Request $request) {
        
        $file = $request->file('importFile')->getPathName();
        $destinationPath = 'files/';
        $tmp_name = 'import.xls';
        $moved = move_uploaded_file($file, $destinationPath.$tmp_name);

        $importModel = new ImportModel();

        $importModel->importAvailableItems('files/'.$tmp_name);
        
        return redirect()->route("import.show");        
    }
    
    public function import() {

        $importModel = new ImportModel();

        $importModel->importAvailableItems('baza_dostepnosci_wzor.xls');

        $rows = BazaDostepnychModeli::paginate(10);

        return redirect()->route("import.show");
    }
    
    public function details(BazaDostepnychModeli $item) {
            
            $code3 = substr($item->model, 0, 3);
           
            $wyposazenie = $item->opcje;
            $wyposazenie = explode(' ', $wyposazenie);

            $wyposazenieArray = array();  

            foreach($wyposazenie as $row) {

                $whereStatment = ['model_code3' => $code3, 'opcja_wyposazenia_code' => $row];
                $it = BazaOpcjiWyposazenia::where($whereStatment)->first();

                array_push($wyposazenieArray, $it['opcja_wyposazenia_decoded']);
                //else array_push($wyposazenieArray, $row);
            }  
            
            $wyposazenieArray = array_combine($wyposazenie, $wyposazenieArray);
        return view('admin.dostepny-model-details', compact('item', 'wyposazenieArray'));
    }

    public function insert(DostepneModele $request) {
        $avModel = new BazaDostepnychModeli();
        $avModel->model = $request->input('model_code');
        $avModel->save();

        return redirect()->route("import.show");
    }
    
    public function newItem() {
        
        $models = BazaModeli::pluck('model_decoded', 'model_code');
        $tcolors = BazaKolorowTapicerki::pluck('kolor_tapicerki_decoded', 'kolor_tapicerki_code');
        $lcolors = BazaKolorowLakieru::pluck('kolor_lakieru_decoded', 'kolor_lakieru_code');
        $equipments = BazaOpcjiWyposazenia::pluck('opcja_wyposazenia_decoded', 'opcja_wyposazenia_code');

        return view('admin.insert-dostepny-model', compact('models', 'tcolors', 'lcolors', 'equipments'));
    }
    
    public function update(DostepneModele $request, BazaDostepnychModeli $item) {

        $item->update($request->all());
        
        return redirect()->route("import.show");
    }
    
    public function delete(BazaDostepnychModeli $item) {
        
        $item->delete();
        
        return redirect()->route("import.show");
    }
    
    public function save(Request $request, BazaDostepnychModeli $item) {
        return redirect()->route("import.show");
    }
}
