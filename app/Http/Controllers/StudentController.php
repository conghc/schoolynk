<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User as User;
use App\Student as Student;
use App\Degree;
use App\Major;
use App\EducationAbroad;
use App\TypeOfStudy;
use App\Academic;
use App\Schoolarship;
use App\University;
use App\Message;
use App\Favorite;
use Auth;
use Flash;
use Mail;
use DateTime;
use View;

class StudentController extends Controller
{
    public function __construct()
    {
        // Set language
        \App::setLocale(\Session::get('locale'));
        
        $this->middleware('auth.student', [ 'except' => ['register', 'updateProfile', 'store', 'universitySearch', 'activate'] ]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        // Query schoolarships by: age, nationality, state, current education, education, academic
        $schoolarships = Schoolarship::where(function ($query) use ($user) {
            $query
                ->where('min_age', '<=', $user->student->age)
                ->where('max_age', '>=', $user->student->age)
                ->where('nationality', 'LIKE', '%'.$user->student->country.'%')
                ->where('state', 'LIKE', '%'.$user->student->state.'%')
                ->where('current_education', 'LIKE', '%'.$user->student->degree.'%')
                ->where('education', 'LIKE', '%'.$user->student->type_of_study.'%')
                ->where('academic', 'LIKE', '%'.$user->student->academic.'%');
        })->paginate(15);
        
        // Filter by gender, major, intersted country
        $schoolarships = $schoolarships->filter(function ($item) use ($user) {
            $hasGender = $item->gender == $user->student->gender || $item->gender == 2;
            $hasMajor = false;
            $hasEducationAbroad = true;    // Interested country
            if ($user->student->major) {
                foreach ($user->student->major as $major) {
                    if ( in_array($major, $item->major) ) $hasMajor = true;
                }
            }else{
                // Default null is No relevant
                $hasMajor = true;
            }
            
            foreach($user->educations as $education){
                if ( in_array($education->country_interested, $item->destination_country) ) $hasEducationAbroad = true;    
            }
            return $hasGender && $hasMajor && $hasEducationAbroad;

        })->values();

        $count = $schoolarships->count();
        
        $nonRefun = $schoolarships->filter(function ($item) {
            return $item->type == 'Non-refundable';
        })->values();
        $refun = $schoolarships->filter(function ($item) {
            return $item->type == 'Refundable(No interest)';
        })->values();

        $refunwith = $schoolarships->filter(function ($item) {
            return $item->type == 'Refundable(With interest)';
        })->values();

        // Get lists id schoolarship of user
        $listSchoolarIds = Favorite::where('student_id', \Auth::user()->id)->lists('schoolarship_id')->toArray();

        // Get schoolarships
        $favoriteSchoolarships = Schoolarship::whereIn('id', array_values($listSchoolarIds))->get();
        
        $mgsUnread = $this->getUnmessage($user->student->id);
        return view('student.index', compact('schoolarships', 'nonRefun', 'refun', 'refunwith', 'count', 'mgsUnread', 'favoriteSchoolarships'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return redirect('/');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $email = $request->only('email')['email'];

        // If email is exists in system
        if( User::where('email', $email )->first() ){
            Flash::error('email_exists');
            return redirect()->route('student.register');
        }

        // Save user
        $rqUser = $request->only('email', 'name', 'last_name', 'password');
        $rqUser['password'] = bcrypt($rqUser['password']);
        $rqUser['remember_token'] = str_random(60);
        $rqUser['activate_token'] = str_random(60);
        $user = User::create($rqUser);
        // Save user profile
//        $rqStudent = $request->only( 'user_mode', 'gender');
//        $rqStudent['user_id'] = $user->id;
//        $rqStudent['birthday'] = $request->only('year')['year'].'-'.$request->only('month')['month'].'-'.$request->only('day')['day'];
//        $student = Student::create($rqStudent);
        
        // Login user
        Auth::login($user);

        $rs = 0;
        try {
            // Send email to user register
//            $rs = Mail::send('emails.active', ['user' => $user], function ($m) use ($request) {
//                $m->to($request['email'])->subject('【SchooLynk】マイアカウント認証メール');
//            });
        } catch (\Swift_TransportException $e) {
            //Flash::error($e->getMessage());
        } catch (\Swift_RfcComplianceException $e) {
            //Flash::error($e->getMessage());
        }

        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        $user = Auth::user();
        $nationalities = getNationalities();
        $months = [['Jan','1'],['Feb','2'],['Mar','3'],['Apr','4'],['May','5'],['Jun','6'],['Jul','7'],['Aug','8'],['Sep','9'],['Oct','10'],['Nov','11'],['Dec','12']];
        $degrees = Degree::all();
        $majors = Major::all();
        $typeOfStudies = TypeOfStudy::all();
        $academics = Academic::all();
        $countries = \CountryState::getCountries();
        $states = \CountryState::getStates($user->student->country);
        $langs = getLanguages();
        $mgsUnread = $this->getUnmessage($user->student->id);
        return view('student.profile', compact('user','months', 'nationalities', 'degrees', 'majors', 'typeOfStudies', 'academics', 'countries', 'states', 'langs', 'mgsUnread'));
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
        // User logined
        $user = Auth::user();

        // Get request
        $userI = $request->only('name', 'last_name');
        if( $request['password'] ) $userI['password'] = bcrypt( $request['password'] );
        $info = $request->only(
                            'gender', 'user_mode', 'country', 'state', 'city', 'address', 'degree',
                            'name_of_school', 'major', 'gpa', 'type_of_study', 'academic', 'nationality');
        $info['date_graduation'] = $request->only('year_graduation')['year_graduation'].'-'.$request->only('month_graduation')['month_graduation'].'-01';
        $info['expected_start'] = $request->only('year_')['year_'].'-'.$request->only('month_')['month_'].'-01';
        $info['birthday'] = $request->only('year')['year'].'-'.$request->only('month')['month'].'-'.$request->only('day')['day'];
        $info['language'] = $request->only('language')['language'];
        if( !$request['major'] ) $info['major'] = [];
        $countries = $request->only('country_interested')['country_interested'];
        $schools = $request->only('school_interested')['school_interested'];

        // Delete education abroad 
        EducationAbroad::where('user_id', $user->id)->delete();

        // Save education abroad
        if($countries){
            foreach($countries as $k => $val){
                EducationAbroad::create([
                        'user_id' => $user->id,
                        'country_interested' => $val,
                        'school_interested' => $schools[$k]
                    ]);
            }
        }

        // Update avatar
        if ($request->file('avatar') && $request->file('avatar')->isValid()) {
            $ext = $request->file('avatar')->getClientOriginalExtension();
            $newName = str_random(20).'.'.$ext;
            $request->file('avatar')->move('images/students', $newName);
            $info['avatar'] = '/images/students/'. $newName;
        }

        $user->update($userI);
        $user->student->update($info);
        return redirect()->route('student.show', ['id'=>$user->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    
    public function register()
    {
        // echo bcrypt('123123123');
        Auth::logout();
        $ethnicities = ['Asian', 'African', 'White', 'Hispanic', 'Don\'t know'];
        $nationalities = getNationalities();
        $months = [['Jan','1'],['Feb','2'],['Mar','3'],['Apr','4'],['May','5'],['Jun','6'],['Jul','7'],['Aug','8'],['Sep','9'],['Oct','10'],['Nov','11'],['Dec','12']];
        $currentEducations = ['High School student', 'Bachelor student', 'Master Student', 'Adult learner'];
        return view('student.register', compact('ethnicities', 'nationalities', 'months', 'currentEducations') );
    }
    
    public function register2()
    {   
        return view('student.register2');
    }
   
    /**
     * Complete the account registration
     * @return Void 
     */
    public function register3()
    {
        if ($user = Auth::user()) {
            // List month and day
            $months = [['Jan','1'],['Feb','2'],['Mar','3'],['Apr','4'],['May','5'],['Jun','6'],['Jul','7'],['Aug','8'],['Sep','9'],['Oct','10'],['Nov','11'],['Dec','12']];

            // List degrees
            $degrees = Degree::all();

            // List major
            $majors = Major::all();

            // List types of student
            $typeOfStudies = TypeOfStudy::all();

            // List academis
            $academics = Academic::all();

            // List countries
            $countriesStep2 = \CountryState::getCountries();
            $countriesStep1 = array('JP' => 'Japan', 'VN' => 'Viet Nam', 'CN' => 'China');

            // List states of contry US
            $states = \CountryState::getStates('JP');

            // Get language
            $langs = getLanguages();
            asort($langs);

            return view('student.register3', compact('months', 'degrees', 'majors', 'typeOfStudies', 'academics', 'countriesStep1', 'countriesStep2', 'states', 'langs') );
        } else{
            return redirect('/');           
        }
    }

    public function updateProfile(Request $request)
    {
        $user = Auth::user();
        $info = $request->only('country','state','city','address','degree','name_of_school','major','gpa', 'type_of_study', 'academic');
        $info['date_graduation'] = $request->only('year_graduation')['year_graduation'].'-'.$request->only('month_graduation')['month_graduation'].'-01';
        $info['expected_start'] = $request->only('year_')['year_'].'-'.$request->only('month_')['month_'].'-01';
        $info['language'] = $request->only('language')['language'];
        if( !$request['major'] ) $info['major'] = [];
        $countries = $request->only('country_interested')['country_interested'];
        $schools = $request->only('school_interested')['school_interested'];
        foreach($countries as $k => $val){
            EducationAbroad::create([
                    'user_id' => $user->id,
                    'country_interested' => $val,
                    'school_interested' => $schools[$k]
                ]);
        }
        if ($request->file('avatar') && $request->file('avatar')->isValid()) {
            $ext = $request->file('avatar')->getClientOriginalExtension();
            $newName = str_random(20).'.'.$ext;
            $request->file('avatar')->move('images/students', $newName);
            $info['avatar'] = '/images/students/'. $newName;
        }

        $info['is_update'] = 1;
        $user->student->update($info);
        return redirect()->route( 'student.show', ['id'=>Auth::user()->id] );
    }

    public function contact(Request $request)
    {   
        if( $request->isMethod('post') )
        {
            $rs = 0;
            try {
                $requests = $request->all();
                $rs = Mail::send('emails.contact', ['requests' => $requests], function ($m) use ($requests) {
                    $m->to('sir.truongcong@gmail.com')->subject('Question & Answer');
                });
            } catch (\Swift_TransportException $e) {
                Flash::error($e->getMessage());
            } catch (\Swift_RfcComplianceException $e) {
                Flash::error($e->getMessage());
            }
            // if($rs) Flash::success('Your request had send');
            // else Flash::warning('Some thing error please try again');
        }
        
        $mgsUnread = $this->getUnmessage(Auth::user()->student->id);
        return view('student.contact', compact('mgsUnread'));
    }

    public function recruiting(Request $request)
    {   
        $countries = \CountryState::getCountries();
        $student = Auth::user()->student;
        $messages = Message::with('university.user')
                    ->where('student_id', $student->id)
                    ->where('mode', 0)
                    ->orderBy('created_at', 'desc')->get();
       	$favorites = Favorite::with('university.user', 'university.favorites')->where('student_id', $student->id)
                ->where('type', 2)->get();
        // dd($favorites);
        $mgsUnread = $this->getUnmessage(Auth::user()->student->id);
        $tab = $request['tab'] ? $request['tab'] : 0;        
        return view( 'student.recruiting', compact('countries', 'messages', 'favorites', 'mgsUnread', 'tab') );
    }

    public function universitySearch(Request $request)
    {   
        $requests = $request->all();

        $query = University::with('user','favorites');
        // if ( isset($requests['name']) && $requests['name'] )
        //     $query->where('name', 'LIKE' , '%'.$requests['name'].'%' );
        if ( isset($requests['school_type']) && $requests['school_type'] )
            $query->where('school_type', $requests['school_type'] );
        if ( isset($requests['country']) && $requests['country'] )
            $query->where('country', $requests['country'] );
        if ( isset($requests['state']) && $requests['state'] )
            $query->where('state', $requests['state'] );
        if ( isset($requests['from']) && $requests['from'] 
            && isset($requests['to']) && $requests['to'] ){
            $query->where('ranking', '>=', $requests['from'] );
            $query->where('ranking', '<=', $requests['to'] );

        }else{
            if ( isset($requests['ranking']) && $requests['ranking'] ){
                switch ($requests['ranking']) {
                    case '1':
                        $query->where('ranking', '>', 0 );
                        $query->where('ranking', '<=', 10 );
                        break;
                    case '2':
                        $query->where('ranking', '>', 10 );
                        $query->where('ranking', '<=', 20 );
                        break;
                    case '3':
                        $query->where('ranking', '>', 20 );
                        $query->where('ranking', '<=', 50 );
                        break;
                    case '4':
                        $query->where('ranking', '>', 50 );
                        $query->where('ranking', '<=', 100 );
                        break;
                }
            }
        }
        $universities = $query->get();

        if ( isset($requests['name']) && $requests['name'] ){
            $universities = $universities->filter(function ($university) use($requests){
                return strpos( strtolower($university->user->name), strtolower($requests['name']) ) !== false;
            });
        }

        return response()->json($universities->toArray(), 200);
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
        $data['mode'] = 1; // mode == 1: student send to university.
        $rs = Message::create($data);

        if($rs) Flash::success('Your message has been sent');
        else Flash::erro('Some thing error, please try again');

        return redirect()->route('student.recruiting');        
    }

    public function activate($token){
        if(!$token) return redirect('/');
        $user = User::where('activate_token', $token)->first();
        if( $user ){
            $user->student->update(['is_verify' => 1]);
            Auth::loginUsingId($user->id);
            return redirect()->route('student.register-3');
        }else{
            return redirect('/');
        }
    }

    private function getUnmessage($studentID){
        // mode : 0  message send from university
        // status : 0  message unread
        $messages = Message::where('student_id', $studentID)->where('mode', 0)
                    ->where('status', 0)->get();
        return $messages->count();
    }

    /**
     * Update password.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function updatePassword(Request $request)
    {
        //get new email from request
        $data = $request->all();

        // Validate current password
        if (!isset($data['current_password']) || $data['current_password'] == '') {
            Flash::error(trans('validation.curent_password_required'));
            return redirect()->route('student.changePassword');
        }

        // Validate new password
        if (!isset($data['password']) || $data['password'] == '') {
            Flash::error(trans('validation.password_required'));
            return redirect()->route('student.changePassword');
        }

        // Validate re type password
        if (!isset($data['re_password']) || $data['re_password'] == '') {
            Flash::error(trans('validation.retype_password_required'));
            return redirect()->route('student.changePassword');
        }

        // Validate retype password same new password
        if ($data['re_password'] != $data['password']) {
            Flash::error(trans('validation.retype_password_not_match'));
            return redirect()->route('student.changePassword');
        }

        $userLogined = \Auth::user();

        // Check the current password is match with user logined
        if (!\Hash::check($data['current_password'], $userLogined->password)) {
            Flash::error(trans('validation.current_password_invalid'));
            return redirect()->route('student.changePassword');
        }

        $dataUser = array('password' => bcrypt($data['password']));

        // Update password for user
        $status = $userLogined->update($dataUser);

        if ($status) {
            \Auth::logout($userLogined);
            Flash::success(trans('label.change_password_success'));
            return redirect('/');
        } else {
            Flash::success(trans('label.change_password_faild'));
            return redirect()->route('student.changePassword');
        }
    }

    /**
     * Change the email address
     * @param  Request $request The request
     * @return Void           
     */
    public function updateEmail(Request $request)
    {
        //get new email from request
        $data = $request->all();

        // Validate old email
        if (!isset($data['old_email']) || $data['old_email'] == '') {
            Flash::error(trans('validation.old_email_required'));
            return redirect()->route('student.changeEmail');
        }

        // Validate new email
        if (!isset($data['email']) || $data['email'] == '') {
            Flash::error(trans('validation.new_email_required'));
            return redirect()->route('student.changeEmail');
        }

        // Validate re email is not empty
        if (!isset($data['re_email']) || $data['re_email'] == '') {
            Flash::error(trans('validation.retype_email_required'));
            return redirect()->route('student.changeEmail');
        }

        // Validate re email same email
        if ($data['re_email'] != $data['email']) {
            Flash::error(trans('validation.retype_email_not_match'));
            return redirect()->route('student.changeEmail');
        }

        $userLogined = \Auth::user();

        // If old email not match with email of user logined
        if ($userLogined->email != $data['old_email']) {
            Flash::error(trans('validation.email_not_belong_to_user'));
            return redirect()->route('student.changeEmail');
        }

        $user = User::where('email', $data['email'])->where('id', '!=', $userLogined->id)->first();

        // If the new email is exists in system
        if ($user) {
            Flash::error(trans('validation.email_exists'));
            return redirect()->route('student.changeEmail');
        }

        $dataUser = array('email' => $data['email']);

        // Update email for user
        $status = $userLogined->update($dataUser);

        if ($status) {
            Flash::success(trans('label.change_email_success'));
            return redirect()->route( 'student.show', ['id'=>Auth::user()->id] );
        } else {
            Flash::success(trans('label.change_email_faild'));
            return redirect()->route('student.changeEmail');
        }
    }

    /**
     * Display the change email page.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function changeEmail()
    {
        $user = Auth::user();

        $change_type = 'email';

        return view('student.change_mail_pass', compact('user', 'change_type'));
    }

    /**
     * Display the change password page.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function changePassword()
    {   
        $user = Auth::user();
        
        $change_type = 'password';

        return view('student.change_mail_pass', compact('user', 'change_type'));
    }
}
