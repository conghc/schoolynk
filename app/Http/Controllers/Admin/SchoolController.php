<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\OranizationType;
use App\Major;
use App\Degree;
use App\Schoolarship;
use App\User;
use App\Currency;
use App\TypeOfStudy;
use App\Category;
use App\Academic;
use App\SchoolInfo;
use App\Faculty;
use App\FacultySchool;
use App\OtherText;
use Auth;
use Flash;
use File;
use Illuminate\Support\Facades\View;
use Intervention\Image\ImageManagerStatic as Image;

class SchoolController extends Controller
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
     * @return \Illuminate\Http\Response
     */
    public function index(User $user)
    {
        $schools = $user->where('role',4)->with('schoolInfo')->get();
        //dd($schools->toArray());
        return view('admin.school.index', compact('schools'));
    }

    /**
     * Advance search schoolarships
     * @param  Request $request The request
     * @return \Illuminate\Http\Response
     */
    public function advanceSearch(Request $request)
    {
        $data = $request->all();

        // Init type of oraginations
        $typeOrans = OranizationType::lists('name', 'id');

        // Init type of schoolarship
        $typeSchoolarships = array('0' => 'Non-refundable', '1' => 'Refundable(No interest)', '2' => 'Refundable(With interest)');

        // Init convering cost
        $converingCost = array('0' => 'School', '1' => 'Dorm', '2' => 'Others');

        // Init selection process
        $selectionProcess = array('0' => 'Document screening', '1' => 'Interview', '2' => 'Examination');

        // dd($data);

        $conditions = array ();

        // If search with type schoolarship
        if (isset($data['type']) && $data['type'] != '') {
            $conditions[] = ['type', $typeSchoolarships[$data['type']]];
        }

        // If search with type of organization
        if (isset($data['type_of_organization']) && $data['type_of_organization'] != '') {
            $conditions[] = ['type_of_oran', $data['type_of_organization']];
        }

        // If search with origin of organization
        if (isset($data['origin_of_oran']) && $data['origin_of_oran'] != '') {
            $conditions[] = ['origin_of_oran', $data['origin_of_oran']];
        }

        // If search with convering cost
        if (isset($data['covering_cost']) && $data['covering_cost'] != '') {
            $converingCosts = '[';

            foreach ($data['covering_cost'] as $key => $converingCost) {
                if ($converingCost != '') {
                    $converingCosts .= '"' . $converingCost . '"';
                }
            }

            $converingCosts .= ']';

            $converingCosts = str_replace('""', '","', $converingCosts);

            if (!empty($converingCosts)) {
                $conditions[] = ['covering_cost', $converingCosts];
            }
        }

        // If search with selection process
        if (isset($data['process']) && $data['process'] != '') {
            $selectionProcess = '[';

            foreach ($data['process'] as $key => $process) {
                if ($process != '') {
                    $selectionProcess .= '"' . $process . '"';
                }
            }

            $selectionProcess .= ']';

            $selectionProcess = str_replace('""', '","', $selectionProcess);

            if (!empty($selectionProcess)) {
                $conditions[] = ['process', $selectionProcess];
            }
        }

        // If search current educations
        if (isset($data['current_education'])) {

            $currentEducations = '[';

            foreach ($data['current_education'] as $key => $currentEducation) {
                if ($currentEducation != '') {
                    $currentEducations .= '"' . $currentEducation . '"';
                }
            }

            $currentEducations .= ']';

            $currentEducations = str_replace('""', '","', $currentEducations);

            if (!empty($currentEducations)) {
                $conditions[] = ['current_education', $currentEducations];
            }
        }

        // If search current educations
        if (isset($data['education'])) {

            $educations = '[';

            foreach ($data['education'] as $key => $education) {
                if ($education != '') {
                    $educations .= '"' . $education . '"';
                }
            }

            $educations .= ']';

            $educations = str_replace('""', '","', $educations);

            if (!empty($educations)) {
                $conditions[] = ['education', $educations];
            }
        }

        // If search academics
        if (isset($data['academic'])) {

            $academics = '[';

            foreach ($data['academic'] as $key => $academic) {
                if ($academic != '') {
                    $academics .= '"' . $academic . '"';
                }
            }

            $academics .= ']';

            $academics = str_replace('""', '","', $academics);

            if (!empty($academics)) {
                $conditions[] = ['academic', $academics];
            }
        }

        // If search majors
        if (isset($data['major'])) {

            $majors = '[';

            foreach ($data['major'] as $key => $major) {
                if ($major != '') {
                    $majors .= '"' . $major . '"';
                }
            }

            $majors .= ']';

            $majors = str_replace('""', '","', $majors);

            if (!empty($majors)) {
                $conditions[] = ['major', $majors];
            }
        }

        // If search with category 
        if (isset($data['category']) && $data['category'] != '') {
            $conditions[] = ['category', $data['category']];
        }

        // If search has min_age
        if (isset($data['min_age']) && $data['min_age'] != '') {
            $conditions[] = ['min_age', '>=', $data['min_age']];
        }

        // If search has max_age
        if (isset($data['max_age']) && $data['max_age'] != '') {
            $conditions[] = ['max_age', '>=', $data['max_age']];
        }

        // If search has gender
        if (isset($data['gender']) && $data['gender'] != '') {
            $conditions[] = ['gender', $data['gender']];
        }

        // If search current nationalities
        if (isset($data['nationality'])) {

            $nationalities = '[';

            foreach ($data['nationality'] as $key => $nationality) {
                if ($nationality != '') {
                    $nationalities .= '"' . $nationality . '"';
                }
            }

            $nationalities .= ']';

            $nationalities = str_replace('""', '","', $nationalities);

            if ($nationalities != '[]') {
                $conditions[] = ['nationality', $nationalities];
            }
        }

        // If search states
        if (isset($data['state'])) {

            $states = '[';

            foreach ($data['state'] as $key => $state) {
                if ($state != '') {
                    $states .= '"' . $state . '"';
                }
            }

            $states .= ']';

            $states = str_replace('""', '","', $states);

            if ($states != '[]') {
                $conditions[] = ['state', $states];
            }
        }

        // If search cities
        if (isset($data['city'])) {

            $cities = '[';

            foreach ($data['city'] as $key => $city) {
                if ($city != '') {
                    $cities .= '"' . $city . '"';
                }
            }

            $cities .= ']';

            $cities = str_replace('""', '","', $cities);

            if ($cities != '[]') {
                $conditions[] = ['city', $cities];
            }
        }

        // If search destination countries
        if (isset($data['destination_country'])) {

            $destinationCountries = '[';

            foreach ($data['destination_country'] as $key => $destinationCountry) {
                if ($destinationCountry != '') {
                    $destinationCountries .= '"' . $destinationCountry . '"';
                }
            }

            $destinationCountries .= ']';

            $destinationCountries = str_replace('""', '","', $destinationCountries);

            if ($destinationCountries != '["all"]') {
                $conditions[] = ['destination_country', $destinationCountries];
            }
        }

        // If search destination countries
        if (isset($data['destination_state'])) {

            $destinationStates = '[';

            foreach ($data['destination_state'] as $key => $destinationState) {
                if ($destinationState != '') {
                    $destinationStates .= '"' . $destinationState . '"';
                }
            }

            $destinationStates .= ']';

            $destinationStates = str_replace('""', '","', $destinationStates);

            if ($destinationStates  != '["all"]') {
                $conditions[] = ['destination_state', $destinationStates];
            }
        }

        // If search languages
        if (isset($data['language'])) {

            $languages = '[';

            foreach ($data['language'] as $key => $language) {
                if ($language != '' && isset($language[1])) {
                    $languages .= '["' . $language[0] . '","' . $language[1] . '"]';
                }
            }

            $languages .= ']';
            
            $languages = str_replace('][', '],[', $languages);

            if ($languages != '[]') {
                $conditions[] = ['language', $languages];
            }
        }

        // dd($conditions);die; 

        $schoolarships = Schoolarship::with('OranizationType')->where($conditions)->orderBy('created_at', 'desc')->get();
        
        // Init months
        $months = [['Jan','1'],['Feb','2'],['Mar','3'],['Apr','4'],['May','5'],['Jun','6'],['Jul','7'],['Aug','8'],['Sep','9'],['Oct','10'],['Nov','11'],['Dec','12']];
        
        // Init type of oraginations
        $typeOrans = OranizationType::all();

        // Init majors
        $majors = Major::all();

        // Init degrees
        $degrees = Degree::all();

        // Init academics
        $academics = Academic::all();

        // Init type of studies
        $typeOfStudies = TypeOfStudy::all();

        // Init currentcies
        $currencies = Currency::all();

        // Init countries
        $countries = \CountryState::getCountries();

        // Init states
        $states = \CountryState::getStates('US');

        // Init categories
        $categories = Category::lists('title', 'id');

        return view('admin.scholarship.index', compact('schoolarships', 'countries', 'months', 'typeOrans', 'majors', 'degrees', 'academics', 'typeOfStudies', 'currencies', 'states', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request, User $user)
    {
        $cus = ['AFN','EUR','ALL','DZD','USD','EUR','AOA','XCD','XCD','ARS','AMD','AWG','AUD','EUR','AZN','BSD','BHD','BDT','BBD','BYN','EUR','BZD','XOF','BMD','INR','BTN','BOB','BOV','USD','BAM','BWP','NOK','BRL','USD','BND','BGN','XOF','BIF','CVE','KHR','XAF','CAD','KYD','XAF','XAF','CLP','CLF','CNY','AUD','AUD','COP','COU','KMF','CDF','XAF','NZD','CRC','XOF','HRK','CUP','CUC','ANG','EUR','CZK','DKK','DJF','XCD','DOP','USD','EGP','SVC','USD','XAF','ERN','EUR','ETB','EUR','FKP','DKK','FJD','EUR','EUR','EUR','XPF','EUR','XAF','GMD','GEL','EUR','GHS','GIP','EUR','DKK','XCD','EUR','USD','GTQ','GBP','GNF','XOF','GYD','HTG','USD','AUD','EUR','HNL','HKD','HUF','ISK','INR','IDR','XDR','IRR','IQD','EUR','GBP','ILS','EUR','JMD','JPY','GBP','JOD','KZT','KES','AUD','KPW','KRW','KWD','KGS','LAK','EUR','LBP','LSL','ZAR','LRD','LYD','CHF','EUR','EUR','MOP','MKD','MGA','MWK','MYR','MVR','XOF','EUR','USD','EUR','MRO','MUR','EUR','XUA','MXN','MXV','USD','MDL','EUR','MNT','EUR','XCD','MAD','MZN','MMK','NAD','ZAR','AUD','NPR','EUR','XPF','NZD','NIO','XOF','NGN','NZD','AUD','USD','NOK','OMR','PKR','USD','PAB','USD','PGK','PYG','PEN','PHP','NZD','PLN','EUR','USD','QAR','EUR','RON','RUB','RWF','EUR','SHP','XCD','XCD','EUR','EUR','XCD','WST','EUR','STD','SAR','XOF','RSD','SCR','SLL','SGD','ANG','XSU','EUR','EUR','SBD','SOS','ZAR','SSP','EUR','LKR','SDG','SRD','NOK','SZL','SEK','CHF','CHE','CHW','SYP','TWD','TJS','TZS','THB','USD','XOF','NZD','TOP','TTD','TND','TRY','TMT','USD','AUD','UGX','UAH','AED','GBP','USD','USD','USN','UYU','UYI','UZS','VUV','VEF','VND','USD','USD','XPF','MAD','YER','ZMW','ZWL','XBA','XBB','XBC','XBD','XTS','XXX','XAU','XPD','XPT','XAG'];
        $cus = array_unique($cus);
        $cus = array_values($cus);
        for($i=0; $i < count($cus); $i++){
            if(!in_array($cus[$i], ['AUD','CAD','CNY','EUOR','GBP','JPY','NZD','SGD','USD','VND'])){
                Currency::create(['sort_name' => $cus[$i]]);
            }
        }
        dd($cus);
        $sType = $request->input('sType', 'university');
        $id = $request->input('id', 0);
        $addNew = true;
        if($id != 0) $addNew = false;

        $currencies = Currency::all();
        $countries = \CountryState::getCountries();
        $states = \CountryState::getStates('JP');
        $degreelevel = getDegreelevel();
        $courseTerm = getCourseTerm();
        $enrollment = getEnrollment();
        $majorLanguage = getMajorLanguage();
        $nationalities = getNationalities();
//        $currentY = intval(date('Y'));


        $school = $user->with('images','schoolInfo','faculty', 'otherText', 'scholarships', 'facultySchool')->where('id', $id)->first();
        if($school){
            $sType = $school->school_type;
            $school->img_profile = $school->img_profile != '' ? $school->img_profile : 'img/no-image.png';
        }
        //dd($school->toArray());
        return view('admin.school.create', compact('sType','majorLanguage','enrollment','courseTerm','degreelevel','school', 'addNew','currencies', 'countries', 'states', 'nationalities'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = Auth::user();        
        $requests = $request->all();
        $data = $request->only(
            'user_id', 'type', 'name', 'oranization', 'type_of_oran', 'origin_of_oran', 'covering_cost', 'amount_paid', 'currency', 
            'amount_currency', 'amount_currency_max', 'benefit_period_month', 'benefit_period_year', 'benefit_period_month_max', 
            'benefit_period_year_max', 'process','url', 'current_education', 'education', 'academic', 'major','min_age','max_age',
            'gender', 'nationality', 'state', 'city', 'destination_country', 'destination_state', 'competition', 'language', 'limit',
            'orther', 'category', 'organization_email', 'organization_phone', 'other_message', 'purpose_of_scholarship_establishment',
            'organization_address');
        // $data['user_id'] = $user->id;
        $data['covering_cost'] = isset($requests['covering_cost']) ? $requests['covering_cost'] : [];
        $data['amount_currency'] = str_replace(',','',$requests['amount_currency']);
        $data['date_app_start'] = $requests['year_start'].'-'.$requests['month_start'].'-'.$requests['day_start'];
        $data['date_app_end'] = $requests['year_end'].'-'.$requests['month_end'].'-'.$requests['day_end'];
        // dd($data);
        Schoolarship::create($data);
        return redirect()->route('admin.schoolarship.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
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
        Schoolarship::find($id)->delete();
        return redirect()->route('admin.schoolarship.index');
    }

    public function schoolStructure(Request $request, Faculty $faculty, FacultySchool $facultySchool){
        $structure = $request->input('structure', []);
        $school_id = $request->input('school_id', 0);
        $sType = $request->input('sType', 'university');

        if($sType == 'university'){
            $fs_id_remove = $request->input('fs_id_remove', '0');
            $f_id_remove = $request->input('f_id_remove', '0');
            $fs_id_remove = explode('|', $fs_id_remove);
            $f_id_remove = explode('|', $f_id_remove);

            $faculty->destroy($f_id_remove);
            $facultySchool->whereIn('faculty_id', $f_id_remove)->delete();

            $facultySchool->destroy($fs_id_remove);

            if($school_id > 0){
                if(count($structure) > 0){
                    foreach($structure as $struct){
                        if(isset($struct['faculty_id'])){
                            $faculty->where('id',$struct['faculty_id'])->update(['name' => $struct['name_faculty']]);
                        }else{
                            $faculty = Faculty::create(['name' => $struct['name_faculty'], 'school_id' => $school_id]);
                        }
                        $faculty_id = $faculty->id ? $faculty->id : $struct['faculty_id'];
                        foreach($struct['school'] as $fs){
                            if(isset($fs['fs_id'])){
                                $facultySchool->where('id',$fs['fs_id'])->update(['name' => $fs['name_school'], 'academic_level' => $fs['child']]);
                            }else{
                                $facultySchool = FacultySchool::create(['school_id' => $school_id,'name' => $fs['name_school'], 'academic_level' => $fs['child'], 'faculty_id' => $faculty_id]);
                            }
                        }
                    }
                }
            }
        }elseif($sType == 'vocational'){
            $fSchoolOld = $request->input('fSchoolOld', []);
            $fSchool = $request->input('fSchool', []);
            if(count($fSchoolOld) > 0){
                foreach($fSchoolOld as $k=>$name){
                    $facultySchool->where('id', $k)->update(['name' => $name]);
                }
            }
            if(count($fSchool) > 0){
                for($i=0; $i<count($fSchool); $i++){
                    $data = ['name' => $fSchool[$i], 'school_id' => $school_id];
                    FacultySchool::create($data);
                }
            }
        }else{

        }

        return redirect('admin/school/create?id=' . $school_id);
    }

    public function schoolInfoUpdate(Request $request, User $user, SchoolInfo $schoolInfo, OtherText $otherText){

        $school_id = $request->input('school_id', 0);
        $school_info_id = $request->input('school_info_id', 0);
        $user = $user->where('id', $school_id)->where('role', 4)->first();
        $school_other = $request->input('school_other', []);
        $school_other_old = $request->input('school_other_old', []);

        if($user){
            $file = $request->brochure ? $request->brochure : null;

            $data = $request->except('_token', 'school_info_id', 'brochure');
            $schoolInfo = $schoolInfo->where('id', $school_info_id)->first();
            // insert other text
            if(count($school_other) > 0){
                for($i=0; $i<count($school_other); $i++){
                    $dataOther = [];
                    $dataOther['school_id'] = $school_id;
                    $dataOther['content'] = $school_other[$i];
                    $dataOther['type'] = 'school';
                    OtherText::create($dataOther);
                }
            }
            if(count($school_other_old) > 0){
                foreach($school_other_old as $k=>$otOld){
                    $otherText->where('id', $k)->update(['content' => $otOld]);
                }
            }

            // process file
            if($file){
                $filename  = 'user-brochure-' . time() . rand() . '.' . $file->getClientOriginalExtension();
                File::makeDirectory(public_path('users/'. $school_id. '/'),0777, true, true);
                $path = public_path('users/'. $school_id . '/');

                $request->file('brochure')->move($path, $filename);
                //Image::make($file->getRealPath())->save($path);

                $data['brochure'] = 'users/'. $school_id . '/' . $filename;
            }
            if($schoolInfo){
                unset($data['school_other']);
                unset($data['school_other_old']);
                $rs = $schoolInfo->update($data);
            }else{
                $rs = SchoolInfo::create($data);
            }
        }
        return redirect('admin/school/create?id=' . $school_id);
    }

    public function addMajor(Request $request, Major $major){
        $school_id = $request->input('school_id',0);
        $fs_id = $request->input('fs_id',[]);
        $school_type = $request->input('school_type',[]);
        $dataOld = $request->input('dataOld',[]);
        $text = $request->input('text',[]);
        $degree_level = $request->input('degree_level',[]);
        $course_term = $request->input('course_term',[]);
        $enrollment = $request->input('enrollment',[]);
        $language = $request->input('language',[]);
        $application_period = $request->input('application_period',[]);
        $application_period_max = $request->input('application_period_max',[]);
        if(count($dataOld) > 0){
            foreach($dataOld as $k=>$do){
                $major->where('id', $k)->update(array_merge($do, ['school_id' => $school_id, 'fs_id' => $fs_id]));
            }
        }
        if(count($text) > 0){
            for($i=0; $i<count($text); $i++){
                $data = [];
                $data['school_id'] = $school_id;
                $data['fs_id'] = $fs_id;
                $data['type'] = $school_type;
                $data['text'] = $text[$i];
                $data['degree_level'] = $degree_level[$i];
                $data['course_term'] = $course_term[$i];
                $data['enrollment'] = $enrollment[$i];
                $data['language'] = $language[$i];
                $data['application_period'] = $application_period[$i];
                $data['application_period_max'] = $application_period_max[$i];
                Major::create($data);
            }
        }
        return redirect('admin/school/create?id=' . $school_id);
    }

    public function getMajorExist(Request $request, Major $major){
        $degreelevel = getDegreelevel();
        $courseTerm = getCourseTerm();
        $enrollment = getEnrollment();
        $majorLanguage = getMajorLanguage();
        $sType = $request->input('sType', 'university');
        if($sType != 'language'){
            $fs_id = $request->input('fs_id', 0);
            $majors = $major->where('fs_id', $fs_id)->get();
        }else{
            $school_id = $request->input('school_id', 0);
            $majors = $major->where('school_id', $school_id)->get();
        }
        return view('admin.school.major', compact('majors', 'degreelevel', 'courseTerm', 'enrollment', 'majorLanguage'));
    }

    public function addOtherTextExist(Request $request, OtherText $otherText){
        $school_id = $request->input('school_id',0);
        $fs_id = $request->input('fs_id',[]);
        $other_type = $request->input('other_type',[]);
        $dataOld = $request->input('dataOld',[]);
        $name = $request->input('name',[]);
        $content = $request->input('content',[]);

        if(count($dataOld) > 0){
            foreach($dataOld as $k=>$do){
                //$otherText->where('id', $k)->update(array_merge($do, ['school_id' => $school_id, 'fs_id' => $fs_id]));
                $otherText->where('id', $k)->update($do);
            }
        }
        if(count($name) > 0){
            for($i=0; $i<count($name); $i++){
                $data = [];
                $data['school_id'] = $school_id;
                $data['faculty_school_id'] = $fs_id;
                $data['type'] = $other_type;
                $data['name'] = $name[$i];
                $data['content'] = $content[$i];
                OtherText::create($data);
            }
        }
        return redirect('admin/school/create?id=' . $school_id);
    }

    public function getOtherTextExist(Request $request, OtherText $otherText){
        $fs_id = $request->input('fs_id', 0);
        $type = $request->input('type', 0);
        $sType = $request->input('sType', 'university');
        if($sType != 'language'){
            $otherText = $otherText->where('faculty_school_id', $fs_id)->where('type', 'LIKE', $type)->get();
        }else{
            $school_id = $request->input('school_id', 0);
            $otherText = $otherText->where('school_id', $school_id)->where('type', 'LIKE', $type)->get();
        }

        return view('admin.school.other', compact('otherText'));
    }
}
