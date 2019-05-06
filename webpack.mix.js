const mix = require('laravel-mix');


mix.js('resources/js/app.js', 'public/js/all.js')
    .js('node_modules/jquery/dist/jquery.js', 'public/js/all.js')
    .js('node_modules/bootstrap/dist/js/bootstrap.js', 'public/js/all.js')
    .sass('resources/sass/app.scss', 'public/css')
    .sass('resources/sass/blog.scss', 'public/css')
    .browserSync({
        open: 'external',
        host: 'laravel_tutorial.test',
        proxy: 'laravel_tutorial.test',
        files: ['resources/views/**/*.php', 'app/**/*.php', 'routes/**/*.php', 'public/js/*.js', 'public/css/*.css']
    });
