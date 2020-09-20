<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentAttendance extends Model
{
    protected $fillable=['student_id','date','attended','hw_1','hw_1_grade','hw_2','hw_2_grade','hw_3','hw_3_grade','hw_4','hw_4_grade'];
    
}
