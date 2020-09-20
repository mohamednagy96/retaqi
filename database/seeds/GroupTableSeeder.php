<?php

use App\Models\Group;
use Illuminate\Database\Seeder;

class GroupTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Group::create(['name'=>'تمهيدي']);  
        Group::create(['name'=>'الفرقه الاولي']);  
        Group::create(['name'=>'الفرقه الثانيه']);  
        Group::create(['name'=>'الفرقه الثالثه']);  
        Group::create(['name'=>'الفرقه الرابعه']);  
        Group::create(['name'=>'الفرقه الخامسه']);  
        Group::create(['name'=>'الفرقه السادسه']);  
        
    }
}
