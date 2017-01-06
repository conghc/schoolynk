<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use App\Degree;
use App\Major;
use App\TypeOfStudy;
use App\Academic;
use CountryState;
use App\EducationAbroad;
use Flash;

class StudentController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Student Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Init degrees
        $degrees = Degree::lists('name', 'id');

        // Get all student
        $users = User::where('role', 0)->orderBy('created_at', 'desc')->get();

        // Init nationalities
        $nationalities = getNationalities();

        // Get countries
        $countries = \CountryState::getCountries();

        // Init majors
        $majors = Major::all();

        // Init type of studies
        $typeOfStudies = TypeOfStudy::all();

        // Init academics
        $academics = Academic::all();

        // Init states
        $states = CountryState::getStates('US');

        // Init langs
        $langs = getLanguages();

        // Init degrees
        $degrees = Degree::lists('name', 'id');

        // Init months
        $months = [['Jan','1'],['Feb','2'],['Mar','3'],['Apr','4'],['May','5'],['Jun','6'],['Jul','7'],['Aug','8'],['Sep','9'],['Oct','10'],['Nov','11'],['Dec','12']];

        return view('admin.student.index', compact('users', 'degrees', 'nationalities', 'months', 'countries', 'majors', 'typeOfStudies', 'academics', 'langs', 'states', 'degrees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display student detail
     * @param  Integer $id The student id
     * @return JsonRespinse     
     */
    public function show($id)
    {
        // Get user
        $user = User::find($id);

        // Get profile user
        $student = $user->student;

        // Get edication abroads of student
        $educationAbroads = EducationAbroad::where('user_id', $user->id)->get();

        // Get all states of user contry
        $states = CountryState::getStates($student->country);

        // Init states for student
        $student->state = ($student->state) ? $states[$student->state] : $student->state;
        // Init degrees
        $degrees = Degree::lists('name', 'id');

        // Degree student
        $student->degree = ($student->degree) ? $degrees[$student->degree] : $student->degree;

        // Init type of studies
        $typeOfStudies = TypeOfStudy::lists('name', 'id');

        // Type if study of student
        $student->type_of_study = ($student->type_of_study) ? $typeOfStudies[$student->type_of_study] : $student->type_of_study;

        // Init academics
        $academics = Academic::lists('name', 'id');

        // Academic of student
        $student->academic = ($student->academic) ? $academics[$student->academic] :  $student->academic;

        // Init majors
        $majors = Major::lists('name', 'id');

        // Set value majors for student
        $student->majors = '';

        if ($student->major) {
            foreach ($student->major as $key => $value) {
                if ($key == 0 || $key == count($student->major)) {
                    $student->majors .= $majors[$value];
                } else {
                    $student->majors .= ', ' . $majors[$value];
                }
            }
        }

        // Get countries
        $countries = \CountryState::getCountries();

        // Get education abroads of user
        $educationAbroads = EducationAbroad::where('user_id', $user->id)->get();

        // Each education abroad
        if ($educationAbroads) {
            foreach ($educationAbroads as $index => &$education) {
                $education->country_interested = $countries[$education->country_interested];
            }
        }

        // Init array language student
        $languagesStudent = $student->language;

        // Init langs
        $langs = getLanguages();
        
        // Each student language
        if ($languagesStudent) {
            foreach ($languagesStudent as $key2 => &$lang) {
                $lang[0] = $langs[$lang[0]];
            }
        }

        $student->language = $languagesStudent;

        return new JsonResponse(['user' => $user, 'student' => $student, 'educationAbroads' => $educationAbroads, 'countries' => $countries]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->student->delete();
        $user->delete();
        return redirect()->route('admin.student.index');
    }
}
