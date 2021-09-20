<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Config extends Model
{
    use HasFactory;

    public function edition(){
        return $this->belongsTo('App\Models\Date', 'edition_id');
    }
}
