const { mix } = require('laravel-mix');

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
	.sass('resources/assets/sass/main.scss', 'public/css')
	.sass('resources/assets/sass/projects.scss', 'public/css')
	.sass('resources/assets/sass/tasks.scss', 'public/css')
	.sass('resources/assets/sass/timeline.scss', 'public/css')
	.sass('resources/assets/sass/chat.scss', 'public/css')
	.sass('resources/assets/sass/tickets.scss', 'public/css')
	.sass('resources/assets/sass/users.scss', 'public/css');
