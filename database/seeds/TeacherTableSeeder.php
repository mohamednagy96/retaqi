<?php

use App\Models\Teacher;
use Illuminate\Database\Seeder;

class TeacherTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        Teacher::create([
            'name'=>'Ahmed Mohamed',
            'email'=>$faker->unique()->email,
            'date_of_birth'=>$faker->dateTime(),
            'gender'=>'M',
            'mobile'=>$faker->phoneNumber,
            "governorate_id"=>App\Models\Governorate::all()->random()->id,
            'password'=>bcrypt('12345678'),
           
        ]);
        Teacher::create([
            'name'=>'Noha Ahmed',
            'email'=>$faker->unique()->email,
            'date_of_birth'=>$faker->dateTime(),
            'gender'=>'F',
            'mobile'=>$faker->phoneNumber,
            "governorate_id"=>App\Models\Governorate::all()->random()->id,
            'password'=>bcrypt('12345678'),
            'approved_at'=>$faker->dateTime()
           
        ]);
        Teacher::create([
            'name'=>'Hossam Mohamed',
            'email'=>$faker->unique()->email,
            'date_of_birth'=>$faker->dateTime(),
            'gender'=>'M',
            'mobile'=>$faker->phoneNumber,
            "governorate_id"=>App\Models\Governorate::all()->random()->id,
            'password'=>bcrypt('12345678'),
            'approved_at'=>$faker->dateTime()
           
        ]);
    }
}
