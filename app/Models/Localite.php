<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Localite extends Model
{
    use HasFactory;

    protected $fillable=['nom','uuid','pays_id'];
    public function getRouteKeyName(){
        return 'uuid';
    }

    public function pay(){
        return $this->belongsTo('App\Models\Pay','pays_id', 'id');
    }
    public function unites(){
        return $this->hasMany('App\Models\Unite','localite_id', 'id');
    }
    public function crimes(){
        return $this->hasMany('App\Models\Crime','localite_apprehension', 'id');
    }
    
}
