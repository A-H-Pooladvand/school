<?php

use App\About;
use App\Setting;
use Illuminate\Database\Seeder;

class SettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Setting::create([
            'instagram' => 'https://instagram.com/maedeartschool?utm_source=ig_profile_share&igshid=11joxixhclj53',
            'twitter' => 'https://twitter.com/@maedeartschool',
            'linkedin' => 'https://linkedin.com/in/maedeartschool',
            'telegram' => 'http://t.me/faranakgharighi',
            'address' => 'ستارخان - خیابان خسرو جنوبی (صادقی پور) - 27 غربی - پلاک 5',
            'email' => 'honarestan_maedeh@yahoo.com',
            'enrollment_background' => 'files/_root/enrollment.jpg',
            'phone' => '021-44249559',
        ]);
    }
}
