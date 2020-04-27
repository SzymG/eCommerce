'use strict';

const autoprefixer = require('gulp-autoprefixer');
const csso = require('gulp-csso');
const gulp = require('gulp');
const rename = require('gulp-rename');
const sass = require('gulp-sass');
const spawn = require('cross-spawn');
const fs = require('fs');
const path = require('path');
const MODULES_PATH = './frontend/modules';
const c = require('ansi-colors');
const log = require('fancy-log');
gulp.task('styles', () =>
  gulp
    .src('./scss/index.scss')
    .pipe(sass().on('error', sass.logError))
    .pipe(autoprefixer())
    .pipe(csso())
    .pipe(rename('index.min.css'))
    .pipe(gulp.dest('./frontend/web/css'))
);

const getDirs = dir => fs.readdirSync(dir).filter(file => fs.statSync(path.join(dir, file)).isDirectory());
const tasks = ['styles'];
getDirs(MODULES_PATH).map(module => {
  const taskName = `styles-${module}`;
  gulp.task(taskName, function(cb) {
    spawn('gulp', ['--cwd', `${MODULES_PATH}/${module}`], { stdio: 'inherit' }).on('exit', cb);
  });
  tasks.push(taskName);
});
gulp.task('default', gulp.parallel(...tasks));
gulp.task('watch', () => {
  gulp.watch(['./scss/**/*.scss'], gulp.series('styles'));
  getDirs(MODULES_PATH).map(module => {
    log(`Starting '${c.cyan('watch')}' on module ${c.green(module)}`);
    const taskName = `styles-${module}`;
    gulp.watch(`${MODULES_PATH}/${module}/scss/**/*.scss`, gulp.series(taskName));
  });
});
