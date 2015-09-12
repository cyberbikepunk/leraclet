<?php

$args = array('id' => array('NO_POST_AVAILABLE', 'POST_NICHT_VERFUGBAR'));

/*------------------------------------------------------------------
 * RETURNS the ID of the current post or the default post.
 *-----------------------------------------------------------------*/
function lr_get_the_ID() {

	$id = get_the_ID();
	if (!$id) {
		$id = POST_NOT_AVAILABLE;
	}
	return $id;
}

?>