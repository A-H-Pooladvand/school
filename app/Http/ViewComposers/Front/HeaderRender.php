<?php

namespace App\Http\ViewComposers\Front;

use Illuminate\View\View;
use App\Http\ViewComposers\Front\Src\Header;

class HeaderRender
{
    /**
     * Header variables.
     *
     * @var \App\Http\ViewComposers\Front\Src\Header
     */
    private $header;

    public function __construct(Header $header)
    {
        $this->header = $header;
    }

    /**
     * Compose global header variables.
     *
     * @param  \Illuminate\View\View  $view
     */
    public function compose(View $view)
    {
        foreach ($this->header->get() as $key => $variable) {
            $view->with('_header_'.$key, $variable);
        }
    }
}
