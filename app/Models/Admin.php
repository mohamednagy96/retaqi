<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    use Notifiable;

    protected $guard = 'admin';

    protected $casts=['super_admin'=>'boolean'];

    protected $fillable = [
        'name', 'email', 'password','super_admin'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    // public function setPasswordAttribute($password)
    // {
    //     if ( $password !== null & $password !== "" )
    //     {
    //         $this->attributes['password'] = bcrypt($password);
    //     }else{
    //         $this->attributes['password'];
    //     }
    // }
}
