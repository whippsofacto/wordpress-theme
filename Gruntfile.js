/* Gruntfile

How it works?
The watch task looks for any file with the extention .scss. When there is a
change to these files it will run the [sass] task.

[sass] task
The sass task is divided into two subsections dev and dist. Dev creates an
expanded (human readable) css file from the style.scss and it's partials and
places it in the compiled folder. Dist creates a minified version from the same
style.scss sheet and places it also, in the compiled folder.

[postcss] task
The postcss will autoprefix (automatically add any required prefixes) to scss/css in order
to ensure styles will run across different browsers.

*/
module.exports = function(grunt){
  grunt.initConfig({
    //tell Grunt where the package file is
    pkg: grunt.file.readJSON('package.json'),
    /* Sass Task*/
    sass:{
      //development version of sass compilation task
      dev:{
        options:{
          style: 'expanded',
          sourcemap: 'none',
        },
        files:{
          //where I want to put the file : where I'm getting the file from
          'compiled/style-human.css': 'sass/style.scss'
        }
      },
      //distribution version of sass compilation task
      dist:{
        options:{
          style: 'compressed',
          sourcemap: 'none',
        },
        files:{
          //where I want to put the file : where I'm getting the file from
          'compiled/style.css': 'sass/style.scss'
        }
      }
    },
    postcss: {
      options: {
        map: false,
        processors: [
          require('autoprefixer')
          ({
            browsers: ['last 2 versions']
           })
         ]
       },
       //prefix all files
       multiple_files:{
         expand:true,
         flatten:true,
         src:'compiled/*.css',
         dest:''
       }
    },
    /* Minify JS with Uglify Task */
      uglify: {
        my_target: {
          files: {
            //where I want to put the file : where I'm getting the file from
            'js/script.min.js': 'js/script.js'
           }
         }
     },
    /*jsHint Task */
      jshint: {
          all: ['Gruntfile.js', 'js/script.js','js/script.min.js'],
          options: {
          // more options here if you want to override JSHint defaults
          globals: {
            jQuery: true,
            console: true,
            module: true
         }
      }
    },
    /* Watch Task*/
    watch:{
        css:{
          /*Anthing that happens to any file within the project
          that contains .scss then some other task will be triggered*/
          files:'**/*.scss',
          tasks: ['sass','postcss'],
          options: {
            livereload:true
          }
        },
        js:{
          /*Anthing that happens to any file within the project
          that contains .js then some other task will be triggered*/
          files:'js/script.js',
          tasks: ['uglify'],
          options: {
            livereload:true
          }
        },
        jhint:{
          /*Anthing that happens to any file within the project
          that contains .js then some other task will be triggered*/
          files:['Gruntfile.js','js/script.min.js'],
          tasks: ['jshint'],
          options: {
            livereload:true
          }
       }
     }
  });

  //Tell Grunt to load the tasks
  grunt.loadNpmTasks('grunt-contrib-sass');
  grunt.loadNpmTasks('grunt-contrib-watch');
  grunt.loadNpmTasks('grunt-postcss');
  grunt.loadNpmTasks('grunt-contrib-uglify');
  grunt.loadNpmTasks('grunt-contrib-jshint');
  grunt.registerTask('default',['watch']);

};
