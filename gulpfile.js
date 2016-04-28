var path = require('path');
var del = require('del');
var gulp = require('gulp');
var bower = require('gulp-bower');
var sass = require('gulp-sass');
var less = require('gulp-less');
var bourbon = require('node-bourbon');
var neat = require('node-neat');
var sourcemaps = require('gulp-sourcemaps');
var jshint = require('gulp-jshint');
var uglify = require('gulp-uglify');
var rename = require('gulp-rename');
var concat = require('gulp-concat');
var postcss = require('gulp-postcss');
var cssnano = require('gulp-cssnano');
var cssnext = require('postcss-cssnext');
var mqpacker = require('css-mqpacker');
var merge = require('merge-stream');
var clone = require('gulp-clone');
var runSequence = require('run-sequence');

gulp.task('bower', function() {
    return bower();
});

var bower_path = 'vendor/bower_components';
var resource_path = 'resources/assets';

/************** Vendors **********************/

var vendors = {
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
    'moment'            : bower_path + "/moment"

};

/**********### Begin Front-end section ###****************/

//CSS
gulp.task('frontendCss', function()
{
    var CssPath = 'public/assets/css';

    var processors = [
        require("postcss-cssnext")({
            'browers': ['last 2 version'],
            'customProperties': true,
            'colorFunction': true,
            'customSelectors': true,
            'sourcemap': true,
            'compress': false
        })
    ];
    var scss = gulp.src(resource_path + '/sass/app.scss')
        .pipe(sourcemaps.init())
        .pipe(sass(
            {
                outputStyle: 'expanded',
                sourceMap: true,
                sourceMapRoot: [
                    resource_path + '/sass/canvas/',
                    vendors.bootstrap + '/stylesheets'
                ],
                includePaths: [
                    require('node-bourbon').includePaths,
                    require('node-neat').includePaths,
                    vendors.bootstrap + '/stylesheets'
                ],
                noCache: true,
                errLogToConsole: true
            }))
        .pipe(postcss(processors))
        .pipe(gulp.dest(CssPath));

    var min = scss.pipe(clone())
        .pipe(cssnano({discardComments: {removeAll: true}}))
        .pipe(rename('app.min.css'));

    return merge(scss, min)
        .pipe(sourcemaps.write('.', {
            sourceRoot: resource_path + '/sass/canvas/',
            includeContent: false
        }))
        .pipe(gulp.dest(CssPath));
});

// JS

gulp.task('frontendJs', function () {

    var JsPath = 'public/assets/js';

    return gulp.src([
            vendors.jquery + '/jquery.js',
            vendors.bootstrap + '/javascripts/bootstrap.js',
            vendors.easing + '/js/jquery.easing.js',
            vendors.fitvids + '/jquery.fitvids.js',
            vendors.superfish + '/js/superfish.js',
            vendors.hoverintent + '/jquery.hoverintent.js',
            vendors.jrespond + '/jRespond.js',
            vendors.transit + '/jquery.transit.js',
            vendors.smoothscroll + '/SmoothScroll.js',
            vendors.jribble + '/jribble.js',
            vendors.ytplayer + 'jquery.mb.YTPlayer.js',
            vendors.jcookie + '/jquery.cookie.js',
            vendors.appear + '/jquery.appear.js',
            vendors.animsition + '/js/jquery.animsition.js',
            vendors.stellar + '/jquery.stellar.js',
            vendors.countdown + '/jquery.plugin.js',
            vendors.countdown + '/jquery.counter.js',
            vendors.countTo + '/jquery.countTo.js',
            vendors.owlcarousel + '/owl.carousel.js',
            vendors.morphtext + '/morphtext.js',
            vendors.isotope + '/isotope.pkgd.js',
            vendors.swiper + '/js/swiper.jquery.js',
            vendors.color + '/jquery.color.js',
            vendors.toastr + '/toastr.js',
            vendors.form + '/jquery.form.js',
            vendors.magnificpopup + '/jquery.magnific-popup.js',
            vendors.flexslider + '/jquery.flexslider.js',
            vendors.infinitescroll + '/jquery.infinitescroll.js',
            vendors.jqueryui + '/jquery-ui.js',
            vendors.validation + '/jquery.validate.js',
            vendors.moment + '/moment.js',
            resource_path + '/javascripts/app.js'

        ])
        .pipe(jshint())
        .pipe(jshint.reporter('default'))
        .pipe(concat('app.js'))
        .pipe(gulp.dest(JsPath))
        .pipe(rename({suffix: '.min'}))
        .pipe(uglify())
        .pipe(gulp.dest(JsPath));
});

// Fonts
gulp.task('frontFonts', function() {
    var fontPath = 'public/assets/fonts';

    return gulp.src([
            resource_path + '/fonts/**/*',
            vendors.fontawesome + '/fonts/**/*',
            vendors.bootstrap + '/fonts/**/*'
        ])
        .pipe(gulp.dest(fontPath));
});

gulp.task('build-frontend', function(callback) {
    runSequence('frontendCss', 'frontendJs', 'frontFonts', callback);
});

/*************### End Front-end section ###***************
 *
 ************### Start Back-end section ###***************/

gulp.task('backendCss', function()
{
    var AdminCssPath = 'public/assets/admin/css';

    var processors = [
        require("postcss-cssnext")({
            'browers': ['last 2 version'],
            'customProperties': true,
            'colorFunction': true,
            'customSelectors': true,
            'sourcemap': true,
            'compress': false
        }),
        require("postcss-import")
    ];

    var lessFile = gulp.src(resource_path + '/less/admin.less')
        .pipe(sourcemaps.init())
        .pipe(less(
            {
                paths: [ path.join(__dirname, 'less', 'includes') ],
                outputStyle: 'expanded',
                sourceMap: true,
                noCache: true,
                errLogToConsole: true
            }))
        .pipe(postcss(processors))
        .pipe(gulp.dest(AdminCssPath));

    var min = lessFile.pipe(clone())
        .pipe(cssnano({discardComments: {removeAll: true}}))
        .pipe(rename('app.min.css'));

    return merge(lessFile, min)
        .pipe(sourcemaps.write('.', {
            includeContent: false
        }))
        .pipe(gulp.dest(AdminCssPath));
});

gulp.task('backendJS', function()
{
    var AdminJSPath = 'public/assets/admin/js';
    var adminJs = [
        bower_path + '/jquery/dist/jquery.min.js',
        bower_path + '/nestable-fork/dist/jquery.nestable.min.js',
        bower_path + '/bootstrap/dist/js/bootstrap.min.js',
        bower_path + '/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js',
        bower_path + '/mjolnic-bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js',
        bower_path + '/datatables/media/js/jquery.dataTables.min.js',
        bower_path + '/datatables/media/js/dataTables.bootstrap.min.js',
        bower_path + '/datatables-buttons/js/dataTables.buttons.js',
        bower_path + '/datatables-buttons/js/buttons.bootstrap.js',
        bower_path + '/morris.js/morris.js',
        bower_path + '/AdminLTE/dist/js/app.min.js'
    ];
    return gulp.src(adminJs)
        .pipe(jshint())
        .pipe(jshint.reporter('default'))
        .pipe(concat('admin.js'))
        .pipe(gulp.dest(AdminJSPath))
        .pipe(rename({suffix: '.min'}))
        .pipe(uglify())
        .pipe(gulp.dest(AdminJSPath));
});

gulp.task('copyBackend', function()
{
    //backend copy js
    var copyJS = [
        resource_path + '/datatables/buttons.server-side.js',
        resource_path + '/js/admin-custom.js',
        bower_path + '/raphael/raphael-min.js'
    ];
    var js = gulp.src(copyJS)
        .pipe(gulp.dest('public/assets/admin/js'));

    //backend copy css
    var copyCSS = [
        resource_path + '/datatables/buttons.css'
    ];
    var css = gulp.src(copyCSS)
        .pipe(gulp.dest('public/assets/admin/css'));

    //backend tinymce
    var copyTinymce = [
        bower_path + '/tinymce/*',
        bower_path + '/tinymce-localautosave/localautosave/*'
    ];
    var tinymce = gulp.src(copyTinymce)
        .pipe(gulp.dest('public/assets/admin/tinymce'));

    //backend font
    var copyFont = [
        bower_path + '/font-awesome/fonts/*',
        bower_path + '/bootstrap/fonts/*'
    ];
    var font = gulp.src(copyFont)
        .pipe(gulp.dest('public/assets/admin/fonts'));

    //backend image
    var copyImage = [
        bower_path + '/mjolnic-bootstrap-colorpicker/dist/img/*/*.png'
    ];
    var images = gulp.src(copyImage)
        .pipe(gulp.dest('public/assets/admin/images'));

    return merge(js, css, tinymce, font, images)

});

gulp.task('build-backend', function(callback){
    runSequence('backendCss', 'backendJS', 'copyBackend', callback);
});

/*********************END HERE***********************/