<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Caso extends Model
{
	protected $fillable = [
        'user_id', 'deudor_id', 'titulo', 'adeudo', 'descripcion'
    ];

    //
    public function archivos()
    {
    	return $this->hasMany('App\Archivo');
    }

    public function usuario()
    {
        return $this->belongsTo('App\User');
    }

    public function deudor()
    {
        return $this->belongsTo('App\Deudor');
    }

    public function comentarios()
    {
        return $this->hasMany('App\Comentario');
    }
    public function scopeSearchTitle($query, $keyword)
    {
        if ($keyword!='') {
            $query->where(function ($query) use ($keyword) {
                $query  ->where("titulo", "LIKE", "%$keyword%");
            });
        }
        return $query;
    }

    public function scopeSearch($query, $keyword)
    {
        if ($keyword!='') {
            $query->where(function ($query) use ($keyword) 
            {
                $query  ->where("titulo", "LIKE", "%$keyword%")
                        ->orWhere('adeudo', "LIKE", "%$keyword%")
                        ->orWhere('descripcion', "LIKE", "%$keyword%");
            });
        }
        return $query;
    }



}
