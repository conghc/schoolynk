<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Major extends Model
{
    protected $guarded  = ['id'];

    public function school(){
        return $this->belongsTo('App\User', 'school_id', 'id');
    }
}
