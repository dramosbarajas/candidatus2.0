let mix = require('laravel-mix');


mix.scripts([
	'resources/assets/js/jquery.js',
	'resources/assets/js/bootstrap.js',
	'resources/assets/js/toastr.js',
	'resources/assets/js/vue.js',
	'resources/assets/js/axios.js',
	'resources/assets/js/app.js',
	'resources/assets/js/validator.js',
	'resources/assets/js/moment.js',
	'resources/assets/js/sweetalert2.min.js',
	], 'public/js/app.js')
	.styles([
	'resources/assets/css/bootstrap.css',
	'resources/assets/css/toastr.css',
	'resources/assets/css/main.css',
	'resources/assets/css/sweetalert2.min.css',
	], 'public/css/app.css');
