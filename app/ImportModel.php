<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Excel;

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
            var_dump($row);
            exit();
        }
        
        //zwróć true przy powodzeniu
    }
}
