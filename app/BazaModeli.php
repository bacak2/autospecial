<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\BazaOpcjiWyposazenia;

class BazaModeli extends Model
{
    protected $fillable = [
        'model_code', 'model_decoded', 'model_code3'
    ];
    
    public function bazaOpcjiWyposazenia() {
        return $this->belongsToMany(BazaOpcjiWyposazenia::class, 'model_to_equpments','model_id','equipment_id');
    }
}
