<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    protected $fillable = [
        'comentario_id', 'user_id'
    ];

    public function users()
    {
    	return $this->belongsTo('App\User');
    }
    public function comentarios()
    {
    	return $this->belongsTo('App\Comentario');
    }
}
