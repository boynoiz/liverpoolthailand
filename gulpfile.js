var gulp = require('gulp');
var bower = require('gulp-bower');
//var sass = require('gulp-ruby-sass');
var sass = require('gulp-sass');
var compass = require('gulp-compass');
var bourbon = require('node-bourbon');
var neat = require('node-neat');
var sourcemaps = require('gulp-sourcemaps');
var autoprefixer = require('gulp-autoprefixer');
var minifyCSS = require('gulp-minify-css');
var jshint = require('gulp-jshint');
var uglify = require('gulp-uglify');
var rename = require('gulp-rename');
var concat = require('gulp-concat');
var notify = require('gulp-notify');
var cache = require('gulp-cache');
var path = require('path');
var del = require('del');
var filter = require('gulp-filter');
var cssmin = require('gulp-cssmin');
var cssnano = require('gulp-cssnano');
var postcss = require('gulp-postcss');
var runSequence = require('run-sequence');

gulp.task('bower', function() {
    return bower();
});

var bower_path = 'vendor/bower_components';
var resource_path = 'resources/assets';
var css_path = 'public/assets/css';
var js_path = 'public/assets/js';

var paths = {
    'jquery'            : bower_path + '/jquery/dist',
    'bootstrap'         : bower_path + '/bootstrap-sass/assets',
    'bootswatch'        : bower_path + '/bootswatch/simplex',
    'fontawesome'       : bower_path + '/font-awesome',
    'colorbox'          : bower_path + '/jquery-colorbox',
    'dataTables'        : bower_path + '/datatables/media',
    'dataTablesBootstrap3Plugin'    : bower_path + '/datatables-bootstrap3-plugin/media',
    'flag'              : bower_path + '/flag-sprites/dist',
    'metisMenu'         : bower_path + '/metisMenu/dist',
    'datatablesResponsive'  : bower_path + '/datatables-responsive',
    'summernote'        : bower_path + '/summernote/dist',
    'select2'           : bower_path + '/select2/dist',
    'jqueryui'          : bower_path + '/jquery-ui',
    'justifiedGallery'  : bower_path + '/Justified-Gallery/dist/',
    'appear'            : bower_path + "/jquery_appear",
    'animsition'        : bower_path + "/animsition/dist",
    'stellar'           : bower_path + "/jquery.stellar/src",
    'fastclick'         : bower_path + "/fastclick/lib",
    'infinitescroll'    : bower_path + "/jquery-infinite-scroll",
    'jrespond'          : bower_path + "/jrespond",
    'magnificpopup'     : bower_path + "/magnific-popup/dist",
    'countTo'           : bower_path + "/jquery-countTo",
    'easing'            : bower_path + "/jquery.easing",
    'fitvids'           : bower_path + "/jquery.fitvids",
    'superfish'         : bower_path + "/superfish/dist",
    'hoverintent'       : bower_path + "/jquery-hoverintent",
    'transit'           : bower_path + "/jquery.transit",
    'smoothscroll'      : bower_path + "/smoothscroll",
    'jribble'           : bower_path + "/jribble/dist",
    'ytplayer'          : bower_path + "/jquery.mb.ytplayer/dist",
    'jcookie'           : bower_path + "/jquery.cookie",
    'countdown'         : bower_path + "/kbwood_countdown",
    'owlcarousel'       : bower_path + "/owl.carousel/dist",
    'morphtext'         : bower_path + "/Morphtext/dist",
    'isotope'           : bower_path + "/isotope/dist",
    'swiper'            : bower_path + "/Swiper/dist",
    'color'             : bower_path + "/jquery-color",
    'toastr'            : bower_path + "/toastr",
    'form'              : bower_path + "/jquery-form",
    'flexslider'        : bower_path + "/flexslider",
    'validation'        : bower_path + "/jquery-validation/dist",
    'pace'              : bower_path + "/PACE"

};

/***************Experiment Section*******************/

gulp.task('front-sass-ex', function()
{
    var processors = [
        autoprefixer,
        cssnano
    ];
    return gulp.src(resource_path + '/sass/app.scss')
        .pipe(sourcemaps.init())
        .pipe(sass(
            {
                outputStyle: 'expanded',
                sourceMap: true,
                sourceMapRoot: [
                    resource_path + '/sass/canvas/',
                    paths.bootstrap + '/stylesheets'
                ],
                includePaths:[
                    require('node-bourbon').includePaths,
                    require('node-neat').includePaths,
                    paths.bootstrap + '/stylesheets'
                ],
                noCache: true,
                errLogToConsole: true
            }))
        .pipe(autoprefixer({
            browers: 'last 2 version',
            cascade: false
        }))
        .pipe(postcss(processors))
        .pipe(sourcemaps.write('.', {
            sourceRoot: resource_path + '/sass/canvas/',
            includeContent: false
        }))
        .pipe(gulp.dest('public/assets/css'))
});

gulp.task('mini-css-ex', function()
{
    return gulp.src(css_path + '/app.css')
        .pipe(rename('app.min.css'))
        .pipe(cssnano({discardComments: {removeAll: true}}))
        .pipe(gulp.dest('public/assets/css'))
});

gulp.task('build-css-ex', function(callback){
    runSequence('front-sass-ex', 'mini-css-ex', callback);
});

/*********************END HERE***********************/

gulp.task('css', function() {
    return sass(
        resource_path + '/sass/app.scss',
        {
            style: 'expanded',
            sourcemap: true,
            verbose: true,
            noCache: true
        })
        .on('error', function (err) {
            console.log('Error!', err.message);
        })
        .pipe(sourcemaps.init())
        .pipe(autoprefixer({
            browers: 'last 2 version',
            cascade: false
        }))
        .pipe(gulp.dest('public/assets/css'))
        .pipe(rename({suffix: '.min'}))
        .pipe(cssnano({discardComments: {removeAll: true}}))
        .pipe(sourcemaps.write('.', {
            sourceRoot: resource_path + '/sass/canvas/',
            includeContent: false
        }))
        .pipe(gulp.dest('public/assets/css'))
});

gulp.task('cssadmin', function() {
    return sass(
        resource_path + '/sass/_con/_import.scss',
        {
            style: 'expanded',
            compass: false,
            sourcemap: true,
            verbose: true,
            noCache: true,
            loadPath:[
                require('node-bourbon').includePaths,
                require('node-neat').includePaths
            ]
        })
        .on('error', function (err) {
            console.log('Error!', err.message);
        })
        .pipe(sourcemaps.init())
        .pipe(autoprefixer({
            browers: [
                'last 2 version',
                'safari 5',
                'ie 8',
                'ie 9',
                'opera 12.1',
                'ios 6',
                'android 4'
            ],
            cascade: false
        }))
        .pipe(sourcemaps.write('.', {
            includeContent: false,
            sourceRoot: resource_path + '/sass/_con/'
        }))
        .pipe(concat('_con.css'))
        .pipe(gulp.dest('public/assets/admin/_con/css/'))
        .pipe(rename({ suffix: '.min' }))
        //.pipe(minifyCSS({
        //    advanced: true,
        //    keepBreaks: false,
        //    keepSpecialComments : 0,
        //    benchmark: true
        //}))
        .pipe(cssmin({
            advanced: true,
            keepBreaks: false,
            keepSpecialComments: 0,
            benchmark: true
        }))
        .pipe(concat('_con.min.css'))
        .pipe(gulp.dest('public/assets/admin/_con/css/'))
});


// Scripts
gulp.task('js', function () {
    return gulp.src([
            paths.jquery + '/jquery.js',
            paths.bootstrap + '/javascripts/bootstrap.js',
            //resource_path + '/javascripts/canvas/canvas.slider.face.js',
            //resource_path + '/javascripts/canvas/jquery.calendario.js',
            //resource_path + '/javascripts/canvas/jquery.camera.js',
            //resource_path + '/javascripts/canvas/jquery.elastic.js',
            //resource_path + '/javascripts/canvas/jquery.vmap.js',
            //resource_path + '/javascripts/canvas/jquery.gmap.js',
            //resource_path + '/javascripts/canvas/jquery.nivo.js',
            //resource_path + '/javascripts/canvas/jquery.prettyPhoto.js',
            paths.easing + '/js/jquery.easing.js',
            paths.fitvids + '/jquery.fitvids.js',
            paths.superfish + '/js/superfish.js',
            paths.hoverintent + '/jquery.hoverintent.js',
            paths.jrespond + '/jRespond.js',
            paths.transit + '/jquery.transit.js',
            paths.smoothscroll +'/SmoothScroll.js',
            paths.jribble + '/jribble.js',
            paths.ytplayer + 'jquery.mb.YTPlayer.js',
            paths.jcookie + '/jquery.cookie.js',
            paths.appear + '/jquery.appear.js',
            paths.animsition + '/js/jquery.animsition.js',
            paths.stellar + '/jquery.stellar.js',
            paths.countdown + '/jquery.plugin.js',
            paths.countdown + '/jquery.counter.js',
            paths.countTo + '/jquery.countTo.js',
            paths.owlcarousel + '/owl.carousel.js',
            paths.morphtext + '/morphtext.js',
            paths.isotope + '/isotope.pkgd.js',
            paths.swiper + '/js/swiper.jquery.js',
            paths.color + '/jquery.color.js',
            paths.toastr + '/toastr.js',
            paths.form  + '/jquery.form.js',
            paths.magnificpopup + '/jquery.magnific-popup.js',
            paths.flexslider + '/jquery.flexslider.js',
            paths.infinitescroll + '/jquery.infinitescroll.js',
            paths.jqueryui + '/jquery-ui.js',
            paths.validation + '/jquery.validate.js',
            resource_path + '/javascripts/app.js'

        ])
        .pipe(jshint())
        .pipe(jshint.reporter('default'))
        .pipe(concat('app.js'))
        .pipe(gulp.dest('public/assets/js'))
        .pipe(rename({suffix: '.min'}))
        .pipe(uglify())
        .pipe(gulp.dest('public/assets/js'));
});

// Copy JS
gulp.task('copyjs', function() {
    return gulp.src([
            resource_path + '/javascripts/canvas/**/*.js'
        ])
        .pipe(gulp.dest('public/assets/js'));
});

// Fonts
gulp.task('fonts', function() {
    return gulp.src([
            resource_path + '/fonts/**/*',
            paths.fontawesome + '/fonts/**/*',
            paths.bootstrap + '/fonts/**/*'
        ])
        .pipe(gulp.dest('public/assets/fonts'));
});