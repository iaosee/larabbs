let mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/assets/js/app.js', 'public/js')
    .sass('resources/assets/sass/app.scss', 'public/css')
    .copy('./node_modules/simplemde/dist/simplemde.min.css', 'public/vendor/simplemde')
    .copy('./node_modules/simplemde/dist/simplemde.min.js', 'public/vendor/simplemde')
    .copyDirectory('./resources/assets/vendor/', 'public/vendor/');

mix.browserSync('larabbs.me');