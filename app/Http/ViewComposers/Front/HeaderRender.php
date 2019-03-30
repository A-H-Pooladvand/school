<?php

namespace App\Http\ViewComposers\Front;

use Illuminate\View\View;

class HeaderRender
{
    /**
     * @param View $view
     */
    public function compose(View $view)
    {
        $variables = require_once app_path('Http/ViewComposers/Front/HeaderVariables.php');

        foreach ($variables as $key => $variable) {
            $view->with('_header_' . $key, $variable);
        }
    }
}
