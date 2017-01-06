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

class StudentController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $student = Student::with('user', 'user.educations', 'degree', 'typeOfStudy', 'academic')->find($id);
        if($student)
            return response()->json($student->toArray(), 200);
        else
            return response()->json(['message' => 'Student not found!'], 404);
    }

    /**
     * Add schoolarship to user favorite
     * @param Request $request 
     * @return JsonResponse 
     */
    public function addFavorite(Request $request)
    {
        $status = 0;

        $data = $request->all();

        // Find student
        $student = \Auth::user();

        if ($student) {

            if ($data['schoolarId']) {

                // Find schoolarship
                $schoolarship = Schoolarship::find($data['schoolarId']);

                // If student and schoolarship is exists
                if (!empty($student) && !empty($schoolarship)) {

                    // Find favorite
                    $favorite = Favorite::where('student_id', $student->id)->where('schoolarship_id', $data['schoolarId'])->first();

                    // If isset favorite
                    if (!empty($favorite)) {
                        $status = -1;
                    } else {
                        $rs = Favorite::create([
                            'student_id' => $student->id,
                            'schoolarship_id' => $data['schoolarId'],
                            'type' => 2 
                        ]);
                        // When create success
                        if ($rs) {
                            $status = 1;
                        }
                    }   
                }
            }
        } else {
            $status = 2;
        }

        return new JsonResponse(['status' => $status]);
    }

    /**
     * Remove schoolarship from user favorite
     * @param Request $request 
     * @return JsonResponse 
     */
    public function removeFavorite(Request $request)
    {
        $status = 0;

        $data = $request->all();

        // Get favorite
        $favorite = Favorite::where('student_id', $data['studentId'])->where('schoolarship_id', $data['schoolarId'])->first();

        // If exists
        if (!empty($favorite)) {
            $status = $favorite->delete();
        } else {
            $status = -1;
        }

        return new JsonResponse(['status' => $status]);
    }

    public function listFavorite($studentID)
    {
       $favorites = Favorite::where('type', 2)->where('student_id', $studentID)->get();
       
        // List students favorite.
        $universiryIDs = [];
        foreach ($favorites as $key => $value) {
            $universiryIDs[] = $value->university_id;
        }
        return response()->json($universiryIDs, 200);
    }

    public function listUniversityFavorite($studentID)
    {
       $favorites = Favorite::where('type', 1) // Type == 2 : Student add favorite university
            ->where('student_id', $studentID)
            ->get();
        // List students favorite.
        $universiryIDs = [];
        foreach ($favorites as $key => $value) {
            $universiryIDs[] = $value->university_id;
        }
        return response()->json($universiryIDs, 200);
    }
}
