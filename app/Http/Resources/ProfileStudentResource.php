<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProfileStudentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return[
            'name'=>$this->name,
            'gender'=>$this->gender ,
            'governorate'=>$this->governorate->name,
            'email'=>$this->email,
            'mobile'=>$this->mobile,
            'teacher'=>$this->teacher->name,
            'group'=>$this->group->name
        ];
        // return parent::toArray($request);
    }
}
