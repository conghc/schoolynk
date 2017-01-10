<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Faculty extends Model
{
    protected $table = 'faculty';
    protected $guarded  = ['id'];


    protected $with = ['facultySchool'];

    public function facultySchool(){
        return $this->hasMany('App\FacultySchool', 'faculty_id', 'id');
    }
}
