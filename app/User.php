<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name', 'email', 'password','provider_id','avatar'
    ];


    public function casos()
    {
        return $this->hasMany('App\Caso');
    }

    public function comentarios()
    {
        return $this->hasMany('App\Comentario');
    }

    public function likes()
    {
        return $this->hasMany('\App\Like');
    }

    protected $hidden = [
        'password', 'remember_token',
    ];
}
