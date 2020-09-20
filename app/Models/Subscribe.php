<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subscribe extends Model
{
    protected $fillable = [
        'subscribeable_id', 'subscribeable_type', 'type'
    ];
    public function subscribeable(){

        return $this->morphTo('subscribeable','subscribeable_id','subscribeable_type');
 
     }
}
