<?php

namespace App\Models;

use Watson\Rememberable\Rememberable;
use Illuminate\Database\Eloquent\Model;

class Day extends Model
{
    use Rememberable;

    protected $fillable=['name'];

    public function student(){
        return $this->belongsTo(Student::class,'student_id','id');
    }
    public function teachers(){
        return $this->belongsToMany(Teacher::class,'teachers_avaliable_days');
    }
    
}
