<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unite extends Model
{
    use HasFactory;
    protected $fillable=[
        'nom',
        'uuid',
        'pays_id',
        'ville_id',
        'designation',
        'responsable_id',
        'type',
        'adresse',
        'tel',
        'long',
        'lat',
        'logo',
        'photo_couverture'
    ];

    public function getRouteKeyName(){
        return 'uuid';
    }

    public function pays(){
        return $this->belongsTo('App\Models\Pay','pays_id', 'id');
    }
    public function ville(){
        return $this->belongsTo('App\Models\Ville', 'ville_id', 'id');
    }
    public function type(){
        return $this->belongsTo('App\Models\Type','type_id','id');
    }
    
    public function responsable(){
        return $this->belongsTo('App\Models\User','responsable_id');
    }

}
