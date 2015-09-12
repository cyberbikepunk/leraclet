<?php

 /**
 * Le Raclet theme : function library
 *
 * Opabinia75, opabinia@opabinia.de
 * v1 07/14
 */

/*------------------------------------------------------------------
 * QUERIES the default post.
 *-----------------------------------------------------------------*/
function lr_backup_query() {

	$args = array('id' => POST_NOT_AVAILABLE);
	query_posts($args);
}

/*------------------------------------------------------------------
 * RETURNS the content of a given post
 *-----------------------------------------------------------------*/
function lr_get_content($id) {

	$page = get_page($id);
	if ($page) {
		return wpautop($page->post_content);
	}
}

/*------------------------------------------------------------------
 * RETURNS the title of an image even when its unavailable.
 *-----------------------------------------------------------------*/
function lr_get_image_title($image) {

	if (!$image) {
		$child_title = 'No image available';
	} else {
		$child_title = $image->post_title;
	}
	$parent_title = (in_the_loop())? get_the_title() . ' | ' : BLANK;

	return $parent_title . $child_title;
}

/*------------------------------------------------------------------
 * RETURNS the image url given its post ID and 	size.
 *-----------------------------------------------------------------*/
function lr_get_image_url($id, $size) {

	$file = wp_get_attachment_image_src($id, $size);
	return $file[URL];
}

/*------------------------------------------------------------------
 * RETURNS all images objects belonging to the given post or its
 * translations.
 *-----------------------------------------------------------------*/
function lr_get_images($id, $offset, $number) {

	$id = !($id) ? POST_NOT_AVAILABLE : $id;

	$translations = lr_get_translations($id);

	$args = array (
		'post_type' => 'attachment',
		'post_mime_type' => 'image',
		'offset' => $offset,
		'numberposts' => $number
	);
	$images = array();

	foreach ($translations as $translation) {
		$args['post_parent'] = $translation;
		$images = array_merge(get_posts($args), $images);
	}
	$images = array_filter($images);

	return empty($images) ? array(get_post(IMAGE_NOT_AVAILABLE)) : $images;
}

/*------------------------------------------------------------------
 * RETURNS all translations for the current post, including itself.
 *-----------------------------------------------------------------*/
function lr_get_translations($original) {

	$translations = array();

	if (function_exists('pll_the_languages') && function_exists('pll_get_post')) {

		$args = array(
			'raw' => YES,
			'hide_current' => YES
		);
		$languages = pll_the_languages($args);

		if ($languages) {
			foreach ($languages as $language) {
				$slug = $language['slug'];
				$translation = pll_get_post($original, $slug);
				if ($translation) { $translations[$slug] = $translation; }
			}
		}
	}
	return array_merge(array(lr_get_post_language($original) => $original), $translations);
}

/*------------------------------------------------------------------
 * RETURNS the language of a given post.
 *-----------------------------------------------------------------*/
 function lr_get_post_language($id) {

	$terms = wp_get_object_terms($id, 'language');
	$term = array_shift($terms);

	return $term->slug;
}

/*------------------------------------------------------------------
 * RETURNS menu items for a given menu location.
 *-----------------------------------------------------------------*/
 function lr_get_menu($menu_name) {

	$menu_locations = get_nav_menu_locations();

	if (($menu_locations = get_nav_menu_locations()) && isset($menu_locations[$menu_name])) {
		$menu_object = wp_get_nav_menu_object($menu_locations[$menu_name]);
		$menu_items = wp_get_nav_menu_items($menu_object->term_id);
	} else {
		$menu_items = false;
	}
	return $menu_items;
}

/*------------------------------------------------------------------
 * RETURNS true if the menu item points to the current page.
 *-----------------------------------------------------------------*/
function lr_is_current_page($menu_item) {

 	$item_url = $menu_item->url;//var_dump($item_url);
	$home_url = get_home_url() . '/';//var_dump($home_url);
	$current_url = "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];

	if ($current_url == $home_url) {
		//$current_url = rtrim(preg_replace(array ('/en/', '/de/'), NOTHING, $current_url), '/');var_dump($current_url);
	}
	return ($item_url == $current_url) ? true : false;
}

?>