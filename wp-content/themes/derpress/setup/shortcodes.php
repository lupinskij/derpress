<?php

  // Add Shortcode For Grid
  function foundation_grid( $atts , $content = null ) {

    // Attributes
    extract( shortcode_atts(
      array(
        'large' => '12',
        'medium' => '12',
        'small' => '12',
      ), $atts )
    );

    // Code ** You'll need to wrap loop in .row with this
  return '<div class="large-' . $large . ' medium-' . $medium . ' small-' . $small . ' columns">' . (wpautop($content)) . '</div>';

  }
  add_shortcode( 'columns', 'foundation_grid' );

?>