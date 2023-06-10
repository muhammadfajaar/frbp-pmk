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

 mix.js('resources/js/app.js', 'public/js')
//  adminlite
 .sass('resources/sass/app.scss', 'public/css')
 .copy('node_modules/admin-lte/dist/css/adminlte.min.css', 'public/css')
 .copy('node_modules/admin-lte/dist/js/adminlte.min.js', 'public/js')
 .copy('node_modules/admin-lte/dist/img', 'public/img')
//  bootstrap
.postCss('resources/css/app.css', 'public/css', [
   require('postcss-import'),
   require('tailwindcss'),
])
.sass('resources/sass/app.scss', 'public/css')
.copy('node_modules/bootstrap/dist/js/bootstrap.min.js', 'public/js')
.copy('node_modules/bootstrap/dist/css/bootstrap.min.css', 'public/css')
// style
.copy('resources/css/style.css', 'public/css');


