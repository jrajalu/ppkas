module.exports = function(grunt) {

  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),

    // grunt-contrib-copy

    copy: {
      dist: {
        files: [{
          expand: true,
          cwd: 'bower_components/jquery/dist',
          src: '*',
          dest: 'lib/jquery'
        },
        {
          expand: true,
          cwd: 'bower_components/CMB2',
          src: '**',
          dest: 'lib/cmb2'
        },
        {
          expand: true,
          cwd: 'bower_components/fitvids',
          src: 'jquery.fitvids.js',
          dest: 'lib/fitvids'
        },
        {
          expand: true,
          cwd: 'bower_components/TGM-Plugin-Activation',
          src: 'class-tgm-plugin-activation.php',
          dest: 'lib/tgmpa'
        },
        {
          expand: true,
          cwd: 'bower_components/jqnewsTicker/js',
          src: 'newsTicker.js',
          dest: 'lib/jqnewsticker'
        },
        {
          expand: true,
          cwd: 'bower_components/uikit',
          src: '**',
          dest: 'lib/uikit'
        }]
      }
    },

    // grunt-contrib-less

    less: {
      production: {
        options: {
          paths: ['css'],
          compress: false,
          cleancss: false
        },
        files: {
          'style.css': 'less/style.less',
          'css/admin.css': 'less/admin.less'
        }
      }
    },

    // grunt-contrib-cssmin
    
    cssmin: {
      options: {
        shorthandCompacting: false,
        roundingPrecision: -1
      },
      target: {
      files: {
        'css/admin.min.css': ['css/admin.css']
        }
      }
    },

    // grunt-contrib-uglify

    uglify: {
      options: {
        banner: '/*! <%= pkg.name %> v<%= pkg.version %> by <%= pkg.author %> <%= grunt.template.today("yyyy-mm-dd") %> */\n',
        sourceMap: false
      },
      site: {
        src: 'js/src/scripts.js',
        dest: 'js/scripts.min.js'
      },
      admin: {
        src: 'js/src/admin.js',
        dest: 'js/admin.min.js'
      }
    },

    // grunt-banner

    usebanner: {
      taskName: {
        options: {
          position: 'top',
          banner: '/*\n'+
                  'Theme Name: PPKAS UniMAP\n'+
                  'Theme URI: https://github.com/jrajalu/ppkas\n'+
                  'Version: <%= pkg.version %>\n'+
                  'Description: <%= pkg.description %>\n'+
                  'Author: <%= pkg.author %>\n'+
                  '*/',
          linebreak: true
        },
        files: {
          src: [ 'style.css' ]
        }
      }
    },

    // grunt-contrib-watch

    watch: {
      configFiles: {
        files: ['Gruntfile.js']
      },
      css: {
        files: [
          'less/style.less',
          'less/admin.less',
          'less/*.less'
        ],
        tasks: ['less','usebanner','cssmin'],
          options: {
            livereload: true
          }
      },
      js: {
        files: ['js/src/*.js'],
        tasks: ['uglify'],
          options: {
            spawn: false
          }
      }
    },

    // grunt-contrib-clean

    clean: {
      css: ['css/*.css', '!css/*.min.css', 'img/*.css'],
      js: ['js/*.js', '!js/*.min.js'],
      cmb2: ['lib/cmb2/tests', 'lib/cmb2/css/sass', 'lib/cmb2/languages/*.po', 'lib/cmb2/languages/*.mo', '!lib/cmb2/*.pot', '!lib/cmb2/*.php', 'lib/cmb2/coverage.clover'],
      uikit:  [
              'lib/uikit/scss',
              'lib/uikit/less',
              'lib/uikit/js/core',
              'lib/uikit/js/*.js',
              '!lib/uikit/js/*.min.js',
              'lib/uikit/js/components/*.js',
              '!lib/uikit/js/components/*.min.js',
              'lib/uikit/css/*.css',
              '!lib/uikit/css/*.almost-flat.min.css',
              'lib/uikit/css/components/*.css',
              '!lib/uikit/css/components/*.almost-flat.min.css'
              ]
    }
    
  }); // end Project configuration

  // load grunt task
  
  grunt.loadNpmTasks('grunt-banner');
  grunt.loadNpmTasks('grunt-contrib-clean');
  grunt.loadNpmTasks('grunt-contrib-cssmin');
  grunt.loadNpmTasks('grunt-contrib-copy');
  grunt.loadNpmTasks('grunt-contrib-less');
  grunt.loadNpmTasks('grunt-contrib-uglify');
  grunt.loadNpmTasks('grunt-contrib-watch');

  // execute grunt task
  
  grunt.registerTask('build', ['copy', 'less', 'uglify', 'usebanner']);
  
  grunt.registerTask('script', ['less', 'uglify', 'usebanner']);

  grunt.registerTask('dev', ['watch']);

  grunt.registerTask('final', ['clean']);

};