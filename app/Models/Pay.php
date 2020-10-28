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

    public function villes(){
        return $this->hasMany('App\Models\Ville', 'pays_id');
    }
    public function unites(){
        return $this->hasMany('App\Models\Unite','pays_id');
    }
}
