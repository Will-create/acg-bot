<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeUnite extends Model
{
    use HasFactory;
    protected $fillable = ['nom','description','uuid'];
    public function getRouteKeyName(){
        return 'uuid';
    }
    public function unites(){
        return $this->hasMany('App\Models\Unite','type_unite_id','id');
    }
}
