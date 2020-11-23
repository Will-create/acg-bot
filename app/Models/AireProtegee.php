<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AireProtegee extends Model
{
    use HasFactory;
    protected $fillable = ['uuid', 'libelle', 'code_wdpa_ aire', 'pays_id', 'tel', 'map', 'logo', 'image_couverture'];
    public function getRouteKeyName(){
        return 'uuid';
    }


    public function crimes(){
        return $this->hasOne('App\Models\Crime','aire_protegee_id','id');
    }
    public function pays(){
        return $this->belongsTo('App\Models\Pay','pays_id','id');
    }
    

    
   
}
