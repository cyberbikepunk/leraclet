var $ = jQuery.noConflict();
	
$(document).ready(function() {
	
	/*------------------------------------------------------------------
	 * Animate the category page view : when a post thumbnail is 
	 * clicked the post is loaded at the top of the page.
	 *-----------------------------------------------------------------*/
	
	$(".lr-thumbnail").click(function(event) {
		event.preventDefault();		
		$("#lr-carousel").load($(this).attr("href"));
		$(window).scrollTop(121);
	});

});
