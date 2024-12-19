// webpack mix js

let mix = require('laravel-mix');

mix
  .js("src/app.js", "public/js")
  .postCss("src/style.css", "public/css", [require("tailwindcss")]);