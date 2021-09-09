const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.styles(
    [
        'resources/css/bootstrap.css',
        'resources/css/pace-theme-minimal.css',
        'resources/css/perfect-scrollbar.min.css',
        'resources/css/ei-icon.css',
        'resources/css/themify-icons.css',
        'resources/css/font-awesome.min.css',
        'resources/css/animate.min.css',
        'resources/css/style.css',
        'resources/css/custom.css',
    ],  'public/css/app.css').
scripts(
    [
        'resources/js/vendor.js',
        'resources/js/scripts.js',
    ],  'public/js/app.js');
