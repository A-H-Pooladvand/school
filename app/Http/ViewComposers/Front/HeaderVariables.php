<?php

return [
    'front_menu' => [
        [
            'title' => 'سرویس ها',
            'link' => route('service.index'),
        ],
        [
            'title' => 'اطلاعیه ها',
            'link' => route('notification.index'),
        ],
        [
            'title' => 'اخبار',
            'link' => route('news.index'),
        ],
        [
            'title' => 'البوم تصاویر',
            'link' => route('album.index'),
        ],
        [
            'title' => 'پیش ثبت نام',
            'link' => route('album.index'),
        ],
        [
            'title' => 'درباره ما',
            'link' => route('about.show'),
        ],
        [
            'title' => 'تماس با ما',
            'link' => route('contact.show'),
        ],
    ],
];
