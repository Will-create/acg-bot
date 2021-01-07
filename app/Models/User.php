<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    public function getRouteKeyName(){
        return 'uuid';
    }
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'uuid', 'nom', 'prenom', 'role_id', 'unite_id', 'actif', 'titre', 'localite_id', 'email', 'tel', 'pay_id' ,'email_verified_at', 'password', 'current_team_id', 'profile_photo_path', 'remember_token'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function role()
    {
        return $this->belongsTo('App\Models\Role', 'role_id', 'id');
    }
    public function unite()
    {
        return $this->hasOne('App\Models\Unite', 'responsable_id', 'id');
    }
    public function localite()
    {
        return $this->belongsTo('App\Models\Localite', 'localite_id', 'id');
    }
    public function pays()
    {
        return $this->belongsTo('App\Models\Pay', 'pay_id','id');
    }
}
