<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Watson\Rememberable\Rememberable;

class ReadType extends Model
{
    use Rememberable;

    protected $fillable=['name'];

    public function teachers(){
        return $this->belongsToMany(Teacher::class,'teachers_read_types');
    }
}
