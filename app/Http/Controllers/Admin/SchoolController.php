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
use Auth;
use Flash;
use File;
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
    public function index()
    {
        return view('admin.school.index');
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
        $id = $request->input('id', 0);
        $addNew = true;
        if($id != 0) $addNew = false;

        $currencies = Currency::all();
        $countries = \CountryState::getCountries();
        $states = \CountryState::getStates('JP');
        $nationalities = getNationalities();
//        $currentY = intval(date('Y'));
        $majors = Major::all();
        foreach($majors as $k=>$major){
            $dataMajors[$major->type][$k] = $major->text;
        }

        $school = $user->with('images','schoolInfo','faculty')->where('id', $id)->first();
        //dd($school->toArray());
        if($school){
            $school->img_profile = $school->img_profile != '' ? $school->img_profile : 'img/no-image.png';
        }
        return view('admin.school.create', compact('school', 'addNew','currencies', 'countries', 'states', 'nationalities', 'dataMajors'));
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $schoolarship = Schoolarship::find($id);
        if(!$schoolarship){
            Flash::warning('Can\'t find Schoolarship '.$id);
            return redirect()->route('admin.schoolarship.index');
        }
        $months = [['Jan','1'],['Feb','2'],['Mar','3'],['Apr','4'],['May','5'],['Jun','6'],['Jul','7'],['Aug','8'],['Sep','9'],['Oct','10'],['Nov','11'],['Dec','12']];
        $typeOrans = OranizationType::all();
        $majors = Major::all();
        $degrees = Degree::all();
        $academics = Academic::all();
        $typeOfStudies = TypeOfStudy::all();
        $currencies = Currency::all();
        $countries = \CountryState::getCountries();
        $states = \CountryState::getStates('US');
        $langs = ["Afar","Abkhazian","Avestan","Afrikaans","Akan","Amharic","Aragonese","Arabic","Assamese","Avaric","Aymara","Azerbaijani","Bashkir","Belarusian","Bulgarian","Bihari languages","Bislama","Bambara","Bengali","Tibetan","Breton","Bosnian","Catalan; Valencian","Chechen","Chamorro","Corsican","Cree","Czech","Church Slavic; Old Slavonic; Church Slavonic; Old Bulgarian; Old Church Slavonic","Chuvash","Welsh","Danish","German","Divehi; Dhivehi; Maldivian","Dzongkha","Ewe","Greek, Modern (1453-)","English","Esperanto","Spanish; Castilian","Estonian","Basque","Persian","Fulah","Finnish","Fijian","Faroese","French","Western Frisian","Irish","Gaelic; Scottish Gaelic","Galician","Guarani","Gujarati","Manx","Hausa","Hebrew","Hindi","Hiri Motu","Croatian","Haitian; Haitian Creole","Hungarian","Armenian","Herero","Interlingua (International Auxiliary Language Association)","Indonesian","Interlingue; Occidental","Igbo","Sichuan Yi; Nuosu","Inupiaq","Ido","Icelandic","Italian","Inuktitut","Japanese","Javanese","Georgian","Kongo","Kikuyu; Gikuyu","Kuanyama; Kwanyama","Kazakh","Kalaallisut; Greenlandic","Central Khmer","Kannada","Korean","Kanuri","Kashmiri","Kurdish","Komi","Cornish","Kirghiz; Kyrgyz","Latin","Luxembourgish; Letzeburgesch","Ganda","Limburgan; Limburger; Limburgish","Lingala","Lao","Lithuanian","Luba-Katanga","Latvian","Malagasy","Marshallese","Maori","Macedonian","Malayalam","Mongolian","Marathi","Malay","Maltese","Burmese","Nauru","Bokmål, Norwegian; Norwegian Bokmål","Ndebele, North; North Ndebele","Nepali","Ndonga","Dutch; Flemish","Norwegian Nynorsk; Nynorsk, Norwegian","Norwegian","Ndebele, South; South Ndebele","Navajo; Navaho","Chichewa; Chewa; Nyanja","Occitan (post 1500); Provençal","Ojibwa","Oromo","Oriya","Ossetian; Ossetic","Panjabi; Punjabi","Pali","Polish","Pushto; Pashto","Portuguese","Quechua","Romansh","Rundi","Romanian; Moldavian; Moldovan","Russian","Kinyarwanda","Sanskrit","Sardinian","Sindhi","Northern Sami","Sango","Sinhala; Sinhalese","Slovak","Slovenian","Samoan","Shona","Somali","Albanian","Serbian","Swati","Sotho, Southern","Sundanese","Swedish","Swahili","Tamil","Telugu","Tajik","Thai","Tigrinya","Turkmen","Tagalog","Tswana","Tonga (Tonga Islands)","Turkish","Tsonga","Tatar","Twi","Tahitian","Uighur; Uyghur","Ukrainian","Urdu","Uzbek","Venda","Vietnamese","Volapük","Walloon","Wolof","Xhosa","Yiddish","Yoruba","Zhuang; Chuang","Chinese","Zulu"];
        $editors = User::where('role', 2)->get();

        // Get lists categories
        $categories = Category::lists('title', 'id');

        return view('admin.schoolarship.edit', compact('schoolarship', 'editors', 'typeOrans', 'majors', 'degrees', 'academics', 'typeOfStudies', 'currencies', 'months', 'countries', 'states', 'langs', 'categories') );
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
                            $facultySchool = FacultySchool::create(['name' => $fs['name_school'], 'academic_level' => $fs['child'], 'faculty_id' => $faculty_id]);
                        }
                    }
                }
            }
        }
        return redirect('admin/school/create?id=' . $school_id);
    }

    public function schoolInfoUpdate(Request $request, User $user, SchoolInfo $schoolInfo){
        $school_id = $request->input('school_id', 0);
        $school_info_id = $request->input('school_info_id', 0);
        $user = $user->where('id', $school_id)->where('role', 4)->first();
        if($user){
            $file = $request->brochure ? $request->brochure : null;

            $data = $request->except('_token', 'school_info_id', 'brochure');
            $schoolInfo = $schoolInfo->where('id', $school_info_id)->first();
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
                $rs = $schoolInfo->update($data);
            }else{
                $rs = SchoolInfo::create($data);
            }
        }
        return redirect('admin/school/create?id=' . $school_id);
    }
}
