<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Menu extends Model
{
    use HasFactory;
    protected $fillable=[
        'uuid',
        'nom',
        'description',
        'parent_id',
        'parent_uuid',
        'type_menu_id',
    ];
    public function getRouteKeyName(){
        return 'uuid';
    }
    public static function parent($uuid){
        $menu = DB::table('menus')->where('uuid',$uuid)->first();
        $parents = DB::table('menus')->where('type_menu_id',1)->get();
        foreach($parents as $p){
            if($p->id ==$menu->parent_id && $p->uuid == $menu->parent_uuid){
                return $p;
            }
        }
    }
    public function sousmenus(){
        return $this->hasMany('App\Models\Menu','parent_uuid','uuid');
    }
    public function sms(){
        return $this->hasMany('App\Models\Sms','menu_id','id');
    }
    public function type(){
        return $this->belongsTo('App\Models\TypeMenu','type_menu_id','id');
    }
    public function operateurs(){
        return $this->belongsToMany(Operateur::class,'menu_operateurs','menu_id','operateur_id');
    }
    
}
