var gulp = require('gulp');
var plugins = require('gulp-load-plugins')();
var pump = require('pump');
var stylish = require('jshint-stylish');

var options = {
	'pump'	: pump,
	'stylish' : stylish,
	'paths' : {
		'src' : {
			'js'	: [
				'./assets/bower_components/jquery/dist/jquery.min.js',
				'./assets/bower_components/bootstrap/dist/js/bootstrap.min.js',
				'./assets/bower_components/datatables/media/js/jquery.dataTables.min.js',
				'./assets/bower_components/select2/dist/js/select2.min.js',
				'./assets/src/js/*'
			],
			'css'	: [
				'./assets/bower_components/bootstrap/dist/css/bootstrap.min.css',
				'./assets/bower_components/datatables/media/css/jquery.dataTables.min.css',
				'./assets/bower_components/select2/dist/css/select2.min.css',
				'./assets/bower_components/font-awesome/css/font-awesome.min.css',
				'./assets/src/css/*'
			],
			'fonts'	: [
				'./assets/bower_components/bootstrap/fonts/*.{eot,svg,ttf,woff,woff2}',
				'./assets/bower_components/font-awesome/fonts/*.{eot,svg,ttf,woff,woff2}',
				'./assets/src/fonts/*'
			],
			'img' : [
				'./assets/bower_components/datatables/media/images/*',
				'./assets/src/images/*'
			]
		},
		'dist' : {
			'js'	 : './assets/js/',
			'css'	 : './assets/css/',
			'fonts'	 : './assets/fonts/',
			'img' : './assets/images/',
		}
	}
};

require('load-gulp-tasks')(gulp, options, plugins);