<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Message extends Model
{
    use HasFactory;

    protected $fillable = [
        'content',
        'slug',
        'user_id',
       ];
       public function sluggable()
       {
           return [
               'slug' => [
                   'source' => 'content'
               ]
           ];
       }
}
