<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ScholarshipAcademic extends Model
{
    protected $guarded  = ['id'];
    protected $table = 'scholarship_academics';

    protected $with = ['academic'];

    public function academic(){
        return $this->hasOne('App\Academic', 'id', 'academic_id');
    }
    
}
