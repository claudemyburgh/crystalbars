let mix = require('laravel-mix'),
	Path = require('path')

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

 mix.webpackConfig({
 	resolve: {

 		alias: {
 			"TweenLite": Path.resolve('node_modules', 'gsap/src/uncompressed/TweenLite.js'),
 			"TweenMax": Path.resolve('node_modules', 'gsap/src/uncompressed/TweenMax.js'),
 			"TimelineLite": Path.resolve('node_modules', 'gsap/src/uncompressed/TimelineLite.js'),
 			"TimelineMax": Path.resolve('node_modules', 'gsap/src/uncompressed/TimelineMax.js'),
 			"ScrollToPlugin": Path.resolve('node_modules', 'gsap/src/uncompressed/plugins/ScrollToPlugin.js'),
 			"ScrollMagic": Path.resolve('node_modules', 'scrollmagic/scrollmagic/uncompressed/ScrollMagic.js'),
 			"animation.gsap": Path.resolve('node_modules', 'scrollmagic/scrollmagic/uncompressed/plugins/animation.gsap.js'),
 			"debug.addIndicators": Path.resolve('node_modules', 'scrollmagic/scrollmagic/uncompressed/plugins/debug.addIndicators.js'),
 			"lightbox": Path.resolve('node_modules', 'lightbox2/dist/js/lightbox.js'),
 			// "ripples": Path.resolve('node_modules', 'jquery.ripples/dist/jquery.ripples.js')
 		}
 	}
 }).js('resources/assets/js/app.js', 'public/js')
   .sass('resources/assets/sass/style.sass', 'public/css');
