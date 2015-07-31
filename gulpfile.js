var elixir = require('laravel-elixir');

elixir(function(mix) {
    // Fonts
    mix.copy(
        'bower_components/font-awesome/fonts',
        'public/fonts/font-awesome'
    )

    // Stylesheets
    .sass(
        'app.scss',
        'public/css/',
        {
            includePaths: [
                'bower_components/bootstrap-sass-official/assets/stylesheets/',
                'bower_components/', // Hack for font-awesome component.
            ]
        },
        {
            pluginOptions: { outputStyle: 'compressed' }
        }
    )

    // Library scripts
    .scripts(
        [
            // Core
            '../../../bower_components/jquery/dist/jquery.min.js',
            '../../../bower_components/angular/angular.min.js',

            // Angular
            '../../../bower_components/angular-ui-router/release/angular-ui-router.js',
            '../../../bower_components/angular-resource/angular-resource.min.js',
        ],
        'public/js/library.js'
    )

    // Application scripts
    .scriptsIn(
        'resources/assets/javascript/',
        'public/js/app.js'
    )

    // Versioning
    .version([
        'public/css/app.css',
        'public/js/app.js',
        'public/js/library.js',
    ]);
});
