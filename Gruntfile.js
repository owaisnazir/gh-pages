module.exports = function (grunt) {

	var gruntConfig = {},

		glob = require('glob'),
		_ = require('lodash'),
		_deepExtend = require('underscore-deep-extend'),
		loadGruntTasks = require('load-grunt-tasks');

	// initialize _deepExtend into _ object
	_.mixin({deepExtend: _deepExtend(_)});




	grunt.registerTask( 'build_dist_assets', [

		// CSS
		'sass:dist',
		'cmq:sass',
		'autoprefixer:min',
		'cssmin:combine',

		// JS
		'browserify',
		'uglify:browserify',

		// Images
		'imagemin:assets_dist'

	]);

	grunt.registerTask( 'default', 'watch' );



	gruntConfig.helperpress = grunt.file.readJSON('package.json').config;




	//////////////////////
	// Load Task configs
	//////////////////////

	var configPath = './grunt/configs/';
	glob.sync('**/*.js', {cwd: configPath}).forEach(function(option) {

		// remove .js extension
		var key = option.replace(/\.js$/,''),
			configExports;

		// remove any directories
		key = key.substr( key.lastIndexOf('/') + 1 );

		configExports = require(configPath + option);

		if(typeof configExports === 'function'){
			gruntConfig[key] = configExports(grunt);
		}else{
			gruntConfig[key] = configExports;
		}

	});


	////////////////
	// kick it off
	////////////////

	loadGruntTasks(grunt, {
		smartLoad: {
			'sass:dev': ['grunt-contrib-sass'],
			'autoprefixer:sass': ['grunt-autoprefixer'],
			'newer:imagemin:assets_dev': ['grunt-newer', 'grunt-contrib-imagemin'],
			'browserifyBower': ['grunt-browserify-bower'],
			'browserify:dev': ['grunt-browserify']
		}
	});

	// initialize config
	grunt.initConfig(gruntConfig);


};