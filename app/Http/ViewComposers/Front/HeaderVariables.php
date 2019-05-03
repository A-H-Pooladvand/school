<?php

use App\Menu;

return [
    'front_menu' => Menu::orderBy('priority')->get(),
];
