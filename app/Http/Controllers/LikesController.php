<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Illuminate\Support\Facades\Auth;

use App\Like;

class LikesController extends Controller
{
	public function store(Request $request)
	{
		$like = Like::create($request->all());
    	return $like->id;
	}
	public function destroy($id)
	{
		$like = Like::where(['comentario_id'=> $id, 'user_id'=> Auth::user()->id ])->get();
		$like[0]->delete();

	}
    //	
}
