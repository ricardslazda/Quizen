const mix = require('laravel-mix');

mix
    .js('resources/js/app.js', 'public/assets/js/scripts.js')
    .sass('resources/styles/main.scss', 'public/assets/css/style.css');
