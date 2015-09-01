module.exports = function(grunt) {

  // Project configuration.
  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),
    uglify: {
      options: {
        banner: '/*! <%= pkg.name %> <%= grunt.template.today("yyyy-mm-dd") %> */\n'
      },
      build: {
        src: 'src/<%= pkg.name %>.js',
        dest: 'build/<%= pkg.name %>.min.js'
      },
      dist: {
        files: {
          'assets/js/app.min.js': ['assets/js/app.js']
        }
      }
    },
    sass: {
      dist: {
        options: {
          outputStyle: 'compressed'
        },
        files: {
          'assets/css/app.css': 'assets/scss/app.scss'
        }        
      }
    },
    watch: {
      grunt: { files: ['Gruntfile.js'] },

      sass: {
        files: 'assets/scss/**/*.scss',
        tasks: ['sass']
      }
    }
  });

  // Load the plugin that provides the "uglify" task.
  grunt.loadNpmTasks('grunt-contrib-uglify');
  grunt.loadNpmTasks('grunt-contrib-watch');
  grunt.loadNpmTasks('grunt-sass');

  grunt.registerTask('build', ['sass']);
  // Default task(s).
  grunt.registerTask('default', ['uglify', 'watch']);

};