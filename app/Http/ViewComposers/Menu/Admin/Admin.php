<?php
/**
 * Created by PhpStorm.
 * User: Amirhossein
 * Date: 2/6/2018
 * Time: 10:23 PM
 */

return [
    // Dashboard
    [
        'title' => 'داشبورد',
        'icon' => 'fa fa-fw fa-home',
        'link' => '#',
        'permission' => 'panel',
        'sub' => [
            [
                'title' => 'مشاهده سایت',
                'link' => route('home'),
                'permission' => 'admin-panel',
                'target' => '_blank',
            ],
        ],
    ],
    // User
    [
        'title' => 'کاربران',
        'icon' => 'fa fa-fw fa-user',
        'link' => '#',
        'permission' => 'user',
        'sub' => [
            [
                'title' => 'افزودن کاربر',
                'link' => route('admin.user.create'),
                'permission' => 'create-user',
            ],
            [
                'title' => 'لیست کاربران',
                'link' => route('admin.user.index'),
                'permission' => 'read-user',
            ],
            [
                'title' => 'افزودن نقش',
                'link' => route('admin.role.create'),
                'permission' => 'create-acl',
            ],
            [
                'title' => 'لیست نقش ها',
                'link' => route('admin.role.index'),
                'permission' => 'read-acl',
            ],
        ],
    ],
    // Slider
    [
        'title' => 'اسلایدر',
        'icon' => 'fa fa-fw fa-sliders',
        'link' => '#',
        'permission' => 'slider',
        'sub' => [
            [
                'title' => 'افزودن اسلایدر',
                'link' => route('admin.slider.create'),
                'permission' => 'create-slider',
            ],
            [
                'title' => 'لیست اسلاید ها',
                'link' => route('admin.slider.index'),
                'permission' => 'read-slider',
            ],
        ],
    ],
    // News
    [
        'title' => 'اخبار',
        'icon' => 'fa fa-fw fa-diamond',
        'link' => '#',
        'permission' => 'news',
        'sub' => [
            [
                'title' => 'افزودن مطلب',
                'link' => route('admin.news.create'),
                'permission' => 'create-news',
            ],
            [
                'title' => 'لیست مطالب',
                'link' => route('admin.news.index'),
                'permission' => 'read-news',
            ],
            [
                'title' => 'افزودن دسته بندی',
                'link' => route('admin.news.category.create'),
                'permission' => 'create-news|edit-news',
            ],
            [
                'title' => 'لیست دسته بندی ها',
                'link' => route('admin.news.category.index'),
                'permission' => 'create-news|edit-news',
            ],
        ],
    ],
    // Service
    [
        'title' => 'خدمت ها',
        'icon' => 'fa fa-fw fa-gear',
        'link' => '#',
        'permission' => 'service',
        'sub' => [
            [
                'title' => 'افزودن مطلب',
                'link' => route('admin.service.create'),
                'permission' => 'create-service',
            ],
            [
                'title' => 'لیست مطالب',
                'link' => route('admin.service.index'),
                'permission' => 'read-service',
            ],
            [
                'title' => 'افزودن دسته بندی',
                'link' => route('admin.service.category.create'),
                'permission' => 'create-service|edit-service',
            ],
            [
                'title' => 'لیست دسته بندی ها',
                'link' => route('admin.service.category.index'),
                'permission' => 'create-service|edit-service',
            ],
        ],
    ],
    // Notification
    [
        'title' => 'اطلاعیه ها',
        'icon' => 'fa fa-fw fa-bell-o',
        'link' => '#',
        'permission' => 'notification',
        'sub' => [
            [
                'title' => 'افزودن اطلاعیه',
                'link' => route('admin.notification.create'),
                'permission' => 'create-notification',
            ],
            [
                'title' => 'لیست اطلاعیه ها',
                'link' => route('admin.notification.index'),
                'permission' => 'read-notification',
            ],
            [
                'title' => 'افزودن دسته بندی',
                'link' => route('admin.notification.category.create'),
                'permission' => 'create-notification|edit-notification',
            ],
            [
                'title' => 'لیست دسته بندی ها',
                'link' => route('admin.notification.category.index'),
                'permission' => 'create-notification|edit-notification',
            ],
        ],
    ],
    // Album
    [
        'title' => 'آلبوم تصاویر',
        'icon' => 'fa fa-fw fa-image',
        'link' => '#',
        'permission' => 'album',
        'sub' => [
            [
                'title' => 'افزودن آلبوم',
                'link' => route('admin.album.create'),
                'permission' => 'create-album',
            ],
            [
                'title' => 'لیست آلبوم ها',
                'link' => route('admin.album.index'),
                'permission' => 'read-album',
            ],
            [
                'title' => 'افزودن دسته بندی',
                'link' => route('admin.album.category.create'),
                'permission' => 'create-album|edit-album',
            ],
            [
                'title' => 'لیست دسته بندی ها',
                'link' => route('admin.album.category.index'),
                'permission' => 'create-album|edit-album',
            ],
        ],
    ],
    // Page
    [
        'title' => 'صفحات',
        'icon' => 'fa fa-fw fa-sticky-note',
        'link' => '#',
        'permission' => 'page',
        'sub' => [
            [
                'title' => 'افزودن صفحه',
                'link' => route('admin.page.create'),
                'permission' => 'create-page',
            ],
            [
                'title' => 'لیست صفحات',
                'link' => route('admin.page.index'),
                'permission' => 'read-page',
            ],
        ],
    ],
    // Menu
    [
        'title' => 'منو',
        'icon' => 'fa fa-fw fa-bars',
        'link' => '#',
        'permission' => 'menu',
        'sub' => [
            [
                'title' => 'مدیریت منو',
                'link' => route('admin.menu.create'),
                'permission' => 'create-menu',
            ],
            [
                'title' => 'لیست منو ها',
                'link' => route('admin.menu.index'),
                'permission' => 'read-menu',
            ],
        ],
    ],
    // Tags
    [

        'title' => 'کلمات کلیدی',
        'icon' => 'fa fa-fw fa-tags',
        'link' => '#',
        'permission' => 'tag',
        'sub' => [
            [
                'title' => 'افزودن کلمه کلیدی',
                'link' => route('admin.tag.create'),
                'permission' => 'create-tag',
            ],
            [
                'title' => 'لیست کلمات کلیدی',
                'link' => route('admin.tag.index'),
                'permission' => 'read-tag',
            ],
        ],
    ],
    // About
    [
        'title' => 'درباره ما',
        'icon' => 'fa fa-fw fa-info',
        'link' => '#',
        'permission' => 'about',
        'sub' => [
            [
                'title' => 'ویرایش درباره ما',
                'link' => route('admin.about.edit'),
                'permission' => 'create-about',
            ],
        ],
    ],
    // Contact-us
    [
        'title' => 'پیش ثبت نام',
        'icon' => 'fa fa-fw fa-diamond',
        'link' => '#',
        'permission' => 'contact',
        'sub' => [
            [
                'title' => 'لیست درخواست ها',
                'link' => route('admin.enrollment.index'),
                'permission' => 'read-enrollment',
            ],
        ],
    ],
    // Contact-us
    [
        'title' => 'تماس با ما',
        'icon' => 'fa fa-fw fa-phone',
        'link' => '#',
        'permission' => 'contact',
        'sub' => [
            [
                'title' => 'مشاهده تماس با ما',
                'link' => route('admin.contact.show', 1),
                'permission' => 'read-contact',
            ],
            [
                'title' => 'ویرایش تماس با ما',
                'link' => route('admin.contact.edit', 1),
                'permission' => 'edit-about',
            ],
            [
                'title' => 'پیام ها',
                'link' => route('admin.contact.contacts.index'),
                'permission' => 'edit-about',
            ],
        ],
    ],
];
