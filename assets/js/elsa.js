/**
 * JavaScript
 *
 * @package elsa
 * @since 0.1
 */

/**
 * Elsa JQuery Function
 * 
 * @since 0.1
 */

( function($) {

	/*
	* Toggle Search on Desktop
	*/
	
	$('.search-toggle').on( 'click', function () {
		$('body').toggleClass('show-desktop-search');
	});

	/*
	* Clear Search Input Field
	*/

	$(document).ready(function(){

		// @navigation
		$(".menu-search input").val("");
		// @pages
		$(".content-search input").val("");
	  
	});

} )(jQuery);