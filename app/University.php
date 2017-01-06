<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class University extends Model
{
	protected $guarded  = ['id'];

    protected $casts = [
		'major' => 'array',
		'tag' => 'array',
		'offer_degree' => 'array',
	];

	public function user()
	{
		return $this->hasOne('App\User', 'id', 'user_id');
	}

	public function favorites()
	{
	    return $this->hasMany('App\Favorite', 'university_id', 'id')->university();
	}

}
