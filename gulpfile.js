const { src, dest, watch } = require('gulp');
const sass = require('gulp-sass')(require('sass'));
const cssnano = require('gulp-cssnano');
const babel = require('gulp-babel');
const concat = require('gulp-concat');
const sourcemaps = require('gulp-sourcemaps');
const browserSync = require('browser-sync').create();

function css() {
    return src('./scss/*.scss')
        .pipe(sourcemaps.init())
        .pipe(sass())
        .pipe(cssnano({zindex: false}))
        .pipe(sourcemaps.write('.'))
        .pipe(dest('./'))
        .pipe(browserSync.stream());
}

function js() {
    return src('./js/*.js', { sourcemaps: false })
        .pipe(babel({
            presets: ['@babel/env']
        }))
        .pipe(concat('build.min.js'))
        .pipe(dest('./js/min', { sourcemaps: false }));
}

function browser() {
  css();
  js();
    browserSync.init({
        proxy: 'http://localhost:10039',
        files: [
            './**/*.php'
        ]
    });

    watch('./scss/**/*.scss', css);
    watch('./js/*.js', js).on('change', browserSync.reload);
}

exports.css = css;
exports.js = js;
exports.default = browser;