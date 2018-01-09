<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Excel;
use App\baza_dostepnosciMigrate;

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
        
        foreach ($importedArray as $row) {
            //echo $row["komisja"].'<br>';
            //var_dump($row);
            //baza_dostepnosciMigrate::create($row);
            
            $insertRow = new baza_dostepnosciMigrate();
            $insertRow->komisja = $row["komisja"];
            $insertRow->model = $row["model"];
            
            $insertRow->save();
            exit();
        }
        
        //zwróć true przy powodzeniu
    }
}
