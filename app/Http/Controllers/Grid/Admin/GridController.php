<?php

namespace App\Http\Controllers\Grid\Admin;

use App\Http\Controllers\Controller;
use App\Http\Src\ModuleFactory\ModelFactory;

class GridController extends Controller
{
    /**
     * Module factory instance.
     *
     * @var \App\Http\Src\ModuleFactory\ModelFactory $moduleFactory
     */
    private $moduleFactory;

    public function __construct(ModelFactory $moduleFactory)
    {
        parent::__construct();
        $this->moduleFactory = $moduleFactory;
    }

    /**
     * Data handler for grid.
     *
     * @param  string  $modelName  Name of the model which we want to construct it.
     * @return array
     */
    public function index(string $modelName): array
    {
        return $this->moduleFactory->get($modelName);
    }
}
