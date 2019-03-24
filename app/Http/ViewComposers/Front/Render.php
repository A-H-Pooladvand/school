<?php

namespace App\Http\ViewComposers\Front;

use Illuminate\View\View;

class Render
{
    /**
     * @param View $view
     */
    public function compose(View $view)
    {
        $variables = require_once app_path('Http/ViewComposers/Front/GlobalVariables.php');

        foreach ($variables as $key => $variable) {
            $view->with('_footer_' . $key, $variable);
        }
    }
}