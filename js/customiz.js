(function( $ ) {

	"use strict";
	/////////////////////////////////////////////////////////////////////////////////////////////	
	// Annuler l'envoi vers téléphone pour autre que mobile et annuler le clic sur menu parent */
	var $window = $(window);	
	function checkWidth() {
		var windowsize = $window.width();
		if (windowsize < 1028 && windowsize > 764) {		
			$("#primary-menu > li.menu-item-has-children > a").attr("href", "javascript:void(0)");
		}			
	}	
	// Execute on load
	checkWidth();		
	
		
	///////////////////////////////
	// activation totop
	///////////////////////////////
	var offset = 300,
		offset_opacity = 1200,
		scroll_top_duration = 700,
		$back_to_top = $('.totop');

	//hide or show the "back to top" link
	$(window).scroll(function(){
		( $(this).scrollTop() > offset ) ? $back_to_top.addClass('cd-is-visible') : $back_to_top.removeClass('cd-is-visible cd-fade-out');
		if( $(this).scrollTop() > offset_opacity ) { 
			$back_to_top.addClass('cd-fade-out');
		}
	});

	//smooth scroll to top
	$back_to_top.on('click', function(event){
		event.preventDefault();
		$('body,html').animate({
			scrollTop: 0 ,
		 	}, scroll_top_duration
		);
	});
	
					
})(jQuery);
