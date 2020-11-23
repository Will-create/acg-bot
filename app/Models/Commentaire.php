<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commentaire extends Model
{
    use HasFactory;
    protected $fillable = ['uuid', 'par', 'crime_id', 'par', 'pour', 'commentaire'];
    public function getRouteKeyName(){
        return 'uuid';
    }


    public function auteur(){
        return $this->belongsTo('App\Models\User','par','id');
    }
    
    public function destinataire(){
        return $this->belongsTo('App\Models\User','pour','id');
    }

    public function crime(){
        return $this->belongsTo('App\Models\Crime','crime_id','id');
    }

}
