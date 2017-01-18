<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Student;
use App\Favorite;
use App\Scholarship;
use App\Message;
use App\Academic;
use App\Degree;
use App\OranizationType;
use App\TypeOfStudy;
use Auth;

class ScholarShipController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Schoolarship Controller
    |--------------------------------------------------------------------------
    |
    | This controller renders your application's "dashboard" for users that
    | are authenticated. Of course, you are free to change or remove the
    | controller as you wish. It is just here to get your app started!
    |
    */

    public function __construct()
    {
        // Set language session
        if (\Session::has('locale')) {
            app()->setLocale(\Session::get('locale'));
        } else {
            app()->setLocale(\Session::get('en'));
        }
    }

    public function index(Scholarship $scholarship)
    {
        $scholarships = $scholarship->get();

        return view('scholarship.index', compact('scholarships'));
    }

    /**
     * Display the specified resource.
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function detail($id)
    {
        // Find schoolarship with id
        $scholarship = Scholarship::find($id);

        
        return view('scholarship.detail', compact('schoolarship'));
    }

    /**
     * Show list favorite of student
     * @param  Integer $id The student id
     * @return Void     
     */
    public function listPage($categoryId) 
    {
        // Get list schoolarship with category id
        $schoolarships = Schoolarship::where('category', $categoryId)->paginate(5);
        
        // Init covering cost
        $converingCosts = array('1' => 'School', '2' => 'Dorm', '3' => 'Orthers');

        // Init amount paid array
        $amountPaids = array('Monthly' => '/月', 'Annually' => '/年', 'One shot' => '');

        // Init process array
        $process = array('1' => 'Document screening', '2' => 'Interview', '3' => 'Examination');

        // Get countries
        $countries = \CountryState::getCountries();

        // Init competitions
        $competitions = array('1' => 'easy', '2' => 'medium', '3' => 'difficult');

        return view('scholarship.list-page', compact('converingCosts', 'amountPaids', 'process', 'countries', 'competitions'))->withSchoolarships($scholarships);
    }

    private function getUnmessage($studentID){
        $messages = Message::where('student_id', $studentID)
                            ->where('mode', 0)->where('status', 0)->get();
        return $messages->count();
    }
}
