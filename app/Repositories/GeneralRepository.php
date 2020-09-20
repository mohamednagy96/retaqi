<?php
namespace App\Repositories;

use App\Models\Day;
use App\Models\Governorate;
use App\Models\Group;
use App\Models\ReadType;
use App\Models\Teacher;
use App\Repositories\Interfaces\GeneralRepositoryInterface;
use Illuminate\Support\Facades\Cache;

class GeneralRepository implements GeneralRepositoryInterface
{
    public $cache_duration=60*60*24*30;
    public function getDays()
    {
        return Day::remember($this->cache_duration)->get();
    }
    public function getGroups()
    {
        return Group::remember($this->cache_duration)->get();
    }
    public function getReadTypes()
    {
        return ReadType::remember($this->cache_duration)->get();
    }
    public function getGovernorates()
    {
        return Governorate::remember($this->cache_duration)->get();
    }
    public function getApprovedTeachers(){
        return  Teacher::Approved();
    }



}
