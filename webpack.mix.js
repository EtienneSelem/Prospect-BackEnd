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

mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css');

mix.copy('node_modules/admin-lte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css', 'public/css')
    .copy('node_modules/admin-lte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css', 'public/css')
    .copy('node_modules/admin-lte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css', 'public/css')
    .copy('node_modules/admin-lte/dist/css/adminlte.min.css', 'public/css')
    .copy('node_modules/select2/dist/css/select2.min.css', 'public/css')
;
