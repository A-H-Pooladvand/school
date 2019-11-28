<?php

namespace App\Http\Controllers;

use App\Http\Src\Form\Form;
use Artesaos\SEOTools\Traits\SEOTools;
use Illuminate\Foundation\Bus\DispatchesJobs;
use App\Http\Controllers\_Controller\Grid\Grid;
use App\Http\Controllers\_Controller\TagHandler;
use App\Http\Controllers\_Controller\VisitHandler;
use Illuminate\Routing\Controller as BaseController;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests, SEOToolsTrait;

    public function __construct()
    {
        $this->seo()->setCanonical(url()->current());
    }

    /**
     * Sets form attributes
     *
     * @param  string  $action
     * @param  string|null  $method
     * @return \App\Http\Src\Form\Form
     */
    public function setForm(string $action, string $method = null): Form
    {
        return (new Form($action, $method));
    }

    /**
     * JEasyUi's grid filters, search, sort and etc...
     *
     * @return Grid
     */
    protected function getGrid(): Grid
    {
        return new Grid;
    }

    /**
     * Handling tags such as sync and attach to tag (polymorphic) table
     *
     * @param  array  $newTags
     * @return TagHandler
     */
    protected function tags(array $newTags = null): TagHandler
    {
        return new TagHandler($this, $newTags);
    }

    /**
     * Whenever we want to create a new visit into out database
     * we use this class to handle and create new visit
     */

    public function visit(): VisitHandler
    {
        return new VisitHandler($this);
    }

    public function setBreadcrumb($value): void
    {
        view()->share('_page_breadcrumb', $value);
    }
}
