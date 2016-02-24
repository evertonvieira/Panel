module.exports = function (grunt) {
	'use strict';

	grunt.initConfig({
		pkg: grunt.file.readJSON('package.json'),

		concat: {
			js:{
				src: [
					'app/webroot/theme/Sistema/js/jquery.js',
					'app/webroot/theme/Sistema/js/bootstrap.js',
					'app/webroot/theme/Sistema/js/jquery.dataTables.js',
					'app/webroot/theme/Sistema/js/dataTables.bootstrap.js',
					'app/webroot/theme/Sistema/js/scripts.js',
				],
				dest: 'app/webroot/theme/Sistema/js/main.js'
			},
			css: {
				src:[
					'app/webroot/theme/Sistema/css/bootstrap.css',
					'app/webroot/theme/Sistema/css/bootstrap-theme.css',
					'app/webroot/theme/Sistema/css/dataTables.bootstrap.css',
					'app/webroot/theme/Sistema/css/font-awesome.min.css',
					'app/webroot/theme/Sistema/css/sb-admin.css',
				],
				dest: 'app/webroot/theme/Sistema/css/main.css'
			}
		}, //concatenando css e js

		uglify:{
			my_target:{
				files: {
					'app/webroot/theme/Sistema/js/main.min.js': ['app/webroot/theme/Sistema/js/main.js']
				}
			}
		},// minificando js

		cssmin: {
			target: {
				files: [{
					expand: true,
					src: ['app/webroot/theme/Sistema/css/main.css'],
					ext: '.min.css'
				}]
			}
		}// minificando css

	});

	grunt.loadNpmTasks( 'grunt-contrib-concat' );
	grunt.loadNpmTasks( 'grunt-contrib-uglify' );
	grunt.loadNpmTasks('grunt-contrib-cssmin');

	// task default
	grunt.registerTask('default',['concat', 'uglify', 'cssmin']);

}