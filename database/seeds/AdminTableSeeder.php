<?php

use Illuminate\Database\Seeder;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        \App\Models\Admin::create([
            'name' => 'test',
            'email' => "admin1234@test.com",
            'super_admin'=>'1',
            'password' => Hash::make('admin1234')
        ]);
    }
}
