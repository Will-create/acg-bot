<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unite extends Model
{
    use HasFactory;
    protected $fillable=[
        'designation',
        'uuid',
        'pays_id',
        'ville_id',
        'designation',
        'responsable_id',
        'administration_tutelle',
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

    public function localite(){
        return $this->belongsTo('App\Models\Localite', 'localite_id', 'id');
    }

    public function type(){
        return $this->belongsTo('App\Models\TypeCrime','type_unite_id','id');
    }

    public function responsable(){
        return $this->belongsTo('App\Models\User','responsable_id');
    }

    public function crimes(){
        return $this->hasMany('App\Models\Crime','unite_id','id');
    }
    public function users(){
        return $this->hasMany('App\Models\Users','unite_id','id');
    }
}
