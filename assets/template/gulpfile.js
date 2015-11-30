var elixir = require('laravel-elixir');

// uncomment for production mode
//elixir.config.production = true;

elixir.config.publicPath = 'themes/{{theme}}/assets';

elixir(function(mix){

    // css
    mix.sass([

        // vendor (you can add more vendor css/scss)
        './bower_components/bootswatch/paper/bootstrap.min.css',

        // custom (you can add more vendor css/scss)
        'app.scss',

        // october
        './modules/system/assets/css/framework.extras.css',
    ]);

    // script
    mix.scripts([

        // vendor (you can add more vendor js)
        './bower_components/jquery/dist/jquery.js',
        './bower_components/bootstrap/dist/js/bootstrap.js',

        // custom (you can add more custom js)
        'app.js',

        // october
        './modules/system/assets/js/framework.js',
        './modules/system/assets/js/framework.extras.js',
    ]);
})