<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Competition extends Model
{
    use HasFactory;
    protected $fillable = ['competition','federation','description','uuid'];
    public function editions(){
        return $this->hasMany('App\Models\Date', 'competition_id');
    }
}
