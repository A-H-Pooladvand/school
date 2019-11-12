<?php

namespace App\Http\ViewComposers\Front\Src;

use Cache;
use App\Menu;
use App\Setting;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Header
{
    public function get()
    {
        return [
            'front_menu' => Cache::remember('main_menus', 1, static function () {
                return Menu::whereNull('parent_id')
                    ->with([
                        'children' => static function (HasMany $builder) {
                            $builder->orderBy('priority');
                        },
                    ])->orderBy('priority')->get()->toArray();
            }),

            'font_setting' => Cache::remember('_settings__', 1, static function () {
                return Setting::first();
            }),
        ];
    }
}