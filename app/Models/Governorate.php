<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Watson\Rememberable\Rememberable;

class Governorate extends Model
{
    use Rememberable;

    protected $fillable=['name'];

    public function teachers(){
        return $this->hasMany(Teacher::class,'governorate_id');

    }
    public function students(){
        return $this->hasMany(Student::class,'student_id');
    }

}
