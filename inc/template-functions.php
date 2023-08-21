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
 * Add a news post type.
 */
function odchill_news_post_type()
{
	$args = array(
		'public' => true,
		'show_in_rest' => true,
		'label'  => 'Новини',
		'supports' => array('title', 'editor', 'thumbnail', 'author'),
		'has_archive' => true,
		'menu_position' => 8,

	);
	register_post_type('news', $args);
}
add_action('init', 'odchill_news_post_type');

/**
 * Add a place post type.
 */
function odchill_place_post_type()
{
	$args = array(
		'public' => true,
		'show_in_rest' => true,
		'label'  => 'Місця',
		'supports' => array('title', 'editor', 'thumbnail', 'author'),
		'has_archive' => true,
		'menu_position' => 8,

	);
	register_post_type('place', $args);
}
add_action('init', 'odchill_place_post_type');

/**
 * Registed type taxonomy.
 */
function oddchill_create_type_taxonomy()
{
	$labels = array(
		'name'              => 'Types',
		'singular_name'     => 'type',
		'search_items'      => 'Search type',
		'all_items'         => 'All types',
		'edit_item'         => 'Edit types',
		'update_item'       => 'Update type',
		'add_new_item'      => 'Add new type',
		'new_item_name'     => 'new type name',
		'menu_name'         => 'Типи'
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array('slug' => 'Тип')
	);

	register_taxonomy('type', 'place', $args);
}
add_action('init', 'oddchill_create_type_taxonomy');

/**
 * Registed custom image size.
 */
function oddchill_custom_image_sizes()
{
	add_image_size('custom-thumbnail', 300, 190, true); // Название размера, ширина, высота, обрезка
	add_image_size('custom-medium', 600, 300, true);
	add_image_size('custom-large', 800, 400, true);
}
add_action('after_setup_theme', 'oddchill_custom_image_sizes');

/**
 * add support template
 */
function custom_taxonomy_template($template)
{
	if (is_tax('type')) {
		$template = locate_template('archive-place.php');
	}
	return $template;
}
add_filter('template_include', 'custom_taxonomy_template');
