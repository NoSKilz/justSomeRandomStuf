module.exports = function(grunt) {
  require('jit-grunt')(grunt);

  grunt.initConfig({
    less: {
      development: {
        options: {
          /*compress: true,
          yuicompress: true,*/
          optimization: 2
        },
        files: {
          "custom/css/main.css": "custom/less/main.less"// destination file and source file
        }
      }
    },
    watch: {
      styles: {
        files: ['custom/less/*.less'], // which files to watch
        tasks: ['less'],
        options: {
          spawn: true
        }
      }
    }
  });
  grunt.registerTask('default', ['less', 'watch']);
};