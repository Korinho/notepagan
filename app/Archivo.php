<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Archivo extends Model
{
	protected $fillable = [
        'caso_id','url','nombre'
    ];

    //
    public function caso()
    {
        return $this->belongsTo('App\Archivo');
    }
}
