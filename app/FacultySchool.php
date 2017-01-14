<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FacultySchool extends Model
{
    protected $table = 'faculty_school';
    protected $guarded  = ['id'];

    protected $with = ['major'];

    public function major(){
        return $this->hasMany('App\Major', 'fs_id', 'id');
    }
}
