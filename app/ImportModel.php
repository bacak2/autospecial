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
    public function importToDB() {
        $importReader = Excel::load('baza_dostepnosci_wzor.xls');
        $importedArray = $importReader->toArray();
        
        //umieść w BD
        
        foreach ($importedArray as $row) {
            //echo $row["komisja"].'<br>';
            var_dump($importedArray);
            exit();
        }
        
        //zwróć true przy powodzeniu
    }
}
