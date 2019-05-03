<?php

use DaveJamesMiller\Breadcrumbs\BreadcrumbsGenerator as Breadcrumb;
use DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs;

/** USERS */

# users
Breadcrumbs::register('users', static function (Breadcrumb $breadcrumbs) {
    $breadcrumbs->push('لیست کاربران', route('admin.user.index'));
});

# User > Create
Breadcrumbs::register('user-create', static function (Breadcrumb $breadcrumbs) {
    $breadcrumbs->parent('users');
    $breadcrumbs->push('افزودن کاربر', route('admin.user.create'));
});

# User > Show
Breadcrumbs::register('user-show', static function (Breadcrumb $breadcrumbs, $user) {
    $breadcrumbs->parent('users');
    $breadcrumbs->push('مشاهده کاربر', route('admin.user.show', $user->id));
});

# Users > Show > Edit
Breadcrumbs::register('user-edit', static function (Breadcrumb $breadcrumbs, $user) {
    $breadcrumbs->parent('user-show', $user);
    $breadcrumbs->push('ویرایش کاربر', route('admin.user.edit', $user->id));
});

# User > Show > Edit-Permission
Breadcrumbs::register('user-edit-permission', static function (Breadcrumb $breadcrumbs, $user) {
    $breadcrumbs->parent('user-show', $user);
    $breadcrumbs->push('ویرایش دسترسی های فردی کاربر', route('admin.user.permission.edit', $user->id));
});

/** ROLES */

# Roles
Breadcrumbs::register('roles', static function (Breadcrumb $breadcrumbs) {
    $breadcrumbs->push('لیست نقش ها', route('admin.role.index'));
});

# Role > Create
Breadcrumbs::register('role-create', static function (Breadcrumb $breadcrumbs) {
    $breadcrumbs->parent('roles');
    $breadcrumbs->push('افزودن نقش', route('admin.role.create'));
});

# Role > Show
Breadcrumbs::register('role-show', static function (Breadcrumb $breadcrumbs, $role) {
    $breadcrumbs->parent('roles');
    $breadcrumbs->push('مشاهده نقش', route('admin.role.show', $role->id));
});

# Roles > Show > Edit
Breadcrumbs::register('role-edit', static function (Breadcrumb $breadcrumbs, $role) {
    $breadcrumbs->parent('role-show', $role);
    $breadcrumbs->push('ویرایش نقش', route('admin.role.edit', $role->id));
});

/** Tag */

# Tags
Breadcrumbs::register('tags', static function (Breadcrumb $breadcrumbs) {
    $breadcrumbs->push('لیست کلمات کلیدی', route('admin.tag.index'));
});

# Tag > Create
Breadcrumbs::register('tag-create', static function (Breadcrumb $breadcrumbs) {
    $breadcrumbs->parent('tags');
    $breadcrumbs->push('افزودن کلمه کلیدی', route('admin.tag.create'));
});

# Tag > Show
Breadcrumbs::register('tag-show', static function (Breadcrumb $breadcrumbs, $tag) {
    $breadcrumbs->parent('tags');
    $breadcrumbs->push('مشاهده کلمه کلیدی', route('admin.tag.show', $tag->id));
});

# Tags > Show > Edit
Breadcrumbs::register('tag-edit', static function (Breadcrumb $breadcrumbs, $tag) {
    $breadcrumbs->parent('tag-show', $tag);
    $breadcrumbs->push('ویرایش کلمه کلیدی', route('admin.tag.edit', $tag->id));
});

/** News */

# News
Breadcrumbs::register('news', static function (Breadcrumb $breadcrumbs) {
    $breadcrumbs->push('لیست اخبار', route('admin.news.index'));
});

# News > Create
Breadcrumbs::register('news-create', static function (Breadcrumb $breadcrumbs) {
    $breadcrumbs->parent('news');
    $breadcrumbs->push('افزودن اخبار', route('admin.news.create'));
});

# News > Show
Breadcrumbs::register('news-show', static function (Breadcrumb $breadcrumbs, $news) {
    $breadcrumbs->parent('news');
    $breadcrumbs->push('مشاهده اخبار', route('admin.news.show', $news->id));
});

# News > Show > Edit
Breadcrumbs::register('news-edit', static function (Breadcrumb $breadcrumbs, $news) {
    $breadcrumbs->parent('news-show', $news);
    $breadcrumbs->push('ویرایش اخبار', route('admin.news.edit', $news->id));
});

/** News Category */

# Categories
Breadcrumbs::register('news-categories', static function (Breadcrumb $breadcrumbs) {
    $breadcrumbs->push('لیست دسته بندی اخبار', route('admin.news.category.index'));
});

# Category > Create
Breadcrumbs::register('news-category-create', static function (Breadcrumb $breadcrumbs) {
    $breadcrumbs->parent('news-categories');
    $breadcrumbs->push('افزودن دسته بندی اخبار', route('admin.news.category.create'));
});

# Category > Show
Breadcrumbs::register('news-category-show', static function (Breadcrumb $breadcrumbs, $category) {
    $breadcrumbs->parent('news-categories');
    $breadcrumbs->push('مشاهده دسته بندی اخبار', route('admin.news.category.show', $category->id));
});

# Categories > Show > Edit
Breadcrumbs::register('news-category-edit', static function (Breadcrumb $breadcrumbs, $category) {
    $breadcrumbs->parent('news-category-show', $category);
    $breadcrumbs->push('ویرایش دسته بندی اخبار', route('admin.news.category.edit', $category->id));
});


/** Menu */

# Menu
Breadcrumbs::register('menu', static function (Breadcrumb $breadcrumbs) {
    $breadcrumbs->push('لیست منو ها', route('admin.menu.index'));
});

# Menu > Create
Breadcrumbs::register('menu-create', static function (Breadcrumb $breadcrumbs) {
    $breadcrumbs->parent('menu');
    $breadcrumbs->push('افزودن منو', route('admin.menu.create'));
});

# Menu > Show
Breadcrumbs::register('menu-show', static function (Breadcrumb $breadcrumbs, $menu) {
    $breadcrumbs->parent('menu');
    $breadcrumbs->push('مشاهده منو', route('admin.menu.show', $menu->id));
});

# Menu > Show > Edit
Breadcrumbs::register('menu-edit', static function (Breadcrumb $breadcrumbs, $menu) {
    $breadcrumbs->parent('menu-show', $menu);
    $breadcrumbs->push('ویرایش منو', route('admin.menu.edit', $menu->id));
});

/** Service */

# Service
Breadcrumbs::register('service', static function (Breadcrumb $breadcrumbs) {
    $breadcrumbs->push('لیست خدمت ها', route('admin.service.index'));
});

# Service > Create
Breadcrumbs::register('service-create', static function (Breadcrumb $breadcrumbs) {
    $breadcrumbs->parent('service');
    $breadcrumbs->push('افزودن خدمت', route('admin.service.create'));
});

# Service > Show
Breadcrumbs::register('service-show', static function (Breadcrumb $breadcrumbs, $service) {
    $breadcrumbs->parent('service');
    $breadcrumbs->push('مشاهده خدمت', route('admin.service.show', $service->id));
});

# Service > Show > Edit
Breadcrumbs::register('service-edit', static function (Breadcrumb $breadcrumbs, $service) {
    $breadcrumbs->parent('service-show', $service);
    $breadcrumbs->push('ویرایش خدمت', route('admin.service.edit', $service->id));
});

/** Service Category */

# Categories
Breadcrumbs::register('service-categories', static function (Breadcrumb $breadcrumbs) {
    $breadcrumbs->push('لیست دسته بندی خدمت ها', route('admin.service.category.index'));
});

# Category > Create
Breadcrumbs::register('service-category-create', static function (Breadcrumb $breadcrumbs) {
    $breadcrumbs->parent('service-categories');
    $breadcrumbs->push('افزودن دسته بندی خدمت', route('admin.service.category.create'));
});

# Category > Show
Breadcrumbs::register('service-category-show', static function (Breadcrumb $breadcrumbs, $category) {
    $breadcrumbs->parent('service-categories');
    $breadcrumbs->push('مشاهده دسته بندی خدمت', route('admin.service.category.show', $category->id));
});

# Categories > Show > Edit
Breadcrumbs::register('service-category-edit', static function (Breadcrumb $breadcrumbs, $category) {
    $breadcrumbs->parent('service-category-show', $category);
    $breadcrumbs->push('ویرایش دسته بندی خدمت', route('admin.service.category.edit', $category->id));
});

/** Album */

# Album
Breadcrumbs::register('album', static function (Breadcrumb $breadcrumbs) {
    $breadcrumbs->push('لیست آلبوم تصاویر', route('admin.album.index'));
});

# Album > Create
Breadcrumbs::register('album-create', static function (Breadcrumb $breadcrumbs) {
    $breadcrumbs->parent('album');
    $breadcrumbs->push('افزودن آلبوم تصاویر', route('admin.album.create'));
});

# Album > Show
Breadcrumbs::register('album-show', static function (Breadcrumb $breadcrumbs, $album) {
    $breadcrumbs->parent('album');
    $breadcrumbs->push('مشاهده آلبوم تصاویر', route('admin.album.show', $album->id));
});

# Album > Show > Edit
Breadcrumbs::register('album-edit', static function (Breadcrumb $breadcrumbs, $album) {
    $breadcrumbs->parent('album-show', $album);
    $breadcrumbs->push('ویرایش آلبوم تصاویر', route('admin.album.edit', $album->id));
});

/** Album Category */

# Categories
Breadcrumbs::register('album-categories', static function (Breadcrumb $breadcrumbs) {
    $breadcrumbs->push('لیست دسته بندی آلبوم تصاویر', route('admin.album.category.index'));
});

# Category > Create
Breadcrumbs::register('album-category-create', static function (Breadcrumb $breadcrumbs) {
    $breadcrumbs->parent('album-categories');
    $breadcrumbs->push('افزودن دسته بندی آلبوم تصاویر', route('admin.album.category.create'));
});

# Category > Show
Breadcrumbs::register('album-category-show', static function (Breadcrumb $breadcrumbs, $category) {
    $breadcrumbs->parent('album-categories');
    $breadcrumbs->push('مشاهده دسته بندی آلبوم تصاویر', route('admin.album.category.show', $category->id));
});

# Categories > Show > Edit
Breadcrumbs::register('album-category-edit', static function (Breadcrumb $breadcrumbs, $category) {
    $breadcrumbs->parent('album-category-show', $category);
    $breadcrumbs->push('ویرایش دسته بندی آلبوم تصاویر', route('admin.album.category.edit', $category->id));
});


/** Page */

# Pages
Breadcrumbs::register('pages', static function (Breadcrumb $breadcrumbs) {
    $breadcrumbs->push('لیست صفحات', route('admin.page.index'));
});

# Page > Create
Breadcrumbs::register('page-create', static function (Breadcrumb $breadcrumbs) {
    $breadcrumbs->parent('pages');
    $breadcrumbs->push('افزودن صفحه', route('admin.page.create'));
});

# Page > Show
Breadcrumbs::register('page-show', static function (Breadcrumb $breadcrumbs, $page) {
    $breadcrumbs->parent('pages');
    $breadcrumbs->push('مشاهده صفحه', route('admin.page.show', $page->id));
});

# Pages > Show > Edit
Breadcrumbs::register('page-edit', static function (Breadcrumb $breadcrumbs, $page) {
    $breadcrumbs->parent('page-show', $page);
    $breadcrumbs->push('ویرایش صفحه', route('admin.page.edit', $page->id));
});

/** Slider */

# Sliders
Breadcrumbs::register('sliders', static function (Breadcrumb $breadcrumbs) {
    $breadcrumbs->push('لیست اسلاید ها', route('admin.slider.index'));
});

# Slider > Create
Breadcrumbs::register('slider-create', static function (Breadcrumb $breadcrumbs) {
    $breadcrumbs->parent('sliders');
    $breadcrumbs->push('افزودن اسلایدر', route('admin.slider.create'));
});

# Slider > Show
Breadcrumbs::register('slider-show', static function (Breadcrumb $breadcrumbs, $slider) {
    $breadcrumbs->parent('sliders');
    $breadcrumbs->push('مشاهده اسلایدر', route('admin.slider.show', $slider->id));
});

# Sliders > Show > Edit
Breadcrumbs::register('slider-edit', static function (Breadcrumb $breadcrumbs, $slider) {
    $breadcrumbs->parent('slider-show', $slider);
    $breadcrumbs->push('ویرایش اسلایدر', route('admin.slider.edit', $slider->id));
});

# Audibles
Breadcrumbs::register('contact', static function (Breadcrumb $breadcrumbs) {
    $breadcrumbs->push('تماس با ما', route('admin.contact.contacts.index'));
});

# Audible > Show
Breadcrumbs::register('contact-show', static function (Breadcrumb $breadcrumbs, $contact) {
    $breadcrumbs->parent('contact');
    $breadcrumbs->push('مشاهده تماس با ما', route('admin.contact.contacts.show', $contact->id));
});

# Audibles > Show > Edit
Breadcrumbs::register('audible-edit', static function (Breadcrumb $breadcrumbs, $audible) {
    $breadcrumbs->parent('audible-show', $audible);
    $breadcrumbs->push('ویرایش کوتاه و شنیدنی', route('admin.audible.edit', $audible->id));
});

/** Notification */

# Notifications
Breadcrumbs::register('notification', static function (Breadcrumb $breadcrumbs) {
    $breadcrumbs->push('لیست اطلاعیه ها', route('admin.notification.index'));
});

# Notifications > Create
Breadcrumbs::register('notification-create', static function (Breadcrumb $breadcrumbs) {
    $breadcrumbs->parent('notification');
    $breadcrumbs->push('افزودن اطلاعیه', route('admin.notification.create'));
});

# Notifications > Show
Breadcrumbs::register('notification-show', static function (Breadcrumb $breadcrumbs, $notification) {
    $breadcrumbs->parent('notification');
    $breadcrumbs->push('مشاهده اطلاعیه', route('admin.notification.show', $notification->id));
});

# Notifications > Show > Edit
Breadcrumbs::register('notification-edit', static function (Breadcrumb $breadcrumbs, $notification) {
    $breadcrumbs->parent('notification-show', $notification);
    $breadcrumbs->push('ویرایش اطلاعیه', route('admin.notification.edit', $notification->id));
});

/** Notification Category */

# Categories
Breadcrumbs::register('notification-categories', static function (Breadcrumb $breadcrumbs) {
    $breadcrumbs->push('لیست دسته بندی اطلاعیه ها', route('admin.notification.category.index'));
});

# Category > Create
Breadcrumbs::register('notification-category-create', static function (Breadcrumb $breadcrumbs) {
    $breadcrumbs->parent('notification-categories');
    $breadcrumbs->push('افزودن دسته بندی اطلاعیه', route('admin.notification.category.create'));
});

# Category > Show
Breadcrumbs::register('notification-category-show', static function (Breadcrumb $breadcrumbs, $category) {
    $breadcrumbs->parent('notification-categories');
    $breadcrumbs->push('مشاهده دسته بندی اطلاعیه', route('admin.notification.category.show', $category->id));
});

# Categories > Show > Edit
Breadcrumbs::register('notification-category-edit', static function (Breadcrumb $breadcrumbs, $category) {
    $breadcrumbs->parent('notification-category-show', $category);
    $breadcrumbs->push('ویرایش دسته بندی اطلاعیه', route('admin.notification.category.edit', $category->id));
});

/** About */

# About
Breadcrumbs::register('about', static function (Breadcrumb $breadcrumbs) {
    $breadcrumbs->push('لیست درباره ما', route('admin.about.index'));
});

# About > Create
Breadcrumbs::register('about-create', static function (Breadcrumb $breadcrumbs) {
    $breadcrumbs->parent('about');
    $breadcrumbs->push('افزودن درباره ما', route('admin.about.create'));
});

# About > Show
Breadcrumbs::register('about-show', static function (Breadcrumb $breadcrumbs, $about) {
    $breadcrumbs->parent('about');
    $breadcrumbs->push('مشاهده درباره ما', route('admin.about.show', $about->id));
});

# About > Show > Edit
Breadcrumbs::register('about-edit', static function (Breadcrumb $breadcrumbs, $about) {
    $breadcrumbs->parent('about-show', $about);
    $breadcrumbs->push('ویرایش درباره ما', route('admin.about.edit', $about->id));
});
