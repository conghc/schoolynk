<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ScholarshipAwardUsedFor extends Model
{
    protected $guarded  = ['id'];
    protected $table = 'scholarship_award_used_for';

    protected $with = ['AwardUsedFor'];

    public function awardUsedFor(){
        return $this->hasOne('App\AwardUsedFor', 'id', 'award_used_for_id');
    }
    
}
