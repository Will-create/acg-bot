<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Date extends Model
{
    use HasFactory;
    protected $fillable = ['date_debut','date_fin','uuid', 'competition_id'];
    public function competition(){
        return $this->belongsTo('App\Models\Competition','competition_id', 'id');
    }
    public function matches(){
        return $this->hasMany('App\Models\Match', 'edition_id');
    }
    public function config(){
        return $this->hasOne('App\Models\Config', 'edition_id');
    }
}
