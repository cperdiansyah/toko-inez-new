const mix = require("laravel-mix");

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

mix.js("resources/js/app.js", "public/js")
    .sass("resources/sass/app.scss", "public/css")
    .sass("resources/sass/style.scss", "public/css")
    .sass("resources/sass/style_admin.scss", "public/css")
    .browserSync({
        proxy: "http://toko-inez-new.test/",
        files: ["**/*.js", "**/*.css", "**/*.php"]
    });
/* .postCss("resources/css/tailwind.css", "public/css", [
        require("postcss-import"),
        require("tailwindcss")
    ]) */

mix.extract(["axios"], "js/vendor~utils-1.js");
mix.extract();
