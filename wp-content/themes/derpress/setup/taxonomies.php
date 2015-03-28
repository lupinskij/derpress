<?php
  /* <<<< TAXONOMIES >>>> */

  // Include core
  require_once(ABSPATH. 'wp-config.php'); 
  require_once(ABSPATH. 'wp-includes/wp-db.php'); 
  require_once(ABSPATH. 'wp-admin/includes/taxonomy.php'); 

  // Cats for locations
  // ---- Drop cat ----
  // wp_delete_category( $cat_ID );
  add_action( 'init', 'build_taxonomies', 0 );
 
  function build_taxonomies() {
    //wp_create_category('Atlanta');
  }

  // Tags for specifying post type
  // wp_insert_term( 'Featured', 'post_tag');
  // wp_insert_term( 'Partners', 'post_tag');
  // wp_insert_term( 'Students', 'post_tag');


  // Add tax support to pages
  //function support_all() {
    //register_taxonomy_for_object_type('post_tag', 'page');
    // Add cat support
    // register_taxonomy_for_object_type('category', 'page');
  //}
  // ensure all tags are included in queries
  //function support_query($wp_query) {
    //if ($wp_query->get('tag', 'category')) $wp_query->set('post_type', 'any');
    // if ($wp_query->get('category')) $wp_query->set('post_type', 'any');
  //}
  // Tag Hooks
  //add_action('init', 'support_all');
  //add_action('pre_get_posts', 'support_query');
?>