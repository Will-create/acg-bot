<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Operateur extends Model
{
    use HasFactory;
    protected $fillable=[
        'uuid',
        'nom',
        'pays',
        'iso_pays',
        'logo',
        'description',
    ];
    public function getRouteKeyName(){
        return 'uuid';
    }
    public function menus(){
        return $this->belongsToMany(Menu::class,'menu_operateurs','operateur_id','menu_id');
    }

}
