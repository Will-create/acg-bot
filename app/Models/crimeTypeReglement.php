<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class crimeTypeReglement extends Model
{
    use HasFactory;
    protected $fillable = [ 'mode_id', 'suite_id' , 'auteur_id', 'amende', 'crime_id'];
    public function mode()
    {
        return $this->belongsTo(ModeReglement::class,  'mode_id', 'id');
    }
    public function suite()
    {
        return $this->belongsTo(DecisionJustice::class, 'suite_id', 'id');
    }
    public function crime()
    {
        return $this->belongsTo(Crime::class);
    }
    public function auteur()
    {
        return $this->belongsTo(CrimeAuteur::class);
    }
}
