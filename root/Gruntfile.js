module.exports = function( grunt ) {
	'use strict';

	// Load all grunt tasks
	require('matchdep').filterDev('grunt-*').forEach(grunt.loadNpmTasks);

	// Project configuration
	grunt.initConfig( {
		pkg:    grunt.file.readJSON( 'package.json' ),
		concat: {
			options: {
				stripBanners: true,
				banner: '/*! <%= pkg.title %> - v<%= pkg.version %> - <%= grunt.template.today("yyyy-mm-dd") %>\n' +
					' * <%= pkg.homepage %>\n' +
					' * Copyright (c) <%= grunt.template.today("yyyy") %>;' +
					' * Licensed GPLv2+' +
					' */\n'
			},
			{%= js_safe_name %}: {
				src: [
					'assets/js/src/{%= js_safe_name %}.js'
				],
				dest: 'assets/js/{%= js_safe_name %}.js'
			}
		},
		jshint: {
			browser: {
				all: [
					'assets/js/src/**/*.js',
					'assets/js/test/**/*.js'
				],
				options: {
					jshintrc: '.jshintrc'
				}
			},
			grunt: {
				all: [
					'Gruntfile.js'
				],
				options: {
					jshintrc: '.gruntjshintrc'
				}
			}   
		},
		uglify: {
			all: {
				files: {
					'assets/js/{%= js_safe_name %}.min.js': ['assets/js/{%= js_safe_name %}.js']
				},
				options: {
					banner: '/*! <%= pkg.title %> - v<%= pkg.version %> - <%= grunt.template.today("yyyy-mm-dd") %>\n' +
						' * <%= pkg.homepage %>\n' +
						' * Copyright (c) <%= grunt.template.today("yyyy") %>;' +
						' * Licensed GPLv2+' +
						' */\n',
					mangle: {
						except: ['jQuery']
					}
				}
			}
		},
		test:   {
			files: ['assets/js/test/**/*.js']
		},
		{% if ('sass' === css_type) { %}
		sass:   {
			all: {
				files: {
					'assets/css/{%= js_safe_name %}.css': 'assets/css/sass/{%= js_safe_name %}.scss'
				}
			}
		},
		{% } else if ('less' === css_type) { %}
		less:   {
			all: {
				files: {
					'assets/css/{%= js_safe_name %}.css': 'assets/css/less/{%= js_safe_name %}.less'
				}
			}
		},
		{% } %}
		cssmin: {
			options: {
				banner: '/*! <%= pkg.title %> - v<%= pkg.version %> - <%= grunt.template.today("yyyy-mm-dd") %>\n' +
					' * <%= pkg.homepage %>\n' +
					' * Copyright (c) <%= grunt.template.today("yyyy") %>;' +
					' * Licensed GPLv2+' +
					' */\n'
			},
			minify: {
				expand: true,
				{% if ('sass' === css_type || 'less' === css_type) { %}
				cwd: 'assets/css/',
				src: ['{%= js_safe_name %}.css'],
				{% } else { %}
				cwd: 'assets/css/src/',
				src: ['{%= js_safe_name %}.css'],
				{% } %}
				dest: 'assets/css/',
				ext: '.min.css'
			}
		},
		watch:  {
			{% if ('sass' === css_type) { %}
			sass: {
				files: ['assets/css/sass/*.scss'],
				tasks: ['sass', 'cssmin'],
				options: {
					debounceDelay: 500
				}
			},
			{% } else if ('less' === css_type) { %}
			less: {
				files: ['assets/css/less/*.less'],
				tasks: ['less', 'cssmin'],
				options: {
					debounceDelay: 500
				}
			},
			{% } else { %}
			styles: {
				files: ['assets/css/src/*.css'],
				tasks: ['cssmin'],
				options: {
					debounceDelay: 500
				}
			},
			{% } %}
			scripts: {
				files: ['assets/js/src/**/*.js', 'assets/js/vendor/**/*.js'],
				tasks: ['jshint', 'concat', 'uglify'],
				options: {
					debounceDelay: 500
				}
			}
		}
	} );

	// Default task.
	{% if ('sass' === css_type) { %}
	grunt.registerTask( 'default', ['jshint', 'concat', 'uglify', 'sass', 'cssmin'] );
	{% } else if ('less' === css_type) { %}
	grunt.registerTask( 'default', ['jshint', 'concat', 'uglify', 'less', 'cssmin'] );
	{% } else { %}
	grunt.registerTask( 'default', ['jshint', 'concat', 'uglify', 'cssmin'] );
	{% } %}

	grunt.util.linefeed = '\n';
};