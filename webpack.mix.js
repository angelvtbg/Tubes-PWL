const mix = require('laravel-mix');

mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css');


mix.copy('node_modules/ckeditor4/', 'public/vendor/ckeditor4/');
