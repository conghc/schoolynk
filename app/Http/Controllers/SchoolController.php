<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Degree;
use App\TypeOfStudy;
use App\Major;
use App\Student;
use App\Message;
use Flash;
use DateTime;
use Auth;

class SchoolController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth.university', [ 'except' => ['studentSearch'] ]);
    }

    public function index(){
    	$nationalities = getNationalities();
    	$countries = \CountryState::getCountries();
    	$degrees = Degree::all();
    	$typeOfStudies = TypeOfStudy::all();
    	$majors = Major::all();
    	return view('university.index', compact('nationalities', 'countries', 'degrees', 'typeOfStudies', 'majors'));
    }

    public function mail(){
        $university = Auth::user()->university;
        $messages = Message::with('student.user')
                    ->where('university_id', $university->id)
                    ->where('mode', 1)
                    ->orderBy('created_at', 'desc')->get();
        return view('university.mail', compact('messages') );
    }

    public function studentSearch(Request $request){
        $requests = $request->all();

        // TODO; QA - Study abroad start year
        $studentQuery = Student::with('user', 'user.educations', 'degree', 'typeOfStudy');
        if ( isset($requests['nationality']) && $requests['nationality'] )
            $studentQuery->whereIn('nationality', $requests['nationality'] );
        if ( isset($requests['gender']) && $requests['gender'] )
            $studentQuery->where('gender', $requests['gender'] );
        if ( isset($requests['degree']) && $requests['degree'] )
            $studentQuery->whereIn('degree', $requests['degree'] );
        if ( isset($requests['type_of_study']) && $requests['type_of_study'] )
            $studentQuery->whereIn('type_of_study', $requests['type_of_study']);

        $students = $studentQuery->get();

        // Check if isset condition to filter

        $students = $students->filter(function ($student) use($requests){
            $checkMinAge = true;
            $checkMaxAge = true;
            $checkCountry = true;
            $checkMajor = true;
            $isStudent = true;
            if(isset($requests['country_interested']) && $student->user){
                $checkCountry = false;
                foreach ($student->user->educations as $education) {
                    if ( in_array($education->country_interested, $requests['country_interested']) ) $checkCountry = true;
                }
            }
            if($requests['min_age'])
                $checkMinAge = $student->age > $requests['min_age'];

            if($requests['max_age'])
                $checkMaxAge = $student->age < $requests['max_age'];

            if(isset($requests['major'])){
                $checkMajor = false;
                if($student->major){
                    foreach ($student->major as $major) {
                        if ( in_array($major, $requests['major']) ) $checkMajor = true;
                    }
                }
            }

            if($student->user && $student->user->role!=0) $isStudent = false;
            
            return $checkMinAge && $checkMaxAge && $checkCountry && $checkMajor && $isStudent;
        });

        return response()->json($students->toArray());
    }

    public function sendMessage(Request $request){
        $data = $request->only('student_id', 'university_id', 'title', 'message');
        if ($request->file('file') && $request->file('file')->isValid()) {
            $file = $request->file('file');
            $timestamp = (new DateTime())->getTimestamp();
            $newName = $timestamp.'__'.$file->getClientOriginalName();
            $request->file('file')->move('files', $newName);
            $data['file'] = '/files/'. $newName;
        }
        $data['mode'] = 0; // mode == 0: university send to student.
        $rs = Message::create($data);

        if($rs) Flash::success('Your message has been sent');
        else Flash::erro('Some thing error, please try again');

        return redirect()->route('university.mail');        
    }
}
