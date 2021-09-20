<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Match extends Model
{
    use HasFactory;
    public function edition(){
        return $this->belongsTo('App\Models\Date','edition_id', 'id');
    }
    public function events(){
        return $this->hasMany('App\Models\Event', 'match_id');
    }
}
