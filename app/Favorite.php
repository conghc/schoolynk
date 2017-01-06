<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    protected $guarded  = ['id'];

    public function university()
    {
    	return $this->hasOne('App\University', 'id', 'university_id');
    }

    public function scopeUniversity($query)
    {
        return $query->where('type', 2);
    }
}
