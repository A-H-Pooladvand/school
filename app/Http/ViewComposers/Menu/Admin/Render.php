<?php

namespace App\Http\ViewComposers\Menu\Admin;

use Illuminate\View\View;
use App\Http\ViewComposers\Menu\Admin\Src\Admin;

class Render
{
    /**
     * Admin information.
     *
     * @var \App\Http\ViewComposers\Menu\Admin\Src\Admin
     */
    private $admin;

    public function __construct(Admin $admin)
    {
        $this->admin = $admin;
    }

    /**
     * Compose global admin panel sidebar information.
     *
     * @param  \Illuminate\View\View  $view
     */
    public function compose(View $view)
    {
        $view->with('sidebar_menus', $this->admin->get());
    }
}