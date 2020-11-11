<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeCrime extends Model
{
    use HasFactory;
    protected $fillable = ['nom','uuid','description'];
    public function getRouteKeyName(){
        return 'uuid';
    }
}
