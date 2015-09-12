<?php

 /**
 * Le Raclet theme : HTML markup snippets
 *
 * Opabinia75, opabinia@opabinia.de
 * v1 07/14
 */


/*------------------------------------------------------------------
 * ECHOES the blog title.
 *-----------------------------------------------------------------*/
function lr_blog_title() {

	echo get_bloginfo('description') . ' | ' . get_bloginfo('name');
}

/*------------------------------------------------------------------
 * ECHOES the language menu list using Polylang plugin functions
 *-----------------------------------------------------------------*/
function lr_language_menu () {

	if (!function_exists('pll_current_language') || !function_exists('pll_the_languages')) {
		return;
	}

	$args = array (
		'show_flags' => NO,
		'hide_if_empty' => NO,
		'hide_if_no_translation' => NO,
		'hide_current' => NO,
		'raw' => YES,
	);

	$items = pll_the_languages($args);
	$current = pll_current_language();

	foreach ($items as $i => $item) {

		$class = $current == $item['slug'] ? 'lr-current' : ADD_NO_CSS;
		$slash = $i < count($items)-1 ? '<li class="hidden-xs"> / </li>' : ADD_NO_CSS;

		echo '<li><a class="' . $class . '" href="' . $item['url'] . '">' . $item['slug'];
		echo $class == 'lr-current' ? lr_strike_through($item['slug']) : ADD_NO_CSS;
		echo '</a></li>' . $slash;
	}
}

/*------------------------------------------------------------------
 * ECHOES 'XXXX' over a menu item in the main menu
 *-----------------------------------------------------------------*/
 function lr_strike_through($menu_item_title) {

	$length = strlen($menu_item_title);
	$xxxxxx = str_repeat('X', $length);

	echo '<div class="lr-strike-through">' . $xxxxxx . '</div>';
}

/*------------------------------------------------------------------
 * ECHOES the HTML markup for the thumbnail menu that appears
 * on the homepage underneath the carousel.
 *-----------------------------------------------------------------*/

 function lr_thumbnail_menu() {

	$menu_items = lr_get_menu('thumbnail-menu');

	if ($menu_items) {
		foreach ($menu_items as $n => $menu_item) {

			$class = $n > 2 ? ' hidden-md hidden-lg' : VISIBLE;

			echo '<div class="lr-column col-md-4 col-xs-6' . $class . '">';
			echo '<a class="lr-overlay-frame" href="' . $menu_item->url . '">';

			lr_thumbnail_menu_image($menu_item);

			echo '<h2 class="lr-overlay-stripe lr-overlay-text"> > ' . $menu_item->title . '</h2>';

			lr_thumbnail_menu_text($menu_item);

			echo '</a>';
			echo '</div>';
		}
	}
}

/*------------------------------------------------------------------
 * ECHOES the thumbnail menu text
 *-----------------------------------------------------------------*/
function lr_thumbnail_menu_text($menu_item) {

	$id = (int) $menu_item->object_id;
	$text = lr_get_content($id);

	if  (($id == WELCOME_MESSAGE) || ($id == WILKOMMENSNACHRICHT)) {
		echo '<div class="lr-overlay-full lr-overlay-text hidden-xs">' . $text . '</div>';
	}
}

/*------------------------------------------------------------------
 * ECHOES one thumbnail menu image
 *-----------------------------------------------------------------*/
function lr_thumbnail_menu_image($menu_item) {

	$id = (int) $menu_item->object_id;
	$title = $menu_item->title;
	$url = lr_get_image_url(IMAGE_NOT_AVAILABLE, 'thumbnail');

	if  ('page' == $menu_item->object) {

		$images = lr_get_images($id, LATEST, SINGLE);
		$image = $images[LATEST]->ID;
		$url = lr_get_image_url($image, 'thumbnail');

	} elseif ('category' == $menu_item->object) {

		$term = get_term_by('id', $id, 'category');
		$image = s8_get_taxonomy_image_src($term, 'thumbnail');
		$url = $image['src'];

	}
	echo '<img class="img-responsive" src="' . $url . '" alt="' . $title . '" title="' . $title . '">';
}

/*------------------------------------------------------------------
 * ECHOES the HTML markup for main menu
 *-----------------------------------------------------------------*/
 function lr_main_menu() {

	$menu_items = lr_get_menu('main-menu');

	if ($menu_items) {
		foreach ($menu_items as $n => $menu_item) {
			echo '<li>';
			echo '<a href="' . $menu_item->url . '">' . $menu_item->title . '</a>';
			echo lr_is_current_page($menu_item)? lr_strike_through($menu_item->title) : NOTHING ;
			echo '</li>';
		}
	}
}

/*------------------------------------------------------------------($items)
 * ECHOES the permalink pointing to most recent category found.
 *-----------------------------------------------------------------*/
function lr_category_link($post_id) {

 	$categories = get_the_category($post_id);
	echo get_category_link($categories[LAST]->term_id);
}

/*------------------------------------------------------------------
 * ECHOES the markup for a single image.
 *-----------------------------------------------------------------*/
function lr_one_image($image, $size, $class) {

	$title = lr_get_image_title($image);
	$url = lr_get_image_url($image->ID, $size);

	echo '<img class="img-responsive ' . $class . '" src="' . $url . '" alt="' . $title . '" title="' . $title . '">';
}

/*------------------------------------------------------------------
 * ECHOES a collection of images, starting with the second latest.
 *-----------------------------------------------------------------*/
function lr_more_images($images, $size, $class, $max) {

	array_shift($images);
	foreach ($images as $i => $image) {
		if ($i == $max) { break; }
		lr_one_image($image, $size, $class);
	}
}

/*------------------------------------------------------------------
 * ECHOES the CSS 'active' class when the slide index is zero or
 * an empty string when not. This class is used to toggle slides.
 *-----------------------------------------------------------------*/
function lr_toggle($n) {

	$class = ( $n == FIRST ? SHOW : HIDE );
	echo $class;
}

/*------------------------------------------------------------------
 * ECHOES the Bootstrap carousel slide indicators and controls.
 * If the number of slides is not passed as an argument, the
 * function uses the number of posts in The Loop. Skips the
 * carousel altogether if there is only one slide.
 *-----------------------------------------------------------------*/
function lr_carousel_parts($slides) {

	$N = count($slides);
	if (empty($slides) || $N == SINGLE) return;

	echo '<ol class="carousel-indicators">';
	for ( $n = 0; $n < $N; $n++) {
		echo '<li class="'; lr_toggle($n); echo '" data-target="#lr-carousel" data-slide-to="' . $n . '"></li>';
	}
	echo '</ol>';

	echo '
		<a class="left carousel-control" href="#lr-carousel" role="button" data-slide="prev">
			<span class="glyphicon glyphicon-chevron-left"></span>
		</a>
		<a class="right carousel-control" href="#lr-carousel" role="button" data-slide="next">
			<span class="glyphicon glyphicon-chevron-right"></span>
		</a>
	';
}

?>