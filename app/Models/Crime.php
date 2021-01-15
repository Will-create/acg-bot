<?php

namespace App\Models;

use App\Http\Controllers\CrimeTypeReglementController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Crime extends Model
{
    use HasFactory;
    protected $fillable = ['uuid', 'nature_crime_id', 'localite_id', 'espece_id', 'pays_apprehension', 'pays_destination', 'pays_origine_produit', 'unite_id', 'services_investigateurs','codeiso3_pays_apprehension', 'date_apprehension', 'arme_utilise', 'localite_aprrehension', 'longitude', 'Latitude', 'dure_emprisonnment', 'gestion_des_saisis', 'penalite', 'intention', 'Quantite_saisie', 'Nombre_complice', 'veto', 'lien_terrorisme', 'victime', 'aire_protegee_id', 'date_abattage', 'type_crime_id'];

    public function getRouteKeyName(){
        return 'uuid';
    }
    public function type(){
        return $this->hasOne('App\Models\TypeCrime','id', 'type_crime_id');
    }
    public function localite(){
        return $this->belongsTo('App\Models\Localite','localite_apprehension','id');
    }
    public function auteurs(){
        return $this->hasMany(CrimeAuteur::class);
    }

    public function paysDestination(){
        return $this->belongsTo('App\Models\Pay','pays_destination','id');
    }
    public function paysOrigineProduit(){
        return $this->belongsTo('App\Models\Pay','pays_origine_produit','id');
    }
    public function paysApprehension(){
        return $this->belongsTo('App\Models\Pay','pays_apprehension','id');
    }
    public function aireProtegee(){
        return $this->belongsTo('App\Models\AireProtegee','aire_protegee_id','id');
    }
    public function service_investigateur(){
        return $this->belongsTo('App\Models\Unite','services_investigateurs','id');
    }


    public function confiscations(){
        return $this->hasMany(crimeConfiscation::class);
    }
    public function armes(){
        return $this->hasMany('App\Models\Arme','crime_id','id');
    }

    public function commentaires(){
        return $this->hasMany('App\Models\Commentaire','crime_id','id');
    }

    public function especes(){
        return $this->belongsToMany(Espece::class,'crime_especes');
    }
    public function reglement()
    {
        return $this->hasMany(crimeTypeReglement::class);
    }

}
