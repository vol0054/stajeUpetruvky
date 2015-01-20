module.exports = function(grunt) {

  // load all grunt tasks matching the `grunt-*` pattern
    require('load-grunt-tasks')(grunt);
/*
  // Load the plugin that provides the "uglify" task.
  grunt.loadNpmTasks('grunt-contrib-uglify');
  grunt.loadNpmTasks('grunt-contrib-copy');
	// copy files downloaded by bower
	grunt.loadNpmTasks('grunt-bowercopy');  
*/
	grunt.initConfig({
    bowercopy: {
        options: {
            // Task-specific options go here
            
        },
        your_target: {
            // Target-specific file lists and/or options go here
        }
    }
	});	

  // Default task(s).
  grunt.registerTask('default', []);

};
