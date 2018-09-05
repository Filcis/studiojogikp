'use strict';

var gulp = require('gulp'),
    pkg = require('./package.json'),
    toolkit = require('gulp-wp-toolkit');

toolkit.extendConfig({
    theme: {
        name: "Studio Jogi Katarzyny Pilorz",
        homepage: pkg.homepage,
        description: pkg.description,
        author: pkg.author,
        version: pkg.version,
        license: "GNU General Public License v2 or later",
        textdomain: "studiojogikp"
    },
    src: {
      images: "develop/assets/**/*"
    },
    dest: {
      images: "assets"
    },
    js: {
        'theme' : [
            'develop/js/header/*.js'
         ],
         'event_handlers' : [
            'develop/js/footer/*.js',
         ]
    }
});

toolkit.extendTasks(gulp, { /* Task Overrides */ });
