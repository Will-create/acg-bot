<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CrimeAuteur extends Model
{
    use HasFactory;
    protected $fillable=['nom','crime_id','uuid','prenom','adresse','type','date_naiss','genre','education','voyageur_international','revenue','nationalite','affaire_juduciaire'];
    public function getRouteKeyName(){
        return 'uuid';
    }
}
