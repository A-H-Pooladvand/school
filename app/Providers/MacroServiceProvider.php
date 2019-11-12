<?php

namespace App\Providers;

use ReflectionClass;
use ReflectionMethod;
use App\Mixins\BuilderMixins;
use App\Mixins\RequestMixins;
use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Builder;

class MacroServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->setEloquentBuilderMixin();

        Builder::mixin(new RequestMixins);
        Builder::mixin(new BuilderMixins);
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Add ability to make mixins for eloquent builder.
     *
     * @return void
     */
    private function setEloquentBuilderMixin(): void
    {
        Builder::macro('mixin', static function ($mixin) {
            $methods = (new ReflectionClass($mixin))->getMethods(
                ReflectionMethod::IS_PUBLIC | ReflectionMethod::IS_PROTECTED
            );

            foreach ($methods as $method) {
                $method->setAccessible(true);

                Builder::macro($method->name, $method->invoke($mixin));
            }
        });
    }
}
