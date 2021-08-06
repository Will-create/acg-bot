<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Arme extends Model
{
    use HasFactory;
    public function getRouteKeyName(){
        return 'uuid';
    }
    public function crime(){
        return $this->belongsTo('App\Models\Crime','crime_id','id');
    }
   
}
