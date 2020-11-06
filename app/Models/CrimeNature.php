<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CrimeNature extends Model
{
    use HasFactory;
    protected $fillable=['uuid','nature'];
    public function getRouteKeyName(){
        return 'uuid';
    }
}
