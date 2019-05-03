<?php

use App\Menu;
use App\Tag;
use App\Category;
use Illuminate\Database\Seeder;

class MenuTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $menus = [
            [
                'title' => 'رشته ها',
                'link' => route('service.index'),
                'priority' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'اطلاعیه ها',
                'link' => route('notification.index'),
                'priority' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'اخبار',
                'link' => route('news.index'),
                'priority' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'البوم تصاویر',
                'link' => route('album.index'),
                'priority' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'پیش ثبت نام',
                'link' => route('enrollment.create'),
                'priority' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'درباره ما',
                'link' => route('about.show'),
                'priority' => 6,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'تماس با ما',
                'link' => route('contact.show'),
                'priority' => 7,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        Menu::insert($menus);
    }
}
