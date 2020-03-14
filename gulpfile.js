const gulp = require('gulp');
const sass = require('gulp-sass');
const uglify = require('gulp-uglify');
const gulpCopy = require('gulp-copy');
const postcss = require('gulp-postcss');
const cleanCSS = require('gulp-clean-css');
const autoprefixer = require('autoprefixer');
const browserSync = require('browser-sync').create();

function minifyCSS() {
    gulp.src(['src/css/**/*.css'], { base: './src' })
        .pipe(cleanCSS({ compatibility: 'ie11' }))
        .pipe(gulp.dest('dist'));

    return gulp.src(['style.css'], { base: './' })
        .pipe(cleanCSS({ compatibility: 'ie11', level: 1 }))
        .pipe(gulp.dest('.'))
}

function minifyJS() {
    return gulp.src(['src/js/*.js'], { base: './src' })
        .pipe(uglify())
        .pipe(gulp.dest('dist'))
}

function style() {
    gulp.src(['src/scss/**/*.scss', '!src/scss/style.scss'])
        .pipe(sass.sync().on('error', sass.logError))
        .pipe(postcss([autoprefixer()]))
        .pipe(gulp.dest('src/css'))
        .pipe(browserSync.stream());

    return gulp
        .src(['src/scss/style.scss'])
        .pipe(sass.sync().on('error', sass.logError))
        .pipe(postcss([autoprefixer()]))
        .pipe(gulp.dest('.'))
        .pipe(browserSync.stream());
}

function copyNodeModules() {
    return gulp.src([
        'node_modules/popper.js/dist/umd/popper.min.js',
        'node_modules/bootstrap/dist/js/bootstrap.min.js',
    ])
        .pipe(gulpCopy('src/js', { prefix: 4 }))
        .pipe(gulp.dest('src/js'));
}

// // Static server
function watch() {
    browserSync.init({
        notify: false,
        proxy: 'http://localhost/boilerplate'
    });
    gulp.watch(['src/scss/**/*.sass', 'src/scss/**/*.scss'], style);
}

exports.copyNodeModules = copyNodeModules;
exports.style = style;
exports.watch = watch;
exports.minifyJS = minifyJS;
exports.minifyCSS = minifyCSS;
exports.minify = gulp.parallel(minifyCSS, minifyJS);
exports.build = gulp.series(copyNodeModules, style, minifyCSS, minifyJS);
exports.default = gulp.series(style, watch);
