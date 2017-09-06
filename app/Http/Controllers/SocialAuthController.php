<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Socialite;

use App\User;


class SocialAuthController extends Controller
{
    //
    public function redirect()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function callback()
    {    	
    	$providerUser = $this->findOrCreateFacebookUser(
    		Socialite::driver('facebook')->user()
		);

        auth()->login($providerUser);

        return redirect()->to('/');
    }
    public function logout()
    {
        auth()->logout();

        return redirect('/');
    }

    protected function findOrCreateFacebookUser($facebookUser)
    {
    	$user = User::FirstOrNew(['provider_id' => $facebookUser->id]);

    	if($user->exists) return $user;

    	$user->fill([
    		'name'		=>	$facebookUser->name,
    		'email'		=> 	$facebookUser->email,
    		'avatar'	=> 	$facebookUser->avatar
		])->save();

		return $user;
    }


}
