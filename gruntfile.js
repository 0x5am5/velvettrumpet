// require('load-grunt-tasks')(grunt);

module.exports = function(grunt) {
  grunt.loadNpmTasks('grunt-contrib-uglify');
  grunt.loadNpmTasks('grunt-contrib-watch');
  grunt.loadNpmTasks('grunt-contrib-sass');
  grunt.loadNpmTasks('grunt-contrib-copy');

  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),

    uglify: {
      my_target: {
        files: {
          'js/main.js': ['components/js/main.js']
        }
      },
      bootstrap: {
        files: {
          'js/bootstrap.js': ['node_modules/bootstrap-sass/assets/javascripts/bootstrap.js']
        }        
      }
    },

    sass: {
      dev: {
        options: {
          style: 'expanded',
          sourcemap: 'none'
        },
        files: {
          'style.css': 'components/sass/main.scss'
        }
      },
      build: {
        options: {
          style: 'compressed',
          sourcemap: 'none'
        },
        files: {
          'compiled/style.css': 'components/sass/main.scss'
        }
      }
    },

    copy: {
      files: {
        src: ['components/js/*.js'],
        dest: 'js/main.js'
      },
      bootstrap: {
        src: 'node_modules/bootstrap-sass/assets/javascripts/bootstrap.js', 
        dest: 'js/bootstrap.js'
      },
      glyphicons: {
        expand: true,
        src: 'node_modules/bootstrap-sass/assets/fonts/bootstrap/*',
        dest: 'css/fonts/',
        filter: 'isFile',
        flatten: true
      },
      lightboxJS: {
        src: 'node_modules/lightbox2/dist/js/lightbox.js', 
        dest: 'js/lightbox.js'
      },
      lightboxCSS: {
        src: 'node_modules/lightbox2/dist/css/lightbox.css', 
        dest: 'css/lightbox.css'
      },
      lightboxImg: {
        expand: true,
        src: 'node_modules/lightbox2/dist/images/*', 
        dest: 'images/',
        filter: 'isFile',
        flatten: true
      }
    },

    // postcss: {
    //   options: {
    //     map: true,
    //     processors: [
    //       require('autoprefixer')({browsers: ['last 1 version']}),
    //     ]
    //   },
    //   dist: {
    //     src: 'components/sass/*/**'
    //   }
    // },

    watch: {
      options: { livereload: true },
      scripts: {
        files: ['components/js/*.js'],
        tasks: ['copy']        
      },
      css : {
        files: ['components/sass/*/**'],
        tasks: ['sass:dev']
      }
    }
  });


  grunt.registerTask('default', ['copy','sass:dev', 'watch']);
  grunt.registerTask('build', ['sass:build', 'uglify' ])

}