"use strict";
var gulp = require('gulp'),
    concat = require('gulp-concat'),
    uglify = require('gulp-uglify'),
    rename = require('gulp-rename'),
    plumber = require('gulp-plumber'),
    del = require('del'),
    notify = require('gulp-notify'),
    minifyCSS = require('gulp-minify-css'),
    compass = require('gulp-compass'),
    path = require('path');
var browserSync = require('browser-sync');
var reload = browserSync.reload;



//the title and icon that will be used for the Grunt notifications
var notifyInfo = {
    title: 'Gulp',
    icon: path.join(__dirname, 'gulp.png')
};

//error notification settings for plumber
var plumberErrorHandler = {
    errorHandler: notify.onError({
        title: notifyInfo.title,
        icon: notifyInfo.icon,
        message: "Error: <%= error.message %>"
    })
};

//Tast Compass
var paths = { sass: ['sass/**/*.scss'] };
gulp.task('compass', function() {
    return gulp.src(paths.sass)
        .pipe(plumber(plumberErrorHandler))
        .pipe(compass({
            config_file: 'config.rb',
            sourcemap: false
        }))
        .pipe(gulp.dest('css'))
        // .pipe(rename({ suffix: '.min' }))
        // .pipe(minifyCSS())
        .pipe(gulp.dest('css'))
        .pipe(browserSync.stream());
});
//javascript
// gulp.task('js', function() {
//     return gulp.src([
//             'js/bootstrap.min.js',
//             'js/html5preloader.js',
//             'js/mod-owl.carousel.min.js',
//             'js/jquery.fancybox.js',
//             'js/main.js'
//         ])
//         .pipe(plumber(plumberErrorHandler))
//         .pipe(concat('all.js'))
//         .pipe(gulp.dest('js'))
//         .pipe(rename({ suffix: '.min' }))
//         .pipe(uglify())
//         .pipe(gulp.dest('js'));
// });
// Xoa File style.css and App.min.js
gulp.task('clean', function() {
    del(['css/style*.css*', 'js/app.min.js*']);
});


// Watch File
gulp.task('watchFile', function() {
    browserSync({
        notify: true,
        server: {
            baseDir: './'
        }
    });
    gulp.watch(['*.html'], reload);
    gulp.watch(paths.sass, ['compass'], reload);
    // gulp.watch('js/*.js', ['js'], reload);
});


gulp.task('default', ['watchFile']);

