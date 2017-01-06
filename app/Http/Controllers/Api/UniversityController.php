<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Favorite;
use App\University;

class UniversityController extends Controller
{
    public function addFavorite(Request $request){
    	$studentID = $request->input('student_id');
    	$universityID = $request->input('university_id');
    	$favorite = $request->input('favorite');
    	if (!$studentID || !$universityID)
    		return response()->json("Bad request", 400);

    	//  Favosite is false => add favorite
    	if($favorite == 'false'){
	    	$rs = Favorite::create([
	    		'student_id' => $studentID,
	    		'university_id' => $universityID,
	    		'type' => 1	// University add favorite student
    		]);
    	}else{
    		$rs = Favorite::where('student_id', $studentID)
				->where('university_id', $universityID)
				->where('type', 1)
				->delete();
    	}
		
		if($rs){
			return redirect()->route('api.university.listFavorite', ['id' => $universityID]);
		}else{
			return response()->json(false, 200);
		}
    }

    public function listFavorite($universityID){
    	$favorites = Favorite::where('type', 1)
    		->where('university_id', $universityID)
    		->get();
		// List students favorite.
		$studentIDs = [];

    	foreach ($favorites as $key => $value) {
    		$studentIDs[] = $value->student_id;
    	}
    	return response()->json($studentIDs, 200);
    }

    public function show($id){
        $university = University::with('user')->find($id);
        if($university) return response()->json($university, 200);
        return response()->json(['message' => 'Student not found!'], 404);
    }
}
