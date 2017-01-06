<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Language;

class LanguageController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Language Controller
    |--------------------------------------------------------------------------
    |
    | This controller renders your application's "dashboard" for users that
    | are authenticated. Of course, you are free to change or remove the
    | controller as you wish. It is just here to get your app started!
    |
    */

    public function __construct()
    {
        $this->middleware('auth');

        // Set language session
        if (\Session::has('locale')) {
            app()->setLocale(\Session::get('locale'));
        } else {
            app()->setLocale(\Session::get('jp'));
        }
    }

    /**
     * Show lists
     * @return Response
     */
    public function index()
    {
    	// Get all languages
    	$languages = Language::all();

    	return view('admin.language.index', compact('languages'));
    }

    /**
     * Show the form for creating a new.
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $language = new Language();
        return view('admin.language.create', compact('language'));
    }

    /**
     * Show the form for edit.
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $language = Language::findOrFail($id);
        return view('admin.language.create', compact('language'));
    }
}
