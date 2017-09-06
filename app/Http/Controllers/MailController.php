<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Illuminate\Support\Facades\Auth;

use App\Mail\Invitation;

use Mail;
class MailController extends Controller
{
    //
    public function invita(Request $request)
    {
    	$email = new Invitation(Auth::user()->name, $request->msg);
    	$result = Mail::to($request->email)->send($email);
    	if($result == null)
    		return "success";
    }
}
