'use strict';
module.exports = function(grunt) {

  // Load grunt tasks automatically
  require('load-grunt-tasks')(grunt);

  const sass = require('node-sass');

  // Project configuration.
  grunt.initConfig({
    // Metadata.
    pkg: grunt.file.readJSON('package.json'),
    banner: '/*! <%= pkg.title || pkg.name %> - v<%= pkg.version %> - ' +
      '<%= grunt.template.today("yyyy-mm-dd") %>\n' +
      '<%= pkg.homepage ? "* " + pkg.homepage + "\\n" : "" %>' +
      '* Copyright (c) <%= grunt.template.today("yyyy") %> <%= pkg.author.client %>;' +
      '*/\n',
    uglify: {
      options: {
        banner: '<%= banner %>',
        sourceMap: false,
        beautify: false,
        mangle: true,
        compress: {
          drop_console: false,
          drop_debugger: false
        }
      },
      all: {
        files: {
          'dist/js/application-head.js': [
            'src/js/vendor/svgxuse.min.js',
            'src/js/vendor/jquery-3.5.1.min.js',
          ],
          'dist/js/application.js': [
            '.tmp/babel/app.js',
            '.tmp/babel/modules/*.js'
          ]
        }
      }
    },
    jshint: {
      options: {
        jshintrc: '.jshintrc',
        reporter: require('jshint-stylish'),
        force: true
      },
      all: {
        src: [
          'src/js/modules'
        ]
      }
    },

    sass: {
      options: {
        implementation: sass,
        sourceMap: false,
        outputStyle: 'compressed' //nested, expanded, compact, compressed
      },
      dist: {
        files: [{
          expand: true,
          flatten: true,
          src: 'src/styles/*.scss',
          dest: 'dist/styles/',
          ext: '.css'
        }]
      }
    },

    postcss: {
      options: {
        map: true,
        processors: [
          require('autoprefixer')({'overrideBrowserslist': 'last 2 versions'}), // add vendor prefixes
          // require('cssnano')() // minify the result. disabled for dev b/c it's slow
        ]
      },
      dist: {
        src: 'dist/styles/*.css'
      }
    },


    svgstore: {
      options: {
        prefix: 'icon-',
        svg: {
          viewBox: '0 0 30 30',
          xmlns: 'http://www.w3.org/2000/svg'
        }
      },
      default: {
        files: {
          'images/svg-sprite.svg': ['images/svg-icons/*.svg']
        }
      }
    },

    exec: {
      cleanTmp: {
        cmd: function () {
          return 'rm -r .tmp/*';
        }
      },
    },

    babel: {
      options: {
        sourceMap: false,
        presets: [
          ['env', {
            modules: false,
            targets: {
              browsers: ['last 2 versions'],
            },
            uglify: true,
          }]
        ]
      },
      dist: {
        files: [{
          expand: true,
          flatten: false,
          cwd: 'src/js/',
          src: [
            'modules/*.js',
            'app.js',
          ],
          dest: '.tmp/babel/',
          ext: '.js'
        }]
      }
    },

    watch: {
      options: {
        livereload: true
      },
      js: {
        files: ['src/js/**/*.js'],
        tasks: ['js']
      },
      svg: {
        files: ['images/svg-icons/**/*.svg'],
        tasks: ['svgstore']
      },
      css: {
        files: ['src/styles/**/*.{scss,sass}'],
        tasks: ['css']
      }
    }
  });

  //Tasks
  grunt.registerTask('default', ['js', 'css', 'svgstore']);
  grunt.registerTask('js', ['jshint', 'babel', 'uglify', 'exec:cleanTmp']);
  grunt.registerTask('css', ['sass', 'postcss']);

};
