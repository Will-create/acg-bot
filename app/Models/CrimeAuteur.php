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

    public function crime(){
        return $this->belongsTo(Crime::class);
    }
    public function reglements()
    {
        return $this->hasMany(crimeTypeReglement::class, 'auteur_id');
    }
    public function pays()
    {
        return $this->belongsTo('App\Models\Pay', 'pays_id','id');
    }
}
