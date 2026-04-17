<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inmate extends Model
{
    //
    protected $fillable = [
        'full_name', 
        'national_id', 
        'inmate_code', 
        'legal_status'
    ];
    public function visits() {
    return $this->hasMany(Visit::class);
}
}
