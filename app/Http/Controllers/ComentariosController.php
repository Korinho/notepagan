<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Comentario;

class ComentariosController extends Controller
{
    //
    public function store(Request $request)
    {
    	$comentario = Comentario::create($request->all());
    	return $comentario->id;
    }
    public function show($id)
    {
    	$comentario = Comentario::find($id);
    	return $comentario;
    }
    public function all($idCaso)
    {

    	$comentarios = Comentario::where(['caso_id' => $idCaso])
                ->with(['user','likes'])
                ->orderBy('created_at','desc')
                ->get();

    	return $comentarios;
    }
}
