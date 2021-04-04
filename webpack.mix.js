const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.disableNotifications();

if (process.env.NODE_ENV == 'production'){

    mix.setPublicPath('public');
    mix.version();

} else if (process.env.NODE_ENV == 'development'){

    mix.setPublicPath('public/dev');

}

mix.webpackConfig({
    module: {
        rules: [
            {
                test: /\.pug$/,
                loader: 'pug-plain-loader'
            }
        ]
    }
})

mix.js('resources/js/app.js', 'js')
    .vue()
    .sass('resources/sass/app.scss', 'css')
