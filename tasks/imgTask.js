module.exports = function(gulp, options, plugins){

	gulp.task('imgTask', function(cb){
		options.pump([
			gulp.src(
				options.paths.src.img,
            	{base: 'assets/'}
            ),
			plugins.imagemin(),
            plugins.flatten(),
			gulp.dest(options.paths.dist.img)
			],cb);
	});
}