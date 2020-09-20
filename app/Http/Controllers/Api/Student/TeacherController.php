<?php

namespace App\Http\Controllers\Api\Student;

use App\Http\Controllers\Controller;
use App\Http\Resources\TeacterReadResource;
use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function teacherProfile(){
        $student=auth('student-api')->user();
        $teacher=$student->teacher()->get(['name','mobile'])->first();
        $readtype=Teacher::find($student->teacher_id)->readTypes;
        return response()->json(['teacher'=>$teacher,'read type'=>TeacterReadResource::collection($readtype)]);
    }
}
