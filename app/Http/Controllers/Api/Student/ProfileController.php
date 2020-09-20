<?php

namespace App\Http\Controllers\Api\Student;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProfileStudentResource;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function profile(){
        $student = auth('student-api')->user();
        return new ProfileStudentResource($student);
    }

    public function updateProfile(Request $request){
        $student = auth('student-api')->user();
        $student->update($request->all());
        return response()->json(['status'=>'success','data'=>new ProfileStudentResource($student)]);
    }
}
