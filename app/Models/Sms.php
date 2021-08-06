<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sms extends Model
{
    use HasFactory;
    protected $fillable=[
        'uuid',
        'nom',
        'fournisseur',
        'api_id',
        'api_uuid',
        'contenu_entree',
    ];
    public function getRouteKeyName(){
        return 'uuid';
    }
    public function commentaires(){
        return $this->hasMany('App\Models\Commentaire','sms_id','id');
    }
}
