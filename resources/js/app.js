jQuery(document).ready(function(){
	
	"use strict";
	
	// LightBox Options
	$(".attachment").find('a > img:not(.attachment-thumbnail)').parent().attr('rel','gallery').fancybox({
		fitToView: true,
		autoSize :  true,
		margin : 30,
		autoScale : true,
		width : '100%',
		height : '100%',
		showNavArrows: true,
		showCloseButton: true,
		helpers : {
			media : {}
		}
	});

	$(".lightbox").attr('rel','gallery').fancybox({
		fitToView: true,
		autoSize :  true,
		margin : 30,
		autoScale : true,
		width : '100%',
		height : '100%',
		showNavArrows: true,
		showCloseButton: true,
		helpers : {
			media : {}
		}
	});
	//End LightBox Options

	//Menu Trigger
	$(".menu-trigger").click(function() {

		$(".header").toggleClass("active");

	});
	//End Menu Trigger

	//header-fullscreen__trigger
	$('.header-fullscreen__trigger').click(function(){

		$('.bars, .bar, .header-fullscreen').toggleClass('active');

	});
	//end header-fullscreen__trigger
	
	//Detect Menu Item & Add Active Class
	jQuery(function($) {

		var path = window.location.href; // because the 'href' property of the DOM element is the absolute path
		$('.header-fullscreen__navbar .main-nav a').each(function() {

		 if (this.href === path) {
		  $(this).addClass('active');
		 }

		});
		
	});
	//End Detect Menu Item & Add Active Class

});

/* Top Nav Trigger Active */
jQuery(document).ready(function($) {
	var topNav = function() {
		var width = document.body.clientWidth;

		if(width <= 1024) {
			$('.top-nav').addClass('active');
		} else if(width > 1024) {
			$('.top-nav').removeClass('active');
		}
	};

	$(window).resize(function(){
		topNav();
	});

	topNav();
});
/* End Top Nav Trigger Active */


