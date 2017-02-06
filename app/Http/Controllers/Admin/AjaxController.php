<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Intervention\Image\ImageManager;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Scholarship;
use App\User;
use App\SponsorInfo;
use App\ScholarshipAcademic;
use App\ScholarshipPlaceOfResidence;
use App\ScholarshipNationality;

use App\ScholarshipAwardUsedFor;
use App\ScholarshipAwardUsedAt;
use App\ScholarshipMajor;
use App\ScholarshipDesignatedArea;
use App\ScholarshipSchool;
use App\Images;
use App\FacultySchool;
use Auth;
use Flash;
use Intervention\Image\ImageManagerStatic as Image;
use File;

class AjaxController extends Controller
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

    }
    
    public function addSponsor(Request $request, User $user, Scholarship $scholarship){
        $data = $request->except(['re_password']);
        $sponsor_id = $request->input('sponsor_id', 0);
        $scholarship_id = $request->input('scholarship_id', 0);
        $type = $request->input('user_type', 'sponsor');
        $role = $type == 'sponsor' ? 3 : 4;
        unset($data['scholarship_id']);
        unset($data['user_type']);
        $returns = ['code' => 0];
        if($sponsor_id == 0){
            $u_exist = $user->where('email', 'LIKE', $data['email'])->first();
            if($u_exist){
                $returns['msg'] = trans('label.user_exist');
                $returns['code'] = 1;
            }else{
                $data['password'] = bcrypt($data['password']);
                $data['role'] = $role;
                unset($data['sponsor_id']);
                $us = $user->create($data);
                $act = 'add';
                $returns = ['act' => $act, 'id' => $us->id, 'name' => $us->name, 'email' => $us->email, 'msg' => trans('label.insert_success')];
                if($type == 'school'){
                    $returns['rdr'] = route('admin.school.create', ['id' => $us->id]);
                }
                $sponsor_id = $us->id;
            }
        }else{
            $sponsor = $user->where('role',$role)->where('id',$data['sponsor_id'])->first();
            unset($data['sponsor_id']);
            unset($data['email']);
            if($data['password'] == ''){
                unset($data['password']);
            }else{
                $data['password'] = bcrypt($data['password']);
            }
            $us = $sponsor->update($data);
            $act = 'update';
            $returns = ['act' => $act, 'msg' => trans('label.update_success')];
        }
        if($scholarship_id != 0){
            $scholarship->where('id',$scholarship_id)->update(['sponsor_id' => $sponsor_id]);
        }

        return response()->json($returns);
    }

    public function updateSponsorInfo(Request $request, SponsorInfo $sponsorinfo){
        $data = $request->only('sponsor_id', 'type', 'address', 'website', 'other_information');
        $sponsor_id = $request->input('sponsor_id', 0);
        $data_info = $sponsorinfo->where('user_id', $sponsor_id)->first();
        $data['user_id'] = $data['sponsor_id'];
        unset($data['sponsor_id']);
        if($data_info){
            $rs = SponsorInfo::where('user_id',$sponsor_id)->update($data);
        }else{
            $sponsorinfo->user_id = $data['user_id'];
            $sponsorinfo->type = $data['type'];
            $sponsorinfo->address = $data['address'];
            $sponsorinfo->website = $data['website'];
            $sponsorinfo->other_information = $data['other_information'];
            $rs = $sponsorinfo->save();
            //$rs = $sponsorinfo->create($data);
        }
        return $rs;
    }

    public function uploadUserLogo(Request $request){
        if ($request->hasFile('img_profile')) {
            $user_id = $request->input('sponsor_id', 0);
            $user = User::where('id',$user_id)->first();

            $image = $request->img_profile;
            $filename  = 'user-' . time() . '.' . $image->getClientOriginalExtension();

            //File::exists(storage_path('files/profile/'));
            File::makeDirectory(public_path('users/'),0777, true, true);
            $path = public_path('users/'. $filename);
            Image::make($image->getRealPath())->resize(200, 200)->save($path);
            $user->img_profile = 'users/'. $filename;
            $user->save();
            return 'success';
        }else{
            return 'failed';
        }
    }

    public function infoSponsor(User $user, Request $request){
        $sponsor_id = $request->input('sponsor_id', 0);
        $sponsor = $user->where('id', $sponsor_id)->first();
        $sponsor->img_profile = $sponsor->img_profile != '' ? $sponsor->img_profile : 'img/no-image.png';

        return response()->json($sponsor);
    }

    public function addScholarship(Request $request, Scholarship $scholarship){
        $data = $request->except(['re_password']);
        $scholarship_id = $request->input('scholarship_id', 0);
        $sponsor_id = $request->input('sponsor_id', 0);
        unset($data['scholarship_id']);
        if((int) $sponsor_id == 0) unset($data['sponsor_id']);
        if(isset($data['deadline'])){
            $data['deadline'] = date('Y-m-d', strtotime($data['deadline']));
        }
        if($scholarship_id != 0){
            $scholarship = $scholarship->where('id',$scholarship_id)->first();
            $data_relation = $data;
            unset($data['form']);
            unset($data['nationality']);
            unset($data['applicants_current_academic_level']);
            unset($data['current_place_of_residence']);

            unset($data['award_can_be_used_for']);
            unset($data['award_can_be_used_at']);
            unset($data['qualified_majors']);
            unset($data['designated_country']);
            unset($data['designated_state']);
            unset($data['designated_school']);

            $us = $scholarship->update($data);
            $this->addRelationScholarship(array_merge($data_relation, ['scholarship_id'=>$scholarship_id]));
            $returns = ['act'=>'edit'];
        }else{
            $scholarship = $scholarship->create($data);
            $returns = ['act'=>'add', 'rdr' => route('admin.scholarship.create', ['id' => $scholarship->id])];
        }
        return response()->json($returns);
    }

    public function addRelationScholarship($data){
        $scholarship_id = $data['scholarship_id'];
        $data['form'] = isset($data['form']) ? $data['form'] : '';
        if($data['form'] == 'eligibility_requirement'){
            // inset into scholarship_nationality
            ScholarshipNationality::where('scholarship_id', $scholarship_id)->delete();
            if(isset($data['nationality'])){
                if(count($data['nationality']) > 0){
                    $data_insert = [];
                    for($i=0; $i<count($data['nationality']); $i++){
                        $data_insert[] = ['scholarship_id' => $scholarship_id, 'nationality' => strtolower($data['nationality'][$i])];
                    }
                }
                ScholarshipNationality::insert($data_insert);
            }

            // inset into scholarship_academics
            ScholarshipAcademic::where('scholarship_id', $scholarship_id)->delete();
            if(isset($data['applicants_current_academic_level'])){
                if(count($data['applicants_current_academic_level']) > 0){
                    $data_insert = [];
                    for($i=0; $i<count($data['applicants_current_academic_level']); $i++){
                        $data_insert[] = ['scholarship_id' => $scholarship_id, 'academic_id' => strtolower($data['applicants_current_academic_level'][$i])];
                    }
                }
                ScholarshipAcademic::insert($data_insert);
            }

            // inset into scholarship_place_of_residence
            ScholarshipPlaceOfResidence::where('scholarship_id', $scholarship_id)->delete();
            if(isset($data['current_place_of_residence'])){
                if(count($data['current_place_of_residence']) > 0){
                    $data_insert = [];
                    for($i=0; $i<count($data['current_place_of_residence']); $i++){
                        $data_insert[] = ['scholarship_id' => $scholarship_id, 'country_code' => strtolower($data['current_place_of_residence'][$i])];
                    }
                }
                ScholarshipPlaceOfResidence::insert($data_insert);
            }

        }elseif($data['form'] == 'qualified_school_academics'){
            // inset into scholarship_award_used_for
            ScholarshipAwardUsedFor::where('scholarship_id', $scholarship_id)->delete();
            if(isset($data['award_can_be_used_for'])){
                if(count($data['award_can_be_used_for']) > 0){
                    $data_insert = [];
                    for($i=0; $i<count($data['award_can_be_used_for']); $i++){
                        $data_insert[] = ['scholarship_id' => $scholarship_id, 'award_used_for_id' => strtolower($data['award_can_be_used_for'][$i])];
                    }
                }
                ScholarshipAwardUsedFor::insert($data_insert);
            }

            // inset into scholarship_award_used_at
            ScholarshipAwardUsedAt::where('scholarship_id', $scholarship_id)->delete();
            if(isset($data['award_can_be_used_at'])){
                if(count($data['award_can_be_used_at']) > 0){
                    $data_insert = [];
                    for($i=0; $i<count($data['award_can_be_used_at']); $i++){
                        $data_insert[] = ['scholarship_id' => $scholarship_id, 'school_type' => strtolower($data['award_can_be_used_at'][$i])];
                    }
                }
                ScholarshipAwardUsedAt::insert($data_insert);
            }
            // inset into scholarship_place_of_residence
            ScholarshipMajor::where('scholarship_id', $scholarship_id)->delete();
            if(isset($data['qualified_majors'])){
                if(count($data['qualified_majors']) > 0){
                    $data_insert = [];
                    for($i=0; $i<count($data['qualified_majors']); $i++){
                        $data_insert[] = ['scholarship_id' => $scholarship_id, 'major_id' => strtolower($data['qualified_majors'][$i])];
                    }
                }
                ScholarshipMajor::insert($data_insert);
            }

            // inset into scholarship_designated_area
            ScholarshipDesignatedArea::where('scholarship_id', $scholarship_id)->delete();
            if(isset($data['designated_state'])){
                if(count($data['designated_country']) > 0 && count($data['designated_state']) > 0){
                    $data_insert = [];
                    for($i=0; $i<count($data['designated_state']); $i++){
                        $data_insert[] = ['scholarship_id' => $scholarship_id, 'country_code' => 'JP', 'state' => strtolower($data['designated_state'][$i])];
                    }
                }
                ScholarshipDesignatedArea::insert($data_insert);
            }

            // inset into scholarship_schools
            ScholarshipSchool::where('scholarship_id', $scholarship_id)->delete();
            if(isset($data['designated_school'])){
                if(count($data['designated_school']) > 0){
                    $data_insert = [];
                    for($i=0; $i<count($data['designated_school']); $i++){
                        $data_insert[] = ['scholarship_id' => $scholarship_id, 'school_id' => strtolower($data['designated_school'][$i])];
                    }
                }
                ScholarshipSchool::insert($data_insert);
            }

        }
    }

    public function uploadImages(Request $request, Images $images){
        if ($request->hasFile('file')) {
            $record_id = $request->input('id', 0);
            $type = $request->input('type', '');
            if(in_array($type, ['school'])){
                $user = User::where('id',$record_id)->first();
                if($user){
                    $files = $request->file;

                    foreach($files as $file){
                        $filename  = 'user-' . time() . rand() . '.' . $file->getClientOriginalExtension();
                        //File::exists(storage_path('files/profile/'));
                        File::makeDirectory(public_path('users/'. $user->id. '/'),0777, true, true);
                        $path = public_path('users/'. $user->id . '/' .$filename);
                        $img = Image::make($file->getRealPath());
                        $ratio = 750 / 400;
                        $img->fit($img->width(), intval($img->width() / $ratio), null , 'center');
//                            ->resize(1200, null,function ($constraint) {
//                                $constraint->aspectRatio();
//                            })
                            //->resizeCanvas(1200, 654)
                        $img->save($path);
                        // save to images table
                        $data = ['type' => 'school', 'record_id' => $user->id];
                        $data['name'] = $file->getClientOriginalName();
                        $data['path'] = 'users/'. $user->id . '/' . $filename;
                        $data['sort'] = 1;
                        $images->create($data);
                    }
                    return trans('label.insert_success');
                }else{
                    return false;
                }
            }else{
                return false;
            }
        }else{
            return 'failed';
        }
    }
    public function sortImages(Request $request, Images $images){
        $files = $request->input('files', '');
        if($files != ''){
            $files = explode('|||', $files);
            $files = array_flip($files);
            foreach($files as $k=>$sort){
                $images->where('id', $k)->update(['sort' => (int) $sort]);
            }
        }
        return ['msg' => trans('label.sort_success')];
    }

    public function addFacultySchoolInfo(Request $request, FacultySchool $fs){
        $fsId = $request->input('fsId', 0);
        $fs = $fs->find($fsId);
        if($fs){
            $fs->update(['added_info' => 1]);
        }else{
            //echo(trans('label.cannot_find_record'));
        }
    }
}
