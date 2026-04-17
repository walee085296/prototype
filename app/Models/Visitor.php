<?php

namespace App\Models;

use App\Models\Visit;
use Illuminate\Database\Eloquent\Model;

class Visitor extends Model
{
    //
   protected $fillable = [
        'name', 
        'national_id', 
        'phone', 
        'image_path', 
        'is_blacklisted'
    ];
      public function visits() {
                return $this->hasMany(Visit::class);
      }


}
  