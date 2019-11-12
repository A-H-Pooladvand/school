<?php

namespace App\Http\ViewComposers\Front;

use Illuminate\View\View;
use App\Http\ViewComposers\Front\Src\Footer;

class FooterRender
{
    /**
     * Footer variables class.
     *
     * @var \App\Http\ViewComposers\Front\Src\Footer
     */
    private $footer;

    public function __construct(Footer $footer)
    {
        $this->footer = $footer;
    }

    /**
     * Compose global footer variables.
     *
     * @param  \Illuminate\View\View  $view
     */
    public function compose(View $view)
    {
        foreach ($this->footer->get() as $key => $variable) {
            $view->with('_footer_'.$key, $variable);
        }
    }
}