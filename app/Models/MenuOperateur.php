<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuOperateur extends Model
{
    use HasFactory;
    protected $fillable = ['menu_id', 'operateur_id', 'uuid'];

    public function getRouteKeyName(){
        return 'uuid';
    }
    public function menu()
    {
        return $this->belongsTo(Menu::class);
    }
    public function operateur()
    {
        return $this->belongsTo(Operateur::class);
    }
}
