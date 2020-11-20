<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeUnite extends Model
{
    use HasFactory;
    protected $fillable = ['nom',"uuid"];
    public function getRouteKeyName(){
        return 'uuid';
    }
}
