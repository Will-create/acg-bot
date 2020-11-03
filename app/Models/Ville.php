<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ville extends Model
{
    use HasFactory;

    protected $fillable=['nom','uuid','pays_id'];
    public function getRouteKeyName(){
        return 'uuid';
    }

    public function pays(){
        return $this->belongsTo('App\Models\Pay','pays_id', 'id');
    }
    
}
