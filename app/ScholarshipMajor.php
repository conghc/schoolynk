<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ScholarshipMajor extends Model
{
    protected $guarded  = ['id'];
    protected $table = 'scholarship_majors';

    protected $with = ['major'];

    public function major(){
        return $this->hasOne('App\Major', 'id', 'major_id');
    }
    
}
