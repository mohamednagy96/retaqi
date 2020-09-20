<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Watson\Rememberable\Rememberable;

class Group extends Model
{
    use Rememberable;

    protected $fillable=['name'];

    public function students(){
        return $this->hasMany(Student::class,'student_id');
    }

}
