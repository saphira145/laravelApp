var elixir = require('laravel-elixir');

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

elixir(function(mix) {
    mix.sass('app.scss');
    
    mix.styles([
       'app.css',
       'bootstrap.min.css'
    ], 'public/output/all.css', 'public/css');
    
    mix.version('public/output/all.css');
    
    mix.scripts([
        'js.js'
    ], 'public/output/all.js', 'public/js');
    
    mix.version('public/output/all.js');
});
