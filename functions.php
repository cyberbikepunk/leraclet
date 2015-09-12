<?php
/**
 * Le Raclet theme base file
 *
 * Opabinia75, opabinia@opabinia.de
 * v1 07/14
 */

/*------------------------------------------------------------------
 * DEPENDENCIES are included here
 *-----------------------------------------------------------------*/

require_once 'php/hooked.php'; // Callback functions
require_once 'php/include.php'; // Function library
require_once 'php/markup.php'; // Markup snippets

/*------------------------------------------------------------------
 * SET UP the basic theme
 *-----------------------------------------------------------------*/

add_theme_support('post-thumbnails');
register_nav_menu('main-menu', 'Main');
register_nav_menu('language-menu', 'Language');
register_nav_menu('thumbnail-menu', 'Thumbnails');

/*------------------------------------------------------------------
 * FILTERS hooked here
 *-----------------------------------------------------------------*/

add_filter('intermediate_image_sizes_advanced', 'lr_remove_image_sizes');
add_filter('template_include', 'lr_redirect_template', 99);

/*------------------------------------------------------------------
 * ACTIONS hooked here
 *-----------------------------------------------------------------*/

if (!is_admin()) {

	add_action('wp_enqueue_scripts', 'lr_enqueue_scripts');
	add_action('pre_get_posts', 'lr_exclude_default_post');
	//	add_action('pre_get_posts', 'lr_modify_query');
	add_action('template_redirect', 'lr_ajax_init');

} elseif (!current_user_can('update_core')) {

	add_action('add_meta_boxes', 'lr_remove_metaboxes');
	add_action('admin_footer-post-new.php', 'lr_hide_attachment_details');
	add_action('admin_footer-post.php', 'lr_hide_attachment_details');
	add_action('wp_dashboard_setup', 'lr_clean_dashboard');
}

/*------------------------------------------------------------------
 * REGISTER translation Polylang plugin strings
 *-----------------------------------------------------------------*/

if (function_exists('pll_register_string')) {
	pll_register_string('Home title', 'Latest News', 'Le Raclet');
	pll_register_string('Portofolio title', 'Portfolio', 'Le Raclet');
	pll_register_string('Workshops title', 'Workshops', 'Le Raclet');
}

/*------------------------------------------------------------------
 * DEFINE theme static images IDs
 *-----------------------------------------------------------------*/

define('LOGO', content_url() . '/uploads/logo.png');
define('FAVICON', get_stylesheet_directory_uri() . '/favicon.ico');
define('WORKSHOP1', 239);
define('WORKSHOP2', 237);
define('IMAGE_NOT_AVAILABLE', 275);
define('POST_NOT_AVAILABLE', 306);
define('POST_NICHT_VERFUGBAR', 312);
define('CONTACT', 19);
define('KONTAKT', 38);
define('FOOTER_LEFT', 290);
define('FOOTER_RIGHT', 292);
define('WELCOME_MESSAGE', 288);
define('WILKOMMENSNACHRICHT', 302);

/*------------------------------------------------------------------
 * DEFINE constants
 *-----------------------------------------------------------------*/

define('DEFAULT_LANGUAGE', 'en');
define('NO_OFFSET', 0);
define('ALL', -1 );
define('SHOW', 'active');
define('HIDE', '');
define('FIRST', 0);
define('LAST', 0);
define('URL', 0);
define('NONE', 0);
define('YES', 1);
define('NO', 0);
define('DO_NOTHING', '');
define('MATCH', 0);
define('SINGLE_SLIDE', 0);
define('POLYLANG', 'pll-');
define('NOTHING', '');
define('SINGLE', 1);
define('LATEST', 0);
define('BLANK', '');
define('VISIBLE', '');
define('ADD_NO_CSS', '');
define('SECOND', 1);

?>