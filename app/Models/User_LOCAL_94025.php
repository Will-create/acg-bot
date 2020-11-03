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
        'uuid', 'nom', 'prenom', 'role_id', 'unite_id', 'pay_id','actif', 'titre', 'ville_id', 'email', 'tel', 'email_verified_at', 'password', 'current_team_id', 'profile_photo_path', 'remember_token'
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

    public function unites(){
        return $this->hasMany('App\Models\Unite');
    }
    public function role()
    {
        return $this->hasOne(Role::class, 'id', 'role_id');
    }
    public function unite()
    {
        return $this->belongsTo(Unite::class);
    }
    public function ville()
    {
        return $this->belongsTo(Ville::class, 'id', 'ville');
    }
}
