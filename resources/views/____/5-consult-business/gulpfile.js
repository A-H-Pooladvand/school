const elixir = require('laravel-elixir');

const paths = {
    asset: 'public/assets/',
    //build_asset: domain_path + 'public_html/build/',
    bower: 'bower_components/',
    plugin: 'resources/assets/plugins/',
    custom: 'resources/assets/customs/',
    page: 'resources/assets/page/'
};

elixir.config.sourcemaps = false;

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for your application as well as publishing vendor resources.
 |
 */

elixir((mix) => {
    // jQuery Bootstrap JS
	mix.scripts([
        paths.bower + 'jquery/dist/jquery.min.js',
        paths.bower + 'bootstrap-sass/assets/javascripts/bootstrap.min.js',
    ], paths.asset + 'js/jquery_bootstrap.js', './');

    mix.scripts([
        paths.bower + 'html5shiv/dist/html5shiv.min.js',
        paths.bower + 'respond/dest/respond.min.js'
    ], paths.asset + 'js/html5shiv_respond.js', './');

    // Images for CSS
	mix.copy(paths.page + 'images', paths.asset + 'page-front/images/');

	// Bootstrap Font
    mix.copy(paths.bower + 'bootstrap-sass/assets/fonts/bootstrap/*.*', paths.asset + 'fonts/bootstrap/');

    // Vazir Font
    mix.copy(paths.bower + 'vazir-font/dist/*.eot', paths.asset + 'fonts/vazir/');
    mix.copy(paths.bower + 'vazir-font/dist/*.ttf', paths.asset + 'fonts/vazir/');
    mix.copy(paths.bower + 'vazir-font/dist/*.woff', paths.asset + 'fonts/vazir/');
    mix.copy(paths.plugin + 'vazir-font/Farsi-Digits/*.*', paths.asset + 'fonts/vazir/');

    // Pe Font
    mix.copy(paths.plugin + 'pe-fonts/*.eot', paths.asset + 'fonts/pe-fonts/');
    mix.copy(paths.plugin + 'pe-fonts/*.ttf', paths.asset + 'fonts/pe-fonts/');
    mix.copy(paths.plugin + 'pe-fonts/*.woff', paths.asset + 'fonts/pe-fonts/');

    // Ico Font
    mix.copy(paths.plugin + 'ico-font/*.eot', paths.asset + 'fonts/icofonts/');
    mix.copy(paths.plugin + 'ico-font/*.ttf', paths.asset + 'fonts/icofonts/');
    mix.copy(paths.plugin + 'ico-font/*.woff', paths.asset + 'fonts/icofonts/');

    // FontAwesome Font
    mix.copy(paths.bower + 'font-awesome/fonts', paths.asset + 'fonts/font-awesome/');

    // Animate On Scroll JS
    mix.scripts([
        paths.bower + 'aos/dist/aos.js',
    ], paths.asset + 'js/aos.js', './');

    // Other
    mix.sass([
        paths.page + 'sass/init.scss'
    ], paths.asset + 'css/style.css', './');

    mix.scripts([
        paths.page + 'scripts/smooth-scroll.js',
        paths.page + 'scripts/custom.js',
    ], paths.asset + 'js/main.js', './');
});
