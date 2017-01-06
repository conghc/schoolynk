<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class LocalizationController extends Controller
{
    public function changeLanguage(Request $request)
    {
    	// Get language
    	$language = $request->get('language');

    	if (\Session::has('locale')) {
           \Session::forget('locale');
        }

        // Set language for session
        \Session::put('locale', $language);

        return 1;
    }
}
