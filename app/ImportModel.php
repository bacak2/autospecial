<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Excel;
use App\BazaDostepnosci;
use App\BazaKolorowTapicerki;

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
    public function importVarnishColors($name) {
        $importReader = Excel::load($name);
        
        //przy imporcie pliku bez nagłówków jako pola w tabeli
        $importedArray = $importReader->noHeading()->toArray();
        $importedArray = $importedArray[0];
        //$importedArray = $importReader->toArray();

        
        //umieść w BD
        $insertRow = new BazaKolorowLakieru();
     
        foreach ($importedArray as $row) {
            $dataSet[] = [
                'code'      => $row[0],
                'decoded'   => $row[1],
            ];
        }

        BazaKolorowLakieru::insert($dataSet);
        
    }
    
    /*
     * importuje plik '*.xls' i wprowadza do bazy danych
     * @parametr string - nazwa submitowanego pliku     
     */
    public function importUpholsteryColors($name) {
        $importReader = Excel::load($name);
        
        //przy imporcie pliku bez nagłówków jako pola w tabeli
        $importedArray = $importReader->noHeading()->toArray();
        $importedArray = $importedArray[0];
        //$importedArray = $importReader->toArray();

        
        //umieść w BD
        $insertRow = new BazaKolorowTapicerki();
     
        foreach ($importedArray as $row) {
            $dataSet[] = [
                'code'      => $row[0],
                'decoded'   => $row[1],
            ];
        }

        BazaKolorowTapicerki::insert($dataSet);
        
    }    
    
}
