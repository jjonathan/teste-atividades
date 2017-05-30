module.exports = function(gulp, options, plugins){

	gulp.task('scriptTask', function(cb){
		options.pump([
			gulp.src(
				options.paths.src.js,
            	{base: 'assets/'}
			),
			plugins.concat('script.min.js'),
			plugins.uglify(),
			gulp.dest(options.paths.dist.js)
			], cb);
	});
}