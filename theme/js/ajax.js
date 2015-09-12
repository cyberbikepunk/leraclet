var $ = jQuery.noConflict();
	
$(document).ready(function() {
		
	/*------------------------------------------------------------------
	 * Load additional thumbnails through Ajax : the number of posts
	 * loaded initially is defined in the Wordpress settings. 
	 *-----------------------------------------------------------------*/
		
	var pageNum = parseInt(pbd_alp.startPage) + 1;
	var pageMax = parseInt(pbd_alp.maxPages);
	var nextLink = pbd_alp.nextLink;
		
	if(pageNum <= pageMax) {
		$('#lr-thumbnails')
		.append('<div class="lr-place-holder-'+ pageNum +'"></div>')
		.append('<p id="lr-load-posts"><a href="#">Load More Posts</a></p>');
	}
		
	$('#lr-load-posts a').click(function() {

		if (pageNum <= max) {
			$(this).text('Loading posts...');				
			$('.lr-place-holder-'+ pageNum).load(nextLink + ' .post', 
													 
				function() {
					pageNum++;
					nextLink = nextLink.replace(/\/page\/[0-9]?/, '/page/'+ pageNum);
					$('#pbd-alp-load-posts').before('<div class="pbd-alp-placeholder-'+ pageNum +'"></div>')
					if (pageNum <= max) {
						$('#pbd-alp-load-posts a').text('Load More Posts');
					} else {
						$('#pbd-alp-load-posts a').text('No more posts to load.');
					}
				}
			);
			
			
		} else {
			$('#pbd-alp-load-posts a').append('.');
		}	
			
		return false;
		
	});

});