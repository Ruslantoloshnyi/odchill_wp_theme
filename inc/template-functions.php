<?php

/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package odessachill
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function odchill_body_classes($classes)
{
	// Adds a class of hfeed to non-singular pages.
	if (!is_singular()) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if (!is_active_sidebar('sidebar-1')) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter('body_class', 'odchill_body_classes');

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function odchill_pingback_header()
{
	if (is_singular() && pings_open()) {
		printf('<link rel="pingback" href="%s">', esc_url(get_bloginfo('pingback_url')));
	}
}
add_action('wp_head', 'odchill_pingback_header');

/**
 * Add a beach post type.
 */
function odchill_beach_post_type()
{
	$args = array(
		'public' => true,
		'show_in_rest' => true,
		'label'  => 'Пляжі',
		'supports' => array('title', 'editor', 'thumbnail', 'author',),
		'has_archive' => true,
		'menu_position' => 5,

	);
	register_post_type('beach', $args);
}
add_action('init', 'odchill_beach_post_type');

/**
 * Add a park post type.
 */
function odchill_park_post_type()
{
	$args = array(
		'public' => true,
		'show_in_rest' => true,
		'label'  => 'Парки',
		'supports' => array('title', 'editor', 'thumbnail', 'author'),
		'has_archive' => true,
		'menu_position' => 5,

	);
	register_post_type('park', $args);
}
add_action('init', 'odchill_park_post_type');

/**
 * Add a architecture post type.
 */
function odchill_architecture_post_type()
{
	$args = array(
		'public' => true,
		'show_in_rest' => true,
		'label'  => 'Архітектура',
		'supports' => array('title', 'editor', 'thumbnail', 'author'),
		'has_archive' => true,
		'menu_position' => 7,

	);
	register_post_type('architecture', $args);
}
add_action('init', 'odchill_architecture_post_type');
