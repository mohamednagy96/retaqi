<?php

use App\Models\Governorate;
use Illuminate\Database\Seeder;

class GovernoratesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Governorate::create(['name'=>'الاسكندرية','country_id'=>1]);
        Governorate::create(['name'=>'الاسماعليه','country_id'=>1]);
        Governorate::create(['name'=>'اسوان','country_id'=>1]);
        Governorate::create(['name'=>'اسيوط','country_id'=>1]);
        Governorate::create(['name'=>'الاقصر','country_id'=>1]);
        Governorate::create(['name'=>'البحر الاحمر','country_id'=>1]);
        Governorate::create(['name'=>'البحيره','country_id'=>1]);
        Governorate::create(['name'=>'بني يوسف','country_id'=>1]);
        Governorate::create(['name'=>'بورسعيد','country_id'=>1]);
        Governorate::create(['name'=>'جتوب سيناء','country_id'=>1]);
        Governorate::create(['name'=>'الجيزه','country_id'=>1]);
        Governorate::create(['name'=>'الدقهليه','country_id'=>1]);
        Governorate::create(['name'=>'دمياط','country_id'=>1]);
        Governorate::create(['name'=>'سوهاج','country_id'=>1]);
        Governorate::create(['name'=>'السويس','country_id'=>1]);
        Governorate::create(['name'=>'الشرقيه','country_id'=>1]);
        Governorate::create(['name'=>'شمال سيناء','country_id'=>1]);
        Governorate::create(['name'=>'الغربيه','country_id'=>1]);
        Governorate::create(['name'=>'الفيوم','country_id'=>1]);
        Governorate::create(['name'=>'القاهره','country_id'=>1]);
        Governorate::create(['name'=>'القليوبيه','country_id'=>1]);
        Governorate::create(['name'=>'قنا','country_id'=>1]);
        Governorate::create(['name'=>'كفر الشيخ','country_id'=>1]);
        Governorate::create(['name'=>'مطروح','country_id'=>1]);
        Governorate::create(['name'=>'المنوفيه','country_id'=>1]);
        Governorate::create(['name'=>'المنيا','country_id'=>1]);
        Governorate::create(['name'=>'الوادي الجديد','country_id'=>1]);
    
    }
}
