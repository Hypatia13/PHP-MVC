// https://laravel.com/docs/5.3/elixir

// Require 'laravel-elixir' from node_modules
var elixir = require('laravel-elixir');


// In Elixir, source maps provide better debugging information to your browser's developer tools when using compiled assets.
// .map files are called source maps. Their purpose is to map the contents of a concatenated, minified file to it's original files to make debugging easier.

elixir.config.sourcemaps = false;

var gulp = require('gulp');

// Compile Sass into CSS
// Assumes Sass files are stored at resources/assets/sass

elixir(function (mix) {
    mix.sass('resources/assets/sass/app.scss', //source file
        'resources/assets/css' //output file
    )

    //Combine CSS files into a single file
    //Assumes CSS files are at resources/assets/css

    mix.styles([
        'css/app.css',
        'bower/vendor/slick-carousel/slick/slick.css'  //source files
    ], 'public/css/all.css', //output file
        'resources/assets' // a source folder, where to look for all files
    )


    //The base path is 'resources/assets' -> can omit it here
    var bowerPath = 'bower/vendor';

    // Combine JS and jQuery files into a single file
    // '+' is allowed in JS
    mix.scripts([
        bowerPath + '/jquery/dist/jquery.min.js',
        bowerPath + '/foundation-sites/dist/js/foundation.min.js',
        bowerPath + '/slick-carousel/slick/slick.min.js',
        'js/*.js'
    ], 'public/js/all.js',
        'resources/assets' // a source folder, where to look for all files
    )
});
