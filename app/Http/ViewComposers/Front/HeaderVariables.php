<?php

use App\Menu;
use App\Setting;

return [
    'front_menu' => Cache::remember('main_menus', 1, static function () {
        return Menu::orderBy('priority')->get();
    }),

    'font_setting' => Cache::remember('_settings__', 1, static function () {
        return Setting::first();
    }),
];
