module.exports = function (grunt) {
	'use strict';

	grunt.initConfig({
		pkg: grunt.file.readJSON('package.json'),
		concat: {
			jsAdmin:{
				src: [
					'app/webroot/js/jquery.js',
					'app/webroot/js/bootstrap.js',
					'app/webroot/theme/Sistema/js/jquery.dataTables.js',
					'app/webroot/theme/Sistema/js/dataTables.bootstrap.js',
					'app/webroot/theme/Sistema/js/datetimepicker.js',
					'app/webroot/js/jquery.maskedinput.min.js',
					'app/webroot/theme/Sistema/js/bootstrap-filestyle.js',
					'app/webroot/theme/Sistema/js/scripts.js',
				],
				dest: 'app/webroot/theme/Sistema/js/main.js'
			},
			jsDefault:{
				src: [
					'app/webroot/js/jquery.js',
					'app/webroot/js/bootstrap.js',
					'app/webroot/js/jquery.maskedinput.min.js',
				],
				dest: 'app/webroot/js/main.js'
			},
			cssAdmin: {
				src:[
					'app/webroot/css/bootstrap.css',
					'app/webroot/css/bootstrap-theme.css',
					'app/webroot/theme/Sistema/css/dataTables.bootstrap.css',
					'app/webroot/css/datetimepicker.css',
					'app/webroot/theme/Sistema/css/font-awesome.min.css',

					'app/webroot/theme/Sistema/css/sb-admin.css',
				],
				dest: 'app/webroot/theme/Sistema/css/main.css'
			},
			cssDefault: {
				src:[
					'app/webroot/css/bootstrap.css',
					'app/webroot/css/bootstrap-theme.css',
					'app/webroot/css/datetimepicker.css',
					'app/webroot/theme/Sistema/css/style.css',
				],
				dest: 'app/webroot/css/main.css'
			}
		}, //concatenando css e js

		uglify:{
			my_target:{
				files:[
					{src: 'app/webroot/theme/Sistema/js/main.js', dest: 'app/webroot/theme/Sistema/js/main.min.js'},
					{src: 'app/webroot/js/main.js', dest: 'app/webroot/js/build.min.js'},
				],
			}
		},// minificando js

		cssmin: {
			minify: {
				files: [{
					'app/webroot/theme/Sistema/css/main.min.css': ['app/webroot/theme/Sistema/css/main.css']
				},
				{
					'app/webroot/css/build.min.css': ['app/webroot/css/main.css']
				}
				],
			}
		}, // minificando css

		watch: {
			dist: {
				files: [
				 'app/webroot/theme/Sistema/css/sb-admin.css',
				],
				tasks: [ 'concat:css', 'cssmin' ],
				options: {
					interrupt: true,
				},
			}
		}
	});

	grunt.loadNpmTasks( 'grunt-contrib-concat' );
	grunt.loadNpmTasks( 'grunt-contrib-uglify' );
	grunt.loadNpmTasks( 'grunt-contrib-cssmin' );
	grunt.loadNpmTasks( 'grunt-contrib-watch' );

	// task
	grunt.registerTask('default',['concat', 'uglify', 'cssmin']);

	//watch
	grunt.registerTask( 'w', [ 'watch' ] );

}