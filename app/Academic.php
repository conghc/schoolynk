<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Academic extends Model
{
    protected $guarded  = ['id'];
    protected $table = 'academic_levels';
}
