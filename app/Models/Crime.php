<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Crime extends Model
{
    use HasFactory;

    protected $fillable = ['uuid', 'nature_crime_id', 'ville_id', 'espece', 'pays_appréhension', 'pays_destination', 'pays_origine_produit', 'unite_id', 'services_Investigateurs', 'date_apprehension', 'arme_utilise', 'localite_aprrehension', 'longitude', 'Latitude', 'dure_emprisonnment', 'gestion_des_saisis', 'penalite', 'intention', 'Quantite_saisie', 'Nombre_complice', 'veto', 'lien_terrorisme', 'victime', 'aire_protegee_id', 'date_abattage'];
}
