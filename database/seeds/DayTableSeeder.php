<?php

use App\Models\Day;
use Illuminate\Database\Seeder;

class DayTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Day::create(['name'=>'السبت']);
        Day::create(['name'=>'الاحد']);  
        Day::create(['name'=>'الاثنين']);  
        Day::create(['name'=>'الثلاثاء']);  
        Day::create(['name'=>'الاربعاء']);  
        Day::create(['name'=>'الخميس']);  
        Day::create(['name'=>'الجمعه']);  

    }
}
