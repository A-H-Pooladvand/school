<?php

namespace App\Http\Src\Form;

use ArrayAccess;

class Form implements ArrayAccess
{
    /**
     * Form action attribute.
     *
     * @var string $action
     */
    public $action;

    /**
     * Method field of form.
     *
     * @var \Illuminate\Support\HtmlString $method
     */
    public $method;

    public function __construct(string $action, string $method = null)
    {
        $this->setAction($action);
        $this->setMethod($method);
    }

    /**
     * Form action setter.
     *
     * @param  string  $action
     */
    private function setAction(string $action): void
    {
        $this->action = $action;
    }

    /**
     * Form action getter.
     *
     * @param  string|null  $method
     */
    private function setMethod(string $method = null): void
    {
        $this->method = method_field($method ?? 'POST');
    }

    public function offsetExists($offset)
    {
        // TODO: Implement offsetExists() method.
    }

    /**
     * Access attributes as array.
     *
     * @param  mixed  $offset
     * @return mixed
     */
    public function offsetGet($offset)
    {
        return $this->{$offset};
    }

    public function offsetSet($offset, $value)
    {
        // TODO: Implement offsetSet() method.
    }

    public function offsetUnset($offset)
    {
        // TODO: Implement offsetUnset() method.
    }
}