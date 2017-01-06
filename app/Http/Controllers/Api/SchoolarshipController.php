<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use App\Student;
use App\Favorite;
use App\Schoolarship;
use Illuminate\Http\JsonResponse;

class SchoolarshipController extends Controller
{
    public function changeStatus()
    {
    	if (\Auth::user()) {
    		return 1;
    	} else {
    		return 0;
    	}
    }
}
