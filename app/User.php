<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded  = ['id'];
    
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $appends = ['fullname'];    
    
    public function student()
    {
        return $this->hasOne('App\Student', 'user_id', 'id');
    }

    public function university()
    {
        return $this->hasOne('App\University', 'user_id', 'id');
    }
    
    public function educations()
    {
        return $this->hasMany('App\EducationAbroad');
    }

    public function schoolarships()
    {
        return $this->hasMany('App\UserSchoolarship', 'user_id', 'id');
    }

    public function getFullnameAttribute()
    {
        return $this->attributes['name'].' '.$this->attributes['last_name'];
    }

    public function sponsorInfo(){
        return $this->hasOne('App\SponsorInfo','user_id', 'id');
    }

    public function images(){
        return $this->hasMany('App\Images', 'record_id', 'id')->orderBy('sort', 'ASC')->orderBy('created_at', 'DESC');
    }

    public function schoolInfo(){
        return $this->hasOne('App\SchoolInfo','school_id', 'id');
    }

    public function faculty(){
        return $this->hasMany('App\Faculty', 'school_id', 'id');
    }

    public function otherText(){
        return $this->hasMany('App\OtherText', 'school_id', 'id')->where('type', 'school');
    }
    public function texts(){
        return $this->hasMany('App\OtherText', 'school_id', 'id')->where('type', '!=', 'school');
    }

    public function scholarships(){
        //return $this->hasManyThrough('App\Scholarship', 'App\ScholarshipSchool', 'school_id', 'id');
        return $this->belongsToMany('App\Scholarship', 'scholarship_schools', 'school_id', 'scholarship_id');
    }

    public function facultySchool(){
        return $this->hasMany('App\FacultySchool', 'school_id', 'id');
    }

    public function major(){
        return $this->hasMany('App\Major', 'school_id', 'id');
    }
    
}
