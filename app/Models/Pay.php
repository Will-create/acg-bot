<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pay extends Model
{
    use HasFactory;

    protected $fillable=['nom','uuid','icone'];
    public function getRouteKeyName(){
        return 'uuid';
    }

    public function localites(){
        return $this->hasMany('App\Models\Localite', 'pays_id');
    }
    public function users(){
        return $this->hasMany('App\Models\User', 'pay_id','id');
    }
    public function unites(){
        return $this->hasMany('App\Models\Unite','pays_id');
    }
    public function crimes(){
        return $this->hasMany('App\Models\Crime','pays_apprehension','id');
    }
    public function aireProtegees(){
        return $this->hasMany('App\Models\AireProtegee','pays_id','id');
    }
}

