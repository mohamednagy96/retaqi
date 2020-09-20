<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class Student extends  Authenticatable
{
    use HasApiTokens , Notifiable;
    protected $fillable=['name','email','date_of_birth','mobile','gender','avaliable_time','governorate_id','group_id','day_id','teacher_id','password','approved_at','previous_preservation'];
    
    public function governorate(){
        return $this->belongsTo(Governorate::class);
    }
    public function group(){
        return $this->belongsTo(Group::class);
    }
    public function teacher(){
        return $this->belongsTo(Teacher::class,'teacher_id','id');
    }
    public function day(){
        return $this->belongsTo(Day::class ,'day_id','id');
    }
    public function subscribe()
    {
         return $this->morphOne(Subscribe::class, 'subscribeable');
    }

}
