<?php

namespace App\Providers;

use View;
use Blade;
use Illuminate\Support\ServiceProvider;
use App\Http\ViewComposers\Menu\Admin\Render;
use App\Http\ViewComposers\Front\HeaderRender;
use App\Http\ViewComposers\Front\FooterRender;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('_layouts.admin.includes.sidebar', Render::class);
        View::composer('_layouts.front.includes.header', HeaderRender::class);
        View::composer('_layouts.front.includes.footer', FooterRender::class);

        Blade::directive('script', static function ($expression) {
            return "<?php \$__env->startPush('page-scripts'); ?>
                    <script src=\"<?php echo e(asset('assets/{$expression}')); ?>\"></script>
                    <?php \$__env->stopPush(); ?>";
        });

        Blade::directive('style', static function ($expression) {
            return "<?php \$__env->startPush('page-styles'); ?>
                    <link rel=\"stylesheet\" href=\"<?php echo e(asset('assets/{$expression}')); ?>\">
                    <?php \$__env->stopPush(); ?>";
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
