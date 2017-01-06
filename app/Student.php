<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Student extends Model
{
	// protected $table = 'students';
	protected $guarded  = ['id'];
	
	protected $casts = [
		'major' => 'array',
		'language' => 'array',
	];
	
	protected $dates = ['birthday'];

	protected $appends = ['age'];
	
	public function user()
	{
		return $this->hasOne('App\User', 'id', 'user_id');
	}
	
	public function degree()
	{
		return $this->hasOne('App\Degree', 'id', 'degree');
	}

	public function typeOfStudy()
	{
		return $this->hasOne('App\TypeOfStudy', 'id', 'type_of_study');
	}
	
	public function academic()
	{
		return $this->hasOne('App\Academic', 'id', 'academic');
	}

	public function _major()
	{
		return $this->hasOne('App\Major', 'id', 'major');
	}

	public function favorites()
	{
	    return $this->hasMany('App\Favorite', 'student_id', 'id');
	}

	public function messages()
	{
	    return $this->hasMany('App\Message', 'student_id', 'id');
	}

	public function getAgeAttribute()
	{
		return Carbon::parse($this->attributes['birthday'])->age ;
	}
	
}
