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
    
}
