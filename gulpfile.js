const elixir = require('laravel-elixir');

require('laravel-elixir-vue-2');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir.config.sourcemaps = false;

elixir(function(mix) {
    mix.less('all.less', "./resources/assets/frontend/css/tmp/all.css")

        .styles([
            "/resources/assets/css/bootstrap.min.css",
            "/resources/assets/css/font-awesome.min.css",
            "/resources/assets/css/input/bootstrap-timepicker.min.css",
            "/resources/assets/css/input/dropzone/dropzone.css",
            "/resources/assets/css/input/bootstrap-fileupload.min.css",
            "/resources/assets/css/input/select2.css",
            "/resources/assets/frontend/css/ui/pnotify.custom.css",
            "/resources/assets/frontend/css/theme/theme.css",
            "/resources/assets/frontend/css/theme/theme-elements.css",
            "/resources/assets/frontend/css/theme/skin.css",
            "/resources/assets/frontend/css/ui/rs-plugin/settings.css",
            "/resources/assets/frontend/css/ui/owl.carousel.min.css",
            "/resources/assets/frontend/css/ui/owl.theme.default.min.css",
            "./resources/assets/frontend/css/tmp/all.css",
            "/resources/assets/frontend/css/theme/theme-blog.css",
            "/resources/assets/frontend/css/theme/theme-shop.css",
            "/node_modules/@fengyuanchen/datepicker/dist/datepicker.css",
            "/node_modules/summernote/dist/summernote.css",
            "/node_modules/jquery-unslider/dist/css/unslider.css",
            "/node_modules/jquery-unslider/dist/css/unslider-dots.css",
        ], "public/css/frontend.css", './')

        .scripts([
            "/resources/assets/js/jquery.min.js",
            "/resources/assets/js/bootstrap.min.js",
            "/resources/assets/frontend/js/theme/modernizr.js",
            "/resources/assets/frontend/js/ui/pnotify.custom.js",
            "/resources/assets/js/input/validator.min.js",
            "/resources/assets/js/input/bootstrap-maxlength.js",
            "/resources/assets/js/input/bootstrap-timepicker.js",
            "/resources/assets/js/input/bootstrap-fileupload.min.js",
            "/resources/assets/js/input/dropzone.min.js",
            "/resources/assets/js/input/select2.min.js",
            "/resources/assets/js/input/ios7-switch.js",
            "/resources/assets/frontend/js/ui/jquery.appear.min.js",
            "/resources/assets/frontend/js/ui/common.min.js",
            "/resources/assets/frontend/js/ui/rs-plugin/jquery.themepunch.tools.min.js",
            "/resources/assets/frontend/js/ui/rs-plugin/jquery.themepunch.revolution.min.js",
            "/resources/assets/frontend/js/ui/owl.carousel.min.js",
            "/node_modules/@fengyuanchen/datepicker/dist/datepicker.js",
            "/node_modules/summernote/dist/summernote.js",
            "/node_modules/jquery-unslider/dist/js/unslider-min.js",
        ], "public/js/frontend.js", './')

        .styles([
            "/resources/assets/css/bootstrap.min.css",
            "/resources/assets/css/font-awesome.min.css",
            "/resources/assets/backend/css/ui/jquery.dataTables.min.css",
            "/resources/assets/backend/css/ui/datatables.css",
            "/resources/assets/backend/css/ui/pnotify.custom.css",
            "/resources/assets/css/input/bootstrap-timepicker.min.css",
            "/resources/assets/css/input/dropzone/dropzone.css",
            "/resources/assets/css/input/bootstrap-fileupload.min.css",
            "/resources/assets/css/input/select2.css",
            "/resources/assets/backend/css/theme/theme.css",
            "/resources/assets/backend/css/theme/skin.css",
            "./resources/assets/backend/css/tmp/all.css",
            "/node_modules/@fengyuanchen/datepicker/dist/datepicker.css",
            "/node_modules/summernote/dist/summernote.css",
            "/node_modules/morris.js/morris.css",
        ], "public/css/backend.css", './')

        .scripts([
            "/resources/assets/js/jquery.min.js",
            "/resources/assets/js/bootstrap.min.js",
            "/resources/assets/backend/js/theme/nanoscroller.js",
            "/resources/assets/backend/js/theme/modernizr.js",
            "/resources/assets/backend/js/ui/pnotify.custom.js",
            "/resources/assets/js/input/validator.min.js",
            "/resources/assets/js/input/bootstrap-maxlength.js",
            "/resources/assets/js/input/bootstrap-timepicker.js",
            "/resources/assets/js/input/bootstrap-fileupload.min.js",
            "/resources/assets/js/input/dropzone.min.js",
            "/resources/assets/js/input/select2.min.js",
            "/resources/assets/js/input/ios7-switch.js",
            "/resources/assets/backend/js/ui/jquery.dataTables.min.js",
            "/resources/assets/backend/js/theme/theme.js",
            "/resources/assets/backend/js/app/fn.js",
            "/resources/assets/backend/js/app/event.js",
            "/resources/assets/backend/js/app/angular.init.js",
            "/resources/assets/backend/js/app/init.js",
            "/resources/assets/backend/js/ui/jquery.validate.js",
            "/resources/assets/backend/js/ui/jquery.bootstrap.wizard.js",
            "/resources/assets/backend/js/ui/examples.wizard.js",
            "/node_modules/@fengyuanchen/datepicker/dist/datepicker.js",
            "/node_modules/morris.js/morris.min.js",
            "/node_modules/raphael/raphael.min.js",
            "/node_modules/summernote/dist/summernote.js",
            "/resources/assets/backend/js/scripts.js",
        ], "public/js/backend.js", './')

        .copy('node_modules/summernote/dist/font', 'public/css/font')

        .version([
            'public/css/frontend.css',
            'public/js/frontend.js',
            'public/css/backend.css',
            'public/js/backend.js'
        ], 'public/asset', './')

});
