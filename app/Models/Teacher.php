<?php

namespace App\Models;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Illuminate\Database\Eloquent\Model;

class Teacher extends  Authenticatable
{
    use HasApiTokens , Notifiable;

    protected $fillable = [
        'name', 'email', 'mobile','date_of_birth','gender','governorate_id','available_time','password','approved_at'
    ];

    public function governorate(){
        return $this->belongsTo(Governorate::class);
    }
    public function student(){
        return $this->has(Student::class);
    }
    public function days(){
        return $this->belongsToMany(Day::class,'teachers_avaliable_days');
    }

    public function readTypes(){
        return $this->belongsToMany(ReadType::class,'teachers_read_types');
    }
    public function scopeApproved($query)
    {
        return $query->whereNotNull('approved_at')->get();
    }
    public function subscribe()
    {
         return $this->morphOne(Subscribe::class, 'subscribeable');
    }

}
