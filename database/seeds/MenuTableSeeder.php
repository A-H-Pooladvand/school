<?php

use App\Menu;
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
                'title' => 'صفحه اصلی',
                'link' =>  '/',
                'priority' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'رشته ها',
                'link' =>  parse_url(route('service.index'))['path'],
                'priority' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'اطلاعیه ها',
                'link' =>  parse_url(route('notification.index'))['path'],
                'priority' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'اخبار',
                'link' =>  parse_url(route('news.index'))['path'],
                'priority' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'البوم تصاویر',
                'link' =>  parse_url(route('album.index'))['path'],
                'priority' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'پیش ثبت نام',
                'link' =>  parse_url(route('enrollment.create'))['path'],
                'priority' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'درباره ما',
                'link' =>  parse_url(route('about.show'))['path'],
                'priority' => 6,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'تماس با ما',
                'link' =>  parse_url(route('contact.show'))['path'],
                'priority' => 7,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        Menu::insert($menus);
    }
}
