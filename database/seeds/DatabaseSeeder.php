<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
        $this->call(DayTableSeeder::class);
        $this->call(GroupTableSeeder::class);
        $this->call(ReadTypeTableSeeder::class);
        $this->call(CountryTableSeeder::class);
        $this->call(GovernoratesTableSeeder::class);
        $this->call(AdminTableSeeder::class);
        $this->call(TeacherTableSeeder::class);
        
        
        
    }
}
