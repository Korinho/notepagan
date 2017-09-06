<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Deudor extends Model
{
	protected $fillable = [
        'nombre', 'tipo', 'total_deudas','logo'
    ];

    //
    public function casos()
    {
        return $this->hasMany('App\Caso');
    }

    public function scopeSearchByType($query, $keyword, $type)
    {
        if ($keyword!='') {
            $query->where(function ($query) use ($keyword, $type) 
            {
                $query  ->where("nombre", "LIKE", "%$keyword%")
                		->where("tipo",'=',$type)
                		->orWhere('total_deudas', "LIKE", "%$keyword%");
            });
        }
        return $query;
    }


}
