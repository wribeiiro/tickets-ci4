const gulp = require('gulp')
const concat = require('gulp-concat')
const uglify = require('gulp-uglify')
const babel = require('gulp-babel')
const rename = require('gulp-rename')
const minifyCSS = require('gulp-minify-css')
const livereload = require('gulp-liverelaod')
 
gulp.task('pack-js', function () {    
    return gulp.src(['public/assets/js/pages/*.js', 'public/assets/js/app.js', 'public/assets/js/charts.js', 'public/assets/js/utils.js'])
        .pipe(concat('bundle.js'))
        .pipe(rename('bundle.min.js'))
        .pipe(babel({
            presets: ['@babel/env']
        }))
        .pipe(uglify())
        .pipe(gulp.dest('public/assets/build/js'))
        .pipe(livereload())
})
 
gulp.task('pack-css', function () {    
    return gulp.src(['public/assets/css/app.css'])
        .pipe(concat('stylesheet.css'))
        .pipe(rename('stylesheet.min.css'))
        .pipe(minifyCSS())
        .pipe(gulp.dest('public/assets/build/css'))
        .pipe(livereload())
})

gulp.task('default', gulp.series('pack-js', 'pack-css'))

gulp.task("watch", () => {
    livereload.listen()
    gulp.watch("public/assets/js/*.js", 'pack-js')
    gulp.watch("public/assets/css/*.css", 'pack-css')
})