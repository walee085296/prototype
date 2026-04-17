<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Visit extends Model
{
    //  
 protected $fillable = [
    'inmate_id',
    'visitor_id',
    'visit_uuid',
    'relation_type',
    'status',
    'entry_at',
    'exit_at'];


     public function inmate() {
    return $this->belongsTo(Inmate::class);
}
public function visitor() {
    return $this->belongsTo(Visitor::class);
}
}
