<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\BazaModeli;

class BazaOpcjiWyposazenia extends Model
{
    protected $fillable = [
        'code', 'decoded', 'model_code3'
    ];
    
    public function bazaModeli() {
        return $this->belongsToMany(BazaModeli::class, 'model_to_equpments', 'equipment_id', 'model_id');
    }    
}
