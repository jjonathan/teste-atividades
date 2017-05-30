module.exports = function(gulp, options, plugins){
	gulp.task('styleTask', function(cb){
		options.pump([
			gulp.src(
				options.paths.src.css,
            	{base: 'assets/'}
            ),
			plugins.concat('style.min.css'),
			plugins.cssmin(),
			gulp.dest(options.paths.dist.css)
			], cb);
	});
};