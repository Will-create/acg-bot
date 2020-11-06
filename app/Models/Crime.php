<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Crime extends Model
{
    use HasFactory;

    protected $fillable=['uuid','date','adressse','veto','crime_nature_id','ville_id','pays_id','user_id'];
    public function getRouteKeyName(){
        return 'uuid';
    }
    
}
