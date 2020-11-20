<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class crimeConfiscation extends Model
{
    use HasFactory;


    protected $fillable = ['uuid', 'crime_id', 'designation', 'nombre', 'quantite', 'poids', 'condition', 'description'];
    
    public function getRouteKeyName(){
        return 'uuid';
    }

    public function crime(){
        return $this->belongsTo('App\Models\Crime','crime_id','id');
    }
}
