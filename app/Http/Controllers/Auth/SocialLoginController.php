<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Auth;

class SocialLoginController extends Controller
{
	public function __construct()
	{
	    $this->middleware(['guest']);
	}

	public function redirect($service, Request $request)
	{
	    return Socialite::driver($service)->redirect();
	}

	

	public function callback($service, Request $request)
	{
	    $serviceUser = Socialite::driver($service)->user();


	    $user = $this->getExistingUser($serviceUser, $service);

	    if (!$user) {
	        $user = User::create([
	            'name' => $serviceUser->getName(),
	            'email' => $serviceUser->getEmail(),
	            'avatar' => $serviceUser->getAvatar(),
	            'password' => $this->generateBcryptRandomPassword(),
	        ]);
	    }

	    if ($this->needsToCreateSocial($user, $service)) {
	        $user->social()->create([
	            'social_id' => $serviceUser->getId(),
	            'service' => $service
	        ]);
	    }

	    Auth::login($user);

	    return redirect()->intended();
	}

	protected function needsToCreateSocial(User $user, $service)
	{
	    return !$user->hasSocialLinked($service);
	}

	protected function getExistingUser($serviceUser, $service)
	{
	    return User::where('email', $serviceUser->getEmail())->orWhereHas('social', function ($q) use ($serviceUser, $service) {
	        $q->where('social_id', $serviceUser->getId())->where('service', $service);
	    })->first();
	}


	protected function generateBcryptRandomPassword() {
	  //Initialize the random password
	  $password = '';

	  //Initialize a random desired length
	  $desired_length = rand(8, 12);

	  for($length = 0; $length < $desired_length; $length++) {
	        //Append a random ASCII character (including symbols)
	        $password .= chr(rand(32, 126));
	    }

	    return bcrypt($password);
	}  


}
