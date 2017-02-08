<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Degree;
use App\TypeOfStudy;
use App\Major;
use App\Student;
use App\Faculty;
use App\FacultySchool;
use App\OtherText;
use App\Scholarship;
use Flash;
use DateTime;
use Auth;
use App\User;
use DB;
use Intervention\Image\ImageManagerStatic as Image;

class SchoolController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth.university', [ 'except' => ['studentSearch'] ]);
        // Set language session
        if (\Session::has('locale')) {
            \App::setLocale(\Session::get('locale'));
        } else {
            \App::setLocale(\Session::get('en'));
        }
    }

    public function index(Request $request, Major $major){
        $states = \CountryState::getStates('JP');
        $user = Auth::user();
        $majors = Major::has('school')->get();
        //$schools = User::has('schoolInfo');

        $from = $request->input('from',1);
        $to = $request->input('to',300);
        $typeSchool = $request->input('typeSchool','all');
        $keyword = $request->input('keyword','');
        $state = $request->input('state',0);
        $major_id = $request->input('major',0);

        $schools = User::whereHas('schoolInfo', function($query) use($from,$to, $state){
            $query->where('school_informations.ranking', '>=', $from);
            $query->where('school_informations.ranking', '<=', $to);
            if($state > 0){
                $query->where('school_informations.state','=', $state);
            }
        });
        if($major_id > 0){
            $schools = $schools->whereHas('major', function($query) use($major_id){
                $query->where('majors.id',$major_id);
            });
        }
        if($keyword != ''){
            $schools = $schools->where('name', 'LIKE', '%'. $keyword .'%');
        }
        if(in_array($typeSchool, ['university','vocational','language'])){
            $schools = $schools->where('school_type', 'LIKE', $typeSchool);
        }
        // If user logined
        if($user){
            // If user is student
            if( $user->role == 0){
                //return redirect()->route('student.index');
            }
            // If user is university
            if($user->role == 3){
                //return redirect()->route('university.index');
            }
        }
        $schools = $schools->paginate(3);

        if($request->ajax()){
            return view('school.ajax-list', compact('schools'))->render();
        }else{
            return view('school.index', compact('schools','states', 'majors'));
        }
    }
    
    public function listSchool(Request $request){
        $from = $request->input('from',1);
        $to = $request->input('to',300);
        $typeSchool = $request->input('typeSchool','all');
        $keyword = $request->input('keyword','');
        $state = $request->input('state',0);
        $major_id = $request->input('major',0);

        $schools = User::whereHas('schoolInfo', function($query) use($from,$to, $state){
            $query->where('school_informations.ranking', '>=', $from);
            $query->where('school_informations.ranking', '<=', $to);
            if($state > 0){
                $query->where('school_informations.state','=', $state);
            }
        });
        if($major_id > 0){
            $schools = $schools->whereHas('major', function($query) use($major_id){
                $query->where('majors.id',$major_id);
            });
        }
        if($keyword != ''){
            $schools = $schools->where('name', 'LIKE', '%'. $keyword .'%');
        }
        if(in_array($typeSchool, ['university','vocational','language'])){
            $schools = $schools->where('school_type', 'LIKE', $typeSchool);
        }
        $schools = $schools->where('role',4)->orderBy('id', 'DESC');

        $schools = $schools->paginate(3);

        return view('school.ajax-list', compact('schools'))->render();
    }

    public function listMajors(Request $request, Major $major){
        $typeSchool = $request->input('typeSchool','all');
        $state = $request->input('filterState',0);

        if($typeSchool != 'all'){
            $majors = $major->whereHas('school', function($query) use($typeSchool){
                $query->where('users.school_type', 'like', $typeSchool);
            });
        }else{
            $majors = $major->has('school');
        }

        if($state > 0){
            $majors = $majors->whereHas('school.schoolInfo', function($query){
                $query->where('school_informations.state',$state);
            });
        }

        $html = '<option value="0" selected>All</option>';
        $majors = $majors->get();
        foreach($majors as $major){
            $html .= '<option value="'. $major->id.'">'. $major->text .'</option>';
        }
        return $html;
    }

    public function detail($id){
        // Find schoolarship with id
        $school = User::with('schoolInfo');
        $school = $school->with('images');
        $school = $school->with('scholarships');
        $school = $school->with('texts');
        $school = $school->find($id);

        $admission = $student = $support = $others = [];
        if($school->texts){
            foreach($school->texts as $text){
                if($text->type == 'admission'){
                    $admission[] = $text;
                }elseif($text->type == 'student'){
                    $student[] = $text;
                }elseif($text->type == 'support'){
                    $support[] = $text;
                }elseif($text->type == 'others'){
                    $others[] = $text;
                }
            }
        }

        // get all school for google map
        $schools = User::has('schoolInfo')->get();
        $location = [];
        foreach($schools as $k=>$sc){
            if($sc->schoolInfo->longitude != '' && $sc->schoolInfo->latitude != ''){
                $location[$k]['school_id'] = $sc->schoolInfo->school_id;
                $location[$k]['longitude'] = $sc->schoolInfo->longitude;
                $location[$k]['latitude'] = $sc->schoolInfo->latitude;
            }
        }
        $scholarshipForAll = Scholarship::where('for_all_school',1)->get();
        $scholarshipForAll = $scholarshipForAll->count() > 0 ? $scholarshipForAll->toArray() : [];

        $scholarships = $school->scholarships->count() > 0 ? $school->scholarships->toArray() : [];

        $allScholarship = array_merge($scholarships, $scholarshipForAll);

        $faculty = Faculty::where('school_id',$id)->get();
        return view('school.detail', compact('allScholarship','faculty', 'location', 'school', 'admission', 'student', 'support', 'others'));
    }

    public function facultySchool(Request $request, FacultySchool $faSchool){
        $sType = $request->input('school_type', '');
        $sId = $request->input('school_id', 0);

        $faculty = $request->input('faculty', -1);
        $aLevel = $request->input('academic_level', '');
        $faculty = $faculty == '' ? -1 : $faculty;
        if($sType != 'vocational'){
            $faSchool = $faSchool->where('faculty_id', $faculty);
            if(in_array($aLevel, ['undergraduate', 'graduate'])){
                $faSchool = $faSchool->where('academic_level', 'LIKE', $aLevel);
            }
        }else{
            $faSchool = $faSchool->where('school_id', $sId);
        }

        $faSchool = $faSchool->get();
        $html ='';
        foreach($faSchool as $k=>$faS){
            $selected = $k==0 ? 'selected' : '';
            $html .= '<option value="'. $faS->id .'" '. $selected .'>'. $faS->name .'</option>';
        }
        return $html;
    }
    
    public function majorFilter(Request $request){
        $fa_school = $request->input('fa_school', 0);
        $fa_school = $fa_school == '' ? -1 : $fa_school;
        $major = Major::where('fs_id', $fa_school)->get();

        return view('school.major-filter', compact('major'))->render();
    }

    public function listText(Request $request){
        $fa_school = $request->input('fa_school', 0);
        $type = $request->input('type', 'admission');
        $text = OtherText::where('faculty_school_id', $fa_school)->where('type', 'LIKE', $type)->get();
        return view('school.list-text', compact('text'))->render();
    }
}
