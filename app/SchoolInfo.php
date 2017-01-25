<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SchoolInfo extends Model
{
    protected $table = 'school_informations';

    protected $guarded = [];

    protected $appends = [
        'location'
    ];

    public function getLocationAttribute(){
        $states = \CountryState::getStates('JP');
        $state = $this->state ? $states[$this->state] : '--';
        return 'Japan' . ', '. $state;
    }
}
