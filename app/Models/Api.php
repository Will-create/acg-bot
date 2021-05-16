<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Api extends Model
{
    use HasFactory;
    public function getRouteKeyName()
    {
        return 'uuid';
    }


    public function menu(){
        return $this->belongsTo('App\Models\Menu','menu_id','id');
    }
    public function sms(){
        return $this->hasMany('App\Models\Sms','api_id','id');
    }
}
