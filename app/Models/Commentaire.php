<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commentaire extends Model
{
    use HasFactory;
    protected $fillable = ['uuid', 'par', 'sms_id', 'par', 'commentaire'];
    public function getRouteKeyName(){
        return 'uuid';
    }

    public function auteur(){
        return $this->belongsTo('App\Models\User','par','id');
    }
    


    public function sms(){
        return $this->belongsTo('App\Models\Sms','sms_id','id');
    }

}
