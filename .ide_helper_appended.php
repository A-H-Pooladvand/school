<?php

namespace Database {

    use Illuminate\Database\Eloquent\Factory;

    $factory = new Factory();
}

namespace {

    class Eloquent extends \Illuminate\Database\Eloquent\Model
    {
        public static function grid(): array
        {
            return [];
        }
    }

    /**
     *
     *
     * @see \Illuminate\Http\Request
     */
    class Request
    {
        /**
         * Create a new Illuminate HTTP request from server variables.
         *
         * @return array
         * @static
         */
        public static function filledOnly()
        {
            return [];
        }
    }
}