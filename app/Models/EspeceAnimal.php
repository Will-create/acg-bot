<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EspeceAnimal extends Model
{
    use HasFactory;

    protected $fillable=[
        'nom',
        'uuid',
        'photo',
        'famille',
        'nom_scientifique'
    ];

    public function getRouteKeyName(){
        return 'uuid';
    }
    public function crime_especes()
    {
        return $this->hasMany(CrimeEspece::class);
    }
}
