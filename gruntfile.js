// require('load-grunt-tasks')(grunt);

module.exports = function(grunt) {
  grunt.loadNpmTasks('grunt-contrib-uglify');
  grunt.loadNpmTasks('grunt-contrib-watch');
  grunt.loadNpmTasks('grunt-contrib-sass');
  grunt.loadNpmTasks('grunt-contrib-copy');
  grunt.loadNpmTasks('grunt-autoprefixer');

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
          'compiled/style.css': 'components/sass/main.scss'
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
        src: ['components/js/*.js'],           // copy all files and subfolders
        dest: 'js/main.js',    // destination folder
      },
      bootstrap: {
        src: 'node_modules/bootstrap-sass/assets/javascripts/bootstrap.js', 
        dest: 'js/bootstrap.js'
      }
    },

    autoprefixer: {
      options: {
        browsers: ['last 2 versions']
      },
      multiple_files: {
        expand: true,
        flatten: true,
        src: 'compiled/*.css',
        dest: ''
      }
    },

    watch: {
      options: { livereload: true },
      scripts: {
        files: ['components/js/*.js'],
        tasks: ['copy']        
      },
      css : {
        files: ['components/sass/*'],
        tasks: ['sass:dev', 'autoprefixer']
      }
    }
  });

  grunt.registerTask('default', ['copy','sass:dev', 'autoprefixer', 'watch']);
  grunt.registerTask('build', ['sass:build', 'autoprefixer', 'uglify' ])
}