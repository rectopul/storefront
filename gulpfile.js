var gulp = require('gulp'),
    imagemin = require('gulp-imagemin'),
    svgSprite = require('gulp-svg-sprite'),
    svgmin = require('gulp-svgmin'),
    stylus = require('gulp-stylus'),
    es = require('event-stream'),
    concat = require('gulp-concat'),
    rename = require('gulp-rename'),
    livereload = require('gulp-livereload'),
    sourcemaps = require('gulp-sourcemaps'),
    postcss = require('gulp-postcss'),
    autoprefixer = require('autoprefixer')({ grid: true }),
    pxtorem = require('postcss-pxtorem'),
    clean = require('gulp-clean'),
    replace = require('gulp-replace'),
    del = require('del'),
    merge = require('merge-stream')

var fs = require('fs')
var package = JSON.parse(fs.readFileSync('./package.json'))
var config = {
    theme: package.theme,
    login: {
        in: 'src/assets/css/login.styl',
        out: 'wp-content/themes/' + package.theme + '/assets/css',
    },
    processtheme: {
        in: 'src/assets/css/components/dashboard.styl',
        out: 'wp-content/themes/' + package.theme + '/assets/css',
    },
    style: {
        in: 'src/assets/css',
        out: 'wp-content/themes/' + package.theme + '/assets/css',
    },
    image: {
        in: 'src/assets/images',
        out: 'wp-content/themes/' + package.theme + '/assets/images',
    },
    script: {
        in: 'src/assets/js',
        out: 'wp-content/themes/' + package.theme + '/assets/js',
    },
    svg: {
        in: 'src/assets/svg',
        out: 'wp-content/themes/' + package.theme + '/assets/svg',
    },
}

// Configs
require('events').EventEmitter.defaultMaxListeners = Infinity

var configSVG = {
    svg: {
        xmlDeclaration: false,
        doctypeDeclaration: false,
        rootAttributes: {
            class: 'sprite-svg',
            id: 'sprite-svg',
        },
    },
    mode: {
        css: {
            dest: '.',
            sprite: 'sprite-svg.svg',
            layout: 'diagonal',
            bust: false,
            render: {
                css: false,
                scss: false,
            },
        },
        symbol: true,
    },
}

gulp.task('docker-compose', function() {
    'use strict'
    return gulp
        .src('docker-compose.yml')
        .pipe(replace('wae', config.theme))
        .pipe(rename('docker-compose.yml'))
        .pipe(gulp.dest('./'))
})

// Clean
gulp.task('clean', function() {
    'use strict'
    return del(__dirname + '/wp-content/themes/' + config.theme)
})

// Copy
gulp.task('copy', function() {
    var filejs = gulp
        .src('src/assets/filesjs/**/*.{js,css}')
        .pipe(
            gulp.dest(
                __dirname + '/wp-content/themes/' + config.theme + '/assets/js'
            )
        )
    var otherfiles = gulp
        .src('src/**/*.{php,jpg,jpeg,png,svg,css}')
        .pipe(gulp.dest(__dirname + '/wp-content/themes/' + config.theme))

    return merge(otherfiles, filejs)
})

// Inline sourcemaps
gulp.task('dashboard', function() {
    'use strict'
    var processors = [autoprefixer, pxtorem]
    return gulp
        .src(config.processtheme.in)
        .pipe(sourcemaps.init())
        .pipe(
            stylus({
                'include css': true,
                linenos: true,
            }).on('error', function(err) {
                console.log(err)
                this.emit('end')
            })
        )
        .pipe(postcss(processors))
        .pipe(sourcemaps.write())
        .pipe(gulp.dest(config.processtheme.out))
        .pipe(livereload())
})

gulp.task('login', function() {
    'use strict'
    var processors = [autoprefixer, pxtorem]
    return gulp
        .src(config.login.in)
        .pipe(sourcemaps.init())
        .pipe(
            stylus({
                'include css': true,
                linenos: true,
            }).on('error', function(err) {
                console.log(err)
                this.emit('end')
            })
        )
        .pipe(postcss(processors))
        .pipe(sourcemaps.write())
        .pipe(gulp.dest(config.login.out))
        .pipe(livereload())
})

// Styles
gulp.task('styles', function() {
    'use strict'
    var vendorFiles = gulp.src([
        // 'bower_components/bootstrap/dist/css/bootstrap.min.css',
        // 'bower_components/owl/owl-carousel/owl.carousel.css'
        'node_modules/normalize.css/normalize.css',
    ])
    var processors = [autoprefixer, pxtorem]

    var appFiles = gulp
        .src([config.style.in + '/app.styl'])
        .pipe(
            stylus({
                'include css': true,
                linenos: true,
            }).on('error', function(err) {
                console.log(err)
                this.emit('end')
            })
        )
        .pipe(postcss(processors))

    return es
        .concat(vendorFiles, appFiles)
        .pipe(sourcemaps.init())
        .pipe(concat('app.css'))
        .pipe(sourcemaps.write())
        .pipe(gulp.dest(config.style.out))
        .pipe(livereload())
})

// Images
gulp.task('images', function() {
    'use strict'
    return gulp
        .src([config.image.in + '/**/*.{jpg,png}'])
        .pipe(
            imagemin({
                optimizationLevel: 5,
            })
        )
        .pipe(gulp.dest(config.image.out))
        .pipe(livereload())
})

// SVG Clean
gulp.task('svg-min', function() {
    'use strict'
    gulp.src(config.svg.in + '/*.svg')
        .pipe(
            svgmin({
                plugins: [{ removeStyleElement: true }],
            })
        )
        .pipe(gulp.dest(config.svg.out))
})

// SVG
gulp.task('svg', function() {
    'use strict'
    return gulp
        .src(config.svg.in + '/**/*.svg')
        .pipe(svgSprite(configSVG))
        .on('error', function(error) {
            console.log(error)
        })
        .pipe(rename(configSVG.mode.css.sprite))
        .pipe(gulp.dest(config.svg.out))
        .pipe(livereload())
})

//  Watch
gulp.task('watch', function() {
    'use strict'
    livereload.listen()
    gulp.watch(config.processtheme.in, ['dashboard'])
    gulp.watch(config.login.in, ['login'])
    gulp.watch(config.style.in + '/**/*.styl', ['styles'])
    gulp.watch(config.image.in + '/**/*.{jpg,png}').on('change', function(
        file
    ) {
        gulp.src(file.path)
            .pipe(
                imagemin({
                    optimizationLevel: 5,
                })
            )
            .pipe(gulp.dest(config.image.out))
            .pipe(livereload())
    })
    gulp.watch(config.image.in + '/**/*.svg').on('change', function(file) {
        gulp.src(file.path)
            .pipe(gulp.dest(config.image.out))
            .pipe(livereload())
    })
    gulp.watch(
        [
            'src/**/*.{php,jpg,jpeg,png,svg,css}',
            'src/assets/filesjs/**/*.{js,css}',
        ],
        ['copy']
    )
    gulp.watch(config.svg.in + '/**/*.svg', ['svg'])
})

// Default
gulp.task('default', [
    'login',
    'dashboard',
    'docker-compose',
    'clean',
    'copy',
    'styles',
    'images',
    'svg',
])
