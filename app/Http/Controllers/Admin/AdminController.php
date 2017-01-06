<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use Flash;
use App\User;

class AdminController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if ( $user && $user->role != 1) {
            return redirect()->route('index');
        }

        return view('admin.index');
    }
    
    public function login(Request $request)
    {
        $requests = $request->all();
        
        if (Auth::attempt( ['email' => $requests['email'], 'password' => $requests['password']])) {

            $user = Auth::user();
            if ($user->role == 1 || $user->role == 2) {
                Flash::success('Login success! Welcome '.$user->name);
            } else {
                Auth::logout();
                Flash::warning('You don\'t have permistion!');
            }
                
        } else {
            Flash::error('Email or password incorrect!');
        }

        // return view('admin.index');
        return redirect()->route('admin.index');
    }
    
    public function logout()
    {
        Auth::logout();
        Flash::info('You have been signed out!');
        return redirect()->route('admin.index');
    }
    
}
