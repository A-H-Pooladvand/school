<?php

namespace App\Http\Src\ModuleFactory;

use Illuminate\Support\Str;

class ModelFactory
{
    /**
     * Factory to create models dynamically.
     * Mainly designed for grid system.
     *
     * @param $moduleName
     * @return array
     */
    public function get($moduleName): array
    {
        $module = Str::ucfirst($moduleName);

        $namespace = "App\\{$module}";
        if (class_exists($namespace)) {
            return app($namespace)::grid();
        }
        // Todo make a switch if class does not exists.
    }
}