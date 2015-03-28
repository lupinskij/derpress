<?php
	
	/* <<<< POST TYPES >>>> */

	// Home Slideshow
	add_action('init', 'slideshow');
	function slideshow() {
	  $args = array(
		'labels' => array(
		   'name' => __( 'Home Slideshow' ),
		   'singular_name' => __( 'Home Slideshow' ),
		   'add_new' => __( 'Add New Slide' ),
		   'add_new_item' => __( 'Add New Slide' ),
		   'edit_item' => __( 'Edit Slide' ),
		   'new_item' => __( 'Add New Slide' ),
		   'view_item' => __( 'View Slide' ),
		   'search_items' => __( 'Search Slides' ),
		   'not_found' => __( 'No Slides found' ),
		   'not_found_in_trash' => __( 'No Slides found in trash' )
	   ),
		'public' => true,
		'show_ui' => true,
		'capability_type' => 'post',
		'hierarchical' => false,
		// 'menu_icon' => WP_CONTENT_URL . '/themes/themes/images/home-widget.png',
		'rewrite' => true,
		'exclude_from_search' => true,
		'menu_position' => 20,
		'supports' => array('title', 'editor', 'thumbnail', 'page-attributes')
	  );

	  register_post_type('slideshow', $args);
	}

	// News / Events
	add_action('init', 'news');
	function news() {
	  $args = array(
		'labels' => array(
		   'name' => __( 'News' ),
		   'singular_name' => __( 'News & Events' ),
		   'add_new' => __( 'Add New Item' ),
		   'add_new_item' => __( 'Add Item' ),
		   'edit_item' => __( 'Edit Items' ),
		   'new_item' => __( 'Add New Item' ),
		   'view_item' => __( 'View Item' ),
		   'search_items' => __( 'Search Items' ),
		   'not_found' => __( 'No Items found' ),
		   'not_found_in_trash' => __( 'No Items found in trash' )
	   ),
		'public' => true,
		'show_ui' => true,
		'capability_type' => 'post',
		'hierarchical' => false,
		// 'menu_icon' => WP_CONTENT_URL . '/themes/themes/images/home-widget.png',
		'rewrite' => true,
		'exclude_from_search' => true,
		'menu_position' => 20,
		'supports' => array('title', 'editor', 'thumbnail', 'page-attributes')
	  );

	  register_post_type('news', $args);
	}

	// Locations
	add_action('init', 'locations');
	function locations() {
	  $args = array(
		'labels' => array(
		   'name' => __( 'Locations' ),
		   'singular_name' => __( 'Locations' ),
		   'add_new' => __( 'Add New Location' ),
		   'add_new_item' => __( 'Add Location' ),
		   'edit_item' => __( 'Edit Location' ),
		   'new_item' => __( 'Add New Location' ),
		   'view_item' => __( 'View Locations' ),
		   'search_items' => __( 'Search Locations' ),
		   'not_found' => __( 'No Locations found' ),
		   'not_found_in_trash' => __( 'No Locations found in trash' )
	   ),
		'public' => true,
		'show_ui' => true,
		'capability_type' => 'post',
		'hierarchical' => false,
		// 'menu_icon' => WP_CONTENT_URL . '/themes/themes/images/home-widget.png',
		'rewrite' => true,
		'exclude_from_search' => true,
		'menu_position' => 20,
		'supports' => array('title', 'editor', 'thumbnail', 'page-attributes')
	  );

	  register_post_type('locations', $args);
	}

?>