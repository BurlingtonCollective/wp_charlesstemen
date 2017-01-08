'use strict';

module.exports = function (grunt) {
  grunt.loadNpmTasks('grunt-contrib-less');
  grunt.loadNpmTasks('grunt-contrib-watch');

  grunt.initConfig({
    watch: {
      wp_charlesstemen: {
        files: "wp-content/themes/wp_charlesstemen/styles/**/*.less",
        tasks: ["less:wp_charlesstemen"]
      },
    },
    less: {
      wp_charlesstemen: {
        options: {
          sourceMap: true,
          sourceMapUrl: '/wp-content/themes/wp_charlesstemen/style.css.map'
        },
        files: {
          "wp-content/themes/wp_charlesstemen/style.css": "wp-content/themes/wp_charlesstemen/styles/style.less"
        }
      }
    }
  });

  grunt.registerTask('default', ['less:wp_charlesstemen']);
  grunt.registerTask('build', ['less:wp_charlesstemen']);
};
