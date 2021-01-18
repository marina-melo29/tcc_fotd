require('laravel-mix-svg');
const mix = require('laravel-mix');

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

mix.svg()
    .svg('node_modules/bootstrap-icons/bootstrap-icons.svg','resources/svg/icons.svg')

mix
    .sass('node_modules/bootstrap/scss/bootstrap.scss','public/site/bootstrap.css')
    .sass('resources/views/scss/styles.scss','public/site/styles.css')

    .scripts('node_modules/popper.js/dist/popper.min.js','public/site/popper.js')
    .scripts('node_modules/jquery/dist/jquery.js','public/site/jquery.js')
    .scripts('node_modules/bootstrap/dist/js/bootstrap.bundle.js','public/site/bootstrap.js')
    .scripts('resources/svg/icon.js','public/site/icons.js')

mix.react('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css');
