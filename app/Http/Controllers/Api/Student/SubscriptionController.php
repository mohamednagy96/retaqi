<?php

namespace App\Http\Controllers\Api\Student;

use App\Http\Controllers\Api\CoreJsonResponse;
use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\Subscribtion;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    use CoreJsonResponse;

    public function supscribe(Request $request){
       
        $input = $request->all();
      //  $student = Student::findOrFail(1);
        $student = auth()->user()->id;
       
     //  return $student;

        // $createSubscription = Subscribtion::create([
        //     'type' => $request->type,
        //     'student_id' =>1,
        // ]);
        $student->update([
            'day_id'=>$request->day_id,
            'avaliable_time'=>$request->avaliable_time,
            'teacher_id'=>$request->teacher_id,
            'previous_preservation'=>$request->previous_preservation,
            'group_id'=>$request->group_id

        ]);
        return $request->all();
        return $this->ok();

        
        

    }
}
