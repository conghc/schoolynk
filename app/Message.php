<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $guarded  = ['id'];

    /**
     * @Relation
     */
    public function university()
	{
		return $this->hasOne('App\University', 'id', 'university_id');
	}

	/**
     * @Relation
     */
    public function student()
	{
		return $this->hasOne('App\Student', 'id', 'student_id');
	}
}
