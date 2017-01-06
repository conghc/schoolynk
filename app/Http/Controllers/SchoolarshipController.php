<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Student;
use App\Favorite;
use App\Schoolarship;
use App\Message;
use App\Academic;
use App\Degree;
use App\OranizationType;
use App\TypeOfStudy;
use Auth;

class SchoolarShipController extends Controller
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

    /**
     * Display the specified resource.
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function detail($id)
    {
        // Find schoolarship with id
        $schoolarship = Schoolarship::find($id);

        // Get countries
        $countries = \CountryState::getCountries();

        // Nationalities and states of schoolarship
        $countriesSchoolarship = $schoolarship->nationality;
        $provincesSchoolarship = '';
        foreach ($countriesSchoolarship as $key => &$value) {

            $listStates1 = file_get_contents(url('/') . '/country-state/get-states/' . $value);

            $array = json_decode($listStates1, true);

            foreach ($array as $index => $val) {
                $listStates1 = $val;
            }

            if (!is_numeric($schoolarship->state[$key])) continue;
            
            if ($key == 0) {
                $provincesSchoolarship .= $listStates1[$schoolarship->state[$key]];
            } else {
                $provincesSchoolarship .= ', ' . $listStates1[$schoolarship->state[$key]];
            }

            $value = $countries[$value];
        }

        // Init process array
        $process = array('1' => 'Document screening', '2' => 'Interview', '3' => 'Examination');

        // Init amount paid array
        $amountPaids = array('Monthly' => '/月', 'Annually' => '/年', 'One shot' => '');

        // Get list academics
        $academics = Academic::lists('name', 'id');

        // Init gender
        $genders = array('1' => 'Male', '2' => 'Female', '3' => 'All');

        // Init covering cost
        $converingCosts = array('1' => 'School', '2' => 'Dorm', '3' => 'Orthers');

        // Init degrees
        $degrees = Degree::lists('name', 'id');

        // Init list Major
        $majors = \App\Major::lists('name', 'id')->toArray();

        // Init oranization type
        $oranizationTypes = OranizationType::lists('name', 'id');

        // Get list type of studies
        $typeOfStudies = TypeOfStudy::lists('name', 'id')->toArray();

        $educations = '';
        foreach ($schoolarship->education as $key => $value) {
            // dd($value);
            if ($key == 0) {
                $educations .= $typeOfStudies[$value];
            } else {
                $educations .= ', ' . $typeOfStudies[$value];
            }
        }

        // Get list states
        $states = array();
        foreach ($schoolarship->destination_country as $key => $value) {

            if ($value == 'all') continue;

            // Get states of country
            $listStates = @file_get_contents(url('/') . '/country-state/get-states/' . $value);

            // If invalid states
            if (!$listStates) continue;
            
            $listStates = json_decode($listStates, true);
            if ($schoolarship->destination_state[$key] == 'all') continue;
            $states[] = $listStates['states'][$schoolarship->destination_state[$key]];
        }

        if(!empty($schoolarship)) {
            return view('scholarship.detail', compact('mgsUnread', 'schoolarship', 'countries', 'process', 'amountPaids', 'academics', 'genders', 'educations', 'converingCosts', 'degrees', 'listCountryStates', 'states', 'majors', 'oranizationTypes', 'provincesSchoolarship'));
        }
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
