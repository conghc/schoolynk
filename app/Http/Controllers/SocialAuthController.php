<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Socialite;
use App\User;
use App\Student;
use Auth;
use Flash;

class SocialAuthController extends Controller
{
	//redirect our users to the social
    public function redirect($provider)
    {
    	//call oauth from social
        return Socialite::driver($provider)->redirect();
    }

    //handle callback from social
    public function callback(Request $request, $provider)
    {
        // if(!$request->input('code')){
        //     Flash::error('An error occurred. Please login again!');
        //     return redirect('/');
        // }

    	//get user info from social
        $userRespone = Socialite::driver($provider)->user();

        //check null email
        if(!$userRespone->email){
        	Flash::error('Your social network account must have an email address.');
        	return redirect('/');
        }

        //checking email existed
        $email = $userRespone->email;
        $user = User::where('email', $email)->first();
        if($user){
        	Auth::login($user);
        	return redirect()->route('student.index');
        }

        //email not existed, create user
        $rqUser['email'] = $userRespone->email;
        $rqUser['name'] = $userRespone->name;
        $rqUser['last_name'] = $userRespone->name;
        $rqUser['password'] = bcrypt('default');	//hardcode password='default'
        $rqUser['remember_token'] = str_random(60);
        $rqUser['activate_token'] = str_random(60);
        $user = User::create($rqUser);
        
        //hardcode some require infos, then create student
        $rqStudent['user_mode'] = 0;
        $rqStudent['gender'] = 1;
        $rqStudent['nationality'] = 'Albanians';
        $rqStudent['user_id'] = $user->id;
        $rqStudent['birthday'] = '1990-01-01';
        $rqStudent['is_verify'] = 1;
        $rqStudent['avatar'] = $userRespone->avatar;
        $student = Student::create($rqStudent);
        
        //log the user in
        Auth::login($user);

        //redirect to result page
        return redirect()->route('student.register-3');
    }
}
