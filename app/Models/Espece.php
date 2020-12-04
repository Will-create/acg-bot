<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Espece extends Model
{
    use HasFactory;
    protected $fillable=[
        'nom',
        'uuid',
        'photo',
        'famille',
        'nom_scientifique',
        'regne',
        'ordre_id'
    ];

    public function getRouteKeyName(){
        return 'uuid';
    }
    public function crime_especes()
    {
        return $this->hasMany(CrimeEspece::class);
    }
    public function ordre(){
        return $this->belongsTo('App\Models\Ordre', 'ordre_id', 'id');
    }

}
