var config  = require('./package'),
    gulp    = require('gulp'),
    util    = require('gulp-util'),
    concat  = require('gulp-concat'),
    compass = require('gulp-compass'),
    uglify  = require('gulp-uglify')
    minCSS  = require('gulp-minify-css'),
    rename  = require('gulp-rename'),
    colors  = require('colors'),
    replace = require('gulp-replace');

var paths   = {
  scripts: {
      app: [
        'wp-content/themes/' + config.name + '/src/js/main.js',
        'wp-content/themes/' + config.name + '/src/js/modules/*.js'
      ],
      vendor: [
          'bower_components/modernizr/modernizr.js',
          'bower_components/jquery/dist/jquery.min.js',
          'wp-content/themes/' + config.name + '/src/js/vendor/*.js'
      ],
      singles: ['bower_components/rem-unit-polyfill/js/rem.min.js'],
      dest: {
        app: 'wp-content/themes/' + config.name + '/js',
        vendor: 'wp-content/themes/' + config.name + '/js/vendor'
      }
    },
  styles: {
      app: 'wp-content/themes/' + config.name + '/src/sass/**/*.sass',
      vendor: [
        'bower_components/foundation/scss/foundation/_functions.scss',
        'bower_components/foundation/scss/foundation/components/_global.scss',
        'bower_components/foundation/scss/foundation/components/_grid.scss',
        'bower_components/foundation/scss/foundation/components/_type.scss'
      ],
      src: 'wp-content/themes/' + config.name + '/src/sass/vendor',
      dest: 'wp-content/themes/' + config.name + '/css'
  }
};

// Javascript
gulp.task('scripts', function() {
  // Application scripts
  gulp.src(paths.scripts.app)
    // For production
    // .pipe(uglify())
    // .pipe(concat('app.min.js'))
    .pipe(concat('app.js'))
    .pipe(gulp.dest(paths.scripts.dest.app));
  console.log('[' + '.js'.green + '] - app.js           Finished');

  // Vendor Scripts
  gulp.src(paths.scripts.vendor)
    .pipe(uglify())
    .pipe(concat('vendor.min.js'))
    .pipe(gulp.dest(paths.scripts.dest.vendor));
  console.log('[' + '.js'.green + '] - vendor.min.js    Finished');

  gulp.src(paths.scripts.singles)
    .pipe(uglify())
    .pipe(gulp.dest(paths.scripts.dest.vendor));
  console.log('[' + '.js'.green + '] - vendor singles   Finished');
});

// Sass
gulp.task('sass', function () {
  // Vendor Styles
  gulp.src(paths.styles.vendor)
    // Fix relative path in global.scss
    .pipe(replace(/..\/functions/g, 'functions'))
    .pipe(gulp.dest(paths.styles.src));

  // Application styles
  gulp.src(paths.styles.app)
    .pipe(compass({
      css: './wp-content/themes/' + config.name + '/css',
      sass: './wp-content/themes/' + config.name + '/src/sass',
      image: './wp-content/themes/' + config.name + '/images'
    }))
    .on('error', function (err) {
      return console.log('[' + '.css'.green + '] - ' + err);
    })
    // Production
    // .pipe(minCSS())
    .pipe(gulp.dest(paths.styles.dest));
  console.log('[' + '.css'.green + '] - app.css        Finished');
});

// Watch
gulp.task('watch', function () {
  gulp.watch(paths.scripts.app.modules, ['scripts']);
  gulp.watch(paths.scripts.app.main, ['scripts']);
  gulp.watch(paths.scripts.vendor, ['scripts']);
  gulp.watch(paths.styles.vendor, ['sass']);
  gulp.watch(paths.styles.app, ['sass']);
});

gulp.task('default', ['scripts', 'sass', 'watch']);
