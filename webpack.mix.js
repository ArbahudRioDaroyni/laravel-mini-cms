// webpack.mix.js

const mix = require('laravel-mix');

mix
	// .sass('resources/css/frontend.scss', 'public/css')
	// .sass('resources/css/backend.scss', 'public/css')
	// .js('resources/js/app.js', 'public/js')

	.copyDirectory('resources/frontend', 'public/frontend')
	.copyDirectory('resources/backend', 'public/backend');

