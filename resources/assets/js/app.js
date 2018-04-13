
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');


window.Vue = require('vue');
window.Flickity = require('flickity');
window.Dropzone = require('dropzone');
Dropzone.autoDiscover = false;
const luna = require('luna-sass/Framework/js/luna.js');

import TweenMax from 'gsap'
import ScrollMagic from 'scrollmagic'


require('animation.gsap');
require('debug.addIndicators');
require('ScrollToPlugin');
require('isotope-layout/dist/isotope.pkgd.js');
// require('fullscreen');

require('lightbox');


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

// Vue.component('example-component', require('./components/ExampleComponent.vue'));

// const app = new Vue({
//     el: '#app'
// });


(function($, window, document, undefined){

	'use strict';

	$(document).Luna();
	//	Controller for scrollmagic
	var controller = new ScrollMagic.Controller();

	$("#logo").mouseover(function (e) {    
		$(this).attr("src", $(this).attr("src").replace(".jpg", ".gif"));
	}).mouseout(function (e) {
		$(this).attr("src", $(this).attr("src").replace(".gif", ".jpg"));
	});

	if($('.has__danger').length){
		$('#testfrom').show();
	}

	$('#createTest').click(function(e){
		e.preventDefault();
		$('#testfrom').slideToggle();
	});


	if ($('.hero').length || $('.image__fold__wrapper').length) {

		var flkty = new Flickity( '.hero', {
		 	autoPlay: true,
		 	pageDots: false,
			adaptiveHeight: true,
		 	lazyLoad: 1
		});

		var flkty2 = new Flickity( '.image__fold__wrapper', {
		 	autoPlay: true,
		 	pageDots: true,
	 		adaptiveHeight: true,
		 	lazyLoad: 4,
		 	cellAlign: 'left'
		});

	}

	if ($('.testimonial__carousel').length){
		var flkty3 = new Flickity( '.testimonial__carousel', {
		 	autoPlay: true,
		 	pageDots: false,
	 		// adaptiveHeight: true,
	 		 accessibility: true,
		 	lazyLoad: 4,
		 	cellAlign: 'center',
		 	prevNextButtons: false
		});
	}

	if ($('.robber').length || $('.robber2').length){
		
		var Robber1Tml = new TimelineMax();
		Robber1Tml
			.to('.robber', 0.3, {x: '-100px', rotation: '-20deg', ease:Power3.easeOut})
			.to('.robber', 0.3, {x: '0px', rotation: '0deg', delay: 1, ease:Power3.easeOut})

		var scene = new ScrollMagic.Scene({
			triggerElement: '.robber-trigger',
			triggerHook: 0.1,
		})
		.setTween(Robber1Tml)
		// .addIndicators()
		.addTo(controller);

		var scene = new ScrollMagic.Scene({
			triggerElement: '.robber-trigger2',
			triggerHook: 0.5,
		})
		.setTween(TweenMax.to('.robber2', 0.3, {x: '-100px', rotation: '-15deg', ease:Power3.easeOut}))
		// .addIndicators()
		.addTo(controller);
	}

	if ( $('.social__block').length ) {

		var parallax = new ScrollMagic.Scene({
			triggerElement: '.social__block',
			triggerHook: 1,
			duration: "200%",

		})
		// .addIndicators()
		.setTween(TweenMax.to('.social__block__image', 1, {y: "-40%", ease:Power0.ease}))
		.addTo(controller);

	}


	//modal 
	//
	function modal()
	{
		var $body = $('body'), $modalOverlay = $('.modal__overlay');

		if ($body.hasClass('has__modal')){
			$body.removeClass('has__modal');
			$modalOverlay.fadeOut(300);
		}else{
			$body.addClass('has__modal');
			$modalOverlay.fadeIn(500);
		}
	}
	
	$('#modal-quote-trigger').click(function(e){
		e.preventDefault();
		modal();
	});

	$('.modal__close').click(function(e){
		e.preventDefault()
		modal();
	});

	$('.menu__mobile').click(function(e){
		e.preventDefault();
		$('.menu').slideToggle();
	});




	$(document).ready(function(){
		$('.isotope').isotope({
			masonry: {}
		});
		// setTimeout(function(){

		// }, 200)
		$('#loader').fadeOut(300);
	});


})(jQuery, window, document)