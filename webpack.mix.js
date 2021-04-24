const mix = require('laravel-mix');
const SVGSpritemapPlugin = require('svg-spritemap-webpack-plugin');

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

mix.js('resources/js/app.js', 'public/js').vue({
    extractStyles: true,
    globalStyles: false
})
    .sass('resources/scss/app.scss', 'public/css/app.css')
    .sourceMaps()
    .copy('resources/images/**/*.*', 'public/images')
    .copyDirectory('resources/fonts', 'public/fonts')
    .browserSync({
        proxy: '127.0.0.1:8000',
        logConnections: false,
        notify: false
    });


mix.webpackConfig(webpack => {
    return {
        output: {
            chunkFilename: 'js/[name].js?id=[chunkhash]',
        },
        plugins: [
            new SVGSpritemapPlugin('resources/svg/*.svg', {
                output: {
                    filename: 'images/sprite.svg',
                },
                sprite: {
                    generate: {
                        title: false
                    }
                }
            }),
            new webpack.DefinePlugin({
                'process.env.NODE_ENV': JSON.stringify('development')
            })
        ]
    }
})
