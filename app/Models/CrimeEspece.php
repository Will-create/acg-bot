<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CrimeEspece extends Model
{
    use HasFactory;
    protected $fillable = ['crime_id', 'espece_id', 'uuid'];

    public function crime()
    {
        return $this->belongsTo(Crime::class);
    }
    public function espece()
    {
        return $this->belongsTo(Espece::class);
    }
}
