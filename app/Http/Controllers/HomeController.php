<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Auth;
use Flash;
use App\Degree;
use App\Major;
use App\Scholarship;
use App\User;
use DB;
use Intervention\Image\ImageManagerStatic as Image;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // Set language session
        if (\Session::has('locale')) {
            \App::setLocale(\Session::get('locale'));
        } else {
            \App::setLocale(\Session::get('en'));
        }

        // $url = 'http://ipinfo.io/' . $_SERVER['REMOTE_ADDR'] . '/json';
        // $details = json_decode(file_get_contents($url));

        // // Set language
        // \App::setLocale(\Session::get('locale'));

        // if (isset($details->country)) {
        //     $language = strtolower($details->country);
        //     if (in_array($language, array('cnt', 'en', 'jp', 'kr', 'sp', 'th', 'vi'))) {
        //         // Set language
        //         \App::setLocale($language);
        //     }
        // } 
    }
        
    public function logout()
    {
        Auth::logout();
        Flash::info('You have been signed out!');
        return redirect('/');
    }
    
    public function login(Request $request)
    {
        $requests = $request->all();
        if ($request->isMethod('post')) {
            if (Auth::attempt(['email' => $requests['email'], 'password' => $requests['password']])) {
                $user = Auth::user();
                // If user login not student
                if ($user->role != 0) {
                    Auth::logout();
                    Flash::error('The email and password incorrect.');
                } else {
                    //Flash::success('Login success! Welcome ' . $user->name);
                    return redirect('/');
                }
            } else {
                Flash::error('The email and password incorrect.');
            }
        }
        return view('auth.login', compact('scholarship', 'countries', 'states'));
    }
    
    /**
     * Show home page
     * @return View 
     */
    public function index($localization = null)
    {
        $user = Auth::user();

        $schools = User::with('schoolInfo')->where('role',4)->get();
        
        // If user logined
        if($user){

            // If user is student
            if( $user->role == 0){ 
                //return redirect()->route('student.index');
            }

            // If user is university
            if($user->role == 3){
                return redirect()->route('university.index');
            }
        }
        return view('welcome', compact('schools'));
        //return view('welcome');
    }

    public function detail($id){
        // Find schoolarship with id
        $school = User::find($id);


        return view('school.detail', compact('school'));
    }

    public function home()
    {
        return redirect('/');
    }

    public function getStudentImage($file)
    {
        // configure with favored image driver (gd by default)
        // Image::configure(array('driver' => 'imagick'));

        $img = Image::make('images/students/'.$file);
        $imgW = $img->width();
        $imgH = $img->height();

        $w = $imgW < 200 ? $imgW : 200;
        $h = $imgH < 200 ? $imgH : 200;
        $x = $imgW > 200 ? ( ($imgW / 2) - 100 ) : 0;
        $y = $imgH > 200 ? ( ($imgH / 2) - 100 ) : 0;
        // dd($img->width());
        $img->crop( intval($w), intval ($h), intval ($x), intval ($y) );
        return $img->response();
    }
}
