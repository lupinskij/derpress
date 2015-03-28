<?php

	/* <<<< INITIALIZE >>>> */

	/* Enqueues scripts and styles */
	function derp_enqueues() {
		wp_enqueue_style( 'derp', get_stylesheet_uri() );
		wp_enqueue_style( 'derp-foundation', get_template_directory_uri() . '/css/app.css', array( 'derp' ), '20140317' );

		wp_enqueue_script( 'jquery' );
		wp_enqueue_script( 'derp-modernizr', get_template_directory_uri() . '/js/vendor/custom.modernizr.js', array(), '1.0', true );
	}
	add_action( 'wp_enqueue_scripts', 'derp_enqueues' );

	// Add Parent classes to wp_menu
	add_filter( 'wp_nav_menu_objects', 'add_menu_parent_class' );
	function add_menu_parent_class( $items ) {

		$parents = array();
		foreach ( $items as $item ) {
				if ( $item->menu_item_parent && $item->menu_item_parent > 0 ) {
						$parents[] = $item->menu_item_parent;
				}
		}

		foreach ( $items as $item ) {
				if ( in_array( $item->ID, $parents ) ) {
						$item->classes[] = 'menu-parent-item';
				}
		}

		return $items;
	}

	// Enable thumbnails
	add_action( 'init', 'enable_thumbnails' );
	function enable_thumbnails() {
	  if ( function_exists( 'add_theme_support' ) ) {
		add_theme_support( 'post-thumbnails' );
	  }
	}

	// Add custom menus
	add_action( 'init', 'custom_menus' );
	function custom_menus() {
	  register_nav_menus(
		  array(
			  'primary-menu' => __( 'Header Menu' )
			  // 'secondary-meny' => __( 'Footer Menu' ) // Optional footer menu
		  )
	  );
	}

	// Enable sidebars for widgets
	if ( function_exists('register_sidebar') ) {
	   	register_sidebar(array(
		   'name' => 'Right Sidebar',
		   'before_widget' => '<hr><div class="widget">',
		   'after_widget' => '</div>',
		   'before_title' => '<h2>',
		   'after_title' => '</h2>'
	    ));
	}

?>
