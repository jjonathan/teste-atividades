module.exports = function(gulp, options, plugins){

	gulp.task('watchTask', function(){
		gulp.watch(options.paths.src.img, ['imgTask']);
		gulp.watch(options.paths.src.js, ['scriptTask']);
		gulp.watch(options.paths.src.css, ['styleTask']);
		gulp.watch(options.paths.src.fonts, ['fontsTask']);
	});
}