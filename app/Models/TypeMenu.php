<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeMenu extends Model
{
    use HasFactory;
    protected $fillable = ['nom','description','uuid'];
    public function getRouteKeyName(){
        return 'uuid';
    }
    public function menus(){
        return $this->hasMany('App\Models\Menu','type_menu_id','id');
    }
}
