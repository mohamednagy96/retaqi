<?php

use App\Models\ReadType;
use Illuminate\Database\Seeder;

class ReadTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ReadType::create(['name'=>'نافع بن عبد الرحمن بن أبي نعيم المدني']);
        ReadType::create(['name'=>'عبد الله بن كثير الداري المكي']);
        ReadType::create(['name'=>'أبو عمرو بن العلاء البصري']);
        ReadType::create(['name'=>'عبد الله بن عامر اليحصبي الشامي']);
        ReadType::create(['name'=>'عاصم بن أبي النَّجود الأسدي الكوفي']);
    }
}
