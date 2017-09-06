<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Session;

class MessagesController extends Controller
{
    //
    public function simple(Request $request)
    {
    	Session::flash($request->type, $request->message);
    	
    	return;
    }
}
