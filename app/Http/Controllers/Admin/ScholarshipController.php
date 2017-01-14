<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Scholarship;
use App\User;
use App\Currency;
use App\Academic;
use App\AwardUsedFor;
use App\Major;
use App\SponsorType;
use App\SponsorInfo;
use Auth;
use Flash;
use Intervention\Image\ImageManagerStatic as Image;

class ScholarshipController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Scholarship Controller
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
    public function index()
    {
        //if(Auth::user()->role == 1) {
            $scholarships = Scholarship::orderBy('created_at', 'desc')->get();
//        } else {
//            $scholarships = Scholarship::where('user_id', Auth::user()->id)->with('OranizationType')->orderBy('created_at', 'desc')->get();
//        }

//        // Init months
//        $months = [['Jan','1'],['Feb','2'],['Mar','3'],['Apr','4'],['May','5'],['Jun','6'],['Jul','7'],['Aug','8'],['Sep','9'],['Oct','10'],['Nov','11'],['Dec','12']];
//
//        // Init type of oraginations
//        $typeOrans = OranizationType::all();
//
//        // Init majors
//        $majors = Major::all();
//
//        // Init degrees
//        $degrees = Degree::all();
//
//        // Init academics
//        $academics = Academic::all();
//
//        // Init type of studies
//        $typeOfStudies = TypeOfStudy::all();
//
//        // Init currentcies
//        $currencies = Currency::all();
//
//        // Init countries
//        $countries = \CountryState::getCountries();
//
//        // Init states
//        $states = \CountryState::getStates('US');
//
//        // Init categories
//        $categories = Category::lists('title', 'id');
        $academics = Academic::all();
        $awardUsedFor = AwardUsedFor::all();
        $sponsorTypes = SponsorType::all();
        $countries = \CountryState::getCountries();
        $states = \CountryState::getStates('JP');
        $nationalities = getNationalities();
        $majors = Major::all();
        foreach($majors as $k=>$major){
            $dataMajors[$major->type][$k] = $major->text;
        }

        $schools = User::where('role',4)->get();

        return view('admin.scholarship.index', compact('sponsorTypes','schools','states','dataMajors','awardUsedFor','countries','academics', 'nationalities', 'scholarships'));
    }

    /**
     * Advance search scholarships
     * @param  Request $request The request
     * @return \Illuminate\Http\Response
     */
    public function advanceSearch(Request $request)
    {
        $data = $request->all();

        // Init type of oraginations
        $typeOrans = OranizationType::lists('name', 'id');

        // Init type of scholarship
        $typeScholarships = array('0' => 'Non-refundable', '1' => 'Refundable(No interest)', '2' => 'Refundable(With interest)');

        // Init convering cost
        $converingCost = array('0' => 'School', '1' => 'Dorm', '2' => 'Others');

        // Init selection process
        $selectionProcess = array('0' => 'Document screening', '1' => 'Interview', '2' => 'Examination');

        // dd($data);

        $conditions = array ();

        // If search with type scholarship
        if (isset($data['type']) && $data['type'] != '') {
            $conditions[] = ['type', $typeScholarships[$data['type']]];
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

        $scholarships = Scholarship::with('OranizationType')->where($conditions)->orderBy('created_at', 'desc')->get();
        
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

        return view('admin.scholarship.index', compact('scholarships', 'countries', 'months', 'typeOrans', 'majors', 'degrees', 'academics', 'typeOfStudies', 'currencies', 'states', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Scholarship $scholarship, Request $request)
    {
        $id = $request->input('id', 0);
        $addNew = true;
        if($id != 0) $addNew = false;

        $scholarship = $scholarship->where('id', $id)->first();

        if($scholarship){
            $scholarship->deadline = date('m/d/Y', strtotime($scholarship->deadline));
        }
        if($scholarship){
            $scholarship = $this->getRelationArray($scholarship);
        }
        $sponsor_id = isset($scholarship->sponsor_id) ? $scholarship->sponsor_id : 0;
        $sponsor_info = User::with('sponsorInfo')->where('id',$sponsor_id)->first();

        $academics = Academic::all();
        $currencies = Currency::all();
        $awardUsedFor = AwardUsedFor::all();
        $sponsorTypes = SponsorType::all();
        $sponsors = User::where('role',3)->get();
        $countries = \CountryState::getCountries();
        $states = \CountryState::getStates('JP');
        $nationalities = getNationalities();
        $majors = Major::all();
        foreach($majors as $k=>$major){
            $dataMajors[$major->type][$k] = $major->text;
        }
        $editors = User::where('role', 2)->get();

        $schools = User::where('role',4)->get();

        return view('admin.scholarship.edit', compact('schools', 'sponsor_id' ,'sponsor_info' ,'scholarship','id', 'addNew','sponsors' ,'scholarship_id' ,'sponsorTypes' ,'dataMajors' ,'awardUsedFor' ,'academics' ,'editors', 'countries', 'nationalities', 'states', 'currencies') );
    }

    public function getRelationArray($schs){
        $nationality_arr = $academic_level_arr = $place_of_residence_arr = $award_used_for_arr =
            $award_used_at_arr = $majors_arr = $schools_arr = $designated_area_arr = [];
        if(isset($schs->nationality)){
            foreach($schs->nationality as $rc){
                $nationality_arr[] = $rc->nationality;
            }
            $schs->nationality_arr = $nationality_arr;
        }

        ////////////////////
        if(isset($schs->academicLevel)){
            foreach($schs->academicLevel as $rc){
                $academic_level_arr[] = $rc->academic_id;
            }
            $schs->academic_level_arr = $academic_level_arr;
        }
        ////////////////////
        if(isset($schs->placeOfResidence)){
            foreach($schs->placeOfResidence as $rc){
                $place_of_residence_arr[] = $rc->country_code;
            }
            $schs->place_of_residence_arr = $place_of_residence_arr;
        }
        ////////////////////
        if(isset($schs->awardUsedFor)){
            foreach($schs->awardUsedFor as $rc){
                $award_used_for_arr[] = $rc->award_used_for_id;
            }
            $schs->award_used_for_arr = $award_used_for_arr;
        }
        ////////////////////
        if(isset($schs->awardUsedAt)){
            foreach($schs->awardUsedAt as $rc){
                $award_used_at_arr[] = $rc->school_type;
            }
            $schs->award_used_at_arr = $award_used_at_arr;
        }
        ////////////////////
        if(isset($schs->majors)){
            foreach($schs->majors as $rc){
                $majors_arr[] = $rc->major_id;
            }
            $schs->majors_arr = $majors_arr;
        }
        ////////////////////
        if(isset($schs->schools)){
            foreach($schs->schools as $rc){
                $schools_arr[] = $rc->id;
            }
            $schs->schools_arr = $schools_arr;
        }
        ////////////////////
        if(isset($schs->designatedArea)){
            foreach($schs->designatedArea as $rc){
                $designated_area_arr[] = $rc->state;
            }
            $schs->designated_area_arr = $designated_area_arr;
        }
        return $schs;
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

        Scholarship::create($data);
        return redirect()->route('admin.scholarship.index');
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
        Scholarship::find($id)->delete();
        return redirect()->route('admin.scholarship.index');
    }
}
