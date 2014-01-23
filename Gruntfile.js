module.exports = function(grunt) {

  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),
    concat: {
      options: {
        separator: ';'
      },
      dist: {
        src: ['_assets_dev/js/*.js'],
        dest: '_assets_production/js/site.min.js'
      }
    },
    compass: {
      dist: {
        options: {
          environment: 'production',
          outputStyle: 'compressed',
          imagesDir: '../images',
          fontsDir: '../fonts',
          sassDir: '_assets_dev/scss',
          cssDir: '_assets_production/css',
          raw: 'preferred_syntax = :scss\n' // Use `raw` since it's not directly available
        }
      }
    },
    watch: {
      scripts: {
          files: ['_assets_dev/js/*.js'],
          tasks: ['concat'],
          options: {
		      livereload: true,
		      spawn: false,
		    },
      },
      styles: {
        files: ['_assets_dev/scss/*.scss', '_assets_dev/scss/libs/*.scss'],
        tasks: ['compass'],
        options: {
        	livereload: true,
            spawn: false,
        },
      }
    },
  });

  grunt.loadNpmTasks('grunt-contrib-concat');
  grunt.loadNpmTasks('grunt-contrib-compass');
  grunt.loadNpmTasks('grunt-contrib-watch');

  grunt.registerTask('default', ['concat', 'compass']);

};