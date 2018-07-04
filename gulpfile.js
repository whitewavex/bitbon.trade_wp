// Подключение Gulp плагинов
var gulp = require('gulp'),
    prefixer = require('gulp-autoprefixer'),
    imagemin = require('gulp-imagemin'),
    cssmin = require('gulp-minify-css'),
    sass = require('gulp-sass'),
    sourcemaps = require('gulp-sourcemaps'),
    uglify = require('gulp-uglify'),
    rigger = require('gulp-rigger'),
    rename = require('gulp-rename'),
    del = require('del'),
    browserSync = require('browser-sync').create(),
    reload = browserSync.reload;

// Исходная папка и папка сборки
const dir = {
    src: 'src',
    build: 'C:/OSPanel/domains/bitbon.loc/wp-content/themes/bitbon-trade'
};

// Папки сборки, исходные папки и папки для слежения
const path = {
    build: {
        php: dir.build, // папка php файлов
        styles: dir.build, // папка стилей
        js: dir.build + '/js', // папка скриптов
        images: dir.build + '/images', // папка изображений
        fonts: dir.build + '/fonts', // папка шрифтов
        libs: dir.build + '/libs', // папка библиотек
        screenshot: dir.build // папка скриншота
    },
    src: {
        php: dir.src + '/**/*.php', // php файлы
        styles: dir.src + '/scss/style.scss', // scss файлы
        js: dir.src + '/js/main.js', // js файлы
        images: dir.src + '/images/**/*.*', // изображения
        fonts: dir.src + '/fonts/**/*.*', // шрифты
        libsScript: dir.src + '/libs/libs.js', // js файлы библиотек
        libsStyles: dir.src + '/libs/libs.scss', // css файлы библиотек
        jquery: dir.src + '/jquery/jquery.js', // библиотека jquery
        screenshot: dir.src + '/screenshot.png' // файл скриншота
    },
    watch: {
        php: dir.src + '/**/*.php',
        styles: dir.src + '/scss/**/*.scss',
        js: dir.src + '/js/**/*.js',
        images: dir.src + '/images/**/*.*',
        fonts: dir.src + '/fonts/**/*.*',
        libs: dir.src + '/libs/**/*.*',
        jquery: dir.src + '/jquery/**/*.*',
        screenshot: dir.src + 'screenshot.png'
    },
    clean: dir.build
};

// Настройки сервера
var config = {
    proxy: 'bitbon.loc', // адрес сайта
    host: 'localhost',
    port: 8001,
    logPrefix: "Frontend"
};

// Обработка php
gulp.task('php', function() {
    return gulp.src(path.src.php)
        .pipe(gulp.dest(path.build.php));
});

// Обработка css
gulp.task('styles', function() {
    return gulp.src(path.src.styles)
        .pipe(sourcemaps.init()) // создание исходных карт
        .pipe(sass().on('error', sass.logError)) // компиляция sass в css
        .pipe(prefixer()) // добавление вендорных префиксов
        .pipe(cssmin()) // минификация css
        .pipe(sourcemaps.write()) // запись исходных карт
        .pipe(gulp.dest(path.build.styles));
});

// Обработка js
gulp.task('js', function() {
    return gulp.src(path.src.js)
        .pipe(rigger()) // объединение js файлов
        .pipe(sourcemaps.init()) // создание исходных карт
        .pipe(uglify()) // минификация js
        .pipe(rename({suffix: '.min'})) // добавление суфикса в название итогового файла
        .pipe(sourcemaps.write()) // запись исходных карт
        .pipe(gulp.dest(path.build.js));
});

// Обработка изображений
gulp.task('images', function() {
    return gulp.src(path.src.images)
        .pipe(imagemin()) // минификация изображений
        .pipe(gulp.dest(path.build.images))
});

// Копирование шрифтов
gulp.task('fonts', function() {
    return gulp.src(path.src.fonts)
        .pipe(gulp.dest(path.build.fonts));
});

// Обработка библиотек js
gulp.task('libs:js', function() {
   return gulp.src(path.src.libsScript)
        .pipe(rigger()) // объединение js файлов
        .pipe(uglify()) // минификация библиотек js
        .pipe(rename({suffix: '.min'})) // добавление суфикса в название итогового файла
        .pipe(gulp.dest(path.build.libs));
});

// Обработка библиотек css
gulp.task('libs:css', function() {
   return gulp.src(path.src.libsStyles)
        .pipe(sass().on('error', sass.logError)) // компиляция sass в css
        .pipe(cssmin()) // минификация css
        .pipe(rename({suffix: '.min'})) // добавление суфикса в название итогового файла
        .pipe(gulp.dest(path.build.libs));
});

// Обработка библиотеки jquery
gulp.task('jquery', function() {
   return gulp.src(path.src.jquery)
        .pipe(uglify()) // минификация библиотек js
        .pipe(rename({suffix: '.min'})) // добавление суфикса в название итогового файла
        .pipe(gulp.dest(path.build.libs));
});

gulp.task('libs', gulp.parallel('jquery', 'libs:js', 'libs:css'));

// Копирование скриншота
gulp.task('screenshot', function() {
    return gulp.src(path.src.screenshot)
        .pipe(gulp.dest(path.build.screenshot));
});

// Очистка папки сборки
gulp.task('clean', function() {
    return del([dir.build], {force: true});
});

// Сборка проекта
gulp.task('build', gulp.series('clean', gulp.parallel('php', 'styles', 'js', 'images', 'fonts', 'libs', 'screenshot')));

// Слежение за изменениями в проекте
gulp.task('watch', function() {
    gulp.watch(path.watch.php, gulp.series('php'));
    gulp.watch(path.watch.styles, gulp.series('styles'));
    gulp.watch(path.watch.js, gulp.series('js'));
    gulp.watch(path.watch.images, gulp.series('images'));
    gulp.watch(path.watch.fonts, gulp.series('fonts'));
    gulp.watch(path.watch.libs, gulp.series('libs'));
    gulp.watch(path.watch.screenshot, gulp.series('screenshot'));
});

// Запуск сервера
gulp.task('server', function() {
    browserSync.init(config);
    browserSync.watch(dir.build + '/**/*.*').on('change', reload);
});

// Запуск сборки, слежения и сервера
gulp.task('default', gulp.series('build', gulp.parallel('watch', 'server')));

