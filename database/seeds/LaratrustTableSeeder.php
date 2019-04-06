<?php

use App\Permission;
use App\PermissionTitle;
use App\Role;
use App\User;
use Illuminate\Database\Seeder;

class LaratrustTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'name' => 'none',
            'display_name' => 'بدون نقش',
            'description' => 'هیچ نقشی ندارد'
        ]);

        $accounts = [
            [
                'user' => [
                    'name' => 'Amirhossein',
                    'family' => 'Pooladvand',
                    'username' => 'Amirhossein-pooladvand',
                    'avatar' => 'files/_test/' . rand(1, 10) . '.jpg',
                    'email' => 'a.h.pooladvand@gmail.com',
                    'password' => '123',
                    'remember_token' => str_random(10),
                    'is_active' => true
                ],
                'role' => [
                    'name' => 'superAdmin',
                    'display_name' => 'ادمین کل',
                    'description' => 'دسترسی به تمامی امکانات سایت'
                ]
            ],
            [
                'user' => [
                    'name' => 'پشتیبان',
                    'family' => 'سیستم',
                    'username' => 'system-support',
                    'avatar' => 'files/_test/' . rand(1, 10) . '.jpg',
                    'email' => 'qwe@qwe.com',
                    'password' => 'qwe',
                    'remember_token' => str_random(10),
                    'is_active' => true
                ],
                'role' => [
                    'name' => 'supporter',
                    'display_name' => 'پشتیبان سایت',
                    'description' => 'دسترسی تقریبی به تمامی امکانات سایت'
                ]
            ],
            [
                'user' => [
                    'name' => 'modir',
                    'family' => 'modir',
                    'username' => 'modir-modir',
                    'avatar' => 'files/_test/' . rand(1, 10) . '.jpg',
                    'email' => 'modir@gmail.com',
                    'password' => 'modir',
                    'remember_token' => str_random(10),
                    'is_active' => true
                ],
                'role' => [
                    'name' => 'admin',
                    'display_name' => 'صاحب سیستم',
                    'description' => 'خریدار سایت - دسترسی کل و دسترسی ایجاد نقش ها'
                ]
            ]
        ];

        $permissions = [
            // Panel
            [
                'title' => 'پنل',
                'detail' => [
                    [
                        'name' => 'admin-panel',
                        'display_name' => 'پنل مدیریت',
                        'description' => 'توانایی مشاهده پنل مدیریت'
                    ]
                ]
            ],
            // File-Manager
            [
                'title' => 'فایل منیجر',
                'detail' => [
                    [
                        'name' => 'file-manager',
                        'display_name' => 'فایل منیجر',
                        'description' => 'توانایی استفاده از فایل منیجر'
                    ]
                ]
            ],
            //User
            [
                'title' => 'کاربران',
                'detail' => [
                    [
                        'name' => 'create-user',
                        'display_name' => 'ایجاد کاربر جدید',
                        'description' => 'توانایی ایجاد کاربر جدید'
                    ],
                    [
                        'name' => 'read-user',
                        'display_name' => 'مشاهده کاربران',
                        'description' => 'توانایی مشاهده کاربران'
                    ],
                    [
                        'name' => 'edit-user',
                        'display_name' => 'ویرایش کاربران',
                        'description' => 'توانایی ویرایش کاربران'
                    ],
                    [
                        'name' => 'delete-user',
                        'display_name' => 'حذف کاربران',
                        'description' => 'توانایی حذف کاربران'
                    ],
                ]
            ],
            // Slider
            [
                'title' => 'اسلایدر',
                'detail' => [
                    [
                        'name' => 'create-slider',
                        'display_name' => 'ایجاد اسلایدر جدید',
                        'description' => 'توانایی ایجاد اسلایدر جدید'
                    ],
                    [
                        'name' => 'read-slider',
                        'display_name' => 'مشاهده اسلاید ها',
                        'description' => 'توانایی مشاهده اسلاید ها'
                    ],
                    [
                        'name' => 'edit-slider',
                        'display_name' => 'ویرایش اسلاید ها',
                        'description' => 'توانایی ویرایش اسلاید ها'
                    ],
                    [
                        'name' => 'delete-slider',
                        'display_name' => 'حذف اسلاید ها',
                        'description' => 'توانایی حذف اسلاید ها'
                    ],
                ]
            ],
            //Role
            [
                'title' => 'نقش و دسترسی ها',
                'detail' => [
                    [
                        'name' => 'create-acl',
                        'display_name' => 'ایجاد نقش و دسترسی جدید',
                        'description' => 'توانایی ایجاد نقش و دسترسی جدید'
                    ],
                    [
                        'name' => 'read-acl',
                        'display_name' => 'مشاهده نقش ها و دسترسی ها',
                        'description' => 'توانایی مشاهده نقش ها و دسترسی ها'
                    ],
                    [
                        'name' => 'edit-acl',
                        'display_name' => 'ویرایش نقش ها و دسترسی ها',
                        'description' => 'توانایی ویرایش نقش ها و دسترسی ها'
                    ],
                    [
                        'name' => 'delete-acl',
                        'display_name' => 'حذف نقش ها و دسترسی ها',
                        'description' => 'توانایی حذف نقش ها و دسترسی ها'
                    ],
                ]
            ],
            //News
            [
                'title' => 'خبر',
                'detail' => [
                    ['name' => 'create-news',
                        'display_name' => 'ایجاد خبر',
                        'description' => 'توانایی ایجاد خبر'
                    ],
                    [
                        'name' => 'read-news',
                        'display_name' => 'مشاهده خبر',
                        'description' => 'توانایی مشاهده خبر'
                    ],
                    [
                        'name' => 'edit-news',
                        'display_name' => 'ویرایش خبر',
                        'description' => 'توانایی ویرایش خبر'
                    ],
                    [
                        'name' => 'delete-news',
                        'display_name' => 'حذف خبر',
                        'description' => 'توانایی حذف خبر'
                    ],
                ]
            ],
            // Service
            [
                'title' => 'خدمت',
                'detail' => [
                    ['name' => 'create-service',
                        'display_name' => 'ایجاد خدمت',
                        'description' => 'توانایی ایجاد خدمت'
                    ],
                    [
                        'name' => 'read-service',
                        'display_name' => 'مشاهده خدمت',
                        'description' => 'توانایی مشاهده خدمت'
                    ],
                    [
                        'name' => 'edit-service',
                        'display_name' => 'ویرایش خدمت',
                        'description' => 'توانایی ویرایش خدمت'
                    ],
                    [
                        'name' => 'delete-service',
                        'display_name' => 'حذف خدمت',
                        'description' => 'توانایی حذف خدمت'
                    ],
                ]
            ],
            // Notification
            [
                'title' => 'اطلاعیه',
                'detail' => [
                    ['name' => 'create-notification',
                        'display_name' => 'ایجاد اطلاعیه',
                        'description' => 'توانایی ایجاد اطلاعیه'
                    ],
                    [
                        'name' => 'read-notification',
                        'display_name' => 'مشاهده اطلاعیه',
                        'description' => 'توانایی مشاهده اطلاعیه'
                    ],
                    [
                        'name' => 'edit-notification',
                        'display_name' => 'ویرایش اطلاعیه',
                        'description' => 'توانایی ویرایش اطلاعیه'
                    ],
                    [
                        'name' => 'delete-notification',
                        'display_name' => 'حذف اطلاعیه',
                        'description' => 'توانایی حذف اطلاعیه'
                    ],
                ]
            ],
            // Enrollment
            [
                'title' => 'پیش ثبت نام',
                'detail' => [
                    [
                        'name' => 'read-enrollment',
                        'display_name' => 'مشاهده پیش ثبت نام',
                        'description' => 'توانایی مشاهده پیش ثبت نام'
                    ],
                ]
            ],
            //Album
            [
                'title' => 'آلبوم تصاویر',
                'detail' => [
                    ['name' => 'create-album',
                        'display_name' => 'ایجاد آلبوم تصاویر',
                        'description' => 'توانایی ایجاد آلبوم تصاویر'
                    ],
                    [
                        'name' => 'read-album',
                        'display_name' => 'مشاهده آلبوم تصاویر',
                        'description' => 'توانایی مشاهده آلبوم تصاویر'
                    ],
                    [
                        'name' => 'edit-album',
                        'display_name' => 'ویرایش آلبوم تصاویر',
                        'description' => 'توانایی ویرایش آلبوم تصاویر'
                    ],
                    [
                        'name' => 'delete-album',
                        'display_name' => 'حذف آلبوم تصاویر',
                        'description' => 'توانایی حذف آلبوم تصاویر'
                    ],
                ]
            ],
            //Tag
            [
                'title' => 'کلمات کلیدی',
                'detail' => [
                    [
                        'name' => 'create-tag',
                        'display_name' => 'ایجاد کلمات کلیدی',
                        'description' => 'توانایی ایجاد کلمات کلیدی'
                    ],
                    [
                        'name' => 'read-tag',
                        'display_name' => 'مشاهده کلمات کلیدی',
                        'description' => 'توانایی مشاهده کلمات کلیدی'
                    ],
                    [
                        'name' => 'edit-tag',
                        'display_name' => 'ویرایش کلمات کلیدی',
                        'description' => 'توانایی ویرایش کلمات کلیدی'
                    ],
                    [
                        'name' => 'delete-tag',
                        'display_name' => 'حذف کلمات کلیدی',
                        'description' => 'توانایی حذف کلمات کلیدی'
                    ],
                ]
            ],
            // Page
//            [
//                'title' => 'صفحات',
//                'detail' => [
//                    [
//                        'name' => 'create-page',
//                        'display_name' => 'ایجاد صفحه',
//                        'description' => 'توانایی ایجاد صفحه'
//                    ],
//                    [
//                        'name' => 'read-page',
//                        'display_name' => 'مشاهده صفحه',
//                        'description' => 'توانایی مشاهده صفحه'
//                    ],
//                    [
//                        'name' => 'edit-page',
//                        'display_name' => 'ویرایش صفحه',
//                        'description' => 'توانایی ویرایش صفحه'
//                    ],
//                    [
//                        'name' => 'delete-page',
//                        'display_name' => 'حذف صفحه',
//                        'description' => 'توانایی حذف صفحه'
//                    ],
//                ]
//            ],
            //About-Us
            [
                'title' => 'درباره ما',
                'detail' => [
                    [
                        'name' => 'create-about',
                        'display_name' => 'ایجاد درباره ما',
                        'description' => 'توانایی ایجاد درباره ما'
                    ],
                    [
                        'name' => 'read-about',
                        'display_name' => 'مشاهده درباره ما',
                        'description' => 'توانایی مشاهده درباره ما'
                    ],
                    [
                        'name' => 'edit-about',
                        'display_name' => 'ویرایش درباره ما',
                        'description' => 'توانایی ویرایش درباره ما'
                    ],
                    [
                        'name' => 'delete-about',
                        'display_name' => 'حذف درباره ما',
                        'description' => 'توانایی حذف درباره ما'
                    ],
                ]
            ],
            //Contact-Us
            [
                'title' => 'تماس با ما',
                'detail' => [
                    [
                        'name' => 'read-contact',
                        'display_name' => 'مشاهده تماس با ما',
                        'description' => 'توانایی مشاهده تماس با ما'
                    ],
                    [
                        'name' => 'edit-contact',
                        'display_name' => 'ویرایش تماس با ما',
                        'description' => 'توانایی ویرایش تماس با ما'
                    ]
                ]
            ],
        ];

        foreach ($permissions as $permission) {
            $permissionTitle = PermissionTitle::create(['title' => $permission['title']]);
            foreach ($permission['detail'] as $detail) {
                $permissionTitle->permissions()->create($detail);
            }
        }

        $permissions = Permission::get()->pluck('id')->toArray();

        foreach ($accounts as $account) {
            $role = Role::create($account['role'])->attachPermissions($permissions);
            $user = User::create($account['user']);

            $user->attachRole($role['id']);

            $user->attachPermissions($permissions);
        }

    }
}
