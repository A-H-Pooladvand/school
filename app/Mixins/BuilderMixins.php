<?php

namespace App\Mixins;

use App\Http\Controllers\_Controller\Grid\Grid;

class BuilderMixins
{
    /**
     * @return callable
     * @instantiated
     */
    public function grid(): callable
    {
        return function (): array {
            return app(Grid::class)->items($this);
        };
    }
}
