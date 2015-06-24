var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Less
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {
  mix.less('app.less', 'resources/css');

  mix.styles([
    '**',

    'libs/**'
  ], null, 'resources/css');

  mix.scripts([
    'libs/angular.js', 'libs/angular/**',

    'modules/**/index.js',
    'modules/**',

    'app.js',

    'libs/jquery.min.js', 'libs/jquery.ui.widget.js', 'libs/bootstrap.min.js', 'libs/select2.min.js',
    'libs/moments.min.js', 'libs/bootstrap-datetimepicker.min.js',

    'libs/load-image.all.min.js',

    'libs/ui-bootstrap-tpls-0.13.0.min.js',

    /** FileUpload **/
    /**'libs/fileupload/jquery.iframe-transport.js',
    'libs/fileupload/jquery.fileupload.js', 'libs/fileupload/jquery.fileupload-process.js',
    'libs/fileupload/jquery.fileupload-audio.js', 'libs/fileupload/jquery.fileupload-image.js',
    'libs/fileupload/jquery.fileupload-validate.js', 'libs/fileupload/jquery.fileupload-angular.js'**/
  ], null, 'resources/js');

  mix.version(['public/css/all.css', 'public/js/all.js']);

});
