<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Excel;
use DB;
use App\BazaDostepnosci;
use App\BazaDostepnychModeli;
use App\BazaModeli;
use App\BazaKolorowTapicerki;
use App\BazaOpcjiWyposazenia;

class ImportModel extends Model
{
    /*
     * importuje plik '*.xls' i wprowadza do bazy danych
     * @parametr string - nazwa submitowanego pliku     
     */
    public function importToDB($name) {
        $importReader = Excel::load($name);
        $importedArray = $importReader->toArray();
        
        //przy imporcie pliku bez nagłówków jako pola w tabeli
        //$importedArray = $importReader->noHeading()->toArray();

        
        //umieść w BD
        $insertRow = new BazaDostepnosci();
        foreach ($importedArray as $row) {
            // w transakcji: 
            // drop/truncate całą tabele
            
            // insert new
            $insertRow->komisja             = $row["komisja"];
            $insertRow->model               = $row["model"];
            $insertRow->rok_modelowy        = $row["rok_modelowy"];
            $insertRow->kolor               = $row["kolor"];
            $insertRow->tapicerka           = $row["tapicerka"];
            $insertRow->opcje               = $row["opcje"];
            $insertRow->opcje_importerskie  = $row["opcje_importerskie"];
            $insertRow->cena_dla_klienta    = $row["cena_dla_klienta"];
            
            $insertRow->save();
            
            //dla testów
            return true;
        }
        
        //zwróć true przy powodzeniu
        return true;
    }
    
    /*
     * importuje plik '*.xls' i wprowadza do bazy danych
     * @parametr string - nazwa submitowanego pliku     
     */
    public function importAvailableItems($name) {
        $importReader = Excel::load($name);
        $importedArray = $importReader->toArray();
        
        //przy imporcie pliku bez nagłówków jako pola w tabeli
        //$importedArray = $importReader->noHeading()->toArray();

        
        //umieść w BD
        $insertRow = new BazaDostepnychModeli();
        foreach ($importedArray as $row) {
            // w transakcji: 
            // drop/truncate całą tabele
            // 
            //zamień cenę na prawidłową do wyświetlania
            //$price = strtr(substr($row["cena_dla_klienta"], 3),',.','.,');            
            
            $dataSet[] = [
            'komisja'             => $row["komisja"],
            'model'               => $row["model"],
            'rok_modelowy'        => $row["rok_modelowy"],
            'kolor'               => $row["kolor"],
            'tapicerka'           => $row["tapicerka"],
            'opcje'               => $row["opcje"],
            'opcje_importerskie'  => $row["opcje_importerskie"],
            'cena_dla_klienta'    => $row["cena_dla_klienta"]
            ];

        }
        
        BazaDostepnychModeli::insert($dataSet);

    }
    
    /*
     * importuje plik '*.xls' i wprowadza do bazy danych   
     */
    public function importVarnishColors($handle) {
        $importReader = Excel::load($handle);
        
        //przy imporcie pliku bez nagłówków jako pola w tabeli
        $importedArray = $importReader->noHeading()->toArray();
        
        //umieść w BD
        $insertRow = new BazaKolorowLakieru();
     
        foreach ($importedArray as $row) {
            $dataSet[] = [
                'kolor_lakieru_code'      => $row[0],
                'kolor_lakieru_decoded'   => $row[1],
            ];
        }

        BazaKolorowLakieru::insert($dataSet);
        
    }
    
    /*
     * importuje plik '*.xls' i wprowadza do bazy danych  
     */
    public function importUpholsteryColors($handle) {
        $importReader = Excel::load($handle);
        
        //przy imporcie pliku bez nagłówków jako pola w tabeli
        $importedArray = $importReader->noHeading()->toArray();
        
        //umieść w BD
        $insertRow = new BazaKolorowTapicerki();
     
        foreach ($importedArray as $row) {
            $dataSet[] = [
                'kolor_tapicerki_code'      => $row[0],
                'kolor_tapicerki_decoded'   => $row[1],
            ];
        }

        BazaKolorowTapicerki::insert($dataSet);
        
    }  
    
    /*
     * importuje plik '*.xls' i wprowadza do bazy danych
     * @parametr string - nazwa submitowanego pliku     
     */
    public function importEquipmentOptions($name) {
        $importReader = Excel::load($name);
        
        //przy imporcie pliku bez nagłówków jako pola w tabeli
        $importedArray = $importReader->noHeading()->toArray();
        
        //umieść w BD
        $insertRow = new BazaOpcjiWyposazenia();
     
        foreach ($importedArray as $row) {
            $dataSet[] = [
                'model_code3'                 => $row[0],
                'opcja_wyposazenia_code'      => $row[1],
                'opcja_wyposazenia_decoded'   => $row[2],
            ];
        }

        BazaOpcjiWyposazenia::insert($dataSet);
        
    }      
    
    /*
     * importuje plik '*.xls' i wprowadza do bazy danych
     * @parametr string - nazwa submitowanego pliku     
     */
    public function importItems($name) {
        $importReader = Excel::load($name);
        
        //przy imporcie pliku bez nagłówków jako pola w tabeli
        $importedArray = $importReader->noHeading()->toArray();
                
        //umieść w BD
        $insertRow = new BazaModeli();
     
        foreach ($importedArray as $row) {
            $model_code3 = substr($row[0], 0, 3);
            $dataSet[] = [
                'model_code'      => $row[0],
                'model_decoded'   => $row[1],
                'model_code3'     => $model_code3
            ];
        }

        BazaModeli::insert($dataSet);
        
    }     
    
}
