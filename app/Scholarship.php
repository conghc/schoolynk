<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Scholarship extends Model
{
    protected $guarded  = ['id'];

    //use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $casts = [
//        'covering_cost' => 'array',
//        'process' => 'array',
//		'nationality' => 'array',
//		'state' => 'array',
//        'city' => 'array',
//        'destination_country' => 'array',
//        'destination_state' => 'array',
//        'language' => 'array',
//        'current_education' => 'array',
//        'education' => 'array',
//        'academic' => 'array',
//		'major' => 'array',
	];

    protected $with = ['nationality', 'academicLevel', 'placeOfResidence',
        'awardUsedFor', 'awardUsedAt', 'majors', 'schools', 'designatedArea', 'sponsor'];
	
    public function OranizationType()
    {
        //return $this->hasOne('App\OranizationType', 'id', 'type_of_oran');
    }
    public function editor()
    {
        return $this->hasOne('App\User', 'id', 'user_id');
    }

    public function nationality(){
        return $this->hasMany('App\ScholarshipNationality', 'scholarship_id', 'id');
    }

    public function academicLevel(){
        return $this->hasMany('App\ScholarshipAcademic', 'scholarship_id', 'id');
    }

    public function placeOfResidence(){
        return $this->hasMany('App\ScholarshipPlaceOfResidence', 'scholarship_id', 'id');
    }

    public function awardUsedFor(){
        return $this->hasMany('App\ScholarshipAwardUsedFor', 'scholarship_id', 'id');
    }

    public function awardUsedAt(){
        return $this->hasMany('App\ScholarshipAwardUsedAt', 'scholarship_id', 'id');
    }

    public function majors(){
        return $this->hasMany('App\ScholarshipMajor', 'scholarship_id', 'id');
    }

    public function schools(){
        //return $this->hasMany('App\ScholarshipSchool', 'scholarship_id', 'id');
        return $this->belongsToMany('App\User', 'scholarship_schools', 'scholarship_id', 'school_id');
    }

    public function designatedArea(){
        return $this->hasMany('App\ScholarshipDesignatedArea', 'scholarship_id', 'id');
    }

    public function sponsor(){
        return $this->hasOne('App\User', 'id', 'sponsor_id');
    }
}
