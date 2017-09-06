const elixir = require('laravel-elixir');

require('laravel-elixir-vue');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(mix => {
    mix.sass([
    			'app.scss', 
    			'fonts.scss',
    			'style.scss',
    			'loginmodal.scss',
    			'animate.scss'
			])
       .webpack('app.js')
       .browserSync({
       		notify: false,
       		proxy: 'http://notepagan.dev/'
       });
});
