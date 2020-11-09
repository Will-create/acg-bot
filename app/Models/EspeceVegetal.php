<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EspeceVegetal extends Model
{
    use HasFactory;
    protected $fillable=[
        'nom',
        'uuid',
        'photo',
        'famille',
        'nom_scientifique'
    ];
}
