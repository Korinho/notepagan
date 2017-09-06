<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{

	protected $fillable = [
        'caso_id', 'comentario', 'user_id'
    ];
    public function likes()
    {
    	return $this->hasMany('App\Like');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
