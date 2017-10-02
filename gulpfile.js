var gulp = require('gulp');
var sass = require('gulp-sass');
var csscomb = require('gulp-csscomb');
var cssbeautify = require('gulp-cssbeautify');
var autoprefixer = require('gulp-autoprefixer');
var rename = require('gulp-rename');
var csso = require('gulp-csso');
var cssimport = require("gulp-cssimport");
var watch = require("gulp-watch");
var livereload = require("gulp-livereload");
var ftp = require('vinyl-ftp');
var notify = require('gulp-notify');
//js
var uglify = require('gulp-uglify');
var concat = require('gulp-concat');

// création d'un fichier JS minifié : PENSER A Y METTRE LES FICHIERS
gulp.task('scripts', function() {
  gulp.src([
	  './js/bootstrap.min.js',
	  './js/jquery.mobile.custom.min.js',
	  './js/modernizr.js',
	  './js/nav.js',
	  './js/skip-link-focus-fix.js',
	  './js/customiz.js'
      ])
    .pipe(concat('wia.min.js',{newLine: ';'}))
    .pipe(uglify())
    .pipe(gulp.dest('./dist/'))
});


// création fichier production normal
gulp.task('build', function() {
    gulp.src('./src/**/style.scss')
        .pipe(sass().on('error', sass.logError))
    	.pipe(cssimport())
        .pipe(csscomb())
        .pipe(cssbeautify({indent: '  '}))
        .pipe(autoprefixer())    
        .pipe(gulp.dest('./css/'));
});

// création fichier production minifé
gulp.task('prod', function() {
    gulp.src('./src/**/style.scss')
        .pipe(sass().on('error', sass.logError))
    	.pipe(cssimport())
        .pipe(autoprefixer())  
        .pipe(csso())    
        .pipe(rename({
          suffix: '.min'
        }))
        .pipe(gulp.dest('./css/'));
});


// envoi ftp
var localFilesGlob = ['./css/style.min.css'];  // local folder
var remoteFolder = '/wp-content/themes/mytheme/css'; //distant folder !!!! CHANGE THEME FOLDER NAME !!!!
gulp.task( 'deploy', function () {

    //ftp access
    var conn = ftp.create( {
        host:     'myhostaddress',
        user:     'myusername',
        password: 'mypassword'
    } );


    return gulp.src( localFilesGlob, { cwd: '.', buffer: false } )
        .pipe( conn.newer( remoteFolder ) ) // only upload newer files
        .pipe( conn.dest( remoteFolder ) )
        .pipe(notify("Site mis à jour ! OH YEAH BABY :)")) // Notify what you want when file is uploaded
        .pipe(livereload()); // Livereload your brother when file is uploded. You have to active the fonction in your brother with a plugin. For chrome use for exemple : https://chrome.google.com/webstore/detail/livereload/jnihajbhpnppcggbcgedagnkighmdlei?utm_source=plus
} );

//Watch task
gulp.task('default',function() {   
    gulp.watch('./src/**/*.scss',['build', 'prod']); //watch change one scss and create two css file
    gulp.watch('./css/**/style.min.css', ['deploy']); //watch change one style.min.css and deploy on FTP
    livereload.listen();
});
