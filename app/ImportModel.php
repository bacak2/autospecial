<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Excel;

class ImportModel extends Model
{
        
    public function importToArray() {
        $importReader = Excel::load('baza_dostepnosci_wzor.xls');
        $importedArray = $importReader->toArray();
        
        foreach ($importedArray as $row) {
            //echo $row["komisja"].'<br>';
            var_dump($importedArray);
            exit();
        }
    }
}
