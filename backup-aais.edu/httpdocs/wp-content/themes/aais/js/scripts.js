(function ($, root, undefined) {
	
	$(function () {
		
		'use strict';
		
		// DOM ready, take it away
		$(document).ready(function(){
			$(".title h2").after("<div class='title-separator'><div class='separator-inner'></div></div>");
			$(".vc_tta-controls-icon").wrap("<div class='plus-background'></div>");
			$(".vc_toggle_icon").wrap("<div class='plus-background'></div>");
			$("#mega-menu-header-menu > .mega-menu-item > a").after("<div class='menu-separator'></div>");
		});
		
		$('a[href*="#contact-form"]').on('click', function (e) {
			e.preventDefault();

			$('html, body').animate({
				scrollTop: $($(this).attr('href')).offset().top
			}, 500, 'linear');
		});
		
		
	});
	
})(jQuery, this);
