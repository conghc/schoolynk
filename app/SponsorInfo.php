<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SponsorInfo extends Model
{
    protected $table = 'sponsor_informations';


    protected $with = ['sponsorType'];

    public function sponsorType(){
        return $this->hasOne('App\SponsorType', 'id', 'type');
    }
}
